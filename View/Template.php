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

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand" href="">Jean Forteroche - Blog</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="admin/"><p>Se connecter</p></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="connection/disconnect">Se déconnecter</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Header -->
    <header class="masthead" style="background-image: url('Content/img/home-bg.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
              <a href=""><h1 id="blogTitle">Billet simple pour l'Alaska</h1></a>
              <span class="subheading">Découvrez mon dernier ouvrage</span>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Page Main Content -->  
  <div class="container">
      <div id="content">
        <?= $content ?>
      </div>
  </div>

  <!-- Page Footer -->
  <footer id="blogFooter">
    <div class="container">
      <p class="copyright text-muted">Copyright &copy; 2018 - Blog réalisé avec PHP, HTML5 et Bootstrap 4.</p>
    </div>
  </footer>

        <!-- Bootstrap core JavaScript -->
    <script src="Content/jquery/jquery.min.js"></script>
    <script src="Content/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>