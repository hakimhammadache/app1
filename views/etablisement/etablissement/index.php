<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Map</title>

    <!-- Le styles -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
    crossorigin="anonymous">
    <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css" />
    <!--[if lte IE 8]><link type="text/css" rel="stylesheet" href="assets/leaflet/leaflet.ie.css" /><![endif]-->
   
<link rel="stylesheet" href="https://leaflet.github.io/Leaflet.markercluster/dist/MarkerCluster.css" />
<link rel="stylesheet" href="https://leaflet.github.io/Leaflet.markercluster/dist/MarkerCluster.Default.css" />

     
 

   <style>

      #map {width: 100%; height:400px; margin: auto; }
     .leaflet-popup-content-wrapper, .leaflet-popup-tip {
        background: #f7f7f7;
      }
      .leaflet-control-geoloc {
        background-image: url(img/location.png);
        -webkit-border-radius: 5px 5px 5px 5px;
        border-radius: 5px 5px 5px 5px;
      }
</style>
  

  </head>

  <body>
<div>
        <h3>Add to the map!</h3>
        <a href="#" onclick="$(initRegistration()); return false;"class="btn btn-primary">Go!</a>
  </div>


   <div class="col-12 mx-auto pt-5">
    
  <div id="map"></div>
</div>


    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>
   <script src="https://api.tiles.mapbox.com/mapbox.js/plugins/leaflet-markercluster/v0.4.0/leaflet.markercluster.js"></script>
     

  


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

var mapquest = new L.tileLayer('https://cartodb-basemaps-{s}.global.ssl.fastly.net/light_all/{z}/{x}/{y}.png', {

  maxZoom: 20,
  
    attribution: 'sntf_patrimoine'

});
      map = new L.Map('map', {
        center: new L.LatLng(36.7679,3.0572),
        zoom: 8,
        layers: [mapquest,etablissement,newetab]
      });

      // GeoLocation Control
      function geoLocate() {
        map.locate({setView: true, maxZoom: 17});
      }
      var geolocControl = new L.control({
        position: 'topright'
      });
      geolocControl.onAdd = function (map) {
        var div = L.DomUtil.create('div', 'leaflet-control-zoom leaflet-control');
        div.innerHTML = '<a class="leaflet-control-geoloc" href="#" onclick="geoLocate(); return false;" title="My location"></a>';
        return div;
      };
      

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

        $.getJSON("get_etablissement.php", function (data) {

         for (var i = 0; i < data.length; i++) {
            var location = new L.LatLng(data[i].localisation_lat, data[i].localisation_lng);
            var name = data[i].nom_etab;
            var nat_etab = data[i].id_natur_etab;
           
             
             
              if (nat_etab==1) {

              var icone=gareicone;
                
              }
              else if (nat_etab==2) {

              var icone=atelier;
                
              }
              else if (nat_etab==3) {

              var icone=batiment;
                
              };
             
                 var title = "<div style='font-size: 18px; color: #0078A8;'><a href='' target='_blank'>"+ data[i].name + "</a></div>";
                  var marker = new L.Marker(location,{icon: icone}, {
              title: name
            });
                     marker.bindPopup("<div style='text-align: center; margin-left: auto; margin-right: auto;'>"+ title +"</div>", {maxWidth: '400'});
            etablissement.addLayer(marker);

      
     
         
          };
       
        }).complete(function() {
          if (firstLoad == true) {
            map.fitBounds(etablissement.getBounds());
            firstLoad = false;
          };
        });
      }

      function insertetab() {
        
        var name = $("#name").val();
     
        var lat = $("#lat").val();
        var lng = $("#lng").val();
        var cmne = $("#cmne").val();
        var nat_etab = $("#nat_etab").val();
        var etat_phy = $("#etat_phy").val();
       
        if (name.length == 0) {
          alert("Name is required!");
          return false;
        }
       
        if (nat_etab.length == 0) {
          alert("nature etablissement required!");
          return false;
        }
        if (etat_phy.length == 0) {
          alert("Etat physique required!");
          return false;
        }
        var dataString = 'name='+ name +  '&lat=' + lat + '&lng=' + lng +'&cmne=' + cmne +'&nat_etab=' + nat_etab + '&etat_phy=' + etat_phy;
      
        $.ajax({
          type: "POST",
          url: "insert_etablissement.php",
          data: dataString,
          success: function() {
            alert("good");
            cancelRegistration();
            etablissement.clearLayers();
            getetab();
            $("#loading-mask").hide();
            $("#loading").hide();
            $('#insertSuccessModal').modal('show');
          }
        });
        return false;
      }


      function onMapClick(e) {
        var markerLocation = new L.LatLng(e.latlng.lat, e.latlng.lng);
        var marker = new L.Marker(markerLocation);
        newetab.clearLayers();
        newetab.addLayer(marker);
        var form =  '<form id="inputform" enctype="multipart/form-data" class="well">'+
              '<label><strong>Name:</strong></label>'+
              '<input type="text" class="span3" placeholder="Required" id="name" name="name" />'+
              '<input style="display: none;" type="text" id="lat" name="lat" value="'+e.latlng.lat.toFixed(6)+'" />'+
              '<input style="display: none;" type="text" id="lng" name="lng" value="'+e.latlng.lng.toFixed(6)+'" /><br><br>'+
              '<label><strong>commune:</strong></label>'+
              '<input type="text" class="span3" placeholder="Required" id="cmne" name="cmne" />'+
              '<label><strong>etat_phy:</strong></label>'+
              '<div class="row-fluid">'+
              '<label><strong>nature etablissement:</strong></label>'+
              '<input type="text" class="span3" placeholder="Required" id="nat_etab" name="nat_etab" />'+
              '<label><strong>etat_phy:</strong></label>'+
              '<input type="text" class="span3" placeholder="Required" id="etat_phy" name="etat_phy" />'+
                '<div class="span6" style="text-align:center;"><button type="button" class="btn" onclick="cancelRegistration()">Cancel</button></div>'+
                '<div class="span6" style="text-align:center;"><button type="button" class="btn btn-primary" onclick="insertetab()">Submit</button></div>'+
              '</div>'+
              '</form>';
        marker.bindPopup(form).openPopup();
      }
    </script>

  </body>
</html>
