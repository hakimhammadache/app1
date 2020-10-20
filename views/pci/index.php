<div class="card mx-5 shadow" style="background-color: #fafafa">
    <h2 class="mx-auto titre">Liste Type PCI</h2>
    <?php if ($_SESSION['auth']['role'] === 'admin' || $_SESSION['auth']['role'] === 'user update') :?>
    <div class=" row col-12">
        <div class="input-groupe col-6"><input type="text" id="search" class="form-control shadow" name="" placeholder="Recherche..."></div>
        <button class="btn btn-outline-success btn shadow ml-auto"
        type="button"
        data-toggle="modal"
        data-target="#type"
        data-title="Ajouter PCI"
        data-url="/and/Pci/createsave"
        data-enctype="multipart/form-data"
        data-value="false"
        >+Nouveau PCI
        </button>
        <?php endif ?>
    </div>
    <div class="table-responsive mt-1">
        <table class="table table-striped table-sm" >

<thead class="table-dark">
  <tr>
    <th scope="col">ID</th>
    <th scope="col">Libelle Pci</th>
    <th scope="col">Actions</th>
  </tr>
</thead>
<tbody>
<?php foreach ($params['Pcis'] as $Pci) :?>
    <tr>
        <th scope="row"><?=$Pci->id ?></th>
        <td id="pc"><?=$Pci->libelle_pci  ?></td>

        <td>
        
            <!-- <a href="/Pci/<?= $Pci->id ?>" class="btn btn-success btn-sm">plus</a>-->
           
                    <button class="btn btn-secondary btn-sm" 
                        type="submit" 
                        data-toggle="modal"
                        data-target="#type"
                        data-title="Modification de: <?=$Pci->libelle_pci  ?>"
                        data-libelle ="<?=$Pci->libelle_pci  ?>"
                        data-url="/Pci/edit/<?=$Pci->id ?>"
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
        <?php include VIEWS . 'pci/form.php';?>
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
         (row.querySelector("#pc").textContent.toLowerCase().startsWith(q))
          
            ? (row.style.display = "table-row")
            : (row.style.display = "none");
        });
      });
  
</script>

