<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\App\Module\Api\SaveCharacter;

use Osumi\OsumiFramework\Core\OComponent;
use Osumi\OsumiFramework\App\DTO\CharacterDTO;
use Osumi\OsumiFramework\App\Service\CharactersService;
use Osumi\OsumiFramework\App\Component\Model\Character\CharacterComponent;

class SaveCharacterComponent extends OComponent {
  private ?CharactersService $cs = null;

  public string $status = 'ok';
  public ?CharacterComponent $character = null;

  public function __construct() {
    parent::__construct();
    $this->cs = inject(CharactersService::class);
    $this->character = new CharacterComponent();
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
			$this->character->character = $this->cs->saveCharacter($data);
		}
	}
}
