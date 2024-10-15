<?php
use Osumi\OsumiFramework\App\Component\Model\Tale\TaleComponent;

foreach ($list as $i => $tale) {
  $component = new TaleComponent([ 'tale' => $tale ]);
	echo strval($component);
	if ($i < count($list) - 1) {
		echo ",\n";
	}
}
