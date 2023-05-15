<?php declare(strict_types=1);

namespace OsumiFramework\App\Model;

use OsumiFramework\OFW\DB\OModel;
use OsumiFramework\OFW\DB\OModelGroup;
use OsumiFramework\OFW\DB\OModelField;
use OsumiFramework\OFW\DB\ODB;

class Bookmark extends OModel {
	function __construct() {
		$model = new OModelGroup(
			new OModelField(
				name: 'id',
				type: OMODEL_PK,
				comment: 'Id único de cada marcapáginas'
			),
			new OModelField(
				name: 'id_tale',
				type: OMODEL_NUM,
				nullable: false,
				ref: 'tale.id',
				comment: 'Id del cuento en el que esta el marcapáginas'
			),
			new OModelField(
				name: 'id_page',
				type: OMODEL_NUM,
				nullable: false,
				ref: 'page.id',
				comment: 'Id de la página en la que esta el marcapaginas'
			),
			new OModelField(
				name: 'id_dialog',
				type: OMODEL_NUM,
				nullable: false,
				ref: 'dialog.id',
				comment: 'Id del diálogo en el que se ha puesto el marcapáginas'
			),
			new OModelField(
				name: 'comment',
				type: OMODEL_TEXT,
				nullable: false,
				size: 200,
				comment: 'Comentario para el marcapaginas'
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
