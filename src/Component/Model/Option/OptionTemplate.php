<?php if (is_null($values['Option'])): ?>
null
<?php else: ?>
{
	"id": <?php echo $values['Option']->get('id') ?>,
	"idPage": <?php echo $values['Option']->get('id_page') ?>,
	"optionOrder": <?php echo $values['Option']->get('option_order') ?>,
	"content": "<?php echo urlencode($values['Option']->get('content')) ?>",
	"nextPage": <?php echo $values['Option']->get('next_page') ?>
}
<?php endif ?>
