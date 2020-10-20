<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/0.4.2/leaflet.draw.css"/>
<style>
#map {
height: 400px;
}
.my_polyline {
stroke: black;
fill: none;
stroke-dasharray: 10,5;
stroke-width: 4;
}
</style>
<div class="card mx-5 shadow"style="background-color: #fafafa">
  <h2 class="mx-auto titre">Voies férées </h2>
  <div class=" row col-12">
    
    <button id="inserer" class="btn btn-outline-success mb-1 ml-auto shadow"  data-toggle="modal" data-target="#addB" style="display: none;"> INSERER </button>
    
  </div>
  <div id="map"></div>
  <div class="modal fade" id="addB" tabindex="-1" role="dialog" aria-labelledby="formmodaleLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Nouvelle Voie</h5>
          
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" action="/and/railterrain/createsave">
            <input class="d-none" type="text" name="longueur"  id="longueur">
            <input class="d-none" type="text" name="GeoJson" id="result">
            <div class="form-group col-12">
              <label for="es_d">Espace Droit</label>
              <input type="text" class="form-control" id="es_d" name="espace_droit" placeholder="En Metre">
            </div>
            <div class="form-group col-12">
              <label for="es_g">Espace Gauche</label>
              <input type="text" class="form-control" id="es_g" name="espace_gauche" placeholder="En Metre">
            </div>
            
            <div class="form-group col-12">
              <label for="id_commune">Commune</label>
              <select id="id_commune" name="id_commune" class="form-control">
                <?php foreach ($params['communes'] as $commune) : ?>
                <option value="<?= $commune->id ?>"><?= $commune->nom_commune ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="form-group col-12 ">
              <label for="id_etat_ph">Etat</label>
              <select id="id_etat" name="id_etat_ph" class="form-control">
                <?php foreach ($params['etatPhs'] as $etat) : ?>
                <option value="<?= $etat->id ?>"><?= $etat->libelle_eta_ph ?></option>
                <?php endforeach ?>
              </select>
            </div>
          </div>
          
          <button onclick="getrail()" type="submit" class="btn btn-success mx-auto mb-2" >Inserer</button>
        </form>
        <div>
        </div>
      </div>
    </div>
  </div>
</div>

</div>
<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/0.4.2/leaflet.draw.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>

var mapquest = new L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
maxZoom: 17,
minZoom:8,

attribution: 'sntf_patrimoine'
});
map = new L.Map('map', {
center: new L.LatLng(36.7679,3.0572),
zoom: 10,
layers: [mapquest]
});
$(document).ready(function() {
$.ajaxSetup({cache:false});
getrail();
});
function getrail() {
$.getJSON("/rail/get.php", function (data) {
for (var i = 0; i < data.length; i++) {
var id=data[i].id;
var pg=data[i].GeoJson;
var ln=data[i].longueur;
var es_d=data[i].espace_droit;
var es_g=data[i].espace_gauche;
var cme = data[i].nom_commune;
var daira = data[i].nom_daira;
var wilaya = data[i].nom_wilaya;
var etat = data[i].libelle_eta_ph;
r=JSON.parse(pg);
var drawnItems = L.geoJSON(r,{className: 'my_polyline' }).addTo(map);
var detail="<div style='font-size: 15px; color: #333;'><p>"+wilaya+"/"+daira+"/"+cme+"</p></div>"+

"<div><p>Etat : "+etat+ "</p></div>"+
"<div><p>Espace droite : "+es_d+ "</p><p>Espace gouche :"+es_g+ "</p></div>";

drawnItems.bindPopup("<span style='font-size:18px; color: #093852;'><span style='font-size: 18px; color: #093852;'>"+detail+"Longueur :"+ln+"</span><br><button class='btn btn-sm btn-danger mt-4 mb-1 mx-auto shadow' onclick='supp("+id+")'>supprimer</button>", {maxWidth: '400'});



}
});
}

function supp(id){
        var dataString = '&id='+ id ;
        $.ajax({
          type: "POST",
          url: "/rail/delete.php",
          data: dataString,
          success: function() {
  
            getrail();
            location.reload(true);
          
          }
        });
}


// FeatureGroup is to store editable layers
var drawnItems = new L.FeatureGroup();
map.addLayer(drawnItems);

var drawControl = new L.Control.Draw({
draw: {
polyline: {
allowIntersection: false, // Restricts shapes to simple polygons
drawError: {
color: '#e1e100', // Color the shape will turn when intersects
message: '<strong>Oh snap!<strong> you can\'t draw that!' // Message that will show when intersect
},
shapeOptions: {
color : 'black'
},

},
// disable toolbar item by setting it to false
polygon : false,
circle: false, // Turns off this drawing tool
rectangle: false,
marker: false,
},

edit: {
featureGroup: drawnItems
},
});
map.addControl(drawControl);
map.on('draw:created', function (event) {
var layer = event.layer,
feature = layer.feature = layer.feature || {};

feature.type = feature.type || "Feature";
var props = feature.properties = feature.properties || {};
document.getElementById("longueur").value = layer.measuredDistance();


document.getElementById("inserer").style.display = "block";
drawnItems.addLayer(layer);
document.getElementById("result").value = JSON.stringify(drawnItems.toGeoJSON());
});

/*
* Extends L.Polyline to retrieve measured distance.
*
* https://github.com/danimt/Leaflet.PolylineMeasuredDistance
*/
L.Polyline.prototype.measuredDistance = function (options) {
// Default options
this.defaultOptions = L.extend(this.defaultOptions || {}, {
metric: true
});
// Extend options
this.options = L.extend(this.defaultOptions, this.options, options);
var distance = 0,  coords = null, coordsArray = this._latlngs;
for (i = 0; i < coordsArray.length - 1; i++) {
coords = coordsArray[i];
distance += coords.distanceTo(coordsArray[i + 1]);
}
// Return formatted distance
return L.PolylineUtil.readableDistance(distance, this.options.metric);
};
L.PolylineUtil = {
readableDistance: function (distance, isMetric) {
var distanceStr;
if (isMetric) {
// show metres when distance is < 1km, then show km
if (distance > 1000) {
distanceStr = (distance  / 1000).toFixed(2) + ' km';
} else {
distanceStr = Math.ceil(distance) + ' m';
}
} else {
distance *= 1.09361;
if (distance > 1760) {
distanceStr = (distance / 1760).toFixed(2) + ' miles';
} else {
distanceStr = Math.ceil(distance) + ' yd';
}
}
return distanceStr;
}
};
</script>