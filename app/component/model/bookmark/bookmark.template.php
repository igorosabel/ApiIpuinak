<?php if (is_null($values['bookmark'])): ?>
null
<?php else: ?>
{
	"id": <?php echo $values['bookmark']->get('id') ?>,
	"idTale": <?php echo $values['bookmark']->get('id_tale') ?>,
	"idPage": <?php echo $values['bookmark']->get('id_page') ?>,
	"idDialog": <?php echo $values['bookmark']->get('id_dialog') ?>,
	"comment": "<?php echo urlencode($values['bookmark']->get('comment')) ?>",
	"createdAt": "<?php echo $values['bookmark']->get('created_at', 'd/m/Y H:i:s') ?>"
}
<?php endif ?>
