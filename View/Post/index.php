<?php $this->title = "Mon Blog - " . $this->clean($post['title']); ?>

<article>
    <header>
        <h1 class="postTitle"><?= $this->clean($post['title']) ?></h1>
        <time><?= $this->clean($post['date']) ?></time>
    </header>
    <p><?= $this->clean($post['content']) ?></p>
</article>
<hr />
</aside>
	<header>
	    <h1 id="answerTitles">Derniers commentaires à <?= $this->clean($post['title']) ?></h1>
	</header>
	<?php foreach ($comments as $comment): ?>
	    <p><?= $this->clean($comment['author']) ?> dit :</p>
	    <p><?= $this->clean($comment['content']) ?></p>
	<?php endforeach; ?>
	<hr />
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



