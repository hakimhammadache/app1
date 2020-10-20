<form id="formidE" method="post">
<div class="form-row">
  <div class="form-group col-12">
      <label for="nom_etab">Nom Etablissement</label>
      <input type="text" class="form-control" id="nom_etab" name="nom_etab" placeholder="Nom_Etablissement">
  </div>
</div>
<div class="form-row">
  <div class="form-group col-12 col-md-6">
      <label for="localisation_lng">localisation longitude</label>
      <input type="text" class="form-control" id="localisation_lng" name="localisation_lng" placeholder="localisation_lng">
  </div>
   <div class="form-group col-12 col-md-6">
      <label for="localisation_lat">localisation lattitude</label>
      <input type="text" class="form-control" id="localisation_lat" name="localisation_lat" placeholder="localisation_lat">
  </div>
  </div>
 
  <div class="form-row">
    <div class="form-group col-12">
      <label for="id_commune">Commune</label>
        <select id="id_commune" name="id_commune" class="form-control">
        <?php foreach ($params['communes'] as $commune) : ?>
          <option value="<?= $commune->id ?>"><?= $commune->nom_commune ?></option>
        <?php endforeach ?>
        </select>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-12 col-md-6">
      <label for="id_natur_etab">Nature Etablissement </label>
        <select id="id_natur_etab" name="id_natur_etab" class="form-control">
        <?php foreach ($params['natureEtabls'] as $natureEtabl) : ?>
          <option value="<?= $natureEtabl->id ?>"><?= $natureEtabl->libelle_nat_etab ?></option>
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

  <div class="row col-12">
    <button type="submit" class="btn btn-success mx-auto">Enregister</button>
  </div>
</form>
