<?php $this->title = "Mon Blog - Connexion" ?>

<div class="container">
	<header>
		<p>Vous devez être connecté pour accéder à cette zone.</p>
	</header>
	        <h4>Login</h4>
			<form action="connection/connect" method="post">
				<div class="form-group">
					<input class="form-control" name="login" type="text" placeholder="Entrez votre login" required autofocus>
				</div>
				<div class="form-group">
					<input class="form-control" name="pw" type="password" placeholder="Entrez votre mot de passe" required>
				</div>
				<button class="btn btn-primary" type="submit">Connexion</button>
			</form>
</div>
<div class="container">
	<?php if (isset($msgError)): ?>
	    <p><?= $msgError ?></p>
	<?php endif; ?>
</div>