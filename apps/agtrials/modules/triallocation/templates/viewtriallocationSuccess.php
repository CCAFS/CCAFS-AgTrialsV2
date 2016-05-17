<link rel="stylesheet" type="text/css" media="screen" href="/bootstrapAdminThemePlugin/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" media="screen" href="/mqThickboxPlugin/css/thickbox.css" />
<link rel="stylesheet" type="text/css" media="screen" href="/bootstrapAdminThemePlugin/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" media="screen" href="/jquery-ui-1.11.4/jquery-ui.min.css" />
<link rel="stylesheet" type="text/css" media="screen" href="/jquery.alerts/jquery.alerts.css" />
<link rel="stylesheet" type="text/css" media="screen" href="/css/bootstrap-personalized.css" />
<link rel="stylesheet" type="text/css" media="screen" href="/css/main.css" />
<span class="Title">Check Trial Location</span>
<div class="Session" style="margin-top: 10px; margin-bottom: 10px;">
    <fieldset>
        <div class="row form-group control-type-text" style="margin-bottom: 0px;">
            <div class="col-sm-5 form-group control-type-text">
                <div class="col-sm-3">Id:</div>
                <div class="col-sm-6 control-type-text">
                    <?php echo $TbTriallocation[0]['id_triallocation']; ?>
                </div>
            </div>
            <div class="col-sm-6 form-group control-type-text">
                <div class="col-sm-3">Name:</div>
                <div class="col-sm-8 control-type-text">
                    <?php echo $TbTriallocation[0]['trlcname']; ?>
                </div>
            </div>
        </div>
        <div class="row form-group control-type-text" style="margin-bottom: 0px;">
            <div class="col-sm-5 form-group control-type-text">
                <div class="col-sm-3">Latitude:</div>
                <div class="col-sm-6 control-type-text">
                    <?php echo round($TbTriallocation[0]['trlclatitude'], 4) ?>
                </div>
            </div>
            <div class="col-sm-6 form-group control-type-text">
                <div class="col-sm-3">Longitude:</div>
                <div class="col-sm-8 control-type-text">
                    <?php echo round($TbTriallocation[0]['trlclongitude'], 4) ?>
                </div>
            </div>
        </div>  
        <div class="row form-group control-type-text" style="margin-bottom: 0px;">
            <div class="col-sm-5 form-group control-type-text">
                <div class="col-sm-3">Altitude:</div>
                <div class="col-sm-6 control-type-text">
                    <?php echo round($TbTriallocation[0]['trlcaltitude'], 4) ?>
                </div>
            </div>
            <div class="col-sm-6 form-group control-type-text">
                <div class="col-sm-3">Country:</div>
                <div class="col-sm-8 control-type-text">
                    <?php echo $TbTriallocation[0]['country']; ?>
                </div>
            </div>
        </div> 
        <div class="row form-group control-type-text" style="margin-bottom: 0px;">
            <div class="col-sm-5 form-group control-type-text">
                <div class="col-sm-3">District:</div>
                <div class="col-sm-6 control-type-text">
                    <?php echo $TbTriallocation[0]['district']; ?>
                </div>
            </div>
            <div class="col-sm-6 form-group control-type-text">
                <div class="col-sm-3">Sub-district:</div>
                <div class="col-sm-8 control-type-text">
                    <?php echo $TbTriallocation[0]['subdistrict']; ?>
                </div>
            </div>
        </div> 
        <div class="row form-group control-type-text" style="margin-bottom: 0px;">
            <div class="col-sm-5 form-group control-type-text">
                <div class="col-sm-3">Village:</div>
                <div class="col-sm-6 control-type-text">
                    <?php $TbTriallocation[0]['village']; ?>
                </div>
            </div>
        </div> 

        <div class="row form-group control-type-text" style="margin-left: 15px;">
            <head>
                <script type="text/javascript" src="/js/jquery-ui-1.11.3/jquery-1.11.3.min.js"></script>
                <script src="https://maps.googleapis.com/maps/api/js?v=3.20"></script>
            </head>
            <body onunload="GUnload()">
                <div id="map" style="width: 855px; height: 330px"></div>
                <script type="text/javascript">

                    var i_lat = <?php echo round($TbTriallocation[0]['trlclatitude'], 4); ?>;
                    var i_lon = <?php echo round($TbTriallocation[0]['trlclongitude'], 4); ?>;

                    var map = null;
                    var infoWindow = null;

                    function openInfoWindow(marker) {
                        var markerLatLng = marker.getPosition();
                        infoWindow.setContent(["<div>Latitud: " + markerLatLng.lat() + "<br>Longitud: " + markerLatLng.lng()].join(''));
                        infoWindow.open(map, marker);
                    }

                    function initialize() {
                        var myLatlng = new google.maps.LatLng(i_lat, i_lon);
                        var myOptions = {
                            zoom: 14,
                            center: myLatlng,
                            mapTypeId: google.maps.MapTypeId.HYBRID
                        }

                        map = new google.maps.Map($("#map").get(0), myOptions);

                        infoWindow = new google.maps.InfoWindow();

                        var marker = new google.maps.Marker({
                            position: myLatlng,
                            draggable: true,
                            map: map,
                            title: "Info"
                        });

                        google.maps.event.addListener(marker, 'click', function () {
                            openInfoWindow(marker);
                        });
                    }
                    $(document).ready(function () {
                        initialize();
                    });
                </script>
            </body>
        </div>
    </fieldset>    
</div>
