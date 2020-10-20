
<div class="card mx-5 shadow">
<h2 class="mx-auto titre">Gestion des Biens Immobiles</h2>

<div class=" row col-12">

  <div class="input-groupe col-6"><input type="text" id="search" class="form-control shadow" name="" placeholder="Recherche..."></div>
<?php if ( $_SESSION['auth']['role'] === 'user update') :?>
<button class="btn btn-outline-success  shadow ml-auto"
            type="button" 
            data-toggle="modal"
            data-target="#bimform" 
            data-title="Ajouter un Bien Immobile"
            data-url="/and/Bienimmobile/createsave"
            data-enctype="multipart/form-data"
            data-value="false"
            >+Nouveau Bien Immobile 
  </button>
<?php endif ?>
</div>
  <div class="table-responsive mt-1">
  <table class="table table-striped table-sm" id="tab" >
  <thead class="table-dark">
  <tr>

    <th scope="col">Nom Bien</th>
    <th scope="col">Type</th>
    <th scope="col">Etablisement</th>
    <th scope="col">Etat</th>
    <th scope="col">PCI</th>
    <th scope="col">AMRTS</th>
    <?php if ( $_SESSION['auth']['role'] === 'user update') :?>
    <th scope="col">Actions</th>
    <?php endif ?>
  </tr>
</thead>
<tbody>
<?php foreach ( $params['bims'] as $bim) :?>
    <tr>

        <td class="text-capitalize" id="nm"><?=$bim->nom_bien?></td>

        <?php foreach ($bim->getTypeBim() as $typebim): ?>
            <td class="text-capitalize" id="tp"><?= $typebim->libelle_tp_im?></td>
          <?php endforeach ?>

          <?php foreach ($bim->getEtablisement() as $etab): ?>
            <td class="text-capitalize" id="etb"><?= $etab->nom_etab ?></td>
          <?php endforeach ?>

            <?php foreach ($bim->getEtatph() as $etatph): ?>
            <td class="text-capitalize" id="etph"><?= $etatph->libelle_eta_ph ?></td>
          <?php endforeach ?>
                       <?php foreach ($bim->getPCI() as $pci): ?>
            <td class="text-capitalize" id="pi"><?= $pci->libelle_pci ?></td>
          <?php endforeach ?>
            <?php foreach ($bim->getAmm() as $amm): ?>
            <td class="text-capitalize" id="am"><?= $amm->libelle_tp_amm ?></td>
          <?php endforeach ?>
 <?php if ($_SESSION['auth']['role'] === 'user update')  :?>
          <td>
               <a href="/Bienimmobile/<?=$bim->id?>" class="btn btn-sm btn-info"><i class="fas fa-angle-double-right"></i></a>


             
                
              <button class="btn btn-secondary btn-sm" 
                        type="submit" 
                        data-toggle="modal"
                        data-target="#bimform"
                        data-title="Modification de: <?=$bim->nom_bien?>"
                        data-nom = "<?=$bim->nom_bien?>"
                        data-typebim ="<?=$typebim->id?>"
                        data-etatph ="<?=$etatph->id ?>"
                        data-etab ="<?=$etab->id ?>"
                        data-pci ="<?=$pci->id ?>"
                        data-amm ="<?=$amm->id ?>"
                        data-url="/Bienimmobile/edit/<?=$bim->id?>"
                        data-value="true"
                        ><i class="fas fa-pencil-alt"></i>
                </button>

                

                <form class="d-inline" action="/Bienimmobile/delete/<?= $bim->id ?>" method="post">
              <button class="btn btn-danger btn-sm" type="submit"><i class="fas fa-trash"></i></button>
              </form>

          
              <?php endif ?>
          </td>
      </tr>
      <?php endforeach ?>
  </tbody>
  </table>
  </div>

<!-- -------- modale modale ------ -->
  <div class="modal fade " id="bimform" tabindex="-1" role="dialog" aria-labelledby="formLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="Bienimmobile">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">  
        <?php include VIEWS . 'Bienimmobile/form.php';?>
      </div>
      
    </div>
    </div>  
  </div>
  <!-- chaque index vieuw amporte son scripte -->
  <script src="<?= SCRIPTS . 'js' . DIRECTORY_SEPARATOR . 'ScriptModalBienimmobile.js' ?>"></script>
  
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
         row.querySelector("#tp").textContent.toLowerCase().startsWith(q)||
         row.querySelector("#etph").textContent.toLowerCase().startsWith(q)||
         row.querySelector("#pi").textContent.toLowerCase().startsWith(q)||
         row.querySelector("#am").textContent.toLowerCase().startsWith(q)||
         row.querySelector("#etb").textContent.toLowerCase().startsWith(q))
          
            ? (row.style.display = "table-row")
            : (row.style.display = "none");
        });
      });
  
</script>