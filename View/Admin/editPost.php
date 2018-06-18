<?php $this->title = "Mon Blog - Administration" ?>

<h2>Administration</h2>

    	<div class="row">
    		<div class="adminList col-md-6">
		        <h2><?= $this->clean($post['title']) ?></h2>
		        <time>Crée le : <?= $this->clean($post['date']) ?></time>
		        <p><?= $this->clean($post['content']) ?></p>
		    </div>
			<div class="col-md-6">
		    	<form action="<?= 'admin/savePost/' . $this->clean($post['id']) ?>" method="post">
		    		<div class="form-group">
		    			<label for="title">Votre titre</label>
						<input type="text" class="form-control" name="title" id="title" value="<?= $this->clean($post['title']) ?>" />
					</div>
					<div class="form-group">
						<label for="content">Votre texte</label>
						<textarea rows="3" id="content" name="content"/><?= $this->clean($post['content']) ?></textarea>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary" >Sauvegarder</button>
					</div>
				</form>
        	</div>
        </div>
		