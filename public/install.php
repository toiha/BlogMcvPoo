<!DOCTYPE html>
<html lang="en">
  <head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>installation de la base de données</title>

	<!-- Bootstrap -->
	<link rel="stylesheet" href="http://getbootstrap.com/assets/css/docs.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<style>
		body{
			padding: 60px 0;
		}
	</style>
  </head>
  <body>
  	<div class="container">
	  		
		<form method="post" style="width:400px">
			<div class="form-group">
				<label for="">Nom utilisateur</label>
				<input type="text" placeholder="root" class="form-control" name="db_user" value="root">
			</div>
			<div class="form-group">
				<label for="">Mot de passe utilisateur</label>
				<input type="text" placeholder="dg54rdg8Ys" class="form-control" name="db_pass">
			</div>
			<div class="form-group">
				<label for="">Nom du hôte</label>
				<input type="text" placeholder="localhost" class="form-control" name="db_host" value="localhost">
			</div>
			<div class="form-group">
				<label for="">Nom de la base de donnée</label>
				<input type="text" placeholder="blog" class="form-control" name="db_name">
			</div>
			<br>
			<input type="hidden" name="install">
			<div class="form-group">
				<button class="btn btn-primary" >Installer</button>
			</div>
		</form>

  	</div>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>
  </body>
</html>