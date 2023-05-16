<?php declare(strict_types=1);

namespace OsumiFramework\App\Model;

use OsumiFramework\OFW\DB\OModel;
use OsumiFramework\OFW\DB\OModelGroup;
use OsumiFramework\OFW\DB\OModelField;
use OsumiFramework\OFW\DB\ODB;

class Character extends OModel {
	function __construct() {
		$model = new OModelGroup(
			new OModelField(
				name: 'id',
				type: OMODEL_PK,
				comment: 'Id único de cada personaje'
			),
			new OModelField(
				name: 'id_tale',
				type: OMODEL_NUM,
				nullable: false,
				ref: 'tale.id',
				comment: 'Id del cuento al que pertenece'
			),
			new OModelField(
				name: 'name',
				type: OMODEL_TEXT,
				nullable: false,
				size: 50,
				comment: 'Nombre del personaje'
			),
			new OModelField(
				name: 'has_image',
				type: OMODEL_BOOL,
				nullable: false,
				default: false,
				comment: 'Indica si el personaje tiene una imagen 1 o no 0'
			),
			new OModelField(
				name: 'color',
				type: OMODEL_TEXT,
				nullable: true,
				default: null,
				size: 6,
				comment: 'Color para los textos del personaje'
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
