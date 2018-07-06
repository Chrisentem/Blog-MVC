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
  <link href="Content/css/admin.css" rel="stylesheet">
  <!-- TinyMCE Editor loading -->
  <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea.admin-editor' });</script>
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
                  <a class="nav-link" href="admin/">Tableau de bord</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="admin/manageComments">Commentaires</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?= $webRoot ?>" target="_blank">Aperçu du site</a>
                </li>
                <li class="nav-item">
                  <?php if(isset($_SESSION['login'])) {
                    echo '<a class="nav-link" href="connection/disconnect">Se déconnecter</a>';
                  } ?>
                </li>
              </ul>
            </div>
          </div>
        </nav>

  <!-- Breadcrumb -->
  <div class="container">    
    <?php include_once 'View/Breadcrumb.php'; ?>
  </div>

  <!-- Page Main Content -->  
  <div class="main container">
        <?= $content ?>
  </div>

  <!-- Page Footer -->
  <footer id="blogFooter">
    <div class="container">
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