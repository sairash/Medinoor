<!DOCTYPE html>
<html>
<head>
    <meta charset=utf-8 />
    <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, minimal-ui' />
    <title>Leaflet Bing Maps Layer</title>
    <script src='/js/leaflet.js'></script>
    <script src="https://cdn.polyfill.io/v2/polyfill.min.js?features=Promise"></script>
    <script src="leaflet-bing-layer.js"></script>
    <link href='/css/leaflet.css' rel='stylesheet' />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
        height: 100%;

    }
    .essence-btn{
        background-color: #02c39a;
        padding: 10px;
        text-decoration: none;
        color: white !important;
    }
    .essence-btn:hover{
        background-color: black;
    }
    </style>
</head>

<body>
    <div style="color: white;background-color: grey;position: absolute;bottom: 0;right: 0;z-index: 10000000;font-size: 13px;">Map by Medinoor</div>
    <div id='map'></div>

    <script>
        function getRoute(lat,lon) {
            alert('Comming Soon')
            // body...
        }
    var params = location.href.split('?')[1].split('&');
    var key = params[0];
    home_lat= 0;
    home_lon=0
    var BING_KEY = 'AuhiCJHlGzhg93IqUH_oCpl_-ZUrIE6SPftlyGYUvr9Amx5nzA-WqGcPquyFZl4L'
    

    var map = L.map('map').setView(['27.7104', '85.3149'], 14);
    var greenIcon = new L.Icon({
        iconUrl: '/img/map/marker/location_marker.png',
        iconSize: [40, 46], // size of the icon
        iconAnchor: [20, 46], // point of the icon which will correspond to marker's location
        popupAnchor: [0, -26] // point from which the popup should open relative to the iconAnchor                                 
    });
    var homeIcon = new L.Icon({
        iconUrl: '/img/map/marker/location_marker_home.png',
        iconSize: [40, 46], // size of the icon
        iconAnchor: [20, 46], // point of the icon which will correspond to marker's location
        popupAnchor: [0, -26] // point from which the popup should open relative to the iconAnchor                                 
    });
    var markersLayer = new L.LayerGroup();
    var bingLayer = L.tileLayer.bing(BING_KEY).addTo(map)
    document.getElementsByClassName( 'leaflet-control-attribution' )[0].style.fontSize = '0px'
    $.ajax({
          method:'GET',
          url: '/search/map/request?h='+key,
      }).done(function(msg)
      {
        for (var i = msg.length - 1; i >= 0; i--) {
            marker =L.marker([Number(JSON.parse(JSON.stringify(msg[i]['latitude']))), Number(JSON.parse(JSON.stringify(msg[i]['longitude'])))], {icon: greenIcon}).addTo(map).bindPopup('<img src="'+msg[i]['logo']+'" height="150px" width="150px"/><br><div style="text-transform: uppercase; text-align:center">'+msg[i]['name']+'</div><div style="text-transform: uppercase; text-align:center">Located Here</div><br><div style="text-transform: uppercase; text-align:center"><a target="_PARENT" class="essence-btn" href="/view?hospital='+msg[i]['id']+'" class="button" >View Hospital</a><br><br><br><a class="essence-btn" onclick="getRoute('+msg[i]['latitude']+','+msg[i]['longitude']+')" class="button" >Route</a></div>');
            markersLayer.addLayer(marker);
        }
        
      });
        function getLocation() {
          if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition,showError);
          } else { 
            alert("Allow Location");
          }
        }

        function showPosition(position) {
            home_lat = position.coords.latitude;
            home_lon = position.coords.longitude;
            marker =L.marker([home_lat,home_lon], {icon: homeIcon}).addTo(map);
            markersLayer.addLayer(marker);
        }
        function showError(error) {
          switch(error.code) {
            case error.PERMISSION_DENIED:
              alert("User denied the request for Geolocation.")
              break;
            case error.POSITION_UNAVAILABLE:
              alert("Location information is unavailable.")
              break;
            case error.TIMEOUT:
              alert("The request to get user location timed out.")
              break;
            case error.UNKNOWN_ERROR:
              alert("An unknown error occurred.")
              break;
          }
        }
        getLocation();
    </script>
</body>
</html>
