<?php if (is_null($values['Character'])): ?>
null
<?php else: ?>
{
	"id": <?php echo $values['Character']->get('id') ?>,
	"idTale": <?php echo $values['Character']->get('id_tale') ?>,
	"name": "<?php echo urlencode($values['Character']->get('name')) ?>",
	"hasImage": <?php echo $values['Character']->get('has_image') ? 'true' : 'false' ?>,
	"color": "<?php echo is_null($values['Character']->get('color')) ? 'null' : urlencode($values['Character']->get('color')) ?>"
}
<?php endif ?>
