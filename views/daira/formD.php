<h1><?= isset($params['daira']) ? "Modifier la daira {$params['daira']->nom_daira}":"Ajouter une daira"?></h1>
<form action="<?= isset($params['daira']) ? "/daira/edit/{$params['daira']->id}" : "/and/daira/createsave/"?>"  method="post">
<div class="form-row">
  <div class="form-group col-md-4">
      <label for="nom_daira">nom_daira</label>
      <input type="text" class="form-control" id="nom_daira" name="nom_daira" placeholder="nom_daira" value="<?= $params['daira']->nom_daira ?? ''?>">
    </div>
  </div>
  

  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="id_wilaya">id_wilaya</label>
      <select id="id_wilaya" name="id_wilaya" class="form-control">
      <?php foreach ($params['wilayas'] as $wilaya) : ?>
        <option value="<?= $wilaya->id ?>" 
        <?php if (isset($params['wilaya'])){
        echo($wilaya->id === $params['wilaya']->id_wilaya) ? 'selected' : '';
        }?>
        ><?= $wilaya->nom_wilaya ?></option>
      }
      <?php endforeach ?>
      </select>
    </div>
  </div>

  <button type="submit" class="btn btn-primary"><?= isset($params['daira']) ? 'Valider les modifications' : 'Enregister ' ?></button>
</form>