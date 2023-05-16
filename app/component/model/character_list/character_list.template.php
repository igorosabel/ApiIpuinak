<?php
use OsumiFramework\App\Component\Model\CharacterComponent;

foreach ($values['list'] as $i => $character) {
  $component = new CharacterComponent([ 'character' => $character ]);
	echo strval($component);
	if ($i<count($values['list'])-1) {
		echo ",\n";
	}
}
