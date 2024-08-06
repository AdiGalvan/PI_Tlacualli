
 {{-- Ejemplo de card TALLER en Taildwin --}}
<div class="max-w-lg mx-auto bg-white border border-gray-200 rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700">
    <a href="#">
        <img src="{{ asset('storage/' . $publicacion->contenido) }}" alt="" class="card-img-top rounded-t-lg " style="height: 200px; object-fit: fit;">
    </a>
    <div class="px-4 py-3">
        <a href="#">
            <h5 class="text-xl font-semibold font-sans tracking-tight text-green-900 text-center dark:text-white">{{ $publicacion->nombre }}</h5>
            <div class="flex justify-end mt-2.5 mb-3">
                <div class="flex items-center space-x-1 rtl:space-x-reverse">
                   <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                       <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                   </svg>
                   <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                       <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                   </svg>
                   <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                       <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                   </svg>
                   <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                       <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                   </svg>
                   <svg class="w-4 h-4 text-gray-200 dark:text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                       <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                   </svg>
               </div>
               <span class="bg-blue-100 text-blue-800 text-xs font-semibold font-sans px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ms-3">4.0</span>
           </div>
            <p class="mt-2 font-sans font-bold">{{ $publicacion->descripcion }}</p>
        </a>
        <div class="flex items-center justify-between">
            <p class="text-xs font-sans text-gray-900 dark:text-white">Creador: {{ $publicacion->usuario->nombre }} {{ $publicacion->usuario->apellido_paterno }} {{ $publicacion->usuario->apellido_materno }}</p>
                {{-- <a class="btn btn-light" href="#" data-bs-toggle="tooltip" data-bs-html="true" aria-label="Compare" onclick="toggleLike(this)">
                    <i id="heart-icon" class="bi bi-heart"></i>
                </a> --}}
        </div>
        <div class="flex items-center justify-between">
            <p class="text-xs font-sans text-gray-900 dark:text-white">Fecha de inicio: {{ $publicacion->fecha_revision}}</p>
                {{-- <a class="btn btn-light" href="#" data-bs-toggle="tooltip" data-bs-html="true" aria-label="Compare" onclick="toggleLike(this)">
                    <i id="heart-icon" class="bi bi-heart"></i>
                </a> --}}
        </div>
        <div class="flex items-center justify-end mt-2 px-2">
            <span class="text-md font-bold font-sans text-gray-900 dark:text-white">$ {{ $publicacion->costo }}</span>
        </div>
        
        <hr class="my-3 border-gray-900 dark:bg-gray-900">
        <div class="flex items-center justify-end">
            <button data-modal-target="default-modal{{ $publicacion->id }}" data-modal-toggle="default-modal{{ $publicacion->id }}" class="bg-gradient-to-r from-green-500 to-green-800 text-white font-sans font-bold px-4 py-2 rounded-md text-md" type="button">
                Más Información
            </button>
        </div>
    </div>
</div>
 


<!-- Script para inicializar el mapa -->
<script>
    function initMap() {
        // Configuración de coordenadas y zoom
        var latitud = 20.547141; // Latitud de ejemplo
        var longitud = -100.274468; // Longitud de ejemplo
        var zoom = 15; // Nivel de zoom

        // Seleccionar todos los elementos del mapa
        var maps = document.querySelectorAll('[id^="map"]');

        maps.forEach(function(mapElement) {
            var mapOptions = {
                center: {lat: latitud, lng: longitud},
                zoom: zoom
            };

            // Crear mapa
            var map = new google.maps.Map(mapElement, mapOptions);

            // Crear marcador
            var marker = new google.maps.Marker({
                position: {lat: latitud, lng: longitud},
                map: map,
                title: 'Ubicación específica',
                icon: 'http://maps.google.com/mapfiles/ms/icons/red-dot.png' // Icono del marcador
            });
        });
    }

    // Cargar el mapa cuando el documento esté listo
    document.addEventListener('DOMContentLoaded', function() {
        initMap();
    });
</script>


<!-- Llamar a la función initMap cuando el API de Google Maps esté cargado -->
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyALHaUJgSC86kmMnI1vjUIiEc33-DbxvZY&callback=initMap"></script>





<!-- MODAL TAILDWIN -->
<div id="default-modal{{ $publicacion->id }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-3xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between  md:p-5 border-b rounded-t dark:border-gray-600">
                <h2 class="h2 font-sans text-2xl font-black tracking-tight text-green-900 text-center dark:text-white">{{ $publicacion->nombre }}</h2>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal{{ $publicacion->id }}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <div class="row">
              <div class="col-lg-6 justify-content-end mb-3">
                <br>    
                <div class="container d-flex">
                    <div id="map{{ $publicacion->id }}" style="width: 100%; height: 400px;"></div>   
                </div>                  
              </div>
                <div class="col-lg-6">
                    <div class="relative">
                        <div class="absolute top-0 right-0 mt-3 px-5">
                            <p class="text-lg font-sans font-bold"><span>Precio:</span></p>
                            <span class="text-md font-sans font-light px-2">$ {{ $publicacion->costo }}</span>
                        </div>
                    </div>
                    <br><br>
                    <p class="text-lg font-sans font-bold mt-4"><span>Nombre del creador:</span></p>
                    <span class="text-md font-sans font-light">{{ $publicacion->usuario->nombre }} {{ $publicacion->usuario->apellido_paterno }} {{ $publicacion->usuario->apellido_materno }}</span>
                    <p class="text-lg font-sans font-bold mt-3"><span>Descripción:</span></p>
                    <span class="text-md font-sans font-light">{{ $publicacion->descripcion }}</span>
                    <p class="text-lg font-sans font-bold mt-3"><span>Fecha de inicio:</span></p>
                    <span class="text-md font-sans font-light">{{ $publicacion->fecha_revision }}</span>
                    
                    <div class="ps-lg-8 mt-6 mt-lg-0">
                        <div class="mb-4">
                          {{-- <hr class="my-6"> --}}
                            <div class="flex items-center justify-between">
                                <div class="h5">
                                    {{-- <p><span class="text-dark font-sans">Precio: $ {{ $publicacion->costo }}</span></p> --}}
                                </div>
                                <div class="flex-shrink-0 px-5">
                                    @auth
                                    <form action="{{ route('taller.registrar', $publicacion->id) }}" method="POST" class="absolute bottom-0 right-0 mb-4 mr-4">
                                         @csrf
                                        <button data-modal-hide="default-modal" type="submit" onclick="showSweetAlert()" class="bg-gradient-to-r from-green-500 to-green-800 text-white font-sans font-bold px-4 py-2 rounded-md text-md">
                                            Agregar
                                        </button>
                                    </form>
                                    @else
                                    <button data-popover-target="popover-right{{ $publicacion->id }}" data-popover-placement="right" type="button" class="bg-gradient-to-r from-green-500 to-green-800 text-white font-sans font-bold px-4 py-2 rounded-md text-md">Agregar</button>
                                    <div data-popover id="popover-right{{ $publicacion->id }}" role="tooltip" class="absolute z-10 invisible inline-block w-64 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                                        <div class="px-3 py-2 bg-green-900 border-b border-green-200 rounded-t-lg dark:border-green-600 dark:bg-green-700 ">
                                            <h3 class=" text-white dark:text-white font-sans font-bold text-base text-center">Inicia sesión</h3>
                                        </div>
                                        <div class="px-3 py-2">
                                            <p class="font-sans font-light text-base text-center text-black">Recuerda iniciar sesión para poder agregar un taller.</p>
                                        </div>
                                        <div data-popper-arrow></div>
                                    </div>
                                    @endguest
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
