<?php $this->title = $this->clean($post['title']); ?>

<!-- Breadcrumb -->
<?php $this->breadcrumb = [
	['url' => '', 'title' => 'Accueil'],
	['title' => 'Billet - '. $this->title]
];
?>

<div class="row">
	<div class="col-md-12">
		<article>
		    <header>
		        <h1 class="postTitle"><?= $this->clean($post['title']) ?></h1>
		        <time>publié le <?= $this->clean($post['date']) ?></time>
		    </header>
		    <p><?= $post['content'] ?></p>
		</article>
		<hr />
	</div>
</div>
<div class="row">
	<div class="col-md-6">
		<header>
		    <h3>Ecrire un commentaire</h3>
		</header>
		<form method="post" action="post/commenting">
			<div class="form-group">
		    	<input class="form-control" id="author" name="author" type="text" placeholder="Votre pseudo" required /><br />
			</div>
		    <div class="form-group">
		    	<textarea class="form-control" id="commentText" name="content" rows="4" placeholder="Votre commentaire" required></textarea><br />
			</div>
		    <div class="form-group">
		    	<input type="hidden" name="id" value="<?= $post['id'] ?>" />
		    	<button type="submit" class="btn btn-primary" >Envoyer</button>
			</div>
		</form>
	</div>
	<div class="comment col-md-6">
		<header>
			<h3>Derniers commentaires à <?= $this->clean($post['title']) ?></h3>
			<?php if(empty($comments)) {
					echo '<p>Il n\'y a pas encore de commentaire, laissez-en un :)</p>';
				}
			?>
		</header>

		<?php foreach ($comments as $comment): ?>
			<div class="row">
				<div class="col-sm-6">
					<p><?= $this->clean($comment['author']) ?> a écrit :</p>
					<p><?= $this->clean($comment['content']) ?></p>
				</div>
				<div class="col-sm-6">
					<form method="post" action="post/reportComment">
					   	<input type="hidden" name="postId" value="<?= $post['id'] ?>" />
						<button type="submit" name="comId" value="<?= $this->clean($comment['id']) ?>" class="btn btn-secondary btn-sm">Signaler</button>
					</form>
				</div>
			</div>
			<hr />
		<?php endforeach; ?>
	</div>
</div>



