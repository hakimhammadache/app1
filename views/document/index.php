<link rel="stylesheet" href="<?= SCRIPTS . 'css' . DIRECTORY_SEPARATOR . 'jquery.dataTables.min.css' ?>">
<style>
  .dataTables_length{
    display: none;
  }
</style>
 <div class="card mx-5 shadow"style="background-color: #fafafa">
<h2 class="mx-auto titre">Gestion des Documents</h2>

  <div class=" row col-12">
<div class="input-groupe col-6"><input type="text" id="search" class="form-control shadow" name="" placeholder="Recherche..."></div>

 <?php if ( $_SESSION['auth']['role'] === 'user update')  :?>
<button class="btn btn-outline-success btn-sm my-2 ml-auto shadow"
            type="button" 
            data-toggle="modal"
            data-target="#docform" 
            data-title="Ajouter un document"
            data-url="/and/document/createsave"
            data-enctype="multipart/form-data"
            data-value="false"
            >+Nouveau Document 
  </button>
  <?php endif ?>
</div>

  <div class="table-responsive  mt-1">

  <table class="table table-striped table-sm" id="tab">
  <thead class="thead-dark">
  <tr>

    <th scope="col">Nom Document</th>
    <th scope="col">Type</th>
     <?php if ($_SESSION['auth']['role'] === 'admin')  :?>
  <th scope="col">Etablisement</th>
    <?php endif ?>
    <th scope="col">Actions</th>
  </tr>
</thead>
<tbody>
<?php foreach ( $params['docs'] as $doc) :?>
    <tr>

        <td class="text-capitalize" id="nm"><?=$doc->nom_doc ?></td>

        <?php foreach ($doc->getTypedoc() as $typeDoc): ?>
            <td class="text-capitalize" id="tp"><?= $typeDoc->nom_doc?></td>
          <?php endforeach ?>

  <?php if ($_SESSION['auth']['role'] === 'admin')  :?>
          <?php foreach ($doc->getEtablisement() as $etab): ?>
            <td class="text-capitalize" ><?= $etab->nom_etab ?></td>
          <?php endforeach ?>
  <?php endif ?>
          <td>
              <form class="d-inline" action="/document/<?=$doc->id?>"  method="post" target="_blank">
                  <input type="hidden" name="pathfile" value="<?=$doc->pathfile?>">
                <button class="btn btn-info btn-sm" type="submit"><i class="fas fa-angle-double-right"></i></button>
              </form>
 <?php if ($_SESSION['auth']['role'] === 'user update')  :?>
             
              <button class="btn btn-secondary btn-sm" 
                        type="submit" 
                        data-toggle="modal"
                        data-target="#docform"
                        data-title="Modification de : <?=$doc->nom_doc?>"
                        data-nom = "<?=$doc->nom_doc?>"
                        data-typedoc ="<?=$typeDoc->id?>"
                        data-etab ="<?=$etab->id ?>"
                        data-url="/document/edit/<?=$doc->id?>"
                        data-value="true"
                        ><i class="fas fa-pencil-alt"></i>
                </button>

              <form class="d-inline" action="/document/delete/<?= $doc->id ?>" method="post">
                <input type="hidden" name="pathfile" value="<?= $doc->pathfile ?>">
                <button class="btn btn-danger btn-sm" type="submit"><i class="fas fa-trash"></i></button>
              </form>
  <?php endif ?>           
          </td>
      </tr>
      <?php endforeach ?>
  </tbody>
  </table>


<!-- -------- modale modale ------ -->
  <div class="modal fade" id="docform" tabindex="-1" role="dialog" aria-labelledby="docformLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">  
        <?php include VIEWS . 'document/form.php';?>
      </div>
      
    </div>
    </div>  
  </div>

  <!-- chaque index vieuw amporte son scripte -->
  <script src="<?= SCRIPTS . 'js' . DIRECTORY_SEPARATOR . 'ScriptModalDocuments.js' ?>"></script>
   <script src="<?= SCRIPTS . 'js' . DIRECTORY_SEPARATOR . 'jquery.dataTables.min.js' ?>"></script>
</div>



<script>
    $(document).ready( function () {
    $('#tab').DataTable({
    info:false,
    searching:false

    });
} );
    </script>
 <script>
   
      const searchInput = document.getElementById("search");
      const rows = document.querySelectorAll("tbody tr");
      console.log(rows);
      searchInput.addEventListener("keyup", function (event) {
        const q = event.target.value.toLowerCase();
        rows.forEach((row) => {
         (row.querySelector("#nm").textContent.toLowerCase().startsWith(q)||
         row.querySelector("#tp").textContent.toLowerCase().startsWith(q))
          
            ? (row.style.display = "table-row")
            : (row.style.display = "none");
        });
      });
  
 </script>