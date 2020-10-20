
<form id="typeform" action="<?= isset($params['Typeammor']) ? "/Typeammortisement/edit/{$params['Typeammor']->id}" : "/and/Typeammortisement/createsave/"?>"  method="post">
<div class="form-row">
  <div class="form-group col-12">
      <label for="libelle">libelle type AMRTS </label>
      <input type="text" class="form-control" id="libelle" name="libelle_tp_amm" placeholder="libelle_tp_amm" value="<?= $params['Typeammor']->libelle_tp_amm  ?? ''?>">
    </div>
  </div>
  <button type="submit" class="btn btn-primary"><?= isset($params['Typeammor']) ? 'Valider les modifications' : 'Enregister ' ?></button>
</form>