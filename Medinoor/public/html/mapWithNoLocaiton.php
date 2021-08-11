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
        height: 200px;

    }
    </style>
</head>

<body>
    <div style="color: white;background-color: grey;position: absolute;bottom: 0;right: 0;z-index: 10000000;font-size: 13px;">Map by Medinoor</div>
    <div id='map'></div>


    <script>
    
    var BING_KEY = 'AuhiCJHlGzhg93IqUH_oCpl_-ZUrIE6SPftlyGYUvr9Amx5nzA-WqGcPquyFZl4L'
    var map = L.map('map').setView(['27.7104', '85.3149'], 14);
    var bingLayer = L.tileLayer.bing(BING_KEY).addTo(map)
    document.getElementsByClassName( 'leaflet-control-attribution' )[0].style.fontSize = '0px'
    
    </script>
</body>
</html>
