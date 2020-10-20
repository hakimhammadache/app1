
<form id="typeform" action="<?= isset($params['qRail']) ? "/qualiteRaile/edit/{$params['qRail']->id}" : "/and/qualiteRaile/createsave/"?>"  method="post">
<div class="form-row">
  <div class="form-group col-12">
      <label for="libelle">Libelle Qualite</label>
      <input type="text" class="form-control" id="libelle" name="libelle_qualite" placeholder="libelle_qualite" value="<?= $params['qRail']->libelle_qualite ?? ''?>">
    </div>
  </div>
  <button type="submit" class="btn btn-primary"><?= isset($params['qRail']) ? 'Valider les modifications' : 'Enregister ' ?></button>
</form>


