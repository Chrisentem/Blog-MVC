<?php $this->title = "Mes pages" ?>

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
	        	<h2>Gérer les pages d'infos</h2>
	        </header>
	        <div class="table-responsive">
	            <table class="table table-hover table-striped table-dark">
	            	<thead>
		                <tr>
			                <th scope="col">Titre</th>
			                <th scope="col">Date de création</th>
			                <th scope="col">Extrait</th>
			                <th scope="col">Éditer</th>
	                	</tr>
	            	</thead>
	              	<tbody>
		                <?php foreach ($pages as $page): ?>
		                	<tr>
		                		<td><?= $this->clean($page['title']) ?></td>
		                		<td><time><?= $this->clean($page['date'], 10) ?></time></td>
		                		<td><?= $this->truncate($page['content']) ?></td>
		                		<td><a class="btn btn-success btn-sm" href="<?= "admin/editPage/" . $this->clean($page['id']) ?>">Éditer</a></td>
		                	</tr>
		                <?php endforeach; ?>
	              	</tbody>
	            </table>
	        </div>
	    </div>
	</div>
</div>