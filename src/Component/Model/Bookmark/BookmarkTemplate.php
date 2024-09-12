<?php if (is_null($values['Bookmark'])): ?>
null
<?php else: ?>
{
	"id": <?php echo $values['Bookmark']->get('id') ?>,
	"idTale": <?php echo $values['Bookmark']->get('id_tale') ?>,
	"idPage": <?php echo $values['Bookmark']->get('id_page') ?>,
	"idDialog": <?php echo $values['Bookmark']->get('id_dialog') ?>,
	"comment": "<?php echo urlencode($values['Bookmark']->get('comment')) ?>",
	"createdAt": "<?php echo $values['Bookmark']->get('created_at', 'd/m/Y H:i:s') ?>"
}
<?php endif ?>
