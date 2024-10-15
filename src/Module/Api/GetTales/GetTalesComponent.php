<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\App\Module\Api\GetTales;

use Osumi\OsumiFramework\Core\OComponent;
use Osumi\OsumiFramework\Web\ORequest;
use Osumi\OsumiFramework\App\Service\TalesService;
use Osumi\OsumiFramework\App\Component\Model\TaleList\TaleListComponent;

class GetTalesComponent extends OComponent {
  private ?TalesService $ts = null;

  public ?TaleListComponent $list = null;

  public function __construct() {
    parent::__construct();
    $this->ts = inject(TalesService::class);
  }

	/**
	 * Función para obtener la lista de cuentos
	 *
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 * @return void
	 */
	public function run(ORequest $req):void {
		$this->list = new TaleListComponent(['list' => $this->ts->getList(true)]);
	}
}
