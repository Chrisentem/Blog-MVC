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
  <!-- Custom fonts for this template -->
  <link href="Content/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <title><?= $title ?></title>
</head>
<body>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <img src="Content/img/chris_Jean-Forteroche.png" alt="Jean Forteroche" style="max-height: 50px; margin-right: 10px"><a class="navbar-brand" href="">Jean Forteroche - Blog</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      Menu<i class="fa fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="">Accueil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="home/aPropos">Biographie</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="home/contact">Contact</a>
          </li>          
          <?php if(isset($_SESSION['login'])) {
              echo '<li class="nav-item"><a class="nav-link" href="admin/">Tableau de bord</a></li>';
              echo '<li class="nav-item"><a class="nav-link" href="connection/disconnect">Se déconnecter</a></li>';
          } ?>
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
    </div>
  </header>

  <!-- Breadcrumb -->
  <div class="container">    
    <?php include_once 'View/Breadcrumb.php'; ?>
  </div>

  <!-- Page Main Content -->  
  <div class="container">
        <?= $content ?>
  </div>

  <!-- Page Footer -->
  <footer id="blogFooter">
    <div class="container">
      <div class="row">
        <?php if ($_SERVER['REQUEST_URI'] == $webRoot . 'connection/') {
          echo '<a class="btn btn-secondary btn-sm" href="' . $webRoot . '">Accueil du site</a>';
        }
        elseif (!isset($_SESSION['login'])) {
          echo '<a class="btn btn-secondary btn-sm" href="admin/">Se connecter</a></li>';
        } ?>
      </div>
      <div class="row text-center">
          <p class="copyright">Copyright &copy; 2018 - Blog réalisé avec PHP, HTML5 et Bootstrap 4.</p>
      </div>
    </div>
  </footer>

        <!-- Bootstrap core JavaScript -->
    <script src="Content/jquery/jquery.min.js"></script>
    <script src="Content/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>