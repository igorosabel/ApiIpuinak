<?php
use Osumi\OsumiFramework\App\Component\Model\DialogList\DialogListComponent;
use Osumi\OsumiFramework\App\Component\Model\OptionList\OptionListComponent;
?>
<?php if (is_null($values['Page'])): ?>
null
<?php else: ?>
{
	"id": <?php echo $values['Page']->get('id') ?>,
	"idTale": <?php echo $values['Page']->get('id_tale') ?>,
	"pageOrder": <?php echo $values['Page']->get('page_order') ?>,
	"hasImage": <?php echo $values['Page']->get('has_image') ? 'true' : 'false' ?>,
	"preloadImage": <?php echo $values['Page']->get('preload_image') ? 'true' : 'false' ?>,
	"bgColor": "<?php echo is_null($values['Page']->get('bg_color')) ? 'null' : urlencode($values['Page']->get('bg_color')) ?>",
	"animationIn": <?php echo $values['Page']->get('animation_in') ?>,
	"animationOut": <?php echo $values['Page']->get('animation_out') ?>,
	"hasOptions": <?php echo $values['Page']->get('has_options') ? 'true' : 'false' ?>,
	"nextPage": <?php echo is_null($values['Page']->get('next_page')) ? 'null' : $values['Page']->get('next_page') ?>,
	"dialogs": [<?php echo new DialogListComponent(['list' => $values['Page']->getDialogs()]) ?>],
	"options": [<?php echo new OptionListComponent(['list' => $values['Page']->getOptions()]) ?>]
}
<?php endif ?>
