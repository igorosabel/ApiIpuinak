<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\App\Module\Api\SaveCharacter;

use Osumi\OsumiFramework\Routing\OAction;
use Osumi\OsumiFramework\App\DTO\CharacterDTO;
use Osumi\OsumiFramework\App\Service\CharactersService;
use Osumi\OsumiFramework\App\Component\Model\Character\CharacterComponent;

class SaveCharacterAction extends OAction {
  private ?CharactersService $cs = null;

  public string $status = 'ok';
  public ?CharacterComponent $character = null;

  public function __construct() {
    $this->cs = inject(CharactersService::class);
    $this->character = new CharacterComponent(['Character' => null]);
  }

	/**
	 * Función para guardar un personaje
	 *
	 * @param CharacterDTO $data Objeto con la información de un personaje
	 * @return void
	 */
	public function run(CharacterDTO $data):void {
		if (!$data->isValid()) {
			$this->status = 'error';
		}

		if ($this->status === 'ok') {
			$this->character->setValue('Character', $this->cs->saveCharacter($data));
		}
	}
}
