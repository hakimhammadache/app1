

<div class="row col-12 mx-0 px-0 border">
    <div class="row col-lg-3 col-12  mx-0 px-0 border">
      
        <div class="col-lg-12 col-sm-6 shadow ">
        </table>


            <h3 class="text-capitalize"><span class=" titre">Informations Bien</h3>

            <p class="text-capitalize"><span class="font-weight-bold titre">Nom:</span><?= $params['bim']->nom_bien?></p>

            <p class="text-capitalize"><span class="font-weight-bold titre">Type:</span><?= $params['Typebimobile']->libelle_tp_im?></p>
            
                 <p class="text-capitalize"><span class="font-weight-bold titre">Etat:</span><?= $params['EtatPhysique']->libelle_eta_ph?></p>
           <p class="text-capitalize"><span class="font-weight-bold titre">PCI:</span><?= $params['Pci']->libelle_pci?></p>
       
            <p class="text-capitalize"><span class="font-weight-bold titre">AMMR:</span><?= $params['Typeammor']->libelle_tp_amm?></p>
            

        </div>
    </div>
    <div class="col-lg-9 col-12 px-0 mx-0 shadow">

<div class="card bg-light mx-1">
<h3 class="mx-auto titre" >Les Documents de: <?= $params['bim']->nom_bien?> </h3>
<div class=" row col-12">
  <div class="input-groupe col-6"><input type="text" id="search" class="form-control shadow" name="" placeholder="Recherche..."></div>
 

      <?php if ($_SESSION['auth']['role'] === 'user update')  :?>
  <button class="btn btn-outline-success btn shadow ml-auto  "
            type="button" 
            data-toggle="modal"
            data-target="#docform" 
            data-bien="<?= $params['bim']->id?>" 
            data-etab ="<?= $params['bim']->id_etab?>"  
            data-title="Ajouter un document"
            data-url="/and/document/createsave"
            data-enctype="multipart/form-data"
            data-value="false"
            >+Nouveau Document 
  </button>
  <?php endif ?>

  </div>

      <table id="dcmnt" class="table table-striped table-sm mt-1" >
            <thead class="bg-light">
                <tr>

                    <th scope="col">Nom Document</th>
                    <th scope="col">Type</th>
                    <th scope="col">Actions<?php
 

?></th>


                                   </tr>
            </thead>
            <tbody>

                <?php foreach ( $params['docs'] as $doc) :?>

                <tr>

                    <td class="text-capitalize" id="nm"><?=$doc->nom_doc ?></td>
                    <?php foreach ($doc->getTypedoc() as $typeDoc): ?>
                    <td class="text-capitalize" id="tp"><?= $typeDoc->nom_doc?></td>
                    <?php endforeach ?>
                     <?php foreach ($doc->getEtablisement() as $etab): ?>
                    <td class="text-capitalize d-none" id="tp"><?= $etab->nom_etab?></td>
                    <?php endforeach ?>
                      <?php foreach ($doc->getBienimmobile() as $bim): ?>
                    <td class="text-capitalize d-none" id="tp"><?= $bim->nom_bien?></td>
                    <?php endforeach ?> 
                    <td>
                        <form class="d-inline" action="/document/<?=$doc->id?>"  method="post" target="_blank">
                            <input type="hidden" name="pathfile" value="<?=$doc->pathfile?>">
                            <button class="btn btn-info btn-sm" type="submit"><i class="fas fa-angle-double-right"></i></button>
                        </form>


                        <button class="btn btn-secondary btn-sm"
                        type="submit"
                        data-toggle="modal"
                        data-target="#docform"
                        data-title="Modification de : <?=$doc->nom_doc?>"
                        data-nom = "<?=$doc->nom_doc?>"
                        data-typedoc ="<?=$typeDoc->id?>"
                        data-etab ="<?=$etab->id ?>"
                        data-bien="<?= $params['bim']->id?>" 
                        data-url="/document/edit/<?=$doc->id?>"
                        data-value="true"
                        ><i class="fas fa-pencil-alt"></i>
                        </button>
                        <form class="d-inline" action="/document/delete/<?= $doc->id ?>" method="post">
                            <input type="hidden" name="pathfile" value="<?= $doc->pathfile ?>">
                            <button class="btn btn-danger btn-sm" type="submit"><i class="fas fa-trash"></i></button>
                        </form>
                     
                    </td>
                    <td></td>
                  
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>  
     </div>   
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
        <?php include VIEWS . 'Bienimmobile/doc.php';?>
      </div>
      
    </div>
    </div>  
  </div>

  <script src="<?= SCRIPTS . 'js' . DIRECTORY_SEPARATOR . 'ScriptModalDocuments.js' ?>"></script>
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