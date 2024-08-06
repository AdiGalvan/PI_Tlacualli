@extends('layouts.template')
@section('titulo','Productos')
@section('contenido')

<div class="flex flex-wrap justify-center">
    <h2 class="mb-6 text-green-900 font-sans font-black text-4xl text-center mt-5 w-full">Productos</h2>
    <div class="w-full lg:w-10/12">
        <div class="flex flex-wrap mb-4 justify-end px-5 mt-3">
            <div class="w-full flex items-center space-x-4 justify-end px-5">
                <div class="w-full max-w-lg">
                    {{-- @include('partials.productos.buscar') --}}
                </div>
                @if ($usuario->roles->id == 3 || $usuario->roles->id == 4 || $usuario->roles->id == 7)
                    <div class="float-right col-2 justify-content-end">
                        <a href="{{ route('mis_productos') }}" class="bg-gradient-to-r from-green-500 to-green-800 text-white font-sans font-bold px-4 py-2 rounded-md text-md">Mis productos</a>
                    </div>
                @endif
            </div>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-2">
            <div class="lg:col-span-1 w-full p-2">
                <div class="sticky top-0 p-3">
                    <h2 class="mb-6 text-green-900 font-sans font-black text-2xl text-center mt-3 w-full">Información</h2>
                    @include('partials.productos.carrusel')
                    <br>
                    @include('partials.publicaciones.carrusel')
                    <br>
                    @include('partials.talleres.carrusel')
                </div>
            </div>
            <div class="lg:col-span-3 w-full p-5">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                    @if($productos->isEmpty())
                        {{-- Mensaje de disponibilidad --}}
                        <div id="alert-2" class="flex items-center p-2 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 text-sm max-w-md mx-auto" role="alert">
                            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                            </svg>
                            <div class="ms-2 flex-1 text-sm font-medium">
                                ¡Lo sentimos! Por el momento no hay productos disponibles.
                            </div>
                            <button type="button" class="ms-2 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1 hover:bg-red-200 inline-flex items-center justify-center h-6 w-6 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-2" aria-label="Close">
                                <span class="sr-only">Close</span>
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                            </button>
                        </div>
                    @else
                        @foreach ($productos as $producto)
                            <div class="flex flex-col justify-between shadow-lg">
                                <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700">
                                    <a href="#">
                                        @if($producto->contenido)
                                            @php
                                                $imagenes = json_decode($producto->contenido, true);
                                                $primeraImagen = $imagenes[0] ?? null;
                                            @endphp
                                            @if($primeraImagen)
                                                <img src="{{ asset('storage/' . $primeraImagen) }}" alt="{{ $producto->nombre }}" class="w-full h-48 object-cover rounded-t-lg">
                                            @else
                                                No disponible
                                            @endif
                                        @else
                                            No disponible
                                        @endif
                                    </a>
                                    <div class="px-4 py-3">
                                        <a href="#">
                                            <h5 class="text-xl font-semibold font-sans tracking-tight text-green-900 text-center dark:text-white">{{ $producto->nombre }}</h5>
                                        </a>
                                        <div class="flex items-center mt-2.5 mb-3 justify-end">
                                            <div class="flex items-center space-x-1">
                                                @for ($i = 0; $i < 5; $i++)
                                                    <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                                    </svg>
                                                @endfor
                                            </div>
                                            <span class="bg-blue-100 text-blue-800 text-xs font-semibold font-sans px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ms-3">5.0</span>
                                        </div>
                                        <div class="flex items-center justify-end">
                                            <span class="text-md font-bold font-sans text-gray-900 dark:text-white">$ {{ $producto->costo }}</span>
                                           {{--  <svg class="w-[35px] h-[35px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12.01 6.001C6.5 1 1 8 5.782 13.001L12.011 20l6.23-7C23 8 17.5 1 12.01 6.002Z"/>
                                            </svg> --}}
                                        </div>
                                        <hr class="my-3 border-gray-900 dark:bg-gray-900">
                                        <div class="flex items-center justify-end">
                                            {{-- <button data-modal-target="default-modal{{ $producto->id }}" data-modal-toggle="default-modal{{ $producto->id }}" class="bg-gradient-to-r from-green-500 to-green-800 text-white font-sans font-bold px-4 py-2 rounded-md text-md" type="button">
                                                Más Información
                                            </button> --}}
                                            <button data-modal-target="default-modal{{ $producto->id }}" data-modal-toggle="default-modal{{ $producto->id }}" class="bg-gradient-to-r from-green-500 to-green-800 text-white font-sans font-bold px-4 py-2 rounded-md text-md" type="button">
                                                Más información
                                              </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                      {{--   @foreach($productos->chunk(1) as $chunk)
                            <div class="flex flex-wrap -mx-2 mb-4">
                                @foreach($chunk as $producto)
                                    <div class="w-full sm:w-1/2 md:w-1/3 p-2">
                                        @include('partials.productos.card_producto', ['producto' => $producto])
                                    </div>
                                @endforeach
                            </div>
                        @endforeach --}}
                    @endif
                    
                </div>
            </div>
        </div>
        {{ $productos->links('vendor.pagination.centered') }} 
    </div>
