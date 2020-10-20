
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- icone pour sntf -->
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Dashboard Template for Bootstrap</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="<?= SCRIPTS . 'css' . DIRECTORY_SEPARATOR . 'app.css' ?>">

    <!-- Custom styles for dashboard  https://getbootstrap.com/docs/4.0/examples/dashboard/ --> 
    <link rel="stylesheet" href="<?= SCRIPTS . 'css' . DIRECTORY_SEPARATOR . 'dashboard.css' ?>">

    <!-- Jquery core js -->
    <script src="<?= SCRIPTS . 'js' . DIRECTORY_SEPARATOR . 'appJquery.js' ?>"></script>

    <!-- Bootstrap core js -->
    <script src="<?= SCRIPTS . 'js' . DIRECTORY_SEPARATOR . 'appBootstrap.js' ?>"></script>

    <!-- BootstrapBundel core js -->
    <script src="<?= SCRIPTS . 'js' . DIRECTORY_SEPARATOR . 'appBootstrapBundel.js' ?>"></script>
    
    <!-- Popper core js -->
    <script src="<?= SCRIPTS . 'js' . DIRECTORY_SEPARATOR . 'appPopper.js' ?>"></script>
  </head>

  <body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
      <!-- Icon name entreprise -->
      <a class="navbar-brand col-sm-3 col-md-2 mr-0 " href="/hello">SNTF</a>
      <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">

          <!-- lien Quité -->
          <?php if (isset($_SESSION['auth'])): ?>
          <a class="nav-link text-danger" href="/logout">
          <span data-feather="log-out"></span>
          Sign out
          </a>
          <?php endif ?>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <!-- le nav -->
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link" href="/hello">
                  <span data-feather="home"></span>
                  Dashboard <span class="sr-only"></span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/document">
                  <span data-feather="file"></span>
                  Gestion Documents
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="shopping-cart"></span>
                  Products
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="users"></span>
                  Customers
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="bar-chart-2"></span>
                  Reports
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="layers"></span>
                  Integrations
                </a>
              </li>
            </ul>

            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span>Saved reports</span>
              <a class="d-flex align-items-center text-muted" href="#">
                <span data-feather="plus-circle"></span>
              </a>
            </h6>
            <ul class="nav flex-column mb-2">
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Current month
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Last quarter
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Social engagement
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Year-end sale
                </a>
              </li>
            </ul>
          </div>
        </nav>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
          <h1 class="h2">Dashboard  <small class="text-secondary"><?= ( $_SESSION['auth']['role']==='admin') ? 'Admin' : $_SESSION['auth']['nom_etab'] ;  ?></small> </h1>
          <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
              <p class="btn btn-sm btn-outline-secondary">
                  <span data-feather="user"></span>chevrons-right
                  Username : <?= $_SESSION['auth']['username']?>
              </p>
              <p class="btn btn-sm btn-outline-secondary">
                  Role : <?= $_SESSION['auth']['role']?>
              </p>
              </div>
              <p class="btn btn-sm btn-success">
              Etat : actif <span data-feather="power"></span>
              </p>
          </div>
        </div>
        <?= $content ?>
        <?php var_dump($_SESSION); ?>
        </main>
      </div>
    </div>
  </body>
     <!-- icon core js -->
     <script src="<?= SCRIPTS . 'js' . DIRECTORY_SEPARATOR . 'appIcon.js' ?>"></script>
    <script>
      feather.replace() // https://feathericons.com/
    </script>
</html>
