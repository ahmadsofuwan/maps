<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="leaflet.css">
    <script src="leaflet.js"></script>

    <script src="https://cdn.tailwindcss.com"></script>


</head>

<body>

    <input type="text" class="absolute z-0">
    <div id="map" class="h-screen w-screen z-1">
    </div>




</body>

</html>
<script>
    var map = L.map('map').setView([-1.623133, 103.586045], 13);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '© OpenStreetMap'
    }).addTo(map);

    var data = [[-1.623133, 103.586045], [-1.624248, 103.575230]];

    for (let i = 0; i < data.length; i++) {
        L.marker([data[i][0], data[i][1]]).addTo(map);
    }


    function onMapClick(e) {
        console.log(e.latlng)
        //alert("You clicked the map at " + e.latlng);
    }

    map.on('click', onMapClick);

</script>