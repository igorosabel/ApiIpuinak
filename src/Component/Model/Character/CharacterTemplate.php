<?php if (is_null($character)): ?>
null
<?php else: ?>
{
	"id": <?php echo $character->id ?>,
	"idTale": <?php echo $character->id_tale ?>,
	"name": "<?php echo urlencode($character->name) ?>",
	"hasImage": <?php echo $character->has_image ? 'true' : 'false' ?>,
	"color": "<?php echo is_null($character->color) ? 'null' : urlencode($character->color) ?>"
}
<?php endif ?>
