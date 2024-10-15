<?php
use Osumi\OsumiFramework\App\Component\Model\PageList\PageListComponent;
use Osumi\OsumiFramework\App\Component\Model\CharacterList\CharacterListComponent;
use Osumi\OsumiFramework\App\Component\Model\Bookmark\BookmarkComponent;
?>
<?php if (is_null($tale)): ?>
null
<?php else: ?>
{
	"id": <?php echo $tale->get('id') ?>,
	"name": "<?php echo urlencode($tale->get('name')) ?>",
	"createdAt": "<?php echo $tale->get('created_at', 'd/m/Y H:i:s') ?>",
	"pages": [<?php echo new PageListComponent(['list' => $tale->getPages()]) ?>],
	"characters": [<?php echo new CharacterListComponent(['list' => $tale->getCharacters()]) ?>],
	"lastBookmark": <?php echo !is_null($tale->getLastBookmark()) ? new BookmarkComponent(['Bookmark' => $tale->getLastBookmark()]) : 'null' ?>
}
<?php endif ?>