</div>
@include('partials.productos.script_productos')

<!-- MODAL TAILDWIN -->
@foreach ($productos as $producto)
<div id="default-modal{{ $producto->id }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-3xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h2 class="text-2xl font-bold font-sans tracking-tight text-green-900 text-center dark:text-white">{{ $producto->nombre }}</h2>
                {{-- <h5 class="text-lg font-medium text-gray-900 dark:text-white">Modal Title</h5> --}}
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal{{ $producto->id }}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <div class="row">
              <div class="col-lg-6 mt-3 justify-content-end">
                  {{-- Carrusel del card de los productos --}}
                <div id="default-carousel" class="relative w-full px-3" data-carousel="slide">
                    <!-- Carousel wrapper -->
                    <div class="relative h-56 overflow-hidden md:h-96">
                         @php
                            $imagenes = json_decode($producto->contenido, true); // Asumiendo que el JSON es un array de URLs
                        @endphp
                        @foreach ($imagenes as $imagen)
                        <!-- Carousel items -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="{{ asset('storage/' . $imagen) }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="Imagen del producto">
                        </div>
                        @endforeach
                    </div> 
                </div>    
              </div>
              <div class="col-lg-6">
                  <div class="ps-lg-8 mt-6 mt-lg-0">
                      <div class="mb-4">
                        <div class="flex items-center justify-between mt-2.5 mb-3 px-5">
                            <!-- Comentarios Text -->
                            <div class="badge bg-success font-sans mr-2">30 comentarios</div>
                            
                            <!-- Stars and Rating -->
                            <div class="flex items-center space-x-0.5 rtl:space-x-reverse">
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
                                <!-- Rating -->
                                <span class="bg-blue-100 font-sans text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ms-2 ">4.0</span>
                            </div>
                        </div>
                        
                        <div class="text-right fs-4 px-5">
                            <span class="fw-bold text-dark font-sans">$ {{ $producto->costo }}</span>
                        </div>
                        <br>
                          <div class="flex items-center">
                            <p class="text-lg font-sans font-bold mr-2">Descripción:</p>
                            <p class="text-md font-sans font-light">{{ $producto->descripcion }}</p>
                          </div>
                        
                          {{-- Form para agregaar producto --}}
                          <form action="/carrito/agregar/{{ $producto->id }}" method="POST">
                                @csrf <!-- Añade un token CSRF para la seguridad -->
                                <div class="mt-3 row justify-content-start g-2 align-items-center">
                                    <div class="{{-- col-lg-4 col-md-5 col-6 d-grid --}}">
                                        @auth
                                        <div class="flex{{--  items-center --}} justify-end p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                            <button type="submit" class="bg-gradient-to-r from-green-500 to-green-800 text-white font-sans font-bold px-4 py-2 rounded-md text-md">Agregar</button>
                                        </div>
                                        
                                        @else
                                        <button data-popover-target="popover-right{{ $producto->id }}" data-popover-placement="right" type="button" class="bg-gradient-to-r from-green-500 to-green-800 text-white font-sans font-bold px-4 py-2 rounded-md text-md">Agregar</button>
                                        <div data-popover id="popover-right{{ $producto->id }}" role="tooltip" class="absolute z-10 invisible inline-block w-64 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                                            <div class="px-3 py-2 bg-green-900 border-b border-green-200 rounded-t-lg dark:border-green-600 dark:bg-green-700 ">
                                                <h3 class=" text-white dark:text-white font-sans font-bold text-base text-center">Inicia sesión</h3>
                                            </div>
                                            <div class="px-3 py-2">
                                                <p class="font-sans font-light text-base text-center text-black">Recuerda iniciar sesión para poder agregar productos.</p>
                                            </div>
                                            <div data-popper-arrow></div>
                                        </div>
                                        @endguest
                                    </div>
                                </div>
                            </form>
                              {{-- <div class="col-md-4 col-5" style="margin-left: 100px;">
                                  <svg class="w-[35px] h-[35px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12.01 6.001C6.5 1 1 8 5.782 13.001L12.011 20l6.23-7C23 8 17.5 1 12.01 6.002Z"/>
                                  </svg>   
                                  <a class="btn btn-light" href="#" data-bs-toggle="tooltip" data-bs-html="true" aria-label="Compare" onclick="toggleLike(this)">
                                      <i id="heart-icon" class="bi bi-heart" style="color: black;"></i>
                                  </a>
                              </div> --}}
                          </div>
                          <hr class="my-6" >
                          <div>
                              <table class="table table-borderless">
                                  <tbody>
                                      <tr>
                                          <td>Código del Producto:</td>
                                          <td>FBB00255</td>
                                      </tr>
                                      <tr>
                                          <td>Stock:</td>
                                          <td>{{ $producto->stock }}</td>
                                      </tr>
                                      <tr>
                                          <td>Categoría:</td>
                                          <td>Abonos</td>
                                      </tr>
                                  </tbody>
                              </table>
                          </div>
                      </div>
                  </div>
              </div>
        </div>
    </div>
</div>
@endforeach
@endsection

