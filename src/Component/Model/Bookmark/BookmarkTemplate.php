<?php if (is_null($bookmark)): ?>
null
<?php else: ?>
{
	"id": <?php echo $bookmark->id ?>,
	"idTale": <?php echo $bookmark->id_tale ?>,
	"idPage": <?php echo $bookmark->id_page ?>,
	"idDialog": <?php echo $bookmark->id_dialog ?>,
	"comment": "<?php echo urlencode($bookmark->comment) ?>",
	"createdAt": "<?php echo $bookmark->get('created_at', 'd/m/Y H:i:s') ?>"
}
<?php endif ?>
