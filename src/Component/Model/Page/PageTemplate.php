<?php
use Osumi\OsumiFramework\App\Component\Model\DialogList\DialogListComponent;
use Osumi\OsumiFramework\App\Component\Model\OptionList\OptionListComponent;
?>
<?php if (is_null($page)): ?>
null
<?php else: ?>
{
	"id": <?php echo $page->get('id') ?>,
	"idTale": <?php echo $page->get('id_tale') ?>,
	"pageOrder": <?php echo $page->get('page_order') ?>,
	"hasImage": <?php echo $page->get('has_image') ? 'true' : 'false' ?>,
	"preloadImage": <?php echo $page->get('preload_image') ? 'true' : 'false' ?>,
	"bgColor": "<?php echo is_null($page->get('bg_color')) ? 'null' : urlencode($page->get('bg_color')) ?>",
	"animationIn": <?php echo $page->get('animation_in') ?>,
	"animationOut": <?php echo $page->get('animation_out') ?>,
	"hasOptions": <?php echo $page->get('has_options') ? 'true' : 'false' ?>,
	"nextPage": <?php echo is_null($page->get('next_page')) ? 'null' : $page->get('next_page') ?>,
	"dialogs": [<?php echo new DialogListComponent(['list' => $page->getDialogs()]) ?>],
	"options": [<?php echo new OptionListComponent(['list' => $page->getOptions()]) ?>]
}
<?php endif ?>
