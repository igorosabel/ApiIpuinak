<?php if (is_null($bookmark)): ?>
null
<?php else: ?>
{
	"id": <?php echo $bookmark->get('id') ?>,
	"idTale": <?php echo $bookmark->get('id_tale') ?>,
	"idPage": <?php echo $bookmark->get('id_page') ?>,
	"idDialog": <?php echo $bookmark->get('id_dialog') ?>,
	"comment": "<?php echo urlencode($bookmark->get('comment')) ?>",
	"createdAt": "<?php echo $bookmark->get('created_at', 'd/m/Y H:i:s') ?>"
}
<?php endif ?>
