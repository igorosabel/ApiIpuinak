<?php declare(strict_types=1);

namespace OsumiFramework\App\Module\Action;

use OsumiFramework\OFW\Routing\OModuleAction;
use OsumiFramework\OFW\Routing\OAction;
use OsumiFramework\OFW\Web\ORequest;
use OsumiFramework\App\Component\Model\CharacterListComponent;

#[OModuleAction(
	url: '/get-characters',
	services: ['characters']
)]
class getCharactersAction extends OAction {
	/**
	 * Función para obtener la lista de personajes de un cuento
	 *
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 * @return void
	 */
	public function run(ORequest $req):void {
		$status = 'ok';
		$id_tale = $req->getParamInt('idTale');
		$character_list_component = new CharacterListComponent(['list' => []]);

		if (is_null($id_tale)) {
			$status = 'error';
		}

		if ($status == 'ok') {
			$character_list_component->setValue('list', $this->characters_service->getList($id_tale));
		}

		$this->getTemplate()->add('status', $status);
		$this->getTemplate()->add('list', $character_list_component);
	}
}
