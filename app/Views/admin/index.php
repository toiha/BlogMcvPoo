<div class="row">
    <div class="col-sm-6">
	<p>  <a href="/admin/post/add" class="btn btn-success">Ajouter un article</a></p>
	<div class="table-responsive">
	    <table class="table table-striped">
		<thead>
		    <tr>
			<th>#</th>
			<th>Titre</th>
			<th>Date</th>
			<th>Actions</th>
		    </tr>
		</thead>
		<tbody>
		    <?php foreach ($posts as $post): ?>
		    <tr>
			<td><a href="/admin/post/edit/<?= $post->id ?>"><?= $post->id ?></a> </td>
			<td><a href="/admin/post/edit/<?= $post->id ?>"><?= $post->title ?></a> </td>
			<td><?= $post->date ?> </td>
			<td>
			    <a href="/admin/post/edit/<?= $post->id ?>" class="btn btn-primary btn-xs">Editer</a> 
			    <form method="post" action="/admin/post/del/" style="display: inline">
				<input type="hidden" value="<?= $post->id ?>" name="id">
				<button type="submit" class="btn btn-warning btn-xs">Supprimer</a> 
			    </form>
			</td>
		    </tr>
		    <?php endforeach ?>
		</tbody>
	    </table>
	</div>
    </div>
    <div class="col-sm-6">
	<div class="table-responsive">
	    <p><a href="/admin/category/add" class="btn btn-success">Ajouter une categorie</a></p>
	    <table class="table table-striped">
		<thead>
		    <tr>
			<th>#</th>
			<th>Titre</th>
			<th>Actions</th>
		    </tr>
		</thead>
		<tbody>
		    <?php foreach ($categories as $category): ?>
		    <tr>
			<td><a href="/admin/category/edit/<?= $category->id ?>"><?= $category->id ?></a> </td>
			<td><a href="/admin/category/edit/<?= $category->id ?>"><?= $category->title ?></a> </td>
			<td>
			    <a href="/admin/category/edit/<?= $category->id ?>" class="btn btn-primary btn-xs">Editer</a> 
			    <form method="post" action="/admin/category/del/" style="display: inline">
				<input type="hidden" value="<?= $category->id ?>" name="id">
				<button type="submit" class="btn btn-warning btn-xs">Supprimer</a> 
			    </form>
			</td>
		    </tr>
		    <?php endforeach ?>
		</tbody>
	    </table>
	</div>
    </div>
</div>
