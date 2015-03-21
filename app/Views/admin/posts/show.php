<?php 
$app = App::getInstance();
$post = $app->getTable('Post')->find($param[1]);

if ($post === false) {
	$app->notFound();
}

$app->title = $post->title ." | ". $app->title;

?>

<h1  class="page-header"> <?= $post->title ?> </h1>
<p> <?= $post->content ?> </p>