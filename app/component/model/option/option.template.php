<?php if (is_null($values['option'])): ?>
null
<?php else: ?>
{
	"id": <?php echo $values['option']->get('id') ?>,
	"idPage": <?php echo $values['option']->get('id_page') ?>,
	"optionOrder": <?php echo $values['option']->get('option_order') ?>,
	"content": "<?php echo urlencode($values['option']->get('content')) ?>",
	"nextPage": <?php echo $values['option']->get('next_page') ?>
}
<?php endif ?>
