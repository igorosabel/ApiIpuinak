<?php
use Osumi\OsumiFramework\App\Component\Model\PageList\PageListComponent;
use Osumi\OsumiFramework\App\Component\Model\CharacterList\CharacterListComponent;
use Osumi\OsumiFramework\App\Component\Model\Bookmark\BookmarkComponent;
?>
<?php if (is_null($values['Tale'])): ?>
null
<?php else: ?>
{
	"id": <?php echo $values['Tale']->get('id') ?>,
	"name": "<?php echo urlencode($values['Tale']->get('name')) ?>",
	"createdAt": "<?php echo $values['Tale']->get('created_at', 'd/m/Y H:i:s') ?>",
	"pages": [<?php echo new PageListComponent(['list' => $values['Tale']->getPages()]) ?>],
	"characters": [<?php echo new CharacterListComponent(['list' => $values['Tale']->getCharacters()]) ?>],
	"lastBookmark": <?php echo !is_null($values['Tale']->getLastBookmark()) ? new BookmarkComponent(['Bookmark' => $values['Tale']->getLastBookmark()]) : 'null' ?>
}
<?php endif ?>
