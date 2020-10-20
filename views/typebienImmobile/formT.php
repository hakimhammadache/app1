
<form id="typeform" action="<?= isset($params['Typebimmobile']) ? "/typebienimmobile/edit/{$params['Typebimmobile']->id}" : "/and/typebienimmobile/createsave/"?>"  method="post">
<div class="form-row">
  <div class="form-group col-12">
      <label for="libelle">libelle type BIM</label>
      <input type="text" class="form-control" id="libelle" name="libelle_tp_im" placeholder="libelle_type_BIM" value="<?= $params['Typebimmobile']->libelle_tp_im ?? ''?>">
    </div>
  </div>
  <button type="submit" class="btn btn-primary"><?= isset($params['Typebimmobile']) ? 'Valider les modifications' : 'Enregister ' ?></button>
</form>