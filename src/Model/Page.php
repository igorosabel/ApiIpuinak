<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\App\Model;

use Osumi\OsumiFramework\ORM\OModel;
use Osumi\OsumiFramework\ORM\OPK;
use Osumi\OsumiFramework\ORM\OField;
use Osumi\OsumiFramework\ORM\OCreatedAt;
use Osumi\OsumiFramework\ORM\OUpdatedAt;
use Osumi\OsumiFramework\App\Model\Dialog;
use Osumi\OsumiFramework\App\Model\Option;

class Page extends OModel {
	#[OPK(
	  comment: 'Id único de cada página'
	)]
	public ?int $id;

	#[OField(
	  comment: 'Id del cuento al que pertenece',
	  nullable: false,
	  ref: 'tale.id'
	)]
	public ?int $id_tale;

	#[OField(
	  comment: 'Orden de la página en el cuento',
	  nullable: false
	)]
	public ?int $page_order;

	#[OField(
	  comment: 'Indica si la página tiene una imagen de fondo 1 o no 0',
	  nullable: false,
	  default: false
	)]
	public ?bool $has_image;

	#[OField(
	  comment: 'Indica si la imagen debe precargarse 1 o no 0',
	  nullable: false,
	  default: false
	)]
	public ?bool $preload_image;

	#[OField(
	  comment: 'Color de fondo de la pagina',
	  nullable: true,
	  default: null
	)]
	public ?string $bg_color;

	#[OField(
	  comment: 'Tipo de animación para la entrada de la página',
	  nullable: false,
	  default: 0
	)]
	public ?int $animation_in;

	#[OField(
	  comment: 'Tipo de animación para la salida de la página',
	  nullable: false,
	  default: 0
	)]
	public ?int $animation_out;

	#[OField(
	  comment: 'Indica si una pagina tiene opciones 1 o no 0',
	  nullable: false,
	  default: false
	)]
	public ?bool $has_options;

	#[OField(
	  comment: 'Indica cual es la siguiente pagina',
	  nullable: true,
	  default: null
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
		$list = Dialog::where(['id_page' => $this->id], ['order_by' => 'dialog_order#asc']);
		$this->setDialogs($list);
	}

	private ?array $options = null;

	/**
	 * Obtiene el listado de opciones de una página
	 *
	 * @return array Listado de opciones
	 */
	public function getOptions(): array {
		if (is_null($this->options)) {
			$this->loadOptions();
		}
		return $this->options;
	}

	/**
	 * Guarda la lista de opciones
	 *
	 * @param array $o Lista de opciones
	 *
	 * @return void
	 */
	public function setOptions(array $o): void {
		$this->options = $o;
	}

	/**
	 * Carga la lista de opciones de una página
	 *
	 * @return void
	 */
	public function loadOptions(): void {
		$list = Option::where(['id_page' => $this->id], ['order_by' => 'option_order#asc']);
		$this->setOptions($list);
	}
}
