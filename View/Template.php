<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> <!-- boostrap -->
  <base href="<?= $webRoot ?>" >
  <!-- Bootstrap core CSS -->
  <link href="Content/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->  
  <link href="Content/css/style.css" rel="stylesheet">
  <title><?= $title ?></title>
</head>
<body>
    <!-- Page Header -->
    <header class="masthead" style="background-image: url('Content/img/home-bg.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
              <a href=""><h1 id="blogTitle">Jean Forteroche</h1></a>
              <span class="subheading">Billet simple pour l'Alaska</span>
            </div>
          </div>
        </div>
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
      <p class="copyright text-muted">Copyright &copy; 2018 - Blog réalisé avec PHP, HTML5 et Bootstrap 4.</p>
          <a href="admin/"><p>Se connecter</p></a>
        </div>
    </footer>

        <!-- Bootstrap core JavaScript -->
    <script src="Content/jquery/jquery.min.js"></script>
    <script src="Content/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>