<?php declare(strict_types=1);

namespace OsumiFramework\App\Module\Action;

use OsumiFramework\OFW\Routing\OModuleAction;
use OsumiFramework\OFW\Routing\OAction;
use OsumiFramework\App\DTO\CharacterDTO;
use OsumiFramework\App\Component\Model\CharacterComponent;

#[OModuleAction(
	url: '/save-character',
	services: ['characters']
)]
class saveCharacterAction extends OAction {
	/**
	 * Función para guardar un personaje
	 *
	 * @param CharacterDTO $data Objeto con la información de un personaje
	 * @return void
	 */
	public function run(CharacterDTO $data):void {
		$status = 'ok';
		$character_component = new CharacterComponent(['character' => null]);

		if (!$data->isValid()) {
			$status = 'error';
		}

		if ($status == 'ok') {
			$character_component->setValue('character', $this->characters_service->saveCharacter($data));
		}

		$this->getTemplate()->add('status',     $status);
		$this->getTemplate()->add('character',  $character_component);
	}
}
