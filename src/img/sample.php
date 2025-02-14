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
        <script src="../script/scripts.js"></script>
        <link type="text/css" rel="stylesheet" href="/leaflet/leaflet.css">
        <link type="text/css" rel="stylesheet" href="/style/style2.css" media="screen, projection"/>
        <script src="/leaflet/leaflet.js"></script>
        <link rel="stylesheet" href="../leaflet/leaflet.css"/>
        <script src="/leaflet/leaflet-src.js"></script>
        <script src="/leaflet/esri-leaflet-debug.js"></script>
        <link rel="stylesheet" href="/leaflet/esri-leaflet-geocoder.css">
        <script src="/leaflet/esri-leaflet-geocoder-debug.js"></script>
        <!-- <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css"/> <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet-src.js"></script> <script src="https://unpkg.com/esri-leaflet@2.1.4"></script> <link rel="stylesheet"
        href="https://unpkg.com/esri-leaflet-geocoder@2.2.12/dist/esri-leaflet-geocoder.css"> <script src="https://unpkg.com/esri-leaflet-geocoder"></script> -->
    </head>

    <body>

        <div id="mapid" style="width: 100%; height: 500px;"></div>
        <input id="lat">
        <input id="lng">

        <script>
            var map = L.map('mapid').setView([
                16.4134367, 120.5858916
            ], 2);
            L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'}).addTo(map);
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

            var searchControl = L.esri.Geocoding.geosearch().addTo(map);
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
