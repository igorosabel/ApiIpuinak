<?php if (is_null($dialog)): ?>
null
<?php else: ?>
{
	"id": <?php echo $dialog->get('id') ?>,
	"idPage": <?php echo $dialog->get('id_page') ?>,
	"idCharacter": <?php echo is_null($dialog->get('id_character')) ? 'null' : $dialog->get('id_character') ?>,
	"dialogOrder": <?php echo $dialog->get('dialog_order') ?>,
	"content": "<?php echo urlencode($dialog->get('content')) ?>"
}
<?php endif ?>
