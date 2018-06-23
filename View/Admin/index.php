<?php $this->title = "Mon Blog - Administration" ?>

<header>
<h1>Administration du Blog</h1>
<p>Bienvenue, <?= $this->clean($login) ?> !
Ce blog comporte <?= $this->clean($numPosts) ?> billet(s) et <?= $this->clean($numComments) ?> commentaire(s).</p>
</header>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <header>
              <h2>Gérer les billets</h2>
            </header>
            <div class="table-responsive">
              <table class="table table-hover table-striped table-dark">
                <thead>
                  <tr>
                    <th scope="col">Titre</th>
                    <th scope="col">Date de création</th>
                    <th scope="col">Éditer</th>
                    <th scope="col">Supprimer</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($posts as $post): ?>
                    <tr>
                      <td><?= $this->clean($post['title']) ?></td>
                      <td><time><?= $this->clean($post['date']) ?></time></td>
                      <td><a class="btn btn-primary btn-sm" href="<?= "admin/editPost/" . $this->clean($post['id']) ?>">Editer</a></td>
                      <td><a class="btn btn-danger btn-sm" href="<?= "admin/deletePost/" . $this->clean($post['id']) ?>">Supprimer</a></td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
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