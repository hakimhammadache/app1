<a href="geter.php">parcourrir les terrains</a>

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
<div id='result' value=''></div>


<button id="convert"> ajouter a la base de donnée </button>
<br>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/0.4.2/leaflet.draw.css"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/0.4.2/leaflet.draw.js"></script>

<script>

var map = L.map('map').setView([-6.584492, 106.806725], 13);
     L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
         attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
     }).addTo(map);
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
        color: '#97009c'
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
    
    feature.type = feature.type || "Feature";
    var props = feature.properties = feature.properties || {};
    drawnItems.addLayer(layer);
     layer.bindPopup("youppiii").openPopup();
    
});


document.getElementById("convert").addEventListener("click", function () {
    var hasil = $('#result').html(JSON.stringify(drawnItems.toGeoJSON()));
    var cookieValue = document.getElementById('result').innerHTML;
    if (cookieValue === '{"type":"FeatureCollection","features":[]}') {
      alert("Empty...!");
    } else {
    	ajax_simpan();
    }
});
function ajax_simpan(){

	var hasil = (JSON.stringify(drawnItems.toGeoJSON(), null, null));
  alert(hasil);
  var datas= '&hasil='+ hasil; 
	$.ajax({
		url : "drow.php",
		type: "POST",
		data:datas,
		beforeSend: function(s){
			
			$('#result').html('pres');
		},
		success: function(data)
		{
      alert(datas);
			$('#result').html('ok');
		}
	});
}
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>