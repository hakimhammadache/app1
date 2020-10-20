<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css" />
<style>
#map { height: 200px;width: 100% margin: auto; }


</style>
<div class="row col-12 mx-0 px-0 border">
    <div class="row col-lg-3 col-12  mx-0 px-0 border">
        <div class="col-lg-12 col-sm-6 text-center p-0" style="">
            <div id="map"></div>
        </div>
        <div class="col-lg-12 col-sm-6 shadow" >
            <h5 class="text-capitalize titre"><?= $params['Naturetablisement']->libelle_nat_etab ?>:<?= $params['etablisement']->nom_etab ?></h5>
            <p class="text-capitalize"><span class="font-weight-bold titre">Lat:</span><?= $params['etablisement']->localisation_lat ?> - <span class="font-weight-bold titre">Lng:</span><?= $params['etablisement']->localisation_lng ?></p>
            <p class="text-capitalize"></p>
            <p class="text-capitalize"><span class="font-weight-bold titre">Wilaya:</span><?= $params['wilaya']->nom_wilaya?></p>
            
            <p class="text-capitalize"><span class="font-weight-bold titre">Daira:</span><?= $params['daira']->nom_daira?></p>
            <p class="text-capitalize"><span class="font-weight-bold titre">Commune:</span><?= $params['commune']->nom_commune?></p>
            
            <p class="text-capitalize"><span class="font-weight-bold titre">Etat:</span><?= $params['EtatPhysique']->libelle_eta_ph?></p>
        </div>
    </div>
    <div class="col-lg-9 col-12 px-0 mx-0 shadow">
      
        <div class="card bg-light mx-1">
<h3 class="mx-auto titre" >*INVENTAIRE* </h3>

<div class=" row col-12">
  <div class="row form-groupe col-12">
    <div class="input-group col-6">
    <input type="text" id="search" class="form-control shadow" name="" placeholder="Recherche...">
    </div>
    <div class="ml-auto  col-6">
            <form class="row mx-auto text-center">
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="testpp"  name="ha" checked >
                    <label class="custom-control-label hvc" for="testpp">Biens mobiles</label>
                </div>
                <div class="custom-control custom-radio mr-2">
                    <input type="radio" class=" custom-control-input" id="testpp2" name="ha"  >
                    <label class="custom-control-label hvc" for="testpp2">Biens immobiles</label>
                </div>
                
                <div class="custom-control custom-radio mr-2">
                    <input type="radio" class=" custom-control-input" id="testpp1" name="ha"  >
                    <label class="custom-control-label hvc" for="testpp1">Documens</label>
                </div>
                
                
            </form>
        </div>
    </div>


  </div>

