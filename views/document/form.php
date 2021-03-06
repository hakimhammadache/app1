<form id="focrmdoc" method="post" enctype="multipart/form-data">
<div class="form-row">
  <div class="form-group col-md-8">
      <label for="nom_doc">nom_doc</label>
      <input type="text" class="form-control" id="nom_doc" name="nom_doc" placeholder="nom_doc" required>
  </div>
</div>
<div class="form-row">
    <div class="form-group col-md-8">
      <label for="id_type_doc">id_type_doc </label>
        <select id="id_type_doc" name="id_type_doc" class="form-control">
        <?php foreach ($params['typeDocs'] as $typeDoc) : ?>
          <option value="<?= $typeDoc->id ?>"><?= $typeDoc->nom_doc?></option>
        <?php endforeach ?>
        </select>
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-8">
      <label for="id_etab">id_etab</label>
        <select id="id_etab" name="id_etab" class="form-control">
        <?php foreach ($params['etablisements'] as $etablisement) : ?>
          <option value="<?= $etablisement->id ?>"><?= $etablisement->nom_etab ?></option>
        <?php endforeach ?>
        </select>
    </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-8">
    <label id="doc_inLabel" for="doc_in">Example file input</label>
    <input type="file" class="form-control-file" id="doc_in" name="doc_in" required>
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Enregister</button>
</form>
