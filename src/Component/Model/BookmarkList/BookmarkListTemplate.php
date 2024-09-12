<?php
use Osumi\OsumiFramework\App\Component\Model\Bookmark\BookmarkComponent;

foreach ($values['list'] as $i => $Bookmark) {
  $component = new BookmarkComponent([ 'Bookmark' => $Bookmark ]);
	echo strval($component);
	if ($i<count($values['list'])-1) {
		echo ",\n";
	}
}
