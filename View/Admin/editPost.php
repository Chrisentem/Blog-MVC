<?php $this->title = "Administration - Billet" ?>

<h1>Administration - Modifier un billet</h1>
    	<div class="row">
    		<div class="col-md-6">
		    	<form action="<?= 'admin/savePost/' . $this->clean($post['id']) ?>" method="post">
		    		<div class="form-group">
		    			<label for="title">Votre titre</label>
						<input type="text" class="form-control" name="title" id="title" value="<?= $this->clean($post['title']) ?>" />
					</div>
					<div class="form-group">
						<label for="content">Votre texte</label>
						<textarea rows="3" class="admin-editor" id="content" name="content"/><?= $this->clean($post['content']) ?></textarea>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary" >Sauvegarder</button>
					</div>
				</form>
        	</div>
    		<div class="col-md-6">
    			<div class="row">
    				<div class="col-12">
    					<span style="color: #bfbfbf; font-size: 1rem; font-weight: 400;">Aperçu du billet</span>
    				</div>
    				<div class="admin-editpost col-12">
				        <h3><?= $this->clean($post['title']) ?></h3>
				        <time>Crée le : <?= $this->clean($post['date']) ?></time>
				        <!-- <p><?= $this->clean($post['content']) ?></p> -->
				        <p><?= $post['content'] ?></p>
				    </div>
		    	</div>
		    </div>
        </div>		