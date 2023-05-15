<?php
use OsumiFramework\App\Component\Model\PageComponent;

foreach ($values['list'] as $i => $page) {
  $component = new PageComponent([ 'page' => $page ]);
	echo strval($component);
	if ($i<count($values['list'])-1) {
		echo ",\n";
	}
}
