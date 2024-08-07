{{-- tarjeta de talleres --}}
{{-- <div class="card-body">
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
                <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#ed_delTallerModal{{ $publicacion->id }}"><i class="bi bi-info-circle"></i> Más información</button>
            </div>
        </div>
    </div>
</div> --}}



 {{-- Ejemplo de card taller (vista previa) en Taildwin --}}
<div class="max-w-lg mx-auto bg-white border border-gray-200 rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700">
    <a href="#">
        <img src="{{ asset('storage/' . $publicacion->contenido) }}" alt="" class="card-img-top rounded-t-lg " style="height: 200px; object-fit: fit;">
    </a>
    <div class="px-4 py-3">
        
        <a href="#">
            <h5 class="text-xl font-semibold font-sans tracking-tight text-green-900  dark:text-white">{{ $publicacion->nombre }}</h5>
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
            <p class="mt-2 font-sans font-bold text-lg text-justify">{{ $publicacion->descripcion }}</p>
        </a>
        <div class="flex items-center justify-between pt-2">
            <p class="text-sm font-sans text-gray-900 dark:text-white text-justify">Creador: {{ $publicacion->usuario->nombre }} {{ $publicacion->usuario->apellido_paterno }} {{ $publicacion->usuario->apellido_materno }}</p>
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
 



<!-- MODAL TALLER "MÁS INFORMACIÓN" TAILDWIN -->
<div id="default-modal{{ $publicacion->id }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-3xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between  md:p-5 border-b rounded-t dark:border-gray-600">
                <h2 class="text-xl font-black font-sans tracking-tight text-green-900 text-center dark:text-white ps-4 pt-2 pb-2">{{ $publicacion->nombre }}</h2>
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
                    <div id="map" style="width: 100%; height: 400px;"></div>   
                </div>                  
              </div>

             

              <div class="col-lg-6 mt-3">

              <div class="flex justify-end">
                                <p class="font-sans font-light text-lg pr-6 pb-4"><span class="text-dark font-sans font-bold text-lg pr-4 pb-4">Precio: </span>$ {{ $publicacion->costo }}</p>
                            </div>

              <p class="font-sans font-light text-lg ps-4"><span class="mt-2 font-sans font-bold">Descripción:</span> {{ $publicacion->descripcion }}</p>
                    <br>
                    
                    <p class="text-lg font-sans font-light ps-4"><span class="mt-2 font-sans font-bold">Creador:</span> {{ $publicacion->usuario->nombre }} {{ $publicacion->usuario->apellido_paterno }} {{ $publicacion->usuario->apellido_materno }}</p>
                    <div class="ps-lg-8 mt-6 mt-lg-0">
                        <div class="mb-4">
                            <hr class="my-6">
                          
                            <div class="flex items-center justify-between">
                                <div class="flex-shrink-0 px-2 mt-3">
                                      <div class="container mt-2">
                                        <div class="row">
                                        <div class="flex flex-wrap gap-4">
    <div class="flex-1 min-w-[150px]">
        <!-- Botón "Actualizar información" -->
        <button type="button" class="w-full bg-gradient-to-r from-green-500 to-green-800 hover:from-green-600 hover:to-green-800 text-white px-4 py-2 rounded-lg font-semibold" data-bs-toggle="modal" data-bs-target="#actualizar_taller{{ $publicacion->id }}">
            Editar
        </button>
    </div>
    <div class="flex-1 min-w-[150px]">
        @if ($publicacion->estatus)
            {{-- Mostrar botón de Desactivar si el estado es true --}}
            <button type="button" class="w-full bg-gradient-to-r from-yellow-500 to-yellow-800 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg font-semibold" data-bs-toggle="modal" data-bs-target="#desactivar_taller{{ $publicacion->id }}">
                Desactivar
            </button>
        @else
            {{-- Mostrar botón de Activar si el estado es false --}}
            <button type="button" class="w-full bg-gradient-to-r from-blue-600 to-blue-900 hover:bg-blue-800 text-white px-4 py-2 rounded-lg font-semibold" data-bs-toggle="modal" data-bs-target="#activar_taller{{ $publicacion->id }}">
                Activar
            </button>
        @endif
    </div>
</div>

                                        </div>                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- Modal para infromacion de taller --}}

