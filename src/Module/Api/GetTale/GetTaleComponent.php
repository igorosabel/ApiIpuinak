<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\App\Module\Api\GetTale;

use Osumi\OsumiFramework\Core\OComponent;
use Osumi\OsumiFramework\Web\ORequest;
use Osumi\OsumiFramework\App\Model\Tale;
use Osumi\OsumiFramework\App\Component\Model\Tale\TaleComponent;

class GetTaleComponent extends OComponent {
  public string $status = 'ok';
  public ?TaleComponent $tale = null;

  public function __construct() {
    parent::__construct();
    $this->tale = new TaleComponent();
  }

	/**
	 * Función para obtener el detalle de un cuento
	 *
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 * @return void
	 */
	public function run(ORequest $req): void {
		$id = $req->getParamInt('id');

		if (is_null($id)) {
			$this->status = 'error';
		}

		if ($this->status === 'ok') {
			$t = Tale::findOne(['id' => $id]);
			if (!is_null($t)) {
				$this->tale->tale = $t;
			}
			else {
				$this->status = 'error';
			}
		}
	}
}
