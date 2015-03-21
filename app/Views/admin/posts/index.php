<p><a href="/admin/post/add" class="btn btn-success">Ajouter un article</a></p>
<h2 class="sub-header">Administer les articles</h2>
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
		    <td><a href="/admin/post/edit/<?= $post->id ?>"><?= $post->name ?></a> </td>
		    <td><?= $post->created ?> </td>
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