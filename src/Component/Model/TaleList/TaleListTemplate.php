<?php
use Osumi\OsumiFramework\App\Component\Model\Tale\TaleComponent;

foreach ($values['list'] as $i => $Tale) {
  $component = new TaleComponent([ 'Tale' => $Tale ]);
	echo strval($component);
	if ($i<count($values['list'])-1) {
		echo ",\n";
	}
}
