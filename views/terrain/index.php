<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/0.4.2/leaflet.draw.css"/>
<style>
#map {
height: 400px;
}
</style>
<div class="card mx-5 shadow"style="background-color: #fafafa">
    <h2 class="mx-auto titre">Listes des terrains</h2>
    <div class=" row col-12">
        
        <button id="inserer" class="btn btn-outline-success mb-1 ml-auto shadow"  data-toggle="modal" data-target="#addB" style="display: none;"> INSERER </button>
        
    </div>
    <div id="map"></div>
    <div class="modal fade" id="addB" tabindex="-1" role="dialog" aria-labelledby="formmodaleLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Nouveau terrain</h5>
                    
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="/and/terrain/createsave">
                        <input class="d-none" type="text" name="superficie"  id="surface">
                        <input class="d-none" type="text" name="GeoJson" id="result">
                        
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
                            <select id="id_etat" name="id_etat" class="form-control">
                                <?php foreach ($params['etatT'] as $etat) : ?>
                                <option value="<?= $etat->id ?>"><?= $etat->ibelle_etat ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    
                    <button onclick="getterrain()" type="submit" class="btn btn-success mx-auto mb-2" >Inserer</button>
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
getterrain();

});
function getterrain() {
$.getJSON("terrain_p/get.php", function (data) {
for (var i = 0; i < data.length; i++) {
var id=data[i].id;
var pg=data[i].GeoJson;
var sp=data[i].superficie;
var cme=data[i].nom_commune;
var daira = data[i].nom_daira;
var wilaya = data[i].nom_wilaya;
var etat = data[i].ibelle_etat;

var detail="<div style='font-size: 15px; color: #333;'><p>"+wilaya+"/"+daira+"/"+cme+"</p></div>"+

"<div><p>Etat : "+etat+ "</p></div>"   ;
r=JSON.parse(pg);
var drawnItems = L.geoJSON(r).addTo(map);
drawnItems.bindPopup("<span style='font-size:18px; color: #093852;'><span style='font-size: 18px; color: #093852;'>"+detail+"Superficie :</span>"+(sp/1000000)+"  KM² </span><br><button class='btn btn-sm btn-danger mt-4 mb-1 mx-auto shadow' onclick='supp("+id+")'>supprimer</button>", {maxWidth: '400'});
}
});
}
function supp(id){
        var dataString = '&id='+ id ;
        $.ajax({
          type: "POST",
          url: "/terrain_p/delete_t.php",
          data: dataString,
          success: function() {
            getterrain();
            location.reload(true);
          
          }
        });
}
// FeatureGroup is to store editable layers
var drawnItems = new L.FeatureGroup();
map.addLayer(drawnItems);
var drawControl = new L.Control.Draw({
draw: {
polygon: {
allowIntersection: false, // Restricts shapes to simple polygons
drawError: {
color: '#e1e100', // Color the shape will turn when intersects
message: '<strong>Oh snap!<strong> you can\'t draw that!' // Message that will show when intersect
},
shapeOptions: {
color: '#41AE76',
fillColor: '#41AE76'

},
},
// disable toolbar item by setting it to false
polyline: false,
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
document.getElementById("surface").value = L.GeometryUtil.geodesicArea(layer.getLatLngs()[0]);
feature.type = feature.type || "Feature";
var props = feature.properties = feature.properties || {};
drawnItems.addLayer(layer);
document.getElementById("result").value = JSON.stringify(drawnItems.toGeoJSON());
document.getElementById("inserer").style.display = "block";




});



</script>
<!--
<a href="/and/terrain/create" class="btn btn-success my-3">Une nouvelle terrain</a>
<table class="table">
<thead class="table-active">
    <tr>
        <th scope="col">#</th>
        <th scope="col">superficie</th>
        <th scope="col">etat terrain</th>
        <th scope="col">commune</th>
        <th scope="col">Actions</th>
    </tr>
</thead>
<tbody>
    <?php foreach ($params['terrains'] as $terrain) :?>
    <tr>
        <th scope="row"><?=$terrain->id ?></th>
        <td><?=$terrain->superficie ?></td>
        <?php foreach ($terrain->getEtat() as $etat) : ?>
        <td><?=$etat->ibelle_etat ?></td>
        <?php endforeach ?>
        <?php foreach ($terrain->getCommune() as $commune) : ?>
        <td><?=$commune->nom_commune ?></td>
        <?php endforeach ?>
        <td>
            <a href="/terrain/<?= $terrain->id ?>" class="btn btn-secondary">voir+</a>
            <a href="/terrain/edit/<?= $terrain->id ?>" class="btn btn-warning">Editer</a>
            <a href="/terrain/<?= $terrain->id ?>" class="btn btn-success">plus</a>
            <form class="d-inline" action="/terrain/delete/<?= $terrain->id ?>" method="post">
                <button class="btn btn-danger" type="submit">Supprimer</button>
            </form>
        </td>
    </tr>
    <?php endforeach ?>
</tbody>
</table>
-->