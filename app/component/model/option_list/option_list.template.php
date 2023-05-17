<?php
use OsumiFramework\App\Component\Model\OptionComponent;

foreach ($values['list'] as $i => $option) {
  $component = new OptionComponent([ 'option' => $option ]);
	echo strval($component);
	if ($i<count($values['list'])-1) {
		echo ",\n";
	}
}
