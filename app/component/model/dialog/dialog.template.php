<?php if (is_null($values['dialog'])): ?>
null
<?php else: ?>
{
	"id": <?php echo $values['dialog']->get('id') ?>,
	"dialogOrder": <?php echo $values['dialog']->get('dialog_order') ?>,
	"content": "<?php echo urlencode($values['dialog']->get('content')) ?>"
}
<?php endif ?>