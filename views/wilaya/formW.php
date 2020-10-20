<h1><?= isset($params['wilaya']) ? "Modifier la wilaya {$params['wilaya']->nom_wilaya}":"Ajouter une wilaya"?></h1>
<form action="<?= isset($params['wilaya']) ? "/wilaya/edit/{$params['wilaya']->id}" : "/and/wilaya/createsave/"?>"  method="post">
<div class="form-row">
  <div class="form-group col-md-4">
      <label for="nom_wilaya">nom_wilaya</label>
      <input type="text" class="form-control" id="nom_wilaya" name="nom_wilaya" placeholder="nom_wilaya" value="<?= $params['wilaya']->nom_wilaya ?? ''?>">
    </div>
  </div>
  <button type="submit" class="btn btn-primary"><?= isset($params['wilaya']) ? 'Valider les modifications' : 'Enregister ' ?></button>
</form>