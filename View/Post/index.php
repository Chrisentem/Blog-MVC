<?php $this->title = "Mon Blog - " . $this->clean($post['title']); ?>

<article>
    <header>
        <h1 class="postTitle"><?= $this->clean($post['title']) ?></h1>
        <time><?= $this->clean($post['date']) ?></time>
    </header>
    <p><?= $this->clean($post['content']) ?></p>
</article>
<hr />



