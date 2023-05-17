<?php declare(strict_types=1);

namespace OsumiFramework\App\Model;

use OsumiFramework\OFW\DB\OModel;
use OsumiFramework\OFW\DB\OModelGroup;
use OsumiFramework\OFW\DB\OModelField;
use OsumiFramework\OFW\DB\ODB;

class Option extends OModel {
	function __construct() {
		$model = new OModelGroup(
			new OModelField(
				name: 'id',
				type: OMODEL_PK,
				comment: 'Id único de cada opción'
			),
			new OModelField(
				name: 'id_page',
				type: OMODEL_NUM,
				nullable: false,
				ref: 'page.id',
				comment: 'Id de la página a la que pertenece'
			),
			new OModelField(
				name: 'option_order',
				type: OMODEL_NUM,
				nullable: false,
				comment: 'Orden de la opcion entre las opciones de una pagina'
			),
			new OModelField(
				name: 'content',
				type: OMODEL_TEXT,
				nullable: false,
				size: 200,
				comment: 'Texto de la opción'
			),
			new OModelField(
				name: 'next_page',
				type: OMODEL_NUM,
				nullable: false,
				comment: 'Pagina a la que lleva la opcion'
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
}
