<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\App\Service;

use Osumi\OsumiFramework\Core\OService;
use Osumi\OsumiFramework\DB\ODB;
use Osumi\OsumiFramework\Plugins\OImage;
use Osumi\OsumiFramework\App\Component\Model\CharacterComponent;
use Osumi\OsumiFramework\App\Model\Character;
use Osumi\OsumiFramework\App\DTO\CharacterDTO;

class CharactersService extends OService {
	function __construct() {
		$this->loadService();
	}

	/**
	 * Función para obtener la lista de personajes de un cuento
	 *
	 * @param int $id_tale
	 *
	 * @return array Lista de personajes
	 */
	public function getList(int $id_tale): array {
		$db = new ODB();
		$sql = "SELECT * FROM `character` WHERE `id_tale` = ? ORDER BY `name` ASC";
		$db->query($sql, [$id_tale]);
		$list = [];

		while ($res = $db->next()) {
			$c = new Character();
			$c->update($res);
			array_push($list, $c);
		}

		return $list;
	}

	/**
	 * Función para guardar un personaje
	 *
	 * @param CharacterDTO $data Objeto con la información de un personaje
	 */
	public function saveCharacter(CharacterDTO $data): Character {
		$c = new Character();
		if (!is_null($data->getId())) {
			$c->find(['id' => $data->getId()]);
		}

		$c->set('id_tale', $data->getIdTale());
		$c->set('name', urldecode($data->getName()));
		$c->set('has_image', $data->getHasImage());
		$c->set('color', str_ireplace('#', '', $data->getColor()));
		$c->save();

		if (!is_null($data->getData())) {
			$this->saveCharacterImage($data->getData(), $c->get('id'));
		}

		return $c;
	}

	/**
	 * Obtener la extensión de una foto en formato Base64
	 *
	 * @param string $data Imagen en formato Base64
	 *
	 * @return string Extensión de la imagen
	 */
	public function getFotoExt(string $data): string {
		$arr_data = explode(';', $data);
		$arr_data = explode(':', $arr_data[0]);
		$arr_data = explode('/', $arr_data[1]);

		return $arr_data[1];
	}

	/**
	 * Guarda una imagen en Base64 en la ubicación indicada
	 *
	 * @param string $dir Ruta en la que guardar la imagen
	 *
	 * @param string $base64_string Imagen en formato Base64
	 *
	 * @param int $id Id de la imagen
	 *
	 * @param string $ext Extensión del archivo de imagen
	 *
	 * @return string Devuelve la ruta completa a la nueva imagen
	 */
	public function saveImage(string $dir, string $base64_string, int $id, string $ext): string {
		$ruta = $dir.$id.'.'.$ext;

		if (file_exists($ruta)) {
			unlink($ruta);
		}

		$ifp = fopen($ruta, "wb");
		$data = explode(',', $base64_string);
		fwrite($ifp, base64_decode($data[1]));
		fclose($ifp);

		return $ruta;
	}

	/**
	 * Guarda una imagen en Base64 para un personaje. Si no tiene formato WebP se convierte
	 *
	 * @param string $base64_string Imagen en formato Base64
	 *
	 * @param int $id Id de la imagen
	 *
	 * @return void
	 */
	public function saveCharacterImage(string $base64_string, int $id): void {
		$ext = $this->getFotoExt($base64_string);
		$ruta = $this->saveImage($this->getConfig()->getDir('ofw_tmp'), $base64_string, $id, $ext);
		$im = new OImage();
		$im->load($ruta);

		// Compruebo tamaño inicial
		if ($im->getWidth() > 400 || $im->getHeight() > 600) {
			$im->resizeToWidth(400);
			$im->save($ruta, $im->getImageType());
		}

		// Guardo la imagen ya modificada como WebP
		$im->save($this->getConfig()->getDir('characters_images').$id.'.webp', IMAGETYPE_WEBP);

		// Borro la imagen temporal
		unlink($ruta);
	}
}
