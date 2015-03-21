<?php 
use \Core\HTML\BootstrapForm;
use \Core\Auth\DBAuth;

$app= App::getInstance();
$categoryTable = $app->getTable('Category');
if (!empty($_POST)) {
	$resultat = $categoryTable->delete($_POST['id']);
	header('Location: /admin/categorie');
}
