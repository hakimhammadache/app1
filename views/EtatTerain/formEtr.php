
<form id="typeform" action="<?= isset($params['etatT']) ? "/etatTerrain/edit/{$params['etatT']->id}" : "/and/etatTerrain/createsave/"?>"  method="post">
<div class="form-row">
  <div class="form-group col-12">
      <label for="libelle">Libelle Etat</label>
      <input type="text" class="form-control" id="libelle" name="ibelle_etat" placeholder="libelle_etat" value="<?= $params['etatT']->ibelle_etat ?? ''?>">
    </div>
  </div>
  <button type="submit" class="btn btn-primary">
    <?= isset($params['etatT']) ? 'Valider les modifications' : 'Enregister ' ?>
  </button>
</form>
