<?php $this->title = "Mon Blog - Connexion" ?>

<div class="container">
	<div class="row text-center">
		<header>
			<p>Vous devez être connecté pour accéder à cette zone.</p>
		</header>
	</div>
	<div class="row text-center">
        <form class="form-signin" action="connection/connect" method="post">
			<h1 class="h3 mb-3 font-weight-normal">Gestion du site</h1>
			<div class="form-group">
				<input class="form-control" name="login" type="text" placeholder="Entrez votre login" required autofocus>
			</div>
			<div class="form-group">
				<input class="form-control" name="pw" type="password" placeholder="Entrez votre mot de passe" required>
			</div>
			<button class="btn btn-primary" type="submit">Se connecter</button>
		</form>
	</div>
	<div class="row">
		<?php if (isset($msgError)): ?>
		    <p><?= $msgError ?></p>
		<?php endif; ?>
	</div>
</div>