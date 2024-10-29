<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\App\DTO;

use Osumi\OsumiFramework\Core\ODTO;
use Osumi\OsumiFramework\Web\ORequest;

class CharacterDTO implements ODTO{
	public ?int $id = null;
	public ?int $id_tale = null;
	public ?string $name = null;
	public ?bool $has_image = null;
	public ?string $color = null;
	public ?string $data = null;

	public function isValid(): bool {
		return (
			!is_null($this->id_tale) &&
			!is_null($this->name)
		);
	}

	public function load(ORequest $req): void {
		$this->id = $req->getParamInt('id');
		$this->id_tale = $req->getParamInt('idTale');
		$this->name = $req->getParamString('name');
		$this->has_image = $req->getParamBool('hasImage');
		$this->color = $req->getParamString('color');
		$this->data = $req->getParamString('data');
	}
}
