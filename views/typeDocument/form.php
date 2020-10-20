
<form id="typeform" action="<?= isset($params['tdoc']) ? "/typeDocument/edit/{$params['tdoc']->id}" : "/and/typeDocument/createsave/"?>"  method="post">
<div class="form-row">
  <div class="form-group col-12">
      <label for="libelle">Type Document</label>
      <input type="text" class="form-control" id="libelle" name="nom_doc" placeholder="Type_Document" value="<?= $params['tdoc']->nom_doc ?? ''?>">
    </div>
  </div>
  <button type="submit" class="btn btn-primary"><?= isset($params['typeDocument']) ? 'Valider les modifications' : 'Enregister ' ?></button>
</form>
