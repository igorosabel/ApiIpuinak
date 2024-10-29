<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\App\Model;

use Osumi\OsumiFramework\ORM\OModel;
use Osumi\OsumiFramework\ORM\OPK;
use Osumi\OsumiFramework\ORM\OField;
use Osumi\OsumiFramework\ORM\OCreatedAt;
use Osumi\OsumiFramework\ORM\OUpdatedAt;

class Bookmark extends OModel {
	#[OPK(
	  comment: 'Id único de cada marcapáginas'
	)]
	public ?int $id;

	#[OField(
	  comment: 'Id del cuento en el que esta el marcapáginas',
	  nullable: false,
	  ref: 'tale.id'
	)]
	public ?int $id_tale;

	#[OField(
	  comment: 'Id de la página en la que esta el marcapaginas',
	  nullable: false,
	  ref: 'page.id'
	)]
	public ?int $id_page;

	#[OField(
	  comment: 'Id del diálogo en el que se ha puesto el marcapáginas',
	  nullable: false,
	  ref: 'dialog.id'
	)]
	public ?int $id_dialog;

	#[OField(
	  comment: 'Comentario para el marcapaginas',
	  nullable: false,
	  max: 200
	)]
	public ?string $comment;

	#[OCreatedAt(
	  comment: 'Fecha de creación del registro'
	)]
	public ?string $created_at;

	#[OUpdatedAt(
	  comment: 'Fecha de última modificación del registro'
	)]
	public ?string $updated_at;
}
