<form id="formbim" method="post" enctype="multipart/form-data">
<div class="form-row">
  <div class="form-group col-12">
      <label for="nom_bien">Nom Bien Imobile</label>
      <input type="text" class="form-control" id="nom_bien" name="nom_bien" placeholder="Nom" required>
  </div>
</div>
<div class="form-row">

    <div class="form-group col-12">
      <label for="id_type_bien_im">Type Bien Imobile </label>
        <select id="typemb" name="id_type_bien_im" class="form-control">
        <?php foreach ($params['typebims'] as $Typebimmobile) :?>
          <option value="<?=$Typebimmobile->id ?>"><?=$Typebimmobile->libelle_tp_im ?></option>
        <?php endforeach ?>
</select>

    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-12 col-md-6">
      <label for="id_etab">Etablissement</label>
        <select id="id_etab" name="id_etab" class="form-control">
        <?php foreach ($params['etablisements'] as $etablisement) : ?>
          <option value="<?= $etablisement->id ?>"><?= $etablisement->nom_etab ?></option>
        <?php endforeach ?>
        </select>
    </div>
     <div class="form-group col-12 col-md-6">
      <label for="id_etat_ph">Etat Physique</label>
        <select id="id_etat_ph" name="id_etat_ph" class="form-control">
        <?php foreach ($params['etatPhs'] as $etatPh) : ?>
          <option value="<?= $etatPh->id ?>"><?= $etatPh->libelle_eta_ph ?></option>
        <?php endforeach ?>
        </select>
    </div>
  </div>



   <div class="form-row">

    <div class="form-group col-12 col-md-6">
      <label for="id_pci">PCI </label>
        <select id="id_pci" name="id_pci" class="form-control">
        <?php foreach ($params['pcis'] as $pci) :?>
          <option value="<?=$pci->id ?>"><?=$pci->libelle_pci ?></option>
        <?php endforeach ?>
</select>

    </div>
      <div class="form-group col-12 col-md-6">
      <label for="id_type_amm">Ammortissement </label>
        <select id="id_type_amm" name="id_type_amm" class="form-control">
        <?php foreach ($params['amms'] as $amm) :?>
          <option value="<?=$amm->id ?>"><?=$amm->libelle_tp_amm ?></option>
        <?php endforeach ?>
</select>

    </div>
  </div>
 
 
  <div class="row col-12">
    <button type="submit" class="btn btn-success mx-auto">Enregister</button>
  </div>
</form>
