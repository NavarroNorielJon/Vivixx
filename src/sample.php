<!DOCTYPE html>
<html>

    <head>
        <title>Update Information</title>
        <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="../style/bootstrap/bootstrap.min.css" media="screen, projection">
        <link type="text/css" rel="stylesheet" href="../style/style2.css" media="screen, projection">
        <link rel="stylesheet" href="../style/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="../style/form-elements.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script type="text/javascript" src="../script/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="../script/bootstrap/bootstrap.min.js"></script>
        <script src="../script/jquery.backstretch.min.js"></script>
        <script src="../script/bootstrap/jasny-bootstrap.js"></script>
        <script src="../script/retina-1.1.0.min.js"></script>
        <script src="../script/scripts.js"></script>
        <link type="text/css" rel="stylesheet" href="/leaflet/leaflet.css">
        <link type="text/css" rel="stylesheet" href="/leaflet/leaflet-search.min.css">
        <link type="text/css" rel="stylesheet" href="/style/style2.css" media="screen, projection"/>
        <script src="/leaflet/leaflet.js"></script>
        <script src="/leaflet/leaflet-search.min.js"></script>
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css"/>
        <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet-src.js"></script>

        <!-- Load Esri Leaflet from CDN -->
        <script src="https://unpkg.com/esri-leaflet@2.1.4"></script>

        <!-- Esri Leaflet Geocoder -->
        <link rel="stylesheet" href="https://unpkg.com/esri-leaflet-geocoder@2.2.12/dist/esri-leaflet-geocoder.css">
        <script src="https://unpkg.com/esri-leaflet-geocoder"></script>
    </head>

    <body>

        <div id="mapid" style="width: 100%; height: 500px;"></div>
        <input id="lat">
        <input id="lng">

        <script>
            var map = L.map('mapid').setView([
                16.4134367, 120.5858916
            ], 4);
            L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                maxZoom: 20,
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                id: 'mapbox.streets'
            }).addTo(map);
            map.doubleClickZoom.disable();
            var marker = new L.Marker([
                16.4134367, 120.5858916
            ], {draggable: true}).addTo(map);
            document.getElementById('lat').value = marker.getLatLng().lat;
            document.getElementById('lng').value = marker.getLatLng().lng;
            marker.on('drag', function () {
                document.getElementById('lat').value = marker.getLatLng().lat;
                document.getElementById('lng').value = marker.getLatLng().lng;
            });
            map.on('dblclick', function (event) {
                marker.setLatLng(event.latlng);
                marker.addTo(map);
                document.getElementById('lat').value = marker.getLatLng().lat;
                document.getElementById('lng').value = marker.getLatLng().lng;
            });
            var markersLayer = new L.LayerGroup();
            map.addLayer(markersLayer);
            var searchControl = L.esri.Geocoding.geosearch().addTo(map);

            // create an empty layer group to store the results and add it to the map
            var results = L.LayerGroup().addTo(map);

            // listen for the results event and add every result to the map
            searchControl.on("results", function (data) {
                results.clearLayers();
                for (var i = data.results.length - 1; i >= 0; i--) {
                    results.addLayer(L.marker(data.results[i].latlng));
                }
            });
        </script>
        <script type="text/javascript" src="../script/jquery.form.min.js"></script>
        <script type="text/javascript" src="../script/jquery.validate.min.js"></script>
        <script type="text/javascript" src="../script/additional-methods.min.js"></script>
        <script type="text/javascript" src="../script/alerts.js"></script>
        <script type="text/javascript" src="../script/popper.min.js"></script>
        <script type="text/javascript" src="../script/sweetalert.min.js"></script>
        <script type="text/javascript" src="../script/ajax.js"></script>
    </body>

</html>