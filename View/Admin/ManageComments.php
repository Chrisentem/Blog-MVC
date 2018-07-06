<?php $this->title = "Commentaires" ?>

<!-- Breadcrumb -->
<?php $this->breadcrumb = [
	['url' => 'admin/', 'title' => 'Accueil'],
	['title' => $this->title]
];
?>

<header>
<h1>Administration du Blog</h1>
</header>
<div class="container">
	<div class="row">
	    <div class="col-md-12">
	        <header>
	        	<h2>Gérer les commentaires</h2>
	        </header>
	        <div class="table-responsive">
	            <table class="table table-hover table-striped table-dark">
	            	<thead>
		                <tr>
			                <th scope="col">Auteur</th>
			                <th scope="col">Date de création</th>
			                <th scope="col">Commentaire</th>
			                <th scope="col">Abus signalés</th>
			                <th scope="col">Modérer</th>
			                <th scope="col">Supprimer</th>
	                	</tr>
	            	</thead>
	              	<tbody>
		                <?php foreach ($allComments as $comment): ?>
		                	<tr>
		                		<td><?= $this->clean($comment['author']) ?></td>
		                		<td><time><?= $this->clean($comment['date']) ?></time></td>
		                		<td><?= $this->clean($comment['content']) ?></td>
		                		<td><?= $this->clean($comment['reports']) ?></td>
		                		<td><a class="btn btn-success btn-sm" href="<?= "admin/validCom/" . $this->clean($comment['id']) ?>">Valider</a></td>
		                		<td><a class="btn btn-danger btn-sm" href="<?= "admin/deleteCom/" . $this->clean($comment['id']) ?>">Supprimer</a></td>
		                	</tr>
		                <?php endforeach; ?>
	              	</tbody>
	            </table>
	        </div>
	    </div>
	</div>
</div>