<?php if (is_null($values['Dialog'])): ?>
null
<?php else: ?>
{
	"id": <?php echo $values['Dialog']->get('id') ?>,
	"idPage": <?php echo $values['Dialog']->get('id_page') ?>,
	"idCharacter": <?php echo is_null($values['Dialog']->get('id_character')) ? 'null' : $values['Dialog']->get('id_character') ?>,
	"dialogOrder": <?php echo $values['Dialog']->get('dialog_order') ?>,
	"content": "<?php echo urlencode($values['Dialog']->get('content')) ?>"
}
<?php endif ?>
