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
