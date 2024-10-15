<?php
use Osumi\OsumiFramework\App\Component\Model\Dialog\DialogComponent;

foreach ($list as $i => $dialog) {
  $component = new DialogComponent([ 'dialog' => $dialog ]);
	echo strval($component);
	if ($i < count($list) - 1) {
		echo ",\n";
	}
}
