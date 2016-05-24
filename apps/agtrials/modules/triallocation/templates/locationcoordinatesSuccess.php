<link rel="stylesheet" type="text/css" media="screen" href="/bootstrapAdminThemePlugin/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" media="screen" href="/mqThickboxPlugin/css/thickbox.css" />
<link rel="stylesheet" type="text/css" media="screen" href="/bootstrapAdminThemePlugin/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" media="screen" href="/jquery-ui-1.11.4/jquery-ui.min.css" />
<link rel="stylesheet" type="text/css" media="screen" href="/jquery.alerts/jquery.alerts.css" />
<link rel="stylesheet" type="text/css" media="screen" href="/css/bootstrap-personalized.css" />
<link rel="stylesheet" type="text/css" media="screen" href="/css/main.css" />

<script type="text/javascript">
    getcoordenadas();
    function getcoordenadas() {
        var inilatitudedecimal = parent.document.getElementById('tb_triallocation_trlclatitude').value;
        var inilongitudedecimal = parent.document.getElementById('tb_triallocation_trlclongitude').value;
        if (inilatitudedecimal == '' || inilongitudedecimal == '') {
            alert('*** IMPORTANT *** \n\n Before specify coordinates near!');
            self.parent.tb_remove();
        }
    }
    function enviar(lat, lon, alt) {
        parent.document.getElementById("tb_triallocation_trlclatitude").value = lat;
        parent.document.getElementById("tb_triallocation_trlclongitude").value = lon;
        parent.document.getElementById("tb_triallocation_trlcaltitude").value = document.getElementById("altitude").value;
        self.parent.tb_remove();
    }
</script>
<head>
    <script type="text/javascript" src="/js/jquery-1.11.3.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.20"></script>
</head>

<body onunload="GUnload()">
    <span class="Title">Trial Location Coordinates</span>
    <form><input name="altitude" id="altitude" type="hidden"></form>
    <div id="map" style="width: 820px; height: 538px"></div>
    <script type="text/javascript">

        var i_lat = parseFloat(parent.document.getElementById('tb_triallocation_trlclatitude').value);
        var i_lon = parseFloat(parent.document.getElementById('tb_triallocation_trlclongitude').value);

        var map = null;
        var infoWindow = null;

        function openInfoWindow(marker) {
            var markerLatLng = marker.getPosition();
            var Lat = Math.round(markerLatLng.lat() * 10000) / 10000;
            var Lon = Math.round(markerLatLng.lng() * 10000) / 10000;
            var Alt = document.getElementById("altitude").value;


            infoWindow.setContent(["<div style='width: 180px; height: 50px;'><b>Latitud:</b> " + Lat + "<br><b>Longitud:</b> " + Lon + "<br><b>Altitude:</b> " + Alt + "</div> <br> <input type='button' onclick='enviar(" + Lat + "," + Lon + "," + Alt + ")' value='Send & Close'>"].join(''));
            infoWindow.open(map, marker);
        }

        function initialize() {
            var myLatlng = new google.maps.LatLng(i_lat, i_lon);
            var lat = i_lat + 0.0050;
            var lon = i_lon - 0.0090;
            var myOptions = {
                center: new google.maps.LatLng(lat, lon),
                zoom: 16,
                mapTypeId: google.maps.MapTypeId.HYBRID
            }

            map = new google.maps.Map($("#map").get(0), myOptions);

            infoWindow = new google.maps.InfoWindow();

            var marker = new google.maps.Marker({
                position: myLatlng,
                draggable: true,
                map: map,
                title: "Choose your Trial Location"
            });

            google.maps.event.addListener(marker, 'mouseout', function () {
                getElevation(marker);
            });

            google.maps.event.addListener(marker, 'click', function () {
                openInfoWindow(marker);
            });

            // Create an ElevationService
            elevationService = new google.maps.ElevationService();
            getElevation(marker);

        }

        function getElevation(marker) {
            var locations = [];
            var Elevation = '';
            // Retrieve the clicked location and push it on the array
            var clickedLocation = marker.getPosition();
            locations.push(clickedLocation);

            // Create a LocationElevationRequest object using the array's one value
            var positionalRequest = {
                'locations': locations
            }
            // Initiate the location request
            elevationService.getElevationForLocations(positionalRequest, function (results, status) {
                if (status == google.maps.ElevationStatus.OK) {
                    if (results[0]) {
                        var Elevation = parseFloat(results[0].elevation.toFixed(1));
                        document.getElementById("altitude").value = Elevation;
                    }
                }
            });
        }
        $(document).ready(function () {
            initialize();
        });
    </script>
</body>