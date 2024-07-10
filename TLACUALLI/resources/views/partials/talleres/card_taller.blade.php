{{-- tarjeta de talleres --}}
<div class="card-body">
    <div class="card h-100 shadow" style="width: 80%;">
        <a href="#" class="img-wrap" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-placement="top" title="{{ $publicacion->nombre }}" data-bs-content="
            <h6>Nombre del taller:</h6> {{ $publicacion->nombre }}<br>
            <p>{{ $publicacion->descripcion }}</p>
            <ul>
                <li><i class='bi bi-check2-circle'></i> Aprenderás los principios básicos del compostaje.</li>
                <li><i class='bi bi-check2-circle'></i> Conocerás los materiales necesarios para hacer compostaje en casa.</li>
                <li><i class='bi bi-check2-circle'></i> Aprenderás a mantener tu compostador y a obtener compost de calidad.</li>
            </ul>
        ">
        {{-- <img src="https://www.fundacionambienteymedio.org/img/taller_compostaje.jpg" alt="Producto" class="card-img-top" style="height: 200px; object-fit: fit;"> --}}
        <img src="{{ asset('storage/' . $publicacion->contenido) }}" alt="" class="card-img-top" style="height: 200px; object-fit: fit;">
        </a>
        
        <div class="card-body">
            <div class="card-body d-flex justify-content-between align-items-center">
                <p class="card-text text-center text-muted small">Creador: {{ $publicacion->usuario->nombre }} {{ $publicacion->usuario->apellido_paterno }} {{ $publicacion->usuario->apellido_materno }}</p>
                <a class="btn btn-light" href="#" data-bs-toggle="tooltip" data-bs-html="true" aria-label="Compare" onclick="toggleLike(this)">
                    <i id="heart-icon" class="bi bi-heart"></i>
                </a>
            </div>
            <div class="mb-3 px-3 d-flex justify-content-between align-items-center">
                <small class="text-warning">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-half"></i>
                </small>
                <p class="card-text">{{ $publicacion->costo }}MX$</p>
            </div>
            <hr>
            <p class="card-text text-center">{{ $publicacion->nombre }}</p>
            <div class="d-flex justify-content-center">
                <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#productosModal{{ $publicacion->id }}"><i class="bi bi-info-circle"></i> Más información</button>
            </div>
        </div>
    </div>
</div>




{{-- Modal para infromacion de taller --}}

<div class="modal fade" id="productosModal{{ $publicacion->id }}" tabindex="-1" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-xl">
<div class="modal-content">
    <div class="modal-body p-8">
        <div class="position-absolute top-0 end-0 me-3 mt-3">
            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close">
            </button>
        </div>
        <div class="row">
            <div class="col-lg-6 mt-3">
                <h2>Ubicación</h2>
                    <br>    
                <div class="container d-flex">
                    
                    <div id="map" style="width: 100%; height: 400px;"></div>   
                </div>  
                                         
            </div>

            <div class="col-lg-6">
                <div class="d-flex align-items-center">
                    <h2 class="mb-1 h1">{{ $publicacion->nombre }}</h2>
                    <div class="col-md-4 col-5 ms-3">
                        <a class="btn btn-light" href="#" data-bs-toggle="tooltip" data-bs-html="true" aria-label="Compare" onclick="toggleLike(this)">
                            <i id="heart-icon" class="bi bi-heart"></i>
                        </a>
                    </div>
                </div>
                <br>
                <div class="mb-4">
                    <!-- ESTRELLAS -->
                    <span class="ms-3">4.7 
                        <small class="text-warning">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-half"></i>
                        </small>
                    <a href="#">  (518 calificaciones)</a> 1234 personas interesadas </span>
                    <br>
                            <br>
                        <span>Nombre del creador:</span> {{ $publicacion->usuario->nombre }} {{ $publicacion->usuario->apellido_paterno }} {{ $publicacion->usuario->apellido_materno }}
                            <br>
                        {{-- <span>Este curso incluye:</span>
                        <ul>
                            <li>82,5 horas de vídeo bajo demanda</li>
                            <li>79 recursos descargables</li>
                            <li>Acceso en dispositivos móviles y TV</li>
                            <li>Certificado de finalización</li>
                        </ul> --}}
                </div>
                <div class="mt-4">
                    <h5>Descripción del taller</h5>
                    <p>
                        {{ $publicacion->descripcion }}
                    </p>
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <h2 class="h2 me-3">
                            ${{ $publicacion->costo }}
                        </h3>
                        {{-- <s><span class="text-muted line-through me-3">490MX$</span></s> --}}
                    </div>
                    
                    <div class="col-lg-4 col-md-3 col-4 d-grid">
                        <button type="button" class="btn btn-outline-success"  onclick="showSweetAlert_Taller()">
                            <i class="bi bi-cart-check"></i> Agregar al carrito
                        </button>
                        
                  
                    </div>
                </div>
            </div>
        </div>
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

{{-- Script para el SweetAlert de AGREGAR PRODUCTO --}}
<script>
    function showSweetAlert_Taller() {
        Swal.fire({
            position: "center",
            icon: "success",
            title: "Taller Agregado Correctamente!",
            showConfirmButton: false,
            timer: 1500
        });
    }
</script>

