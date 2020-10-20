<h1 class="mx-auto" >Listes des wilayas </h1>
<a href="/and/wilaya/create" class="btn btn-success my-3">Une nouvelle wilaya</a>
<table class="table">
<thead class="table-active">
  <tr>
    <th scope="col">#</th>
    <th scope="col">nom wilaya</th>
    <th scope="col">Actions</th>
  </tr>
</thead>
<tbody>
<?php foreach ($params['wilayas'] as $wilaya) :?>
    <tr>
        <th scope="row"><?=$wilaya->id ?></th>
        <td><?=$wilaya->nom_wilaya ?></td>

        <td>
            <!--<a href="/wilaya/<?= $wilaya->id ?>" class="btn btn-secondary">voir+</a>-->
            <a href="/wilaya/edit/<?= $wilaya->id ?>" class="btn btn-warning">Editer</a>
            <a href="/wilaya/<?= $wilaya->id ?>" class="btn btn-success">plus</a>
            <form class="d-inline" action="/wilaya/delete/<?= $wilaya->id ?>" method="post">
            <button class="btn btn-danger" type="submit">Supprimer</button>
            </form>
        </td>
    </tr>
<?php endforeach ?>
</tbody>
</table>
