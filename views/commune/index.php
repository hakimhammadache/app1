<h1 class="mx-auto" >Listes des communes </h1>
<a href="/and/commune/create" class="btn btn-success my-3">Une nouvelle commune</a>
<table class="table">
<thead class="table-active">
  <tr>
    <th scope="col">#</th>
    <th scope="col">nom commune</th>
    <th scope="col">code postal</th>
    <th scope="col">daira</th>
    <th scope="col">destrict</th>
    <th scope="col">Actions</th>
  </tr>
</thead>
<tbody>
<?php foreach ($params['communes'] as $commune) :?>
    <tr>
        <th scope="row"><?=$commune->id ?></th>
        <td><?=$commune->nom_commune ?></td>
        <td><?=$commune->code_postal ?></td>

        <?php foreach ($commune->getDaira() as $daira) : ?>
          <td><?=$daira->nom_daira ?></td>
        <?php endforeach ?>

        <?php foreach ($commune->getDestrict() as $destrict) : ?>
          <td><?=$destrict->nom_destricte ?></td>
        <?php endforeach ?>
        <td>
            <!--<a href="/commune/<?= $commune->id ?>" class="btn btn-secondary">voir+</a>-->
            <a href="/commune/edit/<?= $commune->id ?>" class="btn btn-warning">Editer</a>
            <a href="/commune/<?= $commune->id ?>" class="btn btn-success">plus</a>
            <form class="d-inline" action="/commune/delete/<?= $commune->id ?>" method="post">
            <button class="btn btn-danger" type="submit">Supprimer</button>
            </form>
        </td>
    </tr>
<?php endforeach ?>
</tbody>
</table>