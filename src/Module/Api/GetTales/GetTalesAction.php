<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\App\Module\Api\GetTales;

use Osumi\OsumiFramework\Routing\OAction;
use Osumi\OsumiFramework\Web\ORequest;
use Osumi\OsumiFramework\App\Component\Model\TaleList\TaleListComponent;

class GetTalesAction extends OAction {
  public ?TaleListComponent $list = null;

	/**
	 * Función para obtener la lista de cuentos
	 *
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 * @return void
	 */
	public function run(ORequest $req):void {
		$this->list = new TaleListComponent(['list' => $this->service['Tales']->getList(true)]);
	}
}