<?php $this->title = "Mon Blog - " . $this->clean($post['title']); ?>

<article>
    <header>
        <h1 class="postTitle"><?= $this->clean($post['title']) ?></h1>
        publié le <time><?= $this->clean($post['date']) ?></time>
    </header>
    <p><?= $post['content'] ?></p>
</article>
<hr />
</aside>
	<header>
	    <h3>Derniers commentaires à <?= $this->clean($post['title']) ?></h3>
	</header>
	<?php foreach ($comments as $comment): ?>
	    <p><?= $this->clean($comment['author']) ?> a écrit :</p>
	    <p><?= $this->clean($comment['content']) ?></p>
	    <form method="post" action="post/reportComment">
	    	<input type="hidden" name="postId" value="<?= $post['id'] ?>" />
		    <button type="submit" name="comId" value="<?= $this->clean($comment['id']) ?>" class="btn btn-secondary btn-sm">Signaler</button>
		</form>
	<?php endforeach; ?>
	<hr />
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
</aside>



