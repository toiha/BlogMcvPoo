<?php 
use \Core\HTML\BootstrapForm;
use \Core\Auth\DBAuth;
	
$postTable = App::getInstance()->getTable('Category');
if (!empty($_POST)) {
	$resultat = $postTable->create([
		'title'=>$_POST['title']
	]);
	if ($resultat) {
		header('Location: /admin/categorie/edit/' . App::getInstance()->getDb()->lastInsertId());
	}
}
$form = new BootstrapForm($_POST);
?>
<h1  class="page-header"> Ajouter une categorie</h1>
<form method="post" role="form">
	<?= $form->input('title', 'Titre de la categorie'); ?>
	<?= $form->submit("Sauvegarder"); ?>
</form>