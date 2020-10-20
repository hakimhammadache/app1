
<form id="typeform"action="<?= isset($params['EtatPhysique']) ? "/EtatPhysique/edit/{$params['EtatPhysique']->id}" : "/and/EtatPhysique/createsave/"?>"   method="post">
<div class="form-row">
  <div class="form-group col-12">
      <label for="libelle">libelle etat physique</label>
      <input type="text" class="form-control" id="libelle" name="libelle_eta_ph" placeholder="libelle_eta_ph" value="<?= $params['EtatPhysique']->libelle_eta_ph ?? ''?>">
    </div>
  </div>
  <button type="submit" class="btn btn-primary"><?= isset($params['EtatPhysique']) ? 'Valider les modifications' : 'Enregister ' ?></button>
</form>