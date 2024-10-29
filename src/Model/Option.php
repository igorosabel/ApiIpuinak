<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\App\Model;

use Osumi\OsumiFramework\ORM\OModel;
use Osumi\OsumiFramework\ORM\OPK;
use Osumi\OsumiFramework\ORM\OField;
use Osumi\OsumiFramework\ORM\OCreatedAt;
use Osumi\OsumiFramework\ORM\OUpdatedAt;

class Option extends OModel {
	#[OPK(
	  comment: 'Id único de cada opción'
	)]
	public ?int $id;

	#[OField(
	  comment: 'Id de la página a la que pertenece',
	  nullable: false,
	  ref: 'page.id'
	)]
	public ?int $id_page;

	#[OField(
	  comment: 'Orden de la opcion entre las opciones de una pagina',
	  nullable: false
	)]
	public ?int $option_order;

	#[OField(
	  comment: 'Texto de la opción',
	  nullable: false,
	  max: 200
	)]
	public ?string $content;

	#[OField(
	  comment: 'Pagina a la que lleva la opcion',
	  nullable: false
	)]
	public ?int $next_page;

	#[OCreatedAt(
	  comment: 'Fecha de creación del registro'
	)]
	public ?string $created_at;

	#[OUpdatedAt(
	  comment: 'Fecha de última modificación del registro'
	)]
	public ?string $updated_at;
}
