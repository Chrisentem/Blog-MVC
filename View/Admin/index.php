<?php $this->title = "Mon Blog - Administration" ?>

<header>
<h2>Administration</h2>
<p>Bienvenue, <?= $this->clean($login) ?> !
Ce blog comporte <?= $this->clean($numPosts) ?> billet(s) et <?= $this->clean($numComments) ?> commentaire(s).</p>
</header>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <ul class="list-group">
            <?php foreach ($posts as $post): ?>
                <li class="list-group-item">
                	<div class="row">
                		<div class="adminList col-md-6">
            		        <h2><?= $this->clean($post['title']) ?></h2>
            		        <time>Crée le : <?= $this->clean($post['date']) ?></time>
            		    </div>
            		    <div class="col-md-6">
                            <a class="btn btn-primary btn-sm" href="<?= "admin/editPost/" . $this->clean($post['id']) ?>">Editer</a>
                            <a class="btn btn-danger btn-sm" href="<?= "admin/deletePost/" . $this->clean($post['id']) ?>">Supprimer</a>
                    	</div>
                </li>
                <hr />
            <?php endforeach; ?>
            </ul>
        </div>
        <div class="col-md-8">
            <header>
                <h2>Écrire un nouveau billet</h2>
            </header>
            <form method="post" action="admin/writing">
                    <div class="form-group">
                        <input class="form-control" id="title" name="title" type="text" placeholder="Titre du billet" required />
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" id="content" name="content" rows="4" placeholder="Votre texte" required></textarea>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="id" value="<?= $post['id'] ?>" />
                        <button type="submit" class="btn btn-primary" >Sauvegarder</button>
                    </div>
            </form>
        </div>
    </div>
</div>
<a id="decoLink" href="connection/disconnect">Se déconnecter</a>