<!DOCTYPE html>
<html>
<head>
    <title>S.N.T.F_Patrimoine</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/fontawesome.min.css" >
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
    crossorigin="anonymous">
    <link rel="stylesheet" href="<?= SCRIPTS . 'css' . DIRECTORY_SEPARATOR . 'style.css' ?>">
    
    
<style>
    .form-control:not(select) {
    padding: 1.5rem 0.5rem;

}



</style>
</head>

<body background="<?= SCRIPTS . 'img' . DIRECTORY_SEPARATOR . 'b3.jpg' ?> ">


    
<?php if(isset($_GET['erreur_mdp'])): ?>
    <div class="alert alert-warning text-center">Mot de passe erooné</div>
<?php endif ?>
<?php if(isset($_GET['erreur_psd'])): ?>
    <div class="alert alert-warning text-center">username non trouvé</div>
<?php endif ?>
<?php if(isset($_GET['errur_auth'])): ?>
    <div class="alert alert-danger text-center">une autontification est requise </div>
<?php endif ?>


    <div class="text-center py-4 col-12 col-md-8 col-lg-6 mx-auto mt-5 bg-white shadow card" style="opacity: 0.94" >
    <h1 class="display-3 titre"><img style="width: 80px" src="<?= SCRIPTS . 'img' . DIRECTORY_SEPARATOR . 'sntf.png' ?>"> Bienvenu <img style="width: 80px" src="<?= SCRIPTS . 'img' . DIRECTORY_SEPARATOR . 'sntf.png' ?>"></h1>
    <h4 class=" titre">Société nationale des transports ferroviaires</h4>
    <hr class="my-4 mx-5">
    <form action="/login" method="POST" class="needs-validation" >
    <div class="form-group mx-5">
        <label for="username">Nom utilisateur</label>
        <input type="text" class="form-control" placeholder="Nom Utilisateur" name="username" id="username"required>
    </div>
    <div class="form-group mx-5">
        <label for="password">Mot de passe</label>
        <input type="password" class="form-control" placeholder="*********" name="password" id="password" required>
    </div>
  
    <button type="submit" class="btn btn-primary">Se connecter</button>
</form>
</div>




</body>
</html>