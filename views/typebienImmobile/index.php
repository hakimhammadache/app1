<div class="card mx-5 shadow" style="background-color: #fafafa">
    <h2 class="mx-auto titre">Liste Type Biens Immobiles</h2>
    <?php if ($_SESSION['auth']['role'] === 'admin' ) :?>
    <div class=" row col-12">
        <div class="input-groupe col-6"><input type="text" id="search" class="form-control shadow" name="" placeholder="Recherche..."></div>
        <button class="btn btn-outline-success btn shadow ml-auto"
        type="button"
        data-toggle="modal"
        data-target="#type"
        data-title="Ajouter un type BIM"
        data-url="/and/typebienimmobile/createsave"
        data-enctype="multipart/form-data"
        data-value="false"
        >+Nouveau Type BIM
        </button>
        <?php endif ?>
    </div>
    <div class="table-responsive mt-1">
        <table class="table table-striped table-sm" >
            <thead class="table-dark">
  <tr>
    <th scope="col">ID</th>
    <th scope="col">Libelle Type BIM</th>
    <th scope="col">Actions</th>
  </tr> 
</thead>
<tbody>
<?php foreach ($params['Typebimmobiles'] as $Typebimmobile) :?>
    <tr>
        <th scope="row"><?=$Typebimmobile->id ?></th>
        <td id="tbim"><?=$Typebimmobile->libelle_tp_im ?></td>

        <td>
            <!--<a href="/typebienimmobile/<?= $Typebimmobile->id ?>" class="btn btn-success">plus</a>-->
        
            <button class="btn btn-secondary btn-sm" 
                        type="submit" 
                        data-toggle="modal"
                        data-target="#type"
                        data-title="Modification de: <?=$Typebimmobile->libelle_tp_im ?>"
                        data-libelle ="<?=$Typebimmobile->libelle_tp_im ?>"
                        data-url="/typebienimmobile/edit/<?= $Typebimmobile->id ?>"
                        data-value="true"
                        ><i class="fas fa-pencil-alt"></i>Editer
                </button>
            
        </td>
    </tr>
<?php endforeach ?>
</tbody>
</table>
    </div>


</div>
<nav class="row col-12 my-2">
            <ul class="pagination mx-auto">
                <li class="page-item disabled">
                    <a class="page-link" href="#">
                        <span>&laquo;</span>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>
                <li class="page-item active">
                    <a class="page-link" href="#">1</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">2</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">3</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">
                        <span>&raquo;</span>
                        <span class="sr-only">Next</span>
                    </a>
                </li>
            </ul>
        </nav>
            <!-- -------- modale modale ------ -->
  <div class="modal fade" id="type" tabindex="-1" role="dialog" aria-labelledby="formLabel" aria-hidden="true">
    <div class="modal-dialog" role="Bienmobile">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">  
        <?php include VIEWS . 'typebienImmobile/formT.php';?>
      </div>
      
    </div>
    </div>  
  </div>
  <!-- chaque index vieuw amporte son scripte -->
  <script src="<?= SCRIPTS . 'js' . DIRECTORY_SEPARATOR . 'ScriptModalAlltype.js' ?>"></script>
<script>
  
      const searchInput = document.getElementById("search");
      const rows = document.querySelectorAll("tbody tr");
      console.log(rows);
      searchInput.addEventListener("keyup", function (event) {
        const q = event.target.value.toLowerCase();
        rows.forEach((row) => {
         (row.querySelector("#tbim").textContent.toLowerCase().startsWith(q))
          
            ? (row.style.display = "table-row")
            : (row.style.display = "none");
        });
      });
  
</script>
