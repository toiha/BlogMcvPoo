<div class="row">
    <div class="col-sm-8">
		<h1> <?= $post->name ?> </h1>
		<span class="label label-primary"> <?= $post->category ?> </span>
		<p> <?= $post->content ?> </p>
    </div>
    <div class="col-sm-4">
		<p>Categories</p>
		<ul>		
		    <?php foreach ($categories as $category):?>
		    <li><a href="<?= $category->url ?>"><?= $category->title ?></a> </li>
		    <?php endforeach ?>
		</ul>
		<hr>
		<p>Articles de la même categories</p>
		<ul>
		    <?php foreach ($posts as $post): ?>
			<li><a href="<?= $post->url ?>"><?= $post->name ?></a> </li>
		    <?php endforeach ?>
		</ul>
    </div>
</div>