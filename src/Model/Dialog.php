<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\App\Model;

use Osumi\OsumiFramework\ORM\OModel;
use Osumi\OsumiFramework\ORM\OPK;
use Osumi\OsumiFramework\ORM\OField;
use Osumi\OsumiFramework\ORM\OCreatedAt;
use Osumi\OsumiFramework\ORM\OUpdatedAt;

class Dialog extends OModel {
	#[OPK(
	  comment: 'Id único de cada diálogo'
	)]
	public ?int $id;

	#[OField(
	  comment: 'Id de la página a la que pertenece',
	  nullable: false,
	  ref: 'page.id'
	)]
	public ?int $id_page;

	#[OField(
	  comment: 'Id del personaje que narra el dialogo',
	  nullable: true,
	  ref: 'character.id'
	)]
	public ?int $id_character;

	#[OField(
	  comment: 'Orden del diálogo en la página',
	  nullable: false
	)]
	public ?int $dialog_order;

	#[OField(
	  comment: 'Texto del dialogo',
	  nullable: false,
	  type: OField::LONGTEXT
	)]
	public ?string $content;

	#[OCreatedAt(
	  comment: 'Fecha de creación del registro'
	)]
	public ?string $created_at;

	#[OUpdatedAt(
	  comment: 'Fecha de última modificación del registro'
	)]
	public ?string $updated_at;
}
