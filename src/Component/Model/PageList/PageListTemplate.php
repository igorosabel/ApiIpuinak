<?php
use Osumi\OsumiFramework\App\Component\Model\Page\PageComponent;

foreach ($list as $i => $page) {
  $component = new PageComponent([ 'page' => $page ]);
	echo strval($component);
	if ($i < count($list) - 1) {
		echo ",\n";
	}
}
