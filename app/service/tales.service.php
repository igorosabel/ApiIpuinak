<?php declare(strict_types=1);

namespace OsumiFramework\App\Service;

use OsumiFramework\OFW\Core\OService;
use OsumiFramework\OFW\DB\ODB;
use OsumiFramework\App\Model\Venta;

class talesService extends OService {
	function __construct() {
		$this->loadService();
	}

	/**
	 * Función para obtener la lista de cuentos
	 *
	 * @return array Lista de cuentos
	 */
	public function getList(): array {
		$db = new ODB();
		$sql = "SELECT * FROM `tale` ORDER BY `name` ASC";
		$db->query($sql);
		$list = [];

		while ($res = $db->next()) {
			$t = new Tale();
			$t->update($res);
			array_push($list, $t);
		}

		return $list;
	}
}