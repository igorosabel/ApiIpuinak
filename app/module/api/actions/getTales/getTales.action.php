<?php declare(strict_types=1);

namespace OsumiFramework\App\Module\Action;

use OsumiFramework\OFW\Routing\OModuleAction;
use OsumiFramework\OFW\Routing\OAction;
use OsumiFramework\OFW\Web\ORequest;
use OsumiFramework\App\Component\Model\TaleListComponent;

#[OModuleAction(
	url: '/get-tales',
	services: ['tales']
)]
class getTalesAction extends OAction {
	/**
	 * Función para obtener la lista de cuentos
	 *
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 * @return void
	 */
	public function run(ORequest $req):void {
		$tale_list_component = new TaleListComponent(['list' => $this->tales_service->getList()]);
		$this->getTemplate()->add('list', $tale_list_component);
	}
}