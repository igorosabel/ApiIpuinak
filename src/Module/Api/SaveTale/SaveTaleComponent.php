<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\App\Module\Api\SaveTale;

use Osumi\OsumiFramework\Core\OComponent;
use Osumi\OsumiFramework\Web\ORequest;
use Osumi\OsumiFramework\App\Model\Tale;

class SaveTaleComponent extends OComponent {
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
			$t = Tale::create();
			if (!is_null($this->id)) {
        $t = Tale::findOne(['id' => $this->id]);
			}
			$t->name = urldecode($name);
			$t->save();
			$this->id = $t->id;
		}
	}
}
