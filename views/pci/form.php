
<form id="typeform" action="<?= isset($params['Pci']) ? "/Pci/edit/{$params['Pci']->id}" : "/and/Pci/createsave/"?>"  method="post">
<div class="form-row">
  <div class="form-group col-12">
      <label for="libelle">Libelle pci </label>
      <input type="text" class="form-control" id="libelle" name="libelle_pci" placeholder="libelle_Pci" value="<?= $params['Pci']->libelle_pci  ?? ''?>">
    </div>
  </div>
  <button type="submit" class="btn btn-primary"><?= isset($params['Pci']) ? 'Valider les modifications' : 'Enregister' ?></button>
</form>