<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\App\Model;

use Osumi\OsumiFramework\ORM\OModel;
use Osumi\OsumiFramework\ORM\OPK;
use Osumi\OsumiFramework\ORM\OField;
use Osumi\OsumiFramework\ORM\OCreatedAt;
use Osumi\OsumiFramework\ORM\OUpdatedAt;
use Osumi\OsumiFramework\App\Model\Page;
use Osumi\OsumiFramework\App\Model\Character;
use Osumi\OsumiFramework\App\Model\Bookmark;

class Tale extends OModel {
	#[OPK(
	  comment: 'Id único de cada cuento'
	)]
	public ?int $id;

	#[OField(
	  comment: 'Nombre del cuento',
	  nullable: false,
	  max: 50
	)]
	public ?string $name;

	#[OCreatedAt(
	  comment: 'Fecha de creación del registro'
	)]
	public ?string $created_at;

	#[OUpdatedAt(
	  comment: 'Fecha de última modificación del registro'
	)]
	public ?string $updated_at;

	private ?array $pages = null;

	/**
	 * Obtiene el listado de páginas de un cuento
	 *
	 * @return array Listado de páginas
	 */
	public function getPages(): array {
		if (is_null($this->pages)) {
			$this->loadPages();
		}
		return $this->pages;
	}

	/**
	 * Guarda la lista de páginas
	 *
	 * @param array $p Lista de páginas
	 *
	 * @return void
	 */
	public function setPages(array $p): void {
		$this->pages = $p;
	}

	/**
	 * Carga la lista de páginas de un cuento
	 *
	 * @return void
	 */
	public function loadPages(): void {
		$list = Page::where(['id_tale' => $this->id], ['order_by' => 'page_order#asc']);
		$this->setPages($list);
	}

	private ?array $characters = null;

	/**
	 * Obtiene el listado de personajes de un cuento
	 *
	 * @return array Listado de personajes
	 */
	public function getCharacters(): array {
		if (is_null($this->characters)) {
			$this->loadCharacters();
		}
		return $this->characters;
	}

	/**
	 * Guarda la lista de personajes
	 *
	 * @param array $c Lista de personajes
	 *
	 * @return void
	 */
	public function setCharacters(array $c): void {
		$this->characters = $c;
	}

	/**
	 * Carga la lista de personajes de un cuento
	 *
	 * @return void
	 */
	public function loadCharacters(): void {
		$list = Character::where(['id_tale' => $this->id], ['order_by' => 'name#asc']);
		$this->setCharacters($list);
	}

	private ?Bookmark $last_bookmark = null;
	private bool $last_bookmark_checked = false;

	/**
	 * Obtiene el último marcapáginas de un cuento
	 *
	 * @return Bookmark Último marcapáginas, si lo hubiera
	 */
	public function getLastBookmark(): ?Bookmark {
		if (!($this->last_bookmark_checked)) {
			$this->loadLastBookmark();
		}
		return $this->last_bookmark;
	}

	/**
	 * Guarda el último marcapáginas
	 *
	 * @param Bookmark $b Último marcapáginas
	 *
	 * @return void
	 */
	public function setLastBookmark(Bookmark $b): void {
		$this->last_bookmark = $b;
	}

	/**
	 * Carga el último marcapáginas de un cuento
	 *
	 * @return void
	 */
	public function loadLastBookmark(): void {
		$list = Bookmark::where(['id_tale' => $this->id], ['order_by' => 'created_at#asc', 'limit' => '0#1']);
		if (count($list) > 0) {
			$this->setLastBookmark($list[0]);
		}
		$this->last_bookmark_checked = true;
	}
}
