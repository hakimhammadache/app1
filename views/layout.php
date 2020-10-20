<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SNTF-PATRIMOINE</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/fontawesome.min.css" >
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  
       <link rel="stylesheet" href="<?= SCRIPTS . 'css' . DIRECTORY_SEPARATOR . 'app1.css' ?>">

      <link rel="stylesheet" href="<?= SCRIPTS . 'css' . DIRECTORY_SEPARATOR . 'style.css' ?>">
          <link rel="stylesheet" href="<?= SCRIPTS . 'css' . DIRECTORY_SEPARATOR . 'jquery.dataTables.min.css' ?>">
      

   <style type="text/css">
      .dataTables_length{
    display: none;
  }
     .dropdown-menu{
border: #365390 1px solid;
}


   </style>
    </head>
    <body>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark p-0" style="border-bottom: #365390 3px solid;">
        <a class="navbar-brand" href="/hello"><small class=""> <img src="<?= SCRIPTS . 'img' . DIRECTORY_SEPARATOR . 'can.png' ?>"></small>
        <img class="logo-img d-inline d-lg-none d-xl-inline" src="<?= SCRIPTS . 'img' . DIRECTORY_SEPARATOR . 'logo.png' ?>"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">

               <?php if ($_SESSION['auth']['role'] === 'user inventaire')  :?>
                  <li class="nav-item ">
              <a class="nav-link" href="/etablisement">Etablissement</a>
            </li>
                  <?php endif ?>
            <?php if ($_SESSION['auth']['role'] === 'admin')  :?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Subdevision Administrative
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="/wilaya">Wilayas</a>
                <a class="dropdown-item" href="/daira">Dairas</a>
                <a class="dropdown-item" href="/commune">Communes</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="/destrict">Destricts</a>
                <a class="dropdown-item" href="/Organisme_cadastrale">Organisme Cadastrale</a>
              </div>
            </li>
          
            <li class="nav-item dropdown ">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Types_Etats
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown" >
                <h4 class="dropdown-header text-primary">- Type biens Mobiles_Immobile -</h4>
                <a class="dropdown-item" href="/typebienmobile">Types biens_Mobiles</a>
                <a class="dropdown-item" href="/typebienimmobile">Types biens_Immobiles</a>
                
                <h4 class="dropdown-header text-primary">- Amoritosement_PCI -</h4>
                <a class="dropdown-item" href="/Typeammortisement">Types Ammoritosements</a>
                <a class="dropdown-item" href="/Pci">PCI</a>
                
                <h4 class="dropdown-header text-primary">- Nature Etablissement -</h4>
                <a class="dropdown-item" href="/Naturetablisement">Natures Etablissements</a>
                
                <h4 class="dropdown-header text-primary">- Type Document -</h4>
                <a class="dropdown-item" href="/typeDocument">Types Documents</a>
                
                <h4 class="dropdown-header text-primary">- Etat-</h4>
                <a class="dropdown-item" href="/EtatPhysique">Etats Physiques</a>
                <a class="dropdown-item" href="/etatTerrain">Etats Terrains</a>
                
                <h4 class="dropdown-header text-primary">- Qualité Raille -</h4>
                <a class="dropdown-item" href="/qualiteRaile">Qualités Railles</a>
              </div>
            </li>    
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Infrastructures
              </a>
              <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                
                <h4 class="dropdown-header text-primary">- ETABLISSEMENT -</h4>
                <a class="dropdown-item" href="/etablisement">Eablisements</a>
                <div class="dropdown-divider"></div>
                <h4 class="dropdown-header text-primary">- RAIL -</h4>
                <a class="dropdown-item" href="/rail">Rails</a>
                <div class="dropdown-divider"></div>
                <h4 class="dropdown-header text-primary">- TERRAIN -</h4>
                <a class="dropdown-item" href="/terrain">Terrains</a>
            
              </div>
            </li>
      <?php endif ?>

             <?php if ($_SESSION['auth']['role'] === 'user update')  :?>
                 <li class="nav-item ">
              <a class="nav-link " href="/Bienmobile">Biens Mobiles</a>
            </li>
               <li class="nav-item ">
              <a class="nav-link " href="/Bienimmobile">Biens Immobile</a>
            </li>
        
            <li class="nav-item ">
              <a class="nav-link " href="/document">Documents</a>
            </li>
             <?php endif ?>
          </ul>
          <ul class="navbar-nav ml-auto">
            <?php if (isset($_SESSION['auth'])): ?>
            <li class="nav-item">
              <a class="nav-link sortir font-weight-bold" href="/logout"><i class="fas fa-user-times"></i>Sortir</a>
            </li>
            <?php endif ?>
          </ul>
        </div>
      </nav>
      <main role="main" class=" px-4 header2">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-1 border-bottom">
          <h2 class="">  <small class="text-secondary text-capitalize"><?=  $_SESSION['auth']['role']==='admin' ? 'Administrateur' :($_SESSION['auth']['role']==='user inventaire' ? 'Inventaire':$_SESSION['auth']['nom_etab'] )  ?></small> </h2>
          <div class="btn-toolbar mx-2 mt-3 ">
            <div class=" ">
              <p class="">
                <span data-feather="user" class="font-weight-bold text-capitalize titre">
                  <?= $_SESSION['auth']['role']?> :</span> <span class="text-capitalize"><?= $_SESSION['auth']['username']?></span>
                </p>
                
              </div>
              
            </div>
          </div>
        </main>
                   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
       <script src="<?= SCRIPTS . 'js' . DIRECTORY_SEPARATOR . 'jquery.dataTables.min.js' ?>"></script>

        

        <div class="bd">
          <?= $content ?>
        </div>


      </body>
    </html>