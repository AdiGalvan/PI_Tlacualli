<!DOCTYPE html>
<html>
<head>
    <title>Mapa</title>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyALHaUJgSC86kmMnI1vjUIiEc33-DbxvZY"></script>
    <script>
        function mostrarMapa() {
            var latitud = 20.547141; // Latitud de ejemplo (por ejemplo, Nueva York)
            var longitud = -100.274468; // Longitud de ejemplo (por ejemplo, Nueva York)
            var zoom = 15; // Nivel de zoom
            
            var mapOptions = {
                center: {lat: latitud, lng: longitud},
                zoom: zoom
            };
            var map = new google.maps.Map(document.getElementById('map'), mapOptions);
            var marker = new google.maps.Marker({
                position: {lat: latitud, lng: longitud},
                map: map,
                title: 'Ubicación específica',
                icon: 'http://maps.google.com/mapfiles/ms/icons/red-dot.png' // Icono del marcador
            });
        }
    </script>
</head>
<body onload="mostrarMapa()">
    <div id="map" style="height: 400px;"></div>
</body>
</html>
