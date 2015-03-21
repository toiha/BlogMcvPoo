<?php 
$app = App::getInstance();
$category = $app->getTable('Category')->find($param[1]);

if ($category === false) {
	$app->notFound();
}

$app->title = $category->title ." | ". $app->title;

?>

<h1  class="page-header"> <?= $category->title ?> </h1>
<p> <?= $category->content ?> </p>