<!doctype html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<base href="<?= $webRoot ?>" >
    <!-- Custom styles for this template -->  
	<link href="Content/css/style.css" rel="stylesheet">
	<title><?= $title ?></title>
</head>
<body>
    <!-- Page Header -->
    <header>
            <div class="site-heading">
              <a href=""><h1 id="blogTitle">Jean Forteroche</h1></a>
              <span class="subheading">Billet simple pour l'Alaska</span>
            </div>
    </header>
    <!-- Page Main Content -->	
	<div class="container">
    <div class="row">
  		<div id="content">
  			<?= $content ?>
  		</div>
    </div>
	</div>

	<!-- Page Footer -->
	<footer id="blogFooter">
		<div class="container">
			<p>Copyright &copy; 2018 - Blog réalisé avec PHP, HTML5 et Bootstrap 4.</p>
        	<a href="admin/"><p>Se connecter</p></a>
        </div>
    </footer>
</body>
</html>