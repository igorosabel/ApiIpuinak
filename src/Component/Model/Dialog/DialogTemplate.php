<?php if (is_null($dialog)): ?>
null
<?php else: ?>
{
	"id": <?php echo $dialog->id ?>,
	"idPage": <?php echo $dialog->id_page ?>,
	"idCharacter": <?php echo is_null($dialog->id_character) ? 'null' : $dialog->id_character ?>,
	"dialogOrder": <?php echo $dialog->dialog_order ?>,
	"content": "<?php echo urlencode($dialog->content) ?>"
}
<?php endif ?>
