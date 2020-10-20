<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css" />  
<link rel="stylesheet" href="https://leaflet.github.io/Leaflet.markercluster/dist/MarkerCluster.css" />
<link rel="stylesheet" href="https://leaflet.github.io/Leaflet.markercluster/dist/MarkerCluster.Default.css" />

   <style>

      #map {width: 100%; height:450px; margin: auto;
       }
     .leaflet-popup-content-wrapper, .leaflet-popup-tip {
        background: #f7f7f7;
      }
      .leaflet-control-geoloc {
        background-image: url(img/location.png);
        -webkit-border-radius: 5px 5px 5px 5px;
        border-radius: 5px 5px 5px 5px;
      }
</style>


<div class="card bg-light mx-5 mb-1 shadow">
<h1 class="mx-auto titre" >Liste des Etablissements </h1>
  

<div class=" row col-12 mb-1" id="hdr">

  
  <div class="input-groupe col-12 col-md-3 mx-auto text-center">
  <button class="btn btn-outline-success  ml-auto shadow"   
            type="button" 
            data-toggle="modal"
            data-title="Ajouter un etablissement"
            data-target="#formmodale" 
            data-url="/and/etablisement/createsave">
            +Nouveau
  </button> 
  </div>
  <div class="input-groupe col-12 col-md-6 mx-auto text-center"><input type="text" id="search" class="form-control shadow" name="" placeholder="Recherche...">
  </div>
  <div class="col-12 col-md-3 mx-auto text-center">
   <button class="btn btn-secondary shadow" id="maps"><span class="d-none d-lg-inline"> Affichage </span>on Map</button>
   </div>
 
</div>
<table class="table table-striped table-sm" id="tableau">
<thead class="table-dark">
  <tr>
    
    <th scope="col">Nom Etablisement</th>
    <th scope="col">Longitude</th>
    <th scope="col">Lattitude</th>
    <th scope="col">commune</th>
    <th scope="col">wilaya</th>
    <th scope="col">Nature</th>
    <th scope="col">Etat Physique</th>
    <th scope="col">Actions</th>
  </tr>
</thead>
<tbody>
  <?php foreach ($params['etablisements'] as $etablisement) :?>
      <tr>

          <td class="text-capitalize" id="nm"><?=$etablisement->nom_etab ?></td>
          <td><?=$etablisement->localisation_lng ?></td>
          <td><?=$etablisement->localisation_lat ?></td>

          <?php foreach ($etablisement->getCommune() as $commune): ?>
            <td class="text-capitalize" id="cm"><?= $commune->nom_commune?></td>
          <?php endforeach ?>

           <?php foreach ($etablisement->getWilaya() as $wilaya): ?>
            <td class="text-capitalize" id="wl"><?= $wilaya->nom_wilaya?></td>
          <?php endforeach ?>

          <?php foreach ($etablisement->getNAtur() as $natur): ?>
            <td class="text-capitalize" id="nt"><?= $natur->libelle_nat_etab?></td>
          <?php endforeach ?>


          <?php foreach ($etablisement->getEtatph() as $etatph): ?>
            <td class="text-capitalize" id="etph"><?= $etatph->libelle_eta_ph ?></td>
          <?php endforeach ?>

          <td>


            <?php if ($_SESSION['auth']['role'] === 'user inventaire')  :?>
             <a href="/etablisement/<?= $etablisement->id ?>" class="btn btn-sm btn-info"><i class="fas fa-angle-double-right"></i></a>
     <?php endif ?>
        <?php if ($_SESSION['auth']['role'] === 'admin')  :?>
              <button class="btn btn-secondary btn-sm" 
                        type="submit" 
                        data-toggle="modal"
                        data-target="#formmodale"
                        data-title="Modification de: <?=$etablisement->nom_etab?>"
                        data-nom =" <?=$etablisement->nom_etab?>"
                        data-localisationlng ="<?=$etablisement->localisation_lng?>"
                        data-localisationlat ="<?=$etablisement->localisation_lat?>"
                        data-commune ="<?= $commune->id?>"
                        data-natur  = "<?= $natur->libelle_nat_etab?>"
                        data-etatph ="<?= $etatph->libelle_eta_ph ?>"
                        data-url="/etablisement/edit/<?=$etablisement->id ?>"
                        ><i class="fas fa-pencil-alt"></i>
                </button>
          
                 <?php endif ?>
              <!--<form class="d-inline" action="/etablisement/delete/<?= $etablisement->id ?>" method="post">
              <button class="btn btn-danger btn-sm" type="submit">Supprimer</button>
              </form>-->
          </td>
      </tr>
  <?php endforeach ?>
  </tbody>
  </table>

 </div> 
  <div id="mps">
    <div class="row col-12 mb-1">
    <div class="col-12 col-md-6 mx-auto text-center"> 
        <a href="#" onclick="$(initRegistration()); return false;"class="btn btn-outline-success">+Nouveau Etablissement</a>
    </div>
    <div class="col-12 col-md-6 mx-auto text-center">
        <button  class="btn  btn-secondary" id="table">Affichage dans une Table</button>
    </div>    
    </div>
