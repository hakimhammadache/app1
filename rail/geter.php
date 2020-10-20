<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/0.4.2/leaflet.draw.css"/>

<style>
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
}

li {
  float: left;
}

li a {
  display: block;
  padding: 8px;
  background-color: #dddddd;
}
#map {
    height: 400px;
}
</style>

<br>
<div id="map"></div>

<br>
<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/0.4.2/leaflet.draw.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
   <script src="https://api.tiles.mapbox.com/mapbox.js/plugins/leaflet-markercluster/v0.4.0/leaflet.markercluster.js"></script>

<script>

var map = L.map('map').setView([-6.584492, 106.806725], 13);
     L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
         attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
     }).addTo(map);
     
   $(document).ready(function() {
        $.ajaxSetup({cache:false});
        getetab();
      });

 function getetab() {

        $.getJSON("get.php", function (data) {
         for (var i = 0; i < data.length; i++) {
              var pg=data[i].GeoJson;
              r=JSON.parse(pg);
          var drawnItems = L.geoJSON(r).addTo(map);
           
             }
           });
         }



</script>
 