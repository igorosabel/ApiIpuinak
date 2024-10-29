<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\App\Model;

use Osumi\OsumiFramework\ORM\OModel;
use Osumi\OsumiFramework\ORM\OPK;
use Osumi\OsumiFramework\ORM\OField;
use Osumi\OsumiFramework\ORM\OCreatedAt;
use Osumi\OsumiFramework\ORM\OUpdatedAt;

class Character extends OModel {
	#[OPK(
	  comment: 'Id único de cada personaje'
	)]
	public ?int $id;

	#[OField(
	  comment: 'Id del cuento al que pertenece',
	  nullable: false,
	  ref: 'tale.id'
	)]
	public ?int $id_tale;

	#[OField(
	  comment: 'Nombre del personaje',
	  nullable: false,
	  max: 50
	)]
	public ?string $name;

	#[OField(
	  comment: 'Indica si el personaje tiene una imagen 1 o no 0',
	  nullable: false,
	  default: false
	)]
	public ?bool $has_image;

	#[OField(
	  comment: 'Color para los textos del personaje',
	  nullable: true,
	  max: 6,
	  default: null
	)]
	public ?string $color;

	#[OCreatedAt(
	  comment: 'Fecha de creación del registro'
	)]
	public ?string $created_at;

	#[OUpdatedAt(
	  comment: 'Fecha de última modificación del registro'
	)]
	public ?string $updated_at;
}
