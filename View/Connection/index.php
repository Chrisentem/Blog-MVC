<?php $this->title = "Mon Blog - Connexion" ?>

<p>Vous devez être connecté pour accéder à cette zone.</p>

<form action="connection/connect" method="post">
    <input name="login" type="text" placeholder="Entrez votre login" required autofocus>
    <input name="pw" type="password" placeholder="Entrez votre mot de passe" required>
    <button type="submit">Connexion</button>
</form>

<?php if (isset($msgError)): ?>
    <p><?= $msgError ?></p>
<?php endif; ?>