<div id="map"></div>
 </div>

<!-- -------- modale modale ------ -->
  <div class="modal fade" id="formmodale" tabindex="-1" role="dialog" aria-labelledby="formmodaleLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">New message</h5>
     
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"> 
        
        <div>
          <?php include VIEWS . 'etablisement/form_modal.php';?>
        </div>
       
          
        </div>
        
        
      </div>
     
    </div>
    </div>  
  </div>


 





  <!-- chaque index vieuw amporte son scripte -->
  <script src="<?= SCRIPTS . 'js' . DIRECTORY_SEPARATOR . 'ScriptModalEtablisement.js' ?>"></script>
  <script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>
  <script src="https://api.tiles.mapbox.com/mapbox.js/plugins/leaflet-markercluster/v0.4.0/leaflet.markercluster.js"></script>

<script>
    $(document).ready( function () {
    $('#tableau').DataTable({
    info:false,
    searching:false

    });
} );
    </script>


  <script>
    $(document).ready(function(){
      $("#tableau").show();
      $("#hdr").show();
      $("#pagination").show();
      $("#mps").hide();
      

      $("#maps").click(function(){
       $("#tableau").hide();
       $("#hdr").hide();
       $("#pagination").hide();
      $("#mps").show();

      })
         $("#table").click(function(){
          $("#mps").hide();
       $("#tableau").show();
       $("#hdr").show();
       $("#pagination").show();
       
      })
      
    })
  </script>
<script>
  
      const searchInput = document.getElementById("search");
      const rows = document.querySelectorAll("tbody tr");
      console.log(rows);
      searchInput.addEventListener("keyup", function (event) {
        const q = event.target.value.toLowerCase();
        rows.forEach((row) => {
         (row.querySelector("#nm").textContent.toLowerCase().startsWith(q)||
         row.querySelector("#cm").textContent.toLowerCase().startsWith(q)||
         row.querySelector("#etph").textContent.toLowerCase().startsWith(q)||
         row.querySelector("#wl").textContent.toLowerCase().startsWith(q)||
         row.querySelector("#nt").textContent.toLowerCase().startsWith(q))
          
            ? (row.style.display = "table-row")
            : (row.style.display = "none");
        });
      });
  
</script>
<script type="text/javascript">
       var gareicone = L.icon({
    iconUrl: '../img/railway_station.png',
    iconSize: [30, 30] }); 

    var atelier = L.icon({
    iconUrl: '../img/atelier.png',
    iconSize: [30, 30] }); 

    var batiment = L.icon({
    iconUrl: '../img/batiment.png',
    iconSize: [30, 30] });  

      var map, newetab, etablissement, mapquest, firstLoad;

      firstLoad = true;

      //users = new L.FeatureGroup();
      etablissement = new L.MarkerClusterGroup({spiderfyOnMaxZoom: true, showCoverageOnHover: true, zoomToBoundsOnClick: true});
      newetab = new L.LayerGroup();

