{{-- tarjeta de talleres --}}
<div class="max-w-xs mx-auto bg-white border border-gray-200 rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700">
    <a href="#" class="block" data-popover-target="popover-{{ $publicacion->id }}" data-popover-trigger="hover" data-popover-placement="top">
        <img src="{{ asset('storage/' . $publicacion->contenido) }}" alt="" class="w-full h-48 rounded-t-lg object-cover">
    </a>

    <div class="px-4 py-3">
        <div class="flex items-center justify-between">
            <p class="text-sm text-gray-500 dark:text-gray-400">{{ $publicacion->usuario->nombre }} {{ $publicacion->usuario->apellido_paterno }} {{ $publicacion->usuario->apellido_materno }}</p>
            <button class="text-gray-600 hover:text-red-600 focus:outline-none" aria-label="Compare" onclick="toggleLike(this)">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"></path>
                </svg>
            </button>
        </div>
        <div class="flex items-center justify-between mt-3">
            <div class="flex text-yellow-500">
                <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                    <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"></path>
                </svg>
                <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                    <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"></path>
                </svg>
                <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                    <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"></path>
                </svg>
                <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                    <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"></path>
                </svg>
                <svg class="w-4 h-4 fill-current text-gray-300" viewBox="0 0 24 24">
                    <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"></path>
                </svg>
            </div>
            <p class="text-lg font-bold text-gray-900 dark:text-white">{{ $publicacion->costo }} MX$</p>
        </div>
        <hr class="my-3 border-gray-300 dark:border-gray-700">
        <p class="text-center text-lg font-semibold text-gray-900 dark:text-white">{{ $publicacion->nombre }}</p>
        <div class="flex justify-center mt-3">
            <button type="button" class="block px-3 py-2.5 text-xs font-medium text-white bg-gray-700 rounded-lg hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800" data-modal-target="default-modal{{ $publicacion->id }}" data-modal-toggle="default-modal{{ $publicacion->id }}">
                Más Información
            </button>
        </div>
    </div>
</div>

{{-- Popover --}}
<div id="popover-{{ $publicacion->id }}" role="tooltip" class="absolute z-10 invisible inline-block w-64 text-sm font-light text-gray-500 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-700 dark:bg-gray-800">
    <div class="p-3">
        <h6 class="font-semibold text-gray-900 dark:text-white">Nombre del taller:</h6>
        <p class="mt-2 text-gray-700 dark:text-gray-300">{{ $publicacion->nombre }}</p>
        <p class="mt-2 text-gray-700 dark:text-gray-300">{{ $publicacion->descripcion }}</p>
        <ul class="mt-2 text-gray-700 dark:text-gray-300">
            <li class="flex items-center"><i class='bi bi-check2-circle'></i> Aprenderás los principios básicos del compostaje.</li>
            <li class="flex items-center"><i class='bi bi-check2-circle'></i> Conocerás los materiales necesarios para hacer compostaje en casa.</li>
            <li class="flex items-center"><i class='bi bi-check2-circle'></i> Aprenderás a mantener tu compostador y a obtener compost de calidad.</li>
        </ul>
    </div>
    <div data-popper-arrow></div>
</div>


<!-- Modal para información de taller -->
<div id="ed_delTallerModal{{ $publicacion->id }}" class="fixed inset-0 flex items-center justify-center z-50 hidden">
    <div class="relative bg-white w-full max-w-7xl mx-auto p-8 rounded-lg shadow-lg">
        <div class="absolute top-0 right-0 m-3">
            <button
                type="button"
                class="text-gray-500 hover:text-gray-700"
                aria-label="Close"
                onclick="toggleModal('ed_delTallerModal{{ $publicacion->id }}')">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 8.586l4.95-4.95a1 1 0 111.414 1.414L11.414 10l4.95 4.95a1 1 0 01-1.414 1.414L10 11.414l-4.95 4.95a1 1 0 01-1.414-1.414L8.586 10 3.636 5.05a1 1 0 011.414-1.414L10 8.586z" clip-rule="evenodd"></path></svg>
            </button>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <div class="mt-3">
                <h2 class="text-2xl font-semibold">Ubicación</h2>
                <br>
                <div class="w-full h-96" id="map"></div>
            </div>
            <div>
                <div class="flex items-center mb-3">
                    <h2 class="text-2xl font-semibold">{{ $publicacion->nombre }}</h2>
                    <div class="ml-3">
                        <button class="text-gray-500 hover:text-gray-700" aria-label="Compare" onclick="toggleLike(this)">
                            <svg id="heart-icon" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.68l-.59-.6a5.5 5.5 0 00-7.78 7.78l7.78 7.78 7.78-7.78a5.5 5.5 0 000-7.78z"></path></svg>
                        </button>
                    </div>
                </div>
                <div class="mb-4">
                    <span class="text-yellow-400">
                        4.7 
                        <small class="flex items-center space-x-1">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09L5.5 11.293 1.22 7.62l6.487-.54L10 1l2.293 6.08 6.487.54-4.28 3.673 1.378 6.797L10 15z"></path></svg>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09L5.5 11.293 1.22 7.62l6.487-.54L10 1l2.293 6.08 6.487.54-4.28 3.673 1.378 6.797L10 15z"></path></svg>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09L5.5 11.293 1.22 7.62l6.487-.54L10 1l2.293 6.08 6.487.54-4.28 3.673 1.378 6.797L10 15z"></path></svg>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09L5.5 11.293 1.22 7.62l6.487-.54L10 1l2.293 6.08 6.487.54-4.28 3.673 1.378 6.797L10 15z"></path></svg>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09L5.5 11.293 1.22 7.62l6.487-.54L10 1l2.293 6.08 6.487.54-4.28 3.673 1.378 6.797L10 15z"></path></svg>
                        </small>
                    </span>
                    <a href="#" class="text-blue-500">(518 calificaciones)</a> 1234 personas interesadas
                    <br><br>
                    <span>Nombre del creador:</span> {{ $publicacion->usuario->nombre }} {{ $publicacion->usuario->apellido_paterno }} {{ $publicacion->usuario->apellido_materno }}
                </div>
                <div class="mt-4">
                    <h5 class="text-xl font-semibold">Descripción del taller</h5>
                    <p>
                        {{ $publicacion->descripcion }}
                    </p>
                </div>
                <div class="flex justify-between items-center mt-6">
                    <h2 class="text-2xl font-semibold">
                        ${{ $publicacion->costo }}
                    </h2>
                </div>
                <div class="mt-6 space-y-4">
                    <button type="button" class="btn btn-outline-success w-full py-2" onclick="toggleModal('actualizar_taller')">
                        <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-4-4m0 0l-4-4m4 4h8m0 0l4-4m-4 4l-4 4"></path></svg>
                        Actualizar información
                    </button>
                    <form action="{{ route('publicacionesDestroy', $publicacion->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta publicación?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger w-full py-2">
                            <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-6 6-6-6"></path></svg>
                            Eliminar
                        </button>
                    </form>
                    @if ($publicacion->estatus)
                        <form action="{{ route('desactivarTaller', $publicacion->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas desactivar esta publicación?');">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-outline-primary w-full py-2">
                                <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v6m0 0h6m-6 0H6"></path></svg>
                                Desactivar
                            </button>
                        </form>
                    @else
                        <form action="{{ route('activarTaller', $publicacion->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas activar esta publicación?');">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-outline-success w-full py-2">
                                <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v6m0 0h6m-6 0H6"></path></svg>
                                Activar
                            </button>
                        </form>
                    @endif
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

