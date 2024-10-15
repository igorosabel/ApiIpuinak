<?php if (is_null($character)): ?>
null
<?php else: ?>
{
	"id": <?php echo $character->get('id') ?>,
	"idTale": <?php echo $character->get('id_tale') ?>,
	"name": "<?php echo urlencode($character->get('name')) ?>",
	"hasImage": <?php echo $character->get('has_image') ? 'true' : 'false' ?>,
	"color": "<?php echo is_null($character->get('color')) ? 'null' : urlencode($character->get('color')) ?>"
}
<?php endif ?>
