<?php if (is_null($option)): ?>
null
<?php else: ?>
{
	"id": <?php echo $option->id ?>,
	"idPage": <?php echo $option->id_page ?>,
	"optionOrder": <?php echo $option->option_order ?>,
	"content": "<?php echo urlencode($option->content) ?>",
	"nextPage": <?php echo $option->next_page ?>
}
<?php endif ?>
