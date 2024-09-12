<?php
use Osumi\OsumiFramework\App\Component\Model\Page\PageComponent;

foreach ($values['list'] as $i => $Page) {
  $component = new PageComponent([ 'Page' => $Page ]);
	echo strval($component);
	if ($i<count($values['list'])-1) {
		echo ",\n";
	}
}
