<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\App\Service;

use Osumi\OsumiFramework\Core\OService;
use Osumi\OsumiFramework\App\Model\Tale;

class TalesService extends OService {
	/**
	 * Función para obtener la lista de cuentos
	 *
	 * @param bool $just_tales Indica si se deben cargar SOLO los cuentos
	 *
	 * @return array Lista de cuentos
	 */
	public function getList(bool $just_tales = false): array {
		$tales = Tale::all(['order_by' => 'name#asc']);
		$list  = [];

		foreach ($tales as $t) {
			if ($just_tales) {
				$t->setPages([]);
				$t->setCharacters([]);
			}
			$list[] = $t;
		}

		return $list;
	}
}
