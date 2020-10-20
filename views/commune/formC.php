<h1><?= isset($params['commune']) ? "Modifier la commune {$params['commune']->nom_commune}":"Ajouter une commune"?></h1>
<form action="<?= isset($params['commune']) ? "/commune/edit/{$params['commune']->id}" : "/and/commune/createsave/"?>"  method="post">
<div class="form-row">
  <div class="form-group col-md-4">
      <label for="nom_commune">nom_commune</label>
      <input type="text" class="form-control" id="nom_commune" name="nom_commune" placeholder="nom_commune" value="<?= $params['commune']->nom_commune ?? ''?>">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="code_postal">code_postal</label>
      <input type="number" class="form-control" id="code_postal" name="code_postal" placeholder="code_postal" value="<?= $params['commune']->code_postal ?? ''?>">
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="id_daira">daira_iddaira</label>
      <select id="id_daira" name="id_daira" class="form-control">
      
      <?php foreach ($params['dairas'] as $daira) : ?>
        <option value="<?= $daira->id ?>" 
        <?php if (isset($params['commune'])){
        echo($daira->id === $params['commune']->id_daira) ? 'selected' : '';
        }?>
        ><?= $daira->nom_daira ?></option>
      }
      <?php endforeach ?>
      </select>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="id_destricte">destrict_iddestrict</label>
      <select id="id_destricte" name="id_destricte" class="form-control">
      <?php foreach ($params['destricts'] as $destrict) : ?>
        <option value="<?= $destrict->id ?>" 
        <?php if (isset($params['commune'])){
        echo($destrict->id === $params['commune']->id_destricte) ? 'selected' : '';
        }?>
        ><?= $destrict->nom_destricte ?></option>
      }
      <?php endforeach ?>
      </select>
    </div>
  </div>
  <button type="submit" class="btn btn-primary"><?= isset($params['commune']) ? 'Valider les modifications' : 'Enregister ' ?></button>
</form>