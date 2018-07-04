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
    </head>

    <body>

        <div id="mapid" style="width: 100%; height: 500px;"></div>
        <input id="lat">
        <input id="lng">
        <form action="s.php" method="post">
            <div class="row">
                <script>
                    $(function () {
                        $('#department').change(function () {
                            $('#orig').hide();
                            $('#ash').hide();
                            $('#its').hide();
                            $('#nva').hide();
                            $('#main').hide();
                            $('#sec').hide();
                            $('#voa').hide();
                            $('#ve').hide();
                            $('#va').hide();
                            $('#' + $(this).val()).show();
                        });
                    });
                </script>
                <div class="form-group col">
                    <label for="department">Main Department</label>
                    <select class="custom-select form-group" name="department[]" id="department">
                        <option selected="selected" disabled="disabled">Choose your Department</option>
                        <option value="ash">Administration Support / HR</option>
                        <option value="its">IT Support</option>
                        <option value="main">Maintenance</option>
                        <option value="nva">Non-voice Account</option>
                        <option value="sec">Security</option>
                        <option value="ve">Video ESL</option>
                        <option value="va">Virtual Assistant</option>
                        <option value="voa">Voice Account</option>
                    </select>
                </div>

                <div class="form-group col">
                    <label for="position">Main Account</label>
                    <select class="custom-select form-group" name="account[]">
                        <optgroup id="orig">
                            <option selected="selected" disabled="disabled">Choose your Main Account</option>
                        </optgroup>

                        <optgroup id="ash" style="display:none">
                            <option value="HR Assistant">HR Assistant</option>
                            <option value="IDP Staff">IDP Staff</option>
                            <option value="Operations Support">Operations Support</option>
                            <option value="Springboard Staff">Springboard Staff</option>
                        </optgroup>

                        <optgroup id="its" style="display:none">
                            <option value="ICT Specialist">ICT Specialist</option>
                        </optgroup>

                        <optgroup id="nva" style="display:none">
                            <option value="April Writing">April Writing</option>
                            <option value="CL/IL">CL/IL</option>
                        </optgroup>

                        <optgroup id="voa" style="display:none">
                            <option value="ELANSO">ELANSO</option>
                            <option value="Phone ESL">Phone ESL</option>
                        </optgroup>

                        <optgroup id="ve" style="display:none">
                            <option value="First Future">First Future</option>
                            <option value="Key English">Key English</option>
                        </optgroup>

                        <optgroup id="va" style="display:none">
                            <option value="Drag and drop">Drag and drop</option>
                            <option value="Job Getter">Job Getter</option>
                        </optgroup>

                        <optgroup id="sec" style="display:none">
                            <option value="Security">Security</option>
                        </optgroup>

                        <optgroup id="main" style="display:none">
                            <option value="Housekeeping">Housekeeping</option>
                            <option value="Utility">Utility</option>
                        </optgroup>
                    </select>
                </div>
            </div>
            <div class="row">
                <script>
                    $(function () {
                        $('#department1').change(function () {
                            $('#orig1').hide();
                            $('#ash1').hide();
                            $('#its1').hide();
                            $('#nva1').hide();
                            $('#main1').hide();
                            $('#sec1').hide();
                            $('#voa1').hide();
                            $('#ve1').hide();
                            $('#va1').hide();
                            $('#' + $(this).val() + 1).show();
                        });
                    });
                </script>
                <div class="form-group col">
                    <label for="department">Secondary Department</label>
                    <select class="custom-select form-group" name="department[]" id="department1">
                        <option selected="selected" disabled="disabled">Choose your Department</option>
                        <option value="ash">Administration Support / HR</option>
                        <option value="its">IT Support</option>
                        <option value="main">Maintenance</option>
                        <option value="nva">Non-voice Account</option>
                        <option value="sec">Security</option>
                        <option value="ve">Video ESL</option>
                        <option value="va">Virtual Assistant</option>
                        <option value="voa">Voice Account</option>
                    </select>
                </div>

                <div class="form-group col">
                    <label for="position">Secondary Account</label>
                    <div class="input-group">
                        <select class="custom-select form-group" name="account[]">
                            <optgroup id="orig1">
                                <option selected="selected" disabled="disabled">Choose your Secondary Account</option>
                            </optgroup>

                            <optgroup id="ash1" style="display:none">
                                <option value="HR Assistant">HR Assistant</option>
                                <option value="IDP Staff">IDP Staff</option>
                                <option value="Operations Support">Operations Support</option>
                                <option value="Springboard Staff">Springboard Staff</option>
                            </optgroup>

                            <optgroup id="its1" style="display:none">
                                <option value="ICT Specialist">ICT Specialist</option>
                            </optgroup>

                            <optgroup id="nva1" style="display:none">
                                <option value="April Writing">April Writing</option>
                                <option value="CL/IL">CL/IL</option>
                            </optgroup>

                            <optgroup id="voa1" style="display:none">
                                <option value="ELANSO">ELANSO</option>
                                <option value="Phone ESL">Phone ESL</option>
                            </optgroup>

                            <optgroup id="ve1" style="display:none">
                                <option value="First Future">First Future</option>
                                <option value="Key English">Key English</option>
                            </optgroup>

                            <optgroup id="va1" style="display:none">
                                <option value="Drag and drop">Drag and drop</option>
                                <option value="Job Getter">Job Getter</option>
                            </optgroup>

                            <optgroup id="sec1" style="display:none">
                                <option value="Security">Security</option>
                            </optgroup>

                            <optgroup id="main1" style="display:none">
                                <option value="Housekeeping">Housekeeping</option>
                                <option value="Utility">Utility</option>
                            </optgroup>
                        </select>
                        <div class="input-group-append">
                            <button class="btn btn-success" type="button" onclick="addAccount()">
                                <i class="small material-icons">add</i>
                            </button>
                        </div>
                    </div>
                </div>


                <div class="form-group col" id="main1" style='display:none'>
                    <label for="position">Secondary Account</label>
                    <div class="input-group">
                        <select class="custom-select form-group" name="main[]">
                            <option selected="selected" disabled="disabled">Choose your Secondary Account</option>
                            <option value="Housekeeping">Housekeeping</option>
                            <option value="Utility">Utility</option>
                        </select>
                        <div class="input-group-append">
                            <button class="btn btn-success" type="button" onclick="addAccount()">
                                <i class="small material-icons">add</i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div id="new_acc"></div>
            <input type="submit" value="submit">
        </form>
        <script>
            var mymap = L.map('mapid').setView([
                16.4134367, 120.5858916
            ], 18);
            L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                maxZoom: 20,
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                id: 'mapbox.streets'
            }).addTo(mymap);
            mymap.doubleClickZoom.disable();
            var marker = new L.Marker([
                16.4134367, 120.5858916
            ], {draggable: true}).addTo(mymap);
            document.getElementById('lat').value = marker.getLatLng().lat;
            document.getElementById('lng').value = marker.getLatLng().lng;
            marker.on('drag', function () {
                document.getElementById('lat').value = marker.getLatLng().lat;
                document.getElementById('lng').value = marker.getLatLng().lng;
            });
            mymap.on('dblclick', function (event) {
                marker.setLatLng(event.latlng);
                marker.addTo(mymap);
                document.getElementById('lat').value = marker.getLatLng().lat;
                document.getElementById('lng').value = marker.getLatLng().lng;
            });
            var markersLayer = new L.LayerGroup();
            mymap.addLayer(markersLayer);
            var controlSearch = new L.Control.Search({
                position: 'topleft',
                layer: markersLayer,
                initial: false,
                zoom: 11,
                marker: false,
                textPlaceholder: 'Search...'
            });
            mymap.addControl(controlSearch);
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
