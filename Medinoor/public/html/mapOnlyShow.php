<!DOCTYPE html>
<html>
<head>
    <meta charset=utf-8 />
    <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, minimal-ui' />
    <title>Leaflet Bing Maps Layer</title>
    <script src='http://cdn.leafletjs.com/leaflet/v1.0.0-rc.1/leaflet.js'></script>
    <script src="https://cdn.polyfill.io/v2/polyfill.min.js?features=Promise"></script>
    <script src="leaflet-bing-layer.js"></script>
    <link href='http://cdn.leafletjs.com/leaflet/v1.0.0-rc.1/leaflet.css' rel='stylesheet' />
    <style>
    body {
        margin: 0;
        padding: 0;
    }
    #map {
        position: absolute;
        top: 0;
        bottom: 0;
        width: 100%;
        height: 364px;

    }
    </style>
</head>

<body>
    <div id='map'></div>

    <script>
    var params = location.href.split('?')[1].split('&');
    var lat = params[0];
    var lng = params[1];
    
    var BING_KEY = 'AuhiCJHlGzhg93IqUH_oCpl_-ZUrIE6SPftlyGYUvr9Amx5nzA-WqGcPquyFZl4L'
    var map = L.map('map').setView([lat, lng], 16);
    var greenIcon = new L.Icon({
        iconUrl: '/img/map/marker/location_marker.png',
        iconSize: [40, 46], // size of the icon
        iconAnchor: [20, 46], // point of the icon which will correspond to marker's location
        popupAnchor: [0, -26] // point from which the popup should open relative to the iconAnchor                                 
    });
    L.marker([lat, lng], {icon: greenIcon}).addTo(map)
        .bindPopup('Hospital is located <br> at this place.')
        .openPopup();
    var bingLayer = L.tileLayer.bing(BING_KEY).addTo(map)
    document.getElementsByClassName( 'leaflet-control-attribution' )[0].style.fontSize = '0px'
    
    </script>
</body>
</html>