var mapquest = new L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {

  maxZoom: 17,
  minZoom:8,
  
    attribution: 'sntf_patrimoine'

});
      map = new L.Map('map', {
        center: new L.LatLng(36.7679,3.0572),
        zoom: 10,
        layers: [mapquest,etablissement,newetab]
      });


      

      map.addControl(new L.Control.Scale());

      //map.locate({setView: true, maxZoom: 3});

      $(document).ready(function() {
        $.ajaxSetup({cache:false});
        getetab();
      });

  

      function initRegistration() {
        map.addEventListener('click', onMapClick);
        $('#map').css('cursor', 'crosshair');
        return false;
      }

      function cancelRegistration() {
        newetab.clearLayers();
        $('#map').css('cursor', '');
        map.removeEventListener('click', onMapClick);
      }

      function getetab() {

        $.getJSON("etablissement/get_etablissement.php", function (data) {

         for (var i = 0; i < data.length; i++) {
            var location = new L.LatLng(data[i].localisation_lat, data[i].localisation_lng);
            var id = data[i].id;
            var name = data[i].nom_etab;
            var nat_etab = data[i].id_natur_etab;
            var l_nat_etab = data[i].libelle_nat_etab;
            var cme = data[i].nom_commune;
            var daira = data[i].nom_daira;
            var wilaya = data[i].nom_wilaya;
            var etat = data[i].libelle_eta_ph;
 
              if (nat_etab=="1") {
              var icone=gareicone; 
              }
              else if (nat_etab=="2") {

              var icone=atelier;               
              }
              else if (nat_etab=="3") {
              var icone=batiment;  
              };

                 var title = "<div style='font-size: 18px; color: #0078A8;'><a href='/etablisement/<?= $etablisement->id ?>'>"+l_nat_etab+":"+ data[i].nom_etab + "</a></div>";
                 var detail="<div style='font-size: 15px; color: #333;'><p>"+wilaya+"/"+daira+"/"+cme+"</p></div>"+
                      
                             "<div style='font-size: 18px; color: #333;'><p>Etat : "+etat+ "</p></div>"   ;


                  var marker = new L.Marker(location,{icon: icone}, {
              title: name
            });
                     marker.bindPopup("<div style=' margin-left: auto; margin-right: auto;width:200px'>"+ title +detail+"</div>", {maxWidth: '400'});
            etablissement.addLayer(marker);
    
          };
       
        }).complete(function() {
          if (firstLoad == true) {
            map.fitBounds(etablissement.getBounds());
            firstLoad = false;
          };
        });
      }

     


      function onMapClick(e) {
        var markerLocation = new L.LatLng(e.latlng.lat, e.latlng.lng);
        var marker = new L.Marker(markerLocation);
        newetab.clearLayers();
        newetab.addLayer(marker);
        var form =  '<form id="inputform" style="width:300px" enctype="multipart/form-data" class="well" method="POST" action="/and/etablisement/createsave" >'+
        '<div class="form-group col-12 px-0 mx-0">'+
      '<label for="nom_etab">Nom Etablissement</label>'+
      '<input type="text" class="form-control" id="nom_etab" name="nom_etab" placeholder="Nom_Etablissement">'+
        '</div>'+
      '<input style="display: none;" type="text" id="lat" name="localisation_lat" value="'+e.latlng.lat.toFixed(6)+'" />'+
        '<input style="display: none;" type="text" id="lng" name="localisation_lng" value="'+e.latlng.lng.toFixed(6)+'" />'+
               '<div class="form-group col-12 px-0 mx-0">'+
      '<label for="id_commune">Commune</label>'+
        '<select id="id_commune" name="id_commune" class="form-control">'+
        '<?php foreach ($params['communes'] as $commune) : ?>'+
          '<option value="<?= $commune->id ?>"><?= $commune->nom_commune ?></option>'+
        '<?php endforeach ?>'+
        '</select>'+
    '</div>'+
      '<div class="form-group col-12 col-md-12 px-0 mx-0">'+
      '<label for="id_natur_etab">Nature Etablissement </label>'+
        '<select id="id_natur_etab" name="id_natur_etab" class="form-control">'+
        '<?php foreach ($params['natureEtabls'] as $natureEtabl) : ?>'+
          '<option value="<?= $natureEtabl->id ?>"><?= $natureEtabl->libelle_nat_etab ?></option>'+
        '<?php endforeach ?>'+
        '</select>'+
    '</div>'+
    '<div class="form-group col-12 col-md-12 px-0 mx-0">'+
      '<label for="id_etat_ph">Etat Physique</label>'+
        '<select id="id_etat_ph" name="id_etat_ph" class="form-control">'+
        '<?php foreach ($params['etatPhs'] as $etatPh) : ?>'+
          '<option value="<?= $etatPh->id ?>"><?= $etatPh->libelle_eta_ph ?></option>'+
        '<?php endforeach ?>'+
        '</select>'+
    '</div>'
            +
                '<div class="row col-12">'+
                '<div class=" col-6" style="text-align:center;">'+'<button type="button" class="btn btn-secondary mx-auto text" onclick="cancelRegistration()">Cancel</button>'+
                '</div>'+
                '<div class="col-6" style="text-align:center;">'+'<button  type="submit" class="btn btn-primary" >Submit</button>'+'</div>'+
              '</div>'
              '</div>'    +
              '</form>';
        marker.bindPopup(form).openPopup();
      }
    </script>
</div>

