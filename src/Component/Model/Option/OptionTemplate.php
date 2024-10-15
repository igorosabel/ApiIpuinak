<?php if (is_null($option)): ?>
null
<?php else: ?>
{
	"id": <?php echo $option->get('id') ?>,
	"idPage": <?php echo $option->get('id_page') ?>,
	"optionOrder": <?php echo $option->get('option_order') ?>,
	"content": "<?php echo urlencode($option->get('content')) ?>",
	"nextPage": <?php echo $option->get('next_page') ?>
}
<?php endif ?>
