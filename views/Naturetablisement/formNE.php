<form id="typeform" action="<?= isset($params['Naturetablisement']) ? "/Naturetablisement/edit/{$params['Naturetablisement']->id}" : "/and/Naturetablisement/createsave/"?>"  method="post">
<div class="form-row">
  <div class="form-group col-12">
      <label for="libelle">Libelle Nature</label>
      <input type="text" class="form-control" id="libelle" name="libelle_nat_etab" placeholder="Nature" value="<?= $params['Naturetablisement']->libelle_nat_etab ?? ''?>">
    </div>
  </div>
  <button type="submit" class="btn btn-primary"><?= isset($params['Naturetablisement']) ? 'Valider les modifications' : 'Enregister ' ?></button>
</form>