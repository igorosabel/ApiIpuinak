<?php
use OsumiFramework\App\Component\Model\BookmarkComponent;

foreach ($values['list'] as $i => $bookmark) {
  $component = new BookmarkComponent([ 'bookmark' => $bookmark ]);
	echo strval($component);
	if ($i<count($values['list'])-1) {
		echo ",\n";
	}
}
