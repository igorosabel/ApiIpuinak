<?php declare(strict_types=1);

namespace OsumiFramework\App\Module\Action;

use OsumiFramework\OFW\Routing\OModuleAction;
use OsumiFramework\OFW\Routing\OAction;
use OsumiFramework\OFW\Web\ORequest;
use OsumiFramework\App\Model\Tale;

#[OModuleAction(
	url: '/save-tale'
)]
class saveTaleAction extends OAction {
	/**
	 * Función para guardar un cuento
	 *
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 * @return void
	 */
	public function run(ORequest $req):void {
		$status = 'ok';
		$id     = $req->getParamInt('id');
		$name   = $req->getParamString('name');

		if (is_null($name)) {
			$status = 'error';
		}

		if ($status == 'ok') {
			$t = new Tale();
			if (!is_null($id)) {
				$t->find(['id' => $id]);
			}
			$t->set('name', urldecode($name));
			$t->save();
			$id = $t->get('id');
		}

		$this->getTemplate()->add('status', $status);
		$this->getTemplate()->add('id',     $id);
	}
}
