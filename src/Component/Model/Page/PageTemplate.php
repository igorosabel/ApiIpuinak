<?php
use Osumi\OsumiFramework\App\Component\Model\DialogList\DialogListComponent;
use Osumi\OsumiFramework\App\Component\Model\OptionList\OptionListComponent;
?>
<?php if (is_null($page)): ?>
null
<?php else: ?>
{
	"id": <?php echo $page->id ?>,
	"idTale": <?php echo $page->id_tale ?>,
	"pageOrder": <?php echo $page->page_order ?>,
	"hasImage": <?php echo $page->has_image ? 'true' : 'false' ?>,
	"preloadImage": <?php echo $page->preload_image ? 'true' : 'false' ?>,
	"bgColor": "<?php echo is_null($page->bg_color) ? 'null' : urlencode($page->bg_color) ?>",
	"animationIn": <?php echo $page->animation_in ?>,
	"animationOut": <?php echo $page->animation_out ?>,
	"hasOptions": <?php echo $page->has_options ? 'true' : 'false' ?>,
	"nextPage": <?php echo is_null($page->next_page) ? 'null' : $page->next_page ?>,
	"dialogs": [<?php echo new DialogListComponent(['list' => $page->getDialogs()]) ?>],
	"options": [<?php echo new OptionListComponent(['list' => $page->getOptions()]) ?>]
}
<?php endif ?>
