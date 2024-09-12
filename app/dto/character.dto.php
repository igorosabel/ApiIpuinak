<?php declare(strict_types=1);

namespace OsumiFramework\App\DTO;

use OsumiFramework\OFW\Core\ODTO;
use OsumiFramework\OFW\Web\ORequest;

class CharacterDTO implements ODTO{
	private ?int $id = null;
	private ?int $id_tale = null;
	private ?string $name = null;
	private ?bool $has_image = null;
	private ?string $color = null;
	private ?string $data = null;

	private function setId(?int $id) {
		$this->id = $id;
	}
	public function getId(): ?int {
		return $this->id;
	}
	private function setIdTale(?int $id_tale) {
		$this->id_tale = $id_tale;
	}
	public function getIdTale(): ?int {
		return $this->id_tale;
	}
	private function setName(?string $name) {
		$this->name = $name;
	}
	public function getName(): ?string {
		return $this->name;
	}
	private function setHasImage(?bool $has_image) {
		$this->has_image = $has_image;
	}
	public function getHasImage(): ?bool {
		return $this->has_image;
	}
	private function setColor(?string $color) {
		$this->color = $color;
	}
	public function getColor(): ?string {
		return $this->color;
	}
	private function setData(?string $data) {
		$this->data = $data;
	}
	public function getData(): ?string {
		return $this->data;
	}

	public function isValid(): bool {
		return (
			!is_null($this->getIdTale()) &&
			!is_null($this->getName())
		);
	}

	public function load(ORequest $req): void {
		$this->setId($req->getParamInt('id'));
		$this->setIdTale($req->getParamInt('idTale'));
		$this->setName($req->getParamString('name'));
		$this->setHasImage($req->getParamBool('hasImage'));
		$this->setColor($req->getParamString('color'));
		$this->setData($req->getParamString('data'));
	}
}
