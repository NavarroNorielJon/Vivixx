<!DOCTYPE html>
<html>

    <head>
        <title>Update Information</title>
        <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="/leaflet/leaflet.css">
        <link type="text/css" rel="stylesheet" href="/leaflet/leaflet-search.min.css">
        <link type="text/css" rel="stylesheet" href="/style/style2.css" media="screen, projection"/>
        <script src="/leaflet/leaflet.js"></script>
        <script src="/leaflet/leaflet-search.min.js"></script>
    </head>

    <body>

        <div id="mapid" style="width: 100%; height: 500px;"></div>
        <input id="lat">
        <input id="lng">
        <script>
            var mymap = L.map('mapid').setView([16.4134367, 120.5858916], 18);
            L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                maxZoom: 18,
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                id: 'mapbox.streets'
            }).addTo(mymap);
            mymap.doubleClickZoom.disable();
            var marker = new L.Marker([16.4134367, 120.5858916],{
                draggable : true,

            }).addTo(mymap);
            document.getElementById('lat').value = marker.getLatLng().lat;
            document.getElementById('lng').value = marker.getLatLng().lng;
            marker.on('drag',function (){
                document.getElementById('lat').value = marker.getLatLng().lat;
                document.getElementById('lng').value = marker.getLatLng().lng;
            });
            mymap.on('dblclick', function(event){
                marker.setLatLng(event.latlng);
                marker.addTo(mymap);
                document.getElementById('lat').value = marker.getLatLng().lat;
                document.getElementById('lng').value = marker.getLatLng().lng;
            });
            var markersLayer = new L.LayerGroup();
            mymap.addLayer(markersLayer);
            var controlSearch = new L.Control.Search({
                position:'topleft',
                layer: markersLayer,
                initial: false,
                zoom: 11,
                marker: false,
                textPlaceholder: 'Search...' 
              });
            mymap.addControl(controlSearch);



        </script>

    </body>

</html>
