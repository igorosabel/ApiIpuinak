<?php
use OsumiFramework\App\Component\Model\PageListComponent;
use OsumiFramework\App\Component\Model\CharacterListComponent;

if (is_null($values['tale'])) {
?>
null
<?php
}
else {
?>
{
	"id": <?php echo $values['tale']->get('id') ?>,
	"name": "<?php echo urlencode($values['tale']->get('name')) ?>",
	"createdAt": "<?php echo $values['tale']->get('created_at', 'd/m/Y H:i:s') ?>",
	"pages": [<?php echo new PageListComponent(['list' => $values['tale']->getPages()]) ?>],
	"characters": [<?php echo new CharacterListComponent(['list' => $values['tale']->getCharacters()]) ?>]
}
<?php
}
?>
