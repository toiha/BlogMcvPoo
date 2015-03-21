<p><a href="/admin/category/add" class="btn btn-success">Ajouter une categorie</a></p>
<h2 class="sub-header">Administer les categorie</h2>
<div class="table-responsive">
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