<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\App\Module\Api\SaveTale;

use Osumi\OsumiFramework\Routing\OAction;
use Osumi\OsumiFramework\Web\ORequest;
use Osumi\OsumiFramework\App\Model\Tale;

class SaveTaleAction extends OAction {
  public string $status = 'ok';
  public string | int | null $id = 'null';

	/**
	 * Función para guardar un cuento
	 *
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 * @return void
	 */
	public function run(ORequest $req):void {
		$this->id = $req->getParamInt('id');
		$name     = $req->getParamString('name');

		if (is_null($name)) {
			$this->status = 'error';
		}

		if ($this->status === 'ok') {
			$t = new Tale();
			if (!is_null($this->id)) {
				$t->find(['id' => $this->id]);
			}
			$t->set('name', urldecode($name));
			$t->save();
			$this->id = $t->get('id');
		}
	}
}
