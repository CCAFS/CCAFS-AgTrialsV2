/**
 * The markers array.
 * @type {Object}
 */


/**
 * The MarkerClusterer object.
 * @type {MarkerCluster}
 */
var mc = null;

/**
 * The Map object.
 * @type {google.maps.Map}
 */
var map = null;

/**
 * The MarkerManager object.
 * @type {MarkerManager}
 */
var mgr = null;


/**
 * Marker Clusterer display/hide flag.
 * @type {boolean}
 */
var showMarketClusterer = false;

/**
 * Marker Manager display/hide flag.
 * @type {boolean}
 */
var showMarketManager = false;



//Toggles Marker Manager visibility.
function toggleMarkerManager() {
    showMarketManager = !showMarketManager;
    if (mgr) {
        if (showMarketManager) {
            mgr.addMarkers(markers.info, 0, 5);
            mgr.refresh();
        } else {
            mgr.clearMarkers();
            mgr.refresh();
        }
    } else {
        mgr = new MarkerManager(map, {
            trackMarkers: true,
            maxZoom: 10
        });
        google.maps.event.addListener(mgr, 'loaded', function () {
            mgr.addMarkers(markers.info, 0, 5);
            mgr.refresh();
        });
    }
}

//Toggles Marker Clusterer visibility.
function toggleMarkerClusterer() {
    showMarketClusterer = !showMarketClusterer;
    if (showMarketClusterer) {
        if (mc) {
            mc.addMarkers(markers.info);
        } else {
            mc = new MarkerClusterer(map, markers.info, {
                maxZoom: 10
            });
        }
    } else {
        mc.clearMarkers();
    }
}

function Legend(controlDiv) {
    // Set CSS styles for the DIV containing the control
    // Setting padding to 5 px will offset the control
    // from the edge of the map
    controlDiv.style.padding = '10px';

    // Set CSS for the control border
    var controlUI = document.createElement('DIV');
    controlUI.style.backgroundColor = '#FFF';
    controlUI.style.borderStyle = 'solid';
    controlUI.style.borderWidth = '0px';
    controlUI.style.borderRadius = '2px';
    controlUI.title = 'Legend';
    controlDiv.appendChild(controlUI);

    // Set CSS for the control text
    var controlText = document.createElement('DIV');
    controlText.style.fontFamily = 'Arial';
    controlText.style.fontSize = '9px';
    controlText.style.padding = '5px';
    controlText.style.textAlign = 'left';

    // Add the text
    controlText.innerHTML = '<span style="font-size: 10px; font-weight: bold;">Number of trials</span><br/><br/>' +
            '<span><img width="8" height="8"  style="padding-left: 4px;" src="/GoogleMapsV3/images/m0.png"/>&nbsp; 1</span><br/>' +
            '<span><img width="16" height="16" src="/GoogleMapsV3/images/m1.png"/> 2 - 10</span><br/>' +
            '<span><img width="16" height="16" src="/GoogleMapsV3/images/m2.png"/> 11 - 100</span><br/>' +
            '<span><img width="16" height="16" src="/GoogleMapsV3/images/m3.png"/> 101 - 1,000</span><br/>' +
            '<span><img width="16" height="16" src="/GoogleMapsV3/images/m4.png"/> 1,001 - 10,000</span><br/>' +
            '<span><img width="16" height="16" src="/GoogleMapsV3/images/m5.png"/> 10,001 - more</span><br/>';
    controlUI.appendChild(controlText);
}

/**
 * Initializes the map and listeners.
 */
function initialize() {

    map = new google.maps.Map(document.getElementById('map'), {
        center: new google.maps.LatLng(0, 10),
        zoom: 2,
        mapTypeId: google.maps.MapTypeId.TERRAIN
    });

    google.maps.event.addDomListener(document.getElementById('mc-cb'), 'click', toggleMarkerClusterer);
    google.maps.event.addDomListener(document.getElementById('mgr-cb'), 'click', toggleMarkerManager);

    var infowindow = new google.maps.InfoWindow();

    if (markers) {
        for (var level in markers) {
            for (var i = 0; i < markers[level].length; i++) {
                var details = markers[level][i];
                var Lat = details.lat;
                var Log = details.log;
                var Title = details.title;
                var Context = details.context;

                markers[level][i] = new google.maps.Marker({
                    title: Title,
                    context: Context,
                    position: new google.maps.LatLng(Lat, Log),
                    clickable: true,
                    draggable: false,
                    flat: true,
                    icon: '/images/GoogleMap/m0.png'
                });
                google.maps.event.addListener(markers[level][i], 'click', (function (marker, i) {
                    return function () {
                        var details = markers[level][i];
                        infowindow.setContent(details.context);
                        infowindow.open(map, markers[level][i]);
                    }
                })(markers[level][i], i));

            }
        }
    }
    mc = new MarkerClusterer(map, markers.info, {
        maxZoom: 5
    });

    // Create the legend and display on the map
    var legendDiv = document.createElement('DIV');
    var legend = new Legend(legendDiv, map);
    legendDiv.index = 1;
    map.controls[google.maps.ControlPosition.LEFT_BOTTOM].push(legendDiv);
}
google.maps.event.addDomListener(window, 'load', initialize);