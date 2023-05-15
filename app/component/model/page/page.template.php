<?php
use OsumiFramework\App\Component\Model\DialogListComponent;

if (is_null($values['page'])) {
?>
null
<?php
}
else { ?>
{
	"id": <?php echo $values['page']->get('id') ?>,
	"pageOrder": <?php echo $values['page']->get('page_order') ?>,
	"hasImage": <?php echo $values['page']->get('has_image') ? 'true' : 'false' ?>,
	"preloadImage": <?php echo $values['page']->get('preload_image') ? 'true' : 'false' ?>,
	"bgColor": "<?php echo is_null($values['page']->get('bg_color')) ? 'null' : urlencode($values['page']->get('bg_color')) ?>",
	"animationIn": <?php echo $values['page']->get('animation_in') ?>,
	"animationOut": <?php echo $values['page']->get('animation_out') ?>,
	"dialogs": [<?php echo new DialogListComponent(['list' => $values['page']->getDialogs()]) ?>]
}
<?php
}
?>