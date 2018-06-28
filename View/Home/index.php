<?php $this->title = "Mon Blog"; ?>

<?php foreach ($posts as $post): ?>
    <article>
        <header>
            <h1 class="postTitle"><?= $this->clean($post['title']) ?></h1>
            <time>publié le <?= $this->clean($post['date']) ?></time>
        </header>
        <p><?= $this->truncate($post['content']) ?><a class="readmore" href="post/index/<?= $this->clean($post['id']) ?>">Lire la suite</a></p>
    </article>
    <hr />
<?php endforeach; ?>
