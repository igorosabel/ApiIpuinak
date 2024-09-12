<?php declare(strict_types=1);

namespace OsumiFramework\App\Module\Action;

use OsumiFramework\OFW\Routing\OModuleAction;
use OsumiFramework\OFW\Routing\OAction;
use OsumiFramework\OFW\Web\ORequest;
use OsumiFramework\App\Model\Tale;
use OsumiFramework\App\Component\Model\TaleComponent;

#[OModuleAction(
	url: '/get-tale'
)]
class getTaleAction extends OAction {
	/**
	 * Función para obtener el detalle de un cuento
	 *
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 * @return void
	 */
	public function run(ORequest $req):void {
		$status = 'ok';
		$id = $req->getParamInt('id');
		$tale_component = new TaleComponent(['tale' => null]);

		if (is_null($id)) {
			$status = 'error';
		}

		if ($status == 'ok') {
			$t = new Tale();
			if ($t->find(['id' => $id])) {
				$tale_component->setValue('tale', $t);
			}
			else {
				$status = 'error';
			}
		}

		$this->getTemplate()->add('status', $status);
		$this->getTemplate()->add('tale', $tale_component);
	}
}
