


<div id="print" class="card mx-5 shadow" style="background-color: #fafafa">
    <?php if ( $_SESSION['auth']['role'] === 'user inventaire') :?>
<h2 class="mx-auto titre">*Inventaire des Biens Mobiles*</h2>
  <?php endif ?>
  <?php if ( $_SESSION['auth']['role'] === 'user update') :?>
<h2 class="mx-auto titre">Gestion des Biens Mobiles</h2>
  <?php endif ?>

<div class=" row col-12">

  <div class="input-groupe col-6 d-print-none"><input type="text" id="search" class="form-control shadow" name="" placeholder="Recherche..."></div>
<?php if ( $_SESSION['auth']['role'] === 'user update') :?>
<button class="btn btn-outline-success shadow  ml-auto"
            type="button" 
            data-toggle="modal"
            data-target="#bmform" 
            data-title="Ajouter un Bien mobile"
            data-url="/and/Bienmobile/createsave"
            data-enctype="multipart/form-data"
            data-value="false"
            >+Nouveau Bien Mobile 
  </button>
  <?php endif ?>
  <?php if ( $_SESSION['auth']['role'] === 'user inventaire') :?>
   <button class="btn btn-outline-success btn-sm my-2 ml-auto shadow btncard d-print-none" onclick="printDiv('print') ">IMPRIMER</button>
<?php endif ?>
</div>
  <div  class=" mt-1" >
  <table  class="table table-striped table-sm " id="tab">
  <thead class="table-dark">
  <tr>

    <th scope="col">Nom Bien</th>
    <th scope="col">Type</th>
    <th scope="col">Etablissement</th>
    <th scope="col">Etat</th>
    <th scope="col">PCI</th>
    <th scope="col">AMRTS</th>
    <?php if ( $_SESSION['auth']['role'] === 'user update') :?>
    <th scope="col">Actions</th>
    <?php endif ?>
  </tr>
</thead>
<tbody>
<?php foreach ( $params['bms'] as $bm) :?>
    <tr>
     
        <td class="text-capitalize" id="nm"><?=$bm->nom_bien?></td>

        <?php foreach ($bm->getTypeBm() as $typebm): ?>
            <td class="text-capitalize" id="tp"><?= $typebm->libelle_tp_mob?></td>
          <?php endforeach ?>

          <?php foreach ($bm->getEtablisement() as $etab): ?>
            <td class="text-capitalize" id="etb"><?= $etab->nom_etab ?></td>
          <?php endforeach ?>

            <?php foreach ($bm->getEtatph() as $etatph): ?>
            <td class="text-capitalize" id="etph"><?= $etatph->libelle_eta_ph ?></td>
          <?php endforeach ?>
             <?php foreach ($bm->getPCI() as $pci): ?>
            <td class="text-capitalize" id="pi"><?= $pci->libelle_pci ?></td>
          <?php endforeach ?>
            <?php foreach ($bm->getAmm() as $amm): ?>
            <td class="text-capitalize" id="am"><?= $amm->libelle_tp_amm ?></td>
          <?php endforeach ?>
          
              <?php if ($_SESSION['auth']['role'] === 'user update')  :?>
          <td>

              <a href="/lien/<?=$bm->id?>" class="btn btn-sm btn-info"><i class="fas fa-angle-double-right"></i></a>


                
              <button class="btn btn-secondary btn-sm" 
                        type="submit" 
                        data-toggle="modal"
                        data-target="#bmform"
                        data-title="Modification de: <?=$bm->nom_bien?>"
                        data-nom = "<?=$bm->nom_bien?>"
                        data-numero ="<?=$bm->numero?>"
                        data-typebm ="<?=$typebm->id?>"
                        data-etatph ="<?=$etatph->id ?>"
                        data-etab ="<?=$etab->id ?>"
                        data-pci ="<?=$pci->id ?>"
                        data-amm ="<?=$amm->id ?>"
                        data-url="/Bienmobile/edit/<?=$bm->id?>"
                        data-value="true"
                        ><i class="fas fa-pencil-alt"></i>
                </button>

                

                <form class="d-inline" action="/Bienmobile/delete/<?= $bm->id ?>" method="post">
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
  <div class="modal fade" id="bmform" tabindex="-1" role="dialog" aria-labelledby="formLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="Bienmobile">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">  
        <?php include VIEWS . 'Bienmobile/form.php';?>
      </div>
      
    </div>
    </div>  
  </div>
  <!-- chaque index vieuw amporte son scripte -->
  <script src="<?= SCRIPTS . 'js' . DIRECTORY_SEPARATOR . 'ScriptModalBienmobile.js' ?>"></script>

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
  <script>
       function printDiv(divName){
      var printContents = document.getElementById(divName).innerHTML;
      var originalContents = document.body.innerHTML;
      document.body.innerHTML = printContents;
      window.print();
      document.body.innerHTML = originalContents;
    }
  </script>
  
