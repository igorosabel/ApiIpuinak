<?php declare(strict_types=1);

namespace OsumiFramework\App\Model;

use OsumiFramework\OFW\DB\OModel;
use OsumiFramework\OFW\DB\OModelGroup;
use OsumiFramework\OFW\DB\OModelField;
use OsumiFramework\OFW\DB\ODB;

class Tale extends OModel {
	function __construct() {
		$model = new OModelGroup(
			new OModelField(
				name: 'id',
				type: OMODEL_PK,
				comment: 'Id único de cada cuento'
			),
			new OModelField(
				name: 'name',
				type: OMODEL_TEXT,
				nullable: false,
				size: 50,
				comment: 'Nombre del cuento'
			),
			new OModelField(
				name: 'created_at',
				type: OMODEL_CREATED,
				comment: 'Fecha de creación del registro'
			),
			new OModelField(
				name: 'updated_at',
				type: OMODEL_UPDATED,
				nullable: true,
				default: null,
				comment: 'Fecha de última modificación del registro'
			)
		);

		parent::load($model);
	}
	
	private ?array $pages = null;

	/**
	 * Obtiene el listado de páginas de un cuento
	 *
	 * @return array Listado de páginas
	 */
	public function getPages(): array {
		if (is_null($this->pages)) {
			$this->loadPages();
		}
		return $this->pages;
	}

	/**
	 * Guarda la lista de páginas
	 *
	 * @param array $p Lista de páginas
	 *
	 * @return void
	 */
	public function setPages(array $p): void {
		$this->pages = $p;
	}

	/**
	 * Carga la lista de páginas de un cuento
	 *
	 * @return void
	 */
	public function loadPages(): void {
		$db = new ODB();
		$sql = "SELECT * FROM `page` WHERE `id_tale` = ? ORDER BY `page_order` ASC";
		$db->query($sql, [$this->get('id')]);
		$list = [];

		while ($res=$db->next()) {
			$p = new Page();
			$p->update($res);
			array_push($list, $p);
		}

		$this->setPages($list);
	}
}