{{-- <div class="modal fade" id="ed_delTallerModal{{ $publicacion->id }}" tabindex="-1" aria-hidden="true">
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
                            </ul> 
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
                            {{-- <s><span class="text-muted line-through me-3">490MX$</span></s> 
                        </div>
                    </div>
    
                    <div class="container mt-4">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-6">
                                <!-- Botón "Actualizar información" en una línea separada -->
                                <button type="button" class="btn btn-outline-success btn-lg btn-block mb-3" data-bs-toggle="modal" data-bs-target="#actualizar_taller{{ $publicacion->id }}">
                                    <i class="bi bi-pencil-square"></i> Actualizar información
                                </button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-3">
                                <!-- Botón "Eliminar" -->
                                <form action="{{ route('publicacionesDestroy', $publicacion->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta publicación?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-lg btn-block">
                                        <i class="bi bi-trash"></i> Eliminar
                                    </button>
                                </form>
                            </div>
                            <div class="col-lg-3 col-md-3 col-3">
                                    {{-- Otras partes de la tarjeta 
                                    
                                    @if ($publicacion->estatus)
                                        {{-- Mostrar botón de Desactivar si el estado es true 
                                        <form action="{{ route('desactivarTaller', $publicacion->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas desactivar esta publicación?');">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-outline-primary btn-lg btn-block">
                                                <i class="bi bi-x-circle"></i> Desactivar
                                            </button>
                                        </form>
                                    @else
                                        {{-- Mostrar botón de Activar si el estado es false 
                                        <form action="{{ route('activarTaller', $publicacion->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas activar esta publicación?');">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-outline-success btn-lg btn-block">
                                                <i class="bi bi-check-circle"></i> Activar
                                            </button>
                                        </form>
                                    @endif
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    </div>
    </div> --}}

    <!--INICIO DE MODAL DE ACTUALIZACION-->
<div class="modal fade" id="actualizar_taller{{ $publicacion->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- modal header -->
            <div class="flex justify-center pt-4 pb-2">
                <h1 class="text-green-900 font-sans font-black text-2xl text-center" id="exampleModalLabel">Actualización de taller</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('actualizarTaller', $publicacion->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
  
                    <div class="mb-3">
                        <label class="text-green-900 font-sans font-bold pb-2 text-base">Nombre taller</label>
                        <input type="text" class="font-sans font-light px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 w-full" id="_nt" name="_nt" required value="{{ !empty($publicacion->nombre) ?  $publicacion->nombre : '' }}"<>
                    </div>
  
                    <div class="mb-3">
                        <label class="text-green-900 font-sans font-bold pb-2 text-base">Descripción</label>
                        <input type="text" class="font-sans font-light px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 w-full" id="_descT" name="_descT" required value="{{ !empty($publicacion->descripcion) ?  $publicacion->descripcion : '' }}">
                    </div>
  
                    <div class="mb-3">
                        <label class="text-green-900 font-sans font-bold pb-2 text-base">Contenido (Imagen JPG o PNG)</label>
                        <!-- Mostrar la imagen actual -->
                        @if (!empty($publicacion->contenido))
                            <div class="mb-3">
                                <img src="{{ asset('storage/' . $publicacion->contenido) }}" alt="Imagen del taller" class="img-fluid" style="max-height: 200px;">
                            </div>
                        @endif
                        <!-- Campo para subir una nueva imagen -->
                        <input type="file" class="font-sans font-light px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 w-full" id="_contT" name="_contT" accept="image/jpeg, image/png">
                    </div>
  
                    <div class="mb-3">
                        <label class="text-green-900 font-sans font-bold pb-2 text-base">Costo</label>
                        <input type="number" class="font-sans font-light px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 w-full" id="_costoT" name="_costoT" required value="{{ !empty($publicacion->costo) ?  $publicacion->costo : '' }}">
                    </div>
  
                    <div class="modal-footer">
                        <button type="submit" class="bg-gradient-to-r from-green-500 to-green-800 hover:from-green-600 hover:to-green-800 text-white px-4 py-2 rounded-lg mr-2 font-semibold font-sans"><i class="bi bi-check-lg"></i> Actualizar</button>
                        <button type="button" class="bg-gradient-to-r from-gray-500 to-gray-800 hover:from-gray-600 hover:to-gray-800 text-white px-4 py-2 rounded-lg mr-2 font-semibold font-sans" data-bs-dismiss="modal"><i class="bi bi-x-lg"></i> Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
  </div>

  <!--INICIO DE MODAL DE Desactivacion-->
  <div class="modal fade" id="desactivar_taller{{ $publicacion->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- modal header -->
      <div class="flex justify-center pt-4 pb-2">
        <h1 class="text-green-900 font-sans font-black text-2xl text-center" id="exampleModalLabel">Desactivar taller: {{ $publicacion->nombre }}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p class="font-sans font-normal text-lg text-center">¿Estás seguro de querer desactivar este taller?</p>
      </div>    
      <div class="modal-footer">
        <form method="POST" action="{{ route('desactivarTaller', $publicacion->id) }}">
          @csrf
          @method('PUT')
          <button type="submit" class="bg-gradient-to-r from-yellow-500 to-yellow-800 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg font-semibold font-sans">Desactivar</button>
        </form>
        <button type="button" class="bg-gradient-to-r from-gray-500 to-gray-800 hover:from-gray-600 hover:to-gray-800 text-white px-4 py-2 rounded-lg mr-2 font-semibold" data-bs-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<!--INICIO DE MODAL DE Activacion-->
  <div class="modal fade" id="activar_taller{{ $publicacion->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- modal header -->
      <div class="flex justify-center pt-4 pb-2">
        <h1 class="text-green-900 font-sans font-black text-2xl text-center" id="exampleModalLabel">Activar taller: {{ $publicacion->nombre }}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p class="font-sans font-normal text-lg text-center">¿Estás seguro de querer activar este taller?</p>
      </div>
      <div class="modal-footer">
        <form method="POST" action="{{ route('activarTaller', $publicacion->id) }}">
          @csrf
          @method('PUT')
          <button type="submit" class="bg-gradient-to-r from-blue-600 to-blue-900 hover:bg-blue-800 text-white px-4 py-2 rounded-lg font-semibold font-sans">Activar</button>
        </form>
        <button type="button" class="bg-gradient-to-r from-gray-500 to-gray-800 hover:from-gray-600 hover:to-gray-800 text-white px-4 py-2 rounded-lg mr-2 font-semibold" data-bs-dismiss="modal">Cancelar</button>
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


<script>
  // Función para cerrar el modal y eliminar el fondo gris
  function closeModalAndRemoveBackdrop() {
    var modalElement = document.getElementById('actualizar_taller');
    var modalBackdrop = document.querySelector('.modal-backdrop');
    
    if (modalElement) {
      var modalInstance = bootstrap.Modal.getInstance(modalElement);
      if (modalInstance) {
        modalInstance.hide();
      }
    }
    
    document.body.classList.remove('modal-open'); // Elimina la clase modal-open del body
    
    if (modalBackdrop) {
      modalBackdrop.remove(); // Elimina el elemento .modal-backdrop
    }
  }
</script>