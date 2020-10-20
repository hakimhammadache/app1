  <div id="view">
  <h1 class="mx-auto" >Listes des dairas </h1>
    <button class="btn btn-danger" 
            type="button" 
            data-toggle="modal"
            data-target="#exampleModal" 
            data-method = "get"
            data-url="/and/daira/create">
            Une nouvelle dairas
    </button> 
  <table class="table">
  <thead class="table-active">
    <tr>
      <th scope="col">#</th>
      <th scope="col">nom dairas</th>
      <th scope="col">wilaya</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($params['dairas'] as $daira) :?>
      <tr>
          <th scope="row"><?=$daira->id ?></th>
          <td><?=$daira->nom_daira ?></td>
          <?php foreach ($daira->getWilaya() as $wilaya) : ?>
            <td><?=$wilaya->nom_wilaya ?></td>
          <?php endforeach ?>
  <td>
              <!--<a href="/dairas/<?= $daira->id ?>" class="btn btn-secondary">voir+</a>-->
                <button class="btn btn-warning" 
                        type="submit" 
                        data-toggle="modal"
                        data-target="#exampleModal"
                        data-method = "get"
                        data-url="/daira/edit/<?= $daira->id ?>">
                        Editer
                </button>
              <!--<a href="/daira/edit/<?= $daira->id ?>" class="btn btn-warning">Editer</a>-->
              <a href="/daira/<?= $daira->id ?>" class="btn btn-success">plus</a>
              <form class="d-inline" action="/daira/delete/<?= $daira->id ?>" method="post">
                <button class="btn btn-danger" type="submit">Supprimer</button>
              </form>
          </td>
      </tr>
  <?php endforeach ?>
  </tbody>
  </table>
  <button type="button" 
          class="btn btn-primary" 
          data-toggle="modal" 
          data-target="#exampleModal" 
          data-url="@mdo">
          Open modal for @mdo
  </button>
  <button type="button" 
          class="btn btn-primary" 
          data-toggle="modal" 
          data-target="#exampleModal" 
          data-url="@fat">
          Open modal for @fat
  </button>
  <button type="button" 
          class="btn btn-primary" 
          data-toggle="modal" 
          data-target="#exampleModal" 
          data-url="@getbootstrap">
          Open modal for @getbootstrap
  </button>
  <?php include VIEWS . 'daira/testm.php';?>
</div>
