<?php $this->title = "Administration - Accueil" ?>


<header>
<h1>Administration du Blog</h1>
<p>Bienvenue sur le tableau de bord, <?= $this->clean($login) ?> !
Ce blog comporte <?= $this->clean($numPosts) ?> billet(s) et <?= $this->clean($numComments) ?> commentaire(s).</p>
</header>
<hr>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <header>
                <h2>Écrire un nouveau billet</h2>
            </header>
            <form action="admin/writing" method="post">
                    <div class="form-group">
                        <input class="form-control" id="new_title" name="new_title" type="text" placeholder="Titre du billet" required />
                    </div>
                    <div class="form-group">
                        <!-- Watch out ! required attribute does not work properly with tiny-->
                        <textarea class="admin-editor" id="new_content" name="new_content" rows="4" placeholder="Votre texte"></textarea>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary">Sauvegarder</button>
                    </div>
            </form>
        </div>
    </div>
    <hr>
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
                    <th scope="col">Modifié le</th>
                    <th scope="col">Éditer</th>
                    <th scope="col">Supprimer</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($posts as $post): ?>
                    <tr>
                      <td><?= $this->clean($post['title']) ?></td>
                      <td><time><?= $this->clean($post['date']) ?></time></td>
                      <td><time><?= !is_null($post['modificationDate']) ? $this->clean($post['modificationDate']) : '--' ?></time></td>
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
</div>