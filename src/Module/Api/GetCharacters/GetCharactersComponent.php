<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\App\Module\Api\GetCharacters;

use Osumi\OsumiFramework\Core\OComponent;
use Osumi\OsumiFramework\Web\ORequest;
use Osumi\OsumiFramework\App\Service\CharactersService;
use Osumi\OsumiFramework\App\Component\Model\CharacterList\CharacterListComponent;

class GetCharactersComponent extends OComponent {
  private ?CharactersService $cs = null;

  public string $status = 'ok';
  public ?CharacterListComponent $list = null;

  public function __construct() {
    parent::__construct();
    $this->cs = inject(CharactersService::class);
    $this->list = new CharacterListComponent();
  }

	/**
	 * Función para obtener la lista de personajes de un cuento
	 *
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 * @return void
	 */
	public function run(ORequest $req): void {
		$id_tale = $req->getParamInt('idTale');

		if (is_null($id_tale)) {
			$this->status = 'error';
		}

		if ($this->status === 'ok') {
			$this->list->list = $this->cs->getList($id_tale);
		}
	}
}
