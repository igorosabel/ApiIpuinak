<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\App\Module\Api\GetTale;

use Osumi\OsumiFramework\Routing\OAction;
use Osumi\OsumiFramework\Web\ORequest;
use Osumi\OsumiFramework\App\Model\Tale;
use Osumi\OsumiFramework\App\Component\Model\Tale\TaleComponent;

class GetTaleAction extends OAction {
  public string $status = 'ok';
  public ?TaleComponent $tale = null;

  public function __construct() {
    $this->tale = new TaleComponent(['Tale' => null]);
  }

	/**
	 * Función para obtener el detalle de un cuento
	 *
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 * @return void
	 */
	public function run(ORequest $req):void {
		$id = $req->getParamInt('id');

		if (is_null($id)) {
			$this->status = 'error';
		}

		if ($this->status === 'ok') {
			$t = new Tale();
			if ($t->find(['id' => $id])) {
				$this->tale->setValue('Tale', $t);
			}
			else {
				$this->status = 'error';
			}
		}
	}
}
