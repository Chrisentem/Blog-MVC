<?php $this->title = "Administration - Billet" ?>

<!-- Breadcrumb -->
<?php $this->breadcrumb = [
	['url' => 'admin/', 'title' => 'Accueil'],
	['title' => 'Édition - ' . $this->clean($page['title'])]
];
?>

<h1>Administration - Éditer la page</h1>
    	<div class="row">
    		<div class="col-md-12">
		    	<form action="<?= 'admin/savePage/' . $this->clean($page['id']) ?>" method="post">
		    		<div class="form-group">
		    			<label for="title">Votre titre</label>
						<input type="text" class="form-control" name="title" id="title" value="<?= $this->clean($page['title']) ?>" />
					</div>
					<div class="form-group">
						<label for="content">Votre texte</label>
						<textarea rows="3" class="admin-editor" id="content" name="content"/><?= $this->clean($page['content']) ?></textarea>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary">Sauvegarder</button>
					</div>
				</form>
				<a class="btn btn-secondary" href="javascript:history.back()">Retour</a>
        	</div>
        	<div class="col-md-12">
        		<hr>
    			<div class="row">
    				<div class="col-12">
    					<span style="color: #bfbfbf; font-size: 1rem; font-weight: 400;">Aperçu de la page</span>
    				</div>
    				<div class="admin-edit col-12">
				        <h3><?= $this->clean($page['title']) ?></h3>
				        <time>Crée le : <?= $this->clean($page['date']) ?></time>
				        <time><?= !is_null($page['modificationDate']) ? ' - Modifié le : ' . $this->clean($page['modificationDate']) : '' ?></time><hr>
				        <p><?= $page['content'] ?></p>
				    </div>
		    	</div>
		    </div>
        </div>		