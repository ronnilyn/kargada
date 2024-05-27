<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8' />
    <title>Map Directions using Mapbox</title>
    <meta name='viewport' content='initial-scale=1,maximum-scale=1,user-scalable=no' />

    <!-- Mapbox -->
    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v1.5.0/mapbox-gl.css' rel='stylesheet' />
    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v1.5.0/mapbox-gl.js'></script>

    <!-- GeoCoder -->
    <link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v2.3.0/mapbox-gl-geocoder.css' type='text/css' />
    <script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v2.3.0/mapbox-gl-geocoder.min.js'></script>

    <!-- Direction API -->
    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.0/mapbox-gl-directions.css">
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.0/mapbox-gl-directions.js"></script>
    <!-- Mapbox -->

    <!-- Your existing Bootstrap links and scripts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</head>

<style>
    .mapboxgl-ctrl-top-left {
        display: none;
    }

    #map {
        height: 40vh;
    }
    .marker{
        color: red;
        font-size: 40px;
    }
</style>

<body>
    <div class="position-relative">
        <div id='map'></div>
        
    </div>
</body>
<script>
    mapboxgl.accessToken = 'pk.eyJ1IjoiZ29kZWdrb2xhIiwiYSI6ImNsb2EwaWVzcTBmdHAycXFicTlsMmxyeXYifQ.wEYJUoOoqnFzHFURicvCgQ';

    var map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v11',
        zoom: 12.56,
        center: [<?php echo $_GET['longitude'] ?>, <?php echo $_GET['latitude'] ?>]
    });

    var geocoder = new MapboxGeocoder({
        accessToken: mapboxgl.accessToken,
        marker: true,
    });

    var directions = new MapboxDirections({
        accessToken: mapboxgl.accessToken
    });

    map.addControl(geocoder, 'top-left');
    map.addControl(new mapboxgl.NavigationControl(), 'bottom-right');

    var marker;

    map.on('load', function () {
        // Set default marker
        setMarker([<?php echo $_GET['longitude'] ?>, <?php echo $_GET['latitude'] ?>], "Default Location");
    });

    // Search Places Result Event
    geocoder.on('result', function (event) {
        // Remove existing marker
        if (marker) {
            marker.remove();
        }

        // Set new marker with the address
        setMarker(event.result.geometry.coordinates, event.result.place_name);

        // Get and log address details
        getAddressDetails(event.result.geometry.coordinates, true);
    });

   function setMarker(coordinates, address) {
    var markerPopup = new mapboxgl.Popup({ offset: 25 });

    // Use Mapbox Geocoding API to get address details
    var url = `https://api.mapbox.com/geocoding/v5/mapbox.places/${coordinates[0]},${coordinates[1]}.json?access_token=${mapboxgl.accessToken}`;

    $.get(url, function (data) {
        var features = data.features;
        if (features.length > 0) {
            var address = features[0].place_name;

            // Update popup content
            markerPopup.setHTML(`<div>${address}</div><small class='text-muted'>${coordinates[0]}, ${coordinates[1]}</small>`);

            if (logToConsole) {
                alert(address);
            }
        } else {
            console.log('No address found for the given coordinates.');
        }
    });

    // Remove existing marker
    if (marker) {
        marker.remove();
    }

    // Set new marker with the address
    marker = new mapboxgl.Marker($('<div class="marker"><i class="fa fa-map-marker-alt"></i></div>')[0])
        .setLngLat(coordinates)
        .setPopup(markerPopup)
        .addTo(map);

    // Update hidden inputs
    $('#latitude').val(coordinates[1]);
    $('#longitude').val(coordinates[0]);

    // Get and log address details
    
}

</script>


</html>