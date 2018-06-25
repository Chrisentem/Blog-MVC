<?php $this->title = "Mon Blog - Connexion" ?>

<header>
	<p>Vous devez être connecté pour accéder à cette zone.</p>
</header>
<div class="text-center">
	<div class="row">
        <form class="form-signin" action="connection/connect" method="post">
			<h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
			<div class="form-group">
				<input class="form-control" name="login" type="text" placeholder="Entrez votre login" required autofocus>
			</div>
			<div class="form-group">
				<input class="form-control" name="pw" type="password" placeholder="Entrez votre mot de passe" required>
			</div>
			<button class="btn btn-primary" type="submit">Connexion</button>
		</form>
	</div>
</div>
<div class="container">
	<?php if (isset($msgError)): ?>
	    <p><?= $msgError ?></p>
	<?php endif; ?>
</div>