<form method="post" role="form">
	<?= $form->input('name', 'Titre de l\'article'); ?>
	<?= $form->input('content', 'Contenu', ['type'=>'textarea']); ?>
	<?= $form->select('category_id', 'Categorie', $categories); ?>
	<?= $form->submit("Sauvegarder"); ?>
</form>