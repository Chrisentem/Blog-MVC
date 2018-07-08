<?php $this->title = $page['title']; ?>

<!-- Breadcrumb -->
<?php $this->breadcrumb = [
	['url' => '', 'title' => 'Accueil'],
	['title' => $this->title]
];
?>

<div class="row">
	<div class="col-md-12">
		<header>
			<h1 class="pageTitle"><?= $this->clean($page['title']) ?></h1>
		</header>
	</div>
	<div class="col-md-12">
		<?= $page['content'] ?>
	</div>
</div>