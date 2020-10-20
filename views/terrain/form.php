<h1><?= isset($params['var']) ? "Modifier la var {$params['var']->nom}":"Ajouter une var"?></h1>
<form action="<?= isset($params['var']) ? "/lien/edit/{$params['var']->id}" : "/and/lien/createsave/"?>"  method="post">
<div class="form-row">
  <div class="form-group col-md-4">
      <label for="nom">nom</label>
      <input type="text" class="form-control" id="nom" name="nom" placeholder="nom" value="<?= $params['var']->nom ?? ''?>">
    </div>
  </div>
  <button type="submit" class="btn btn-primary"><?= isset($params['lien']) ? 'Valider les modifications' : 'Enregister ' ?></button>
</form>



<label for="id_wilaya">etranger_id</label>
      <select id="etranger_id" name="etranger_id" class="form-control">
      
      <?php foreach ($params['etrangers'] as $etranger) : ?>
        <option value="<?= $etranger->id ?>" 
        <?php if (isset($params['etranger'])){
        echo($etranger->id === $params['etranger']->etranger_id) ? 'selected' : '';
        }?>
        ><?= $etranger->nom ?></option>
      }
      <?php endforeach ?>
      </select>