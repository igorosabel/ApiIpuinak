<?php
use Osumi\OsumiFramework\App\Component\Model\Option\OptionComponent;

foreach ($list as $i => $option) {
  $component = new OptionComponent([ 'option' => $option ]);
	echo strval($component);
	if ($i < count($list) - 1) {
		echo ",\n";
	}
}
