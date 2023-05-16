<?php if (is_null($values['character'])): ?>
null
<?php else: ?>
{
	"id": <?php echo $values['character']->get('id') ?>,
	"name": "<?php echo urlencode($values['character']->get('name')) ?>",
	"hasImage": <?php echo $values['character']->get('has_image') ? 'true' : 'false' ?>,
	"color": "<?php echo is_null($values['character']->get('color')) ? 'null' : urlencode($values['character']->get('color')) ?>"
}
<?php endif ?>
