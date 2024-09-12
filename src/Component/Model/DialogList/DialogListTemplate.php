<?php
use Osumi\OsumiFramework\App\Component\Model\Dialog\DialogComponent;

foreach ($values['list'] as $i => $Dialog) {
  $component = new DialogComponent([ 'Dialog' => $Dialog ]);
	echo strval($component);
	if ($i<count($values['list'])-1) {
		echo ",\n";
	}
}
