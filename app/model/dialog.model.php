<?php declare(strict_types=1);

namespace OsumiFramework\App\Model;

use OsumiFramework\OFW\DB\OModel;
use OsumiFramework\OFW\DB\OModelGroup;
use OsumiFramework\OFW\DB\OModelField;
use OsumiFramework\OFW\DB\ODB;

class Dialog extends OModel {
	function __construct() {
		$model = new OModelGroup(
			new OModelField(
				name: 'id',
				type: OMODEL_PK,
				comment: 'Id único de cada diálogo'
			),
			new OModelField(
				name: 'id_page',
				type: OMODEL_NUM,
				nullable: false,
				ref: 'page.id',
				comment: 'Id de la página a la que pertenece'
			),
			new OModelField(
				name: 'dialog_order',
				type: OMODEL_NUM,
				nullable: false,
				comment: 'Orden del diálogo en la página'
			),
			new OModelField(
				name: 'content',
				type: OMODEL_LONGTEXT,
				nullable: false,
				comment: 'Texto del dialogo'
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
