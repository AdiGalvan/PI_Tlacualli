{{-- <!DOCTYPE html>
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
</html> --}}

<!DOCTYPE html>
<html>
<head>
    <title>Mapa en Modal</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Google Maps API -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyALHaUJgSC86kmMnI1vjUIiEc33-DbxvZY"></script>
    <style>
        /* Estilo para ajustar el tamaño del mapa dentro del modal */
        #map {
            width: 100%;
            height: 300px;
        }
    </style>
</head>
<body>

<!-- Botón para abrir el modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mapModal">
    Abrir Mapa
</button>

<!-- Modal -->
<div class="modal fade" id="mapModal" tabindex="-1" role="dialog" aria-labelledby="mapModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mapModalLabel">Mapa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Contenedor del mapa -->
                <div id="map"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Script para inicializar el mapa -->
<script>
    function initMap() {
        var latitud = 20.547141; // Latitud de ejemplo
        var longitud = -100.274468; // Longitud de ejemplo
        var zoom = 15; // Nivel de zoom

        var mapOptions = {
            center: {lat: latitud, lng: longitud},
            zoom: zoom
        };

        // Crear mapa
        var map = new google.maps.Map(document.getElementById('map'), mapOptions);

        // Crear marcador
        var marker = new google.maps.Marker({
            position: {lat: latitud, lng: longitud},
            map: map,
            title: 'Ubicación específica',
            icon: 'http://maps.google.com/mapfiles/ms/icons/red-dot.png' // Icono del marcador
        });
    }
</script>

<!-- Llamar a la función initMap cuando el API de Google Maps esté cargado -->
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyALHaUJgSC86kmMnI1vjUIiEc33-DbxvZY&callback=initMap"></script>

</body>
</html>
