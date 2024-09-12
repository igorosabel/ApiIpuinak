<?php
use Osumi\OsumiFramework\App\Component\Model\Option\OptionComponent;

foreach ($values['list'] as $i => $Option) {
  $component = new OptionComponent([ 'Option' => $Option ]);
	echo strval($component);
	if ($i<count($values['list'])-1) {
		echo ",\n";
	}
}
