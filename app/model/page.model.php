<?php declare(strict_types=1);

namespace OsumiFramework\App\Model;

use OsumiFramework\OFW\DB\OModel;
use OsumiFramework\OFW\DB\OModelGroup;
use OsumiFramework\OFW\DB\OModelField;
use OsumiFramework\OFW\DB\ODB;

class Page extends OModel {
	function __construct() {
		$model = new OModelGroup(
			new OModelField(
				name: 'id',
				type: OMODEL_PK,
				comment: 'Id único de cada página'
			),
			new OModelField(
				name: 'id_tale',
				type: OMODEL_NUM,
				nullable: false,
				ref: 'tale.id',
				comment: 'Id del cuento al que pertenece'
			),
			new OModelField(
				name: 'page_order',
				type: OMODEL_NUM,
				nullable: false,
				comment: 'Orden de la página en el cuento'
			),
			new OModelField(
				name: 'has_image',
				type: OMODEL_BOOL,
				nullable: false,
				default: false,
				comment: 'Indica si la página tiene una imagen de fondo 1 o no 0'
			),
			new OModelField(
				name: 'preload_image',
				type: OMODEL_BOOL,
				nullable: false,
				default: false,
				comment: 'Indica si la imagen debe precargarse 1 o no 0'
			),
			new OModelField(
				name: 'bg_color',
				type: OMODEL_TEXT,
				nullable: true,
				default: null,
				comment: 'Color de fondo de la pagina'
			),
			new OModelField(
				name: 'animation_in',
				type: OMODEL_NUM,
				nullable: false,
				default: 0,
				comment: 'Tipo de animación para la entrada de la página'
			),
			new OModelField(
				name: 'animation_out',
				type: OMODEL_NUM,
				nullable: false,
				default: 0,
				comment: 'Tipo de animación para la salida de la página'
			),
			new OModelField(
				name: 'next_page',
				type: OMODEL_NUM,
				nullable: true,
				default: null,
				comment: 'Indica cual es la siguiente pagina'
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

	private ?array $dialogs = null;

	/**
	 * Obtiene el listado de diálogos de una página
	 *
	 * @return array Listado de diálogos
	 */
	public function getDialogs(): array {
		if (is_null($this->dialogs)) {
			$this->loadDialogs();
		}
		return $this->dialogs;
	}

	/**
	 * Guarda la lista de diálogos
	 *
	 * @param array $d Lista de diálogos
	 *
	 * @return void
	 */
	public function setDialogs(array $d): void {
		$this->dialogs = $d;
	}

	/**
	 * Carga la lista de diálogos de una página
	 *
	 * @return void
	 */
	public function loadDialogs(): void {
		$db = new ODB();
		$sql = "SELECT * FROM `dialog` WHERE `id_page` = ? ORDER BY `dialog_order` ASC";
		$db->query($sql, [$this->get('id')]);
		$list = [];

		while ($res=$db->next()) {
			$d = new Dialog();
			$d->update($res);
			array_push($list, $d);
		}

		$this->setDialogs($list);
	}
}
