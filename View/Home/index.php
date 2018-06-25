<?php $this->title = "Mon Blog"; ?>

<?php foreach ($posts as $post): ?>
    <article>
        <header>
            <a href="<?= "post/index/" . $this->clean($post['id']) ?>">
                <h1 class="postTitle"><?= $this->clean($post['title']) ?></h1>
            </a>
            publié le <time><?= $this->clean($post['date']) ?></time>
        </header>
        <p><?= $post['content'] ?></p>
    </article>
    <hr />
<?php endforeach; ?>
