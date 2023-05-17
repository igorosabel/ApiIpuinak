<?php if (is_null($values['dialog'])): ?>
null
<?php else: ?>
{
	"id": <?php echo $values['dialog']->get('id') ?>,
	"idCharacter": <?php echo is_null($values['dialog']->get('id_character')) ? 'null' : $values['dialog']->get('id_character') ?>,
	"dialogOrder": <?php echo $values['dialog']->get('dialog_order') ?>,
	"content": "<?php echo urlencode($values['dialog']->get('content')) ?>"
}
<?php endif ?>
