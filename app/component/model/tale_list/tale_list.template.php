<?php
use OsumiFramework\App\Component\Model\TaleComponent;

foreach ($values['list'] as $i => $tale) {
  $component = new TaleComponent([ 'tale' => $tale ]);
	echo strval($component);
	if ($i<count($values['list'])-1) {
		echo ",\n";
	}
}
