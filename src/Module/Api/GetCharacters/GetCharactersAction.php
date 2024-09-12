<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\App\Module\Api\GetCharacters;

use Osumi\OsumiFramework\Routing\OAction;
use Osumi\OsumiFramework\Web\ORequest;
use Osumi\OsumiFramework\App\Component\Model\CharacterList\CharacterListComponent;

class GetCharactersAction extends OAction {
  public string $status = 'ok';
  public ?CharacterListComponent $list = null;

	/**
	 * Función para obtener la lista de personajes de un cuento
	 *
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 * @return void
	 */
	public function run(ORequest $req):void {
		$id_tale = $req->getParamInt('idTale');
		$this->list = new CharacterListComponent(['list' => []]);

		if (is_null($id_tale)) {
			$this->status = 'error';
		}

		if ($this->status == 'ok') {
			$this->list->setValue('list', $this->service['Characters']->getList($id_tale));
		}
	}
}