<table id="bn" class="table table-striped table-sm mt-1  " >
            <thead class="bg-light">
                <tr>
                    <!--<th scope="col">ID</th>-->
                    
                    <th scope="col">Nom Bien</th>
                    <th scope="col">Type</th>
                    <th scope="col">Etat</th>
                    <th scope="col">PCI</th>
                    <th scope="col">AMRTS</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ( $params['bm'] as $bm) :?>
                <tr>
                   <!-- <th scope="row"><?=$bm->id ?></th>-->
                    <td class="text-capitalize" id="nm"><?=$bm->nom_bien?></td>
                    <?php foreach ($bm->getTypeBm() as $typebm): ?>
                    <td class="text-capitalize" id="tp"><?= $typebm->libelle_tp_mob?></td>
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
                    
                    <td>
                        <a href="/lien/<?=$bm->id?>" class="btn btn-sm btn-info"><i class="fas fa-angle-double-right"></i></a>
                        <?php if ( $_SESSION['auth']['role'] === 'user update')  :?>
                        
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
                        ><i class="fas fa-pencil-alt"></i>Editer
                        </button>
                        
                        <form class="d-inline" action="/Bienmobile/delete/<?= $bm->id ?>" method="post">
                            <button class="btn btn-danger btn-sm" type="submit"><i class="fas fa-trash"></i>Supprimer</button>
                        </form>
                        
                        <?php endif ?>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        <table id="dcmnt" class="table table-striped table-sm mt-1" >
            <thead class="bg-light">
                <tr>
                    <!--<th scope="col">ID</th>-->
                    <th scope="col">Nom Document</th>
                    <th scope="col">Type</th>
                    <th scope="col">Actions</th>
                   
                </tr>
            </thead>
            <tbody>
                <?php foreach ( $params['docs'] as $doc) :?>
                <tr>
                    <!--<th scope="row"><?=$doc->id ?></th>-->
                    <td class="text-capitalize" id="nm"><?=$doc->nom_doc ?></td>
                    <?php foreach ($doc->getTypedoc() as $typeDoc): ?>
                    <td class="text-capitalize" id="tp"><?= $typeDoc->nom_doc?></td>
                    <?php endforeach ?>
                    <!--<?php foreach ($doc->getEtablisement() as $etab): ?>
                    <td class="text-capitalize" id="etb"><?= $etab->nom_etab ?></td>
                    <?php endforeach ?>-->
           
                    <td>
                        <form class="d-inline" action="/document/<?=$doc->id?>"  method="post" target="_blank">
                            <input type="hidden" name="pathfile" value="<?=$doc->pathfile?>">
                            <button class="btn btn-info btn-sm" type="submit"><i class="fas fa-angle-double-right"></i></button>
                        </form>
                        <?php if ($_SESSION['auth']['role'] === 'user update')  :?>
                        <button class="btn btn-warning btn-sm"
                        type="submit"
                        data-toggle="modal"
                        data-target="#docform"
                        data-title="Modification de : <?=$doc->nom_doc?>"
                        data-nom = "<?=$doc->nom_doc?>"
                        data-typedoc ="<?=$typeDoc->id?>"
                        data-etab ="<?=$etab->id ?>"
                        data-url="/document/edit/<?=$doc->id?>"
                        data-value="true"
                        ><i class="fas fa-pencil-alt"></i>Editer
                        </button>
                        <form class="d-inline" action="/document/delete/<?= $doc->id ?>" method="post">
                            <input type="hidden" name="pathfile" value="<?= $doc->pathfile ?>">
                            <button class="btn btn-danger btn-sm" type="submit"><i class="fas fa-trash"></i>Supprimer</button>
                        </form>
                        <?php endif ?>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        <table class="table table-striped table-sm mt-1" id="bnim">
            <thead class="bg-light">
                <tr>
                    <!--<th scope="col">ID</th>-->
                    <th scope="col">Nom Bien</th>
                    <th scope="col">Type</th>
                    <th scope="col">Etat</th>
                    <th scope="col">PCI</th>
                    <th scope="col">AMRTS</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ( $params['bims'] as $bim) :?>
                <tr>
                    <!--<th scope="row"><?=$bim->id ?></th>-->
                    <td class="text-capitalize" id="nm"><?=$bim->nom_bien?></td>
                    <?php foreach ($bim->getTypeBim() as $typebim): ?>
                    <td class="text-capitalize" id="tp"><?= $typebim->libelle_tp_im?></td>
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
                    <td>
                    
                        <a href="/Bienimmobile/<?=$bim->id?>" class="btn btn-sm btn-info"><i class="fas fa-angle-double-right"></i></a>
                        
                        <?php if ($_SESSION['auth']['role'] === 'user update')  :?>
                        
                        <button class="btn btn-warning btn-sm"
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
                        ><i class="fas fa-pencil-alt"></i>Editer
                        </button>
                        
                        <form class="d-inline" action="/Bienimmobile/delete/<?= $bim->id ?>" method="post">
                            <button class="btn btn-danger btn-sm" type="submit">Supprimer</button>
                        </form>
                        
                        <?php endif ?>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>

</div>




    </div>
    
</div>

<script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>
<script>
$(document).ready(function(){
$("#bn").show();
$("#dcmnt").hide();
$("#bnim").hide();
$("#testpp").click(function(){
$("#bn").show();
$("#dcmnt").hide();
$("#bnim").hide();
});
$("#testpp1").click(function(){
$("#bn").hide();
$("#dcmnt").show();
$("#bnim").hide();
});
$("#testpp2").click(function(){
$("#bn").hide();
$("#bnim").show();
$("#dcmnt").hide();
});
});
</script>
<script>
var mapquest = new L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
maxZoom: 20,
attribution: 'sntf_patrimoine'
});
var center = [<?php echo ($params['etablisement']->localisation_lat); ?>,<?php echo ($params['etablisement']->localisation_lng); ?>];
map = new L.Map('map', {
layers: [mapquest]
}).setView(center, 15);;
var marker = new L.Marker(center).addTo(map);

</script>