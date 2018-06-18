<?php $this->title = "Mon Blog - Administration" ?>

<h2>Administration</h2>

Bienvenue, <?= $this->clean($login) ?> !
Ce blog comporte <?= $this->clean($numPosts) ?> billet(s) et <?= $this->clean($numComments) ?> commentaire(s).
<br>


<ul class="list-group">
<?php foreach ($posts as $post): ?>
    <li class="list-group-item">
    	<div class="row">
    		<div class="adminList col-md-6">
		        <h2><?= $this->clean($post['title']) ?></h2>
		        <time>Crée le : <?= $this->clean($post['date']) ?></time>
		    </div>
		    <div class="col-md-6">
                <a class="btn btn-primary" href="<?= "admin/editPost/" . $this->clean($post['id']) ?>">Editer</a>
                <a class="btn btn-danger" href="<?= "admin/deletePost/" . $this->clean($post['id']) ?>">Supprimer</a>
        	</div>
    </li>
    <hr />
<?php endforeach; ?>
</ul>

<a id="decoLink" href="connection/disconnect">Se déconnecter</a>