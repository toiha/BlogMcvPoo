<h1> <?= $categorie->title ?> </h1>
<div class="row">
	<div class="col-sm-8">
		<?php foreach ($posts as $post): ?>
			<h2><a href="<?= $post->url ?>"><?= $post->name ?></a> </h2>
			<p><?= $post->extrait ?></p>
		<?php endforeach ?>
	</div>
	<div class="col-sm-4">
		<ul>		
			<?php foreach ($categories as $category):?>
				<li><a href="<?= $category->url ?>"><?= $category->title ?></a> </li>
			<?php endforeach ?>
		</ul>
	</div>
</div>