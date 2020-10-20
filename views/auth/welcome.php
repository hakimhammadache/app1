<?php if(isset($_GET['erreur_mdp'])): ?>
    <div class="alert alert-warning text-center">Mot de passe erooné</div>
<?php endif ?>
<?php if(isset($_GET['erreur_psd'])): ?>
    <div class="alert alert-warning text-center">username non trouvé</div>
<?php endif ?>
<?php if(isset($_GET['errur_auth'])): ?>
    <div class="alert alert-danger text-center">une autontification est requise </div>
<?php endif ?>
<div>
    <div class="jumbotron text-center pt-n5" style="margin-top : 70px;">
    <h1 class="display-3">Bienvenu</h1>
    <p class="h4">Société nationale des transports ferroviaires</p>
    <hr class="my-4">
    <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#login">
    accéder à votre espace de travail
    </button>
</div>

<!-- Button trigger modal -->


  <!-- Modal -->
  <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="loginTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-center" id="loginTitle">Login</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <?php include VIEWS . 'auth\login.php'; ?>
        </div>
      </div>
    </div>
  </div>
  <script src="<?= SCRIPTS . 'js' . DIRECTORY_SEPARATOR . 'ScriptWelcome.js' ?>"></script>
  </div>