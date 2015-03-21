<div class="center" style="position: absolute; top: -30px; left: 759.5px;">
    <div class="headline text-center" id="time">2:32:38 AM</div><!-- /.headline -->

    <?php if ($error): ?>
	<div class="alert alert-danger">Identifiant incorret</div>
    <?php endif ?>

    <!-- User name -->
    <div class="lockscreen-name">John Doe</div>

    <!-- START LOCK SCREEN ITEM -->
    <div class="lockscreen-item">
	<!-- lockscreen image -->
	<div class="lockscreen-image">
	    <img src="../../../public/img/avatar5.png" alt="user image">
	</div>
	<!-- /.lockscreen-image -->

	<!-- lockscreen credentials (contains the form) -->
	<div class="lockscreen-credentials">

	    <form method="post" role="form">
		<?= $form->input('username', 'Pseudo'); ?>
		<?= $form->input('password', 'Mot de passe', ['type'=>'password']); ?>
		<div class="input-group-btn">
		    <button class="btn btn-flat"><i class="fa fa-arrow-right text-muted"></i></button>
		</div>
	    </form>
	</div><!-- /.lockscreen credentials -->

    </div><!-- /.lockscreen-item -->

    <div class="lockscreen-link">
	<a href="/examples/login">Or sign in as a different user</a>
    </div>
</div>