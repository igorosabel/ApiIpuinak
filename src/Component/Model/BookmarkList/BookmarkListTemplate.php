<?php
use Osumi\OsumiFramework\App\Component\Model\Bookmark\BookmarkComponent;

foreach ($list as $i => $bookmark) {
  $component = new BookmarkComponent([ 'bookmark' => $bookmark ]);
	echo strval($component);
	if ($i < count($list) - 1) {
		echo ",\n";
	}
}
