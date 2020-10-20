
<form id="typeform" action="<?= isset($params['Typebmobile']) ? "/typebienmobile/edit/{$params['Typebmobile']->id}" : "/and/typebienmobile/createsave/"?>"  method="post">
<div class="form-row">
  <div class="form-group col-12">
      <label for="libelle">libelle type BM</label>
      <input type="text" class="form-control" id="libelle" name="libelle_tp_mob" placeholder="libelle_type_BM" value="<?= $params['Typebmobile']->libelle_tp_mob ?? ''?>">
    </div>
  </div>
  <button type="submit" class="btn btn-primary"><?= isset($params['Typebmobile']) ? 'Valider les modifications' : 'Enregister ' ?></button>
</form>