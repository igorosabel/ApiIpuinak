<?php
use OsumiFramework\App\Component\Model\DialogComponent;

foreach ($values['list'] as $i => $dialog) {
  $component = new DialogComponent([ 'dialog' => $dialog ]);
	echo strval($component);
	if ($i<count($values['list'])-1) {
		echo ",\n";
	}
}
