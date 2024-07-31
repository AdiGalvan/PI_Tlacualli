{{-- @extends('layouts.template')
@section('titulo','Publicaciones')
@section('contenido')


<div class="row mt-3">
    <div class="col-10 pt-5 ps-5">
        @include('partials.publicaciones.carruselPrincipal')
        <div class="row mt-3">
            <div class="col-10">
                
                <div class="container">
            
                    <h2 class="mb-6 text-3xl text-center font-semibold text-dark uppercase dark:text-white mt-5 w-full py-3">Publicaciones</h2>
                    <div class="row">
                        <div class="flex flex-wrap mb-4 justify-end px-5">
                            <div class="w-full flex items-center space-x-4 justify-end">
                                <div class="w-full max-w-lg">
                                    @include('partials.productos1.buscar')
                                </div>
                                @if(session()->has('id_usuario'))
                                    <button type="button" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800" onclick="window.location.href='{{ url('/#') }}'">Publicaciones</button>
                                @endif 
                            </div>
                        </div>
                    </div>
                    
                    <div class="row p-2">
                        @for ($i = 1; $i <= 10; $i++)
                            @include('partials.publicaciones.acordion_publicaciones')
                        @endfor
                    </div>
                    

                
                    <div class="row justify-content-center">
                        <div class="col-auto">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <div class="col-2">
        <div class="sticky-top pe-3">
            <br>
            @include('partials.productos1.carrusel')
            <br>
            @include('partials.talleres.carrusel')
        </div>
    </div>
</div>


@include('partials.publicaciones.registrar_publicacion')
@endsection
 --}}

 @extends('layouts.template')
@section('titulo', 'Publicaciones')
@section('contenido')

<div class="flex flex-wrap mt-3">
    <div class="w-10/12 pt-5 px-5">
        @include('partials.publicaciones.carruselPrincipal')
        <div class="mt-3">
            <div class="w-full">
                <div class="container">
                    <h2 class="mb-6 text-3xl text-center font-semibold text-dark uppercase dark:text-white mt-5 w-full py-3">Publicaciones</h2>
                    <div class="flex flex-wrap mb-4 justify-end px-5">
                        <div class="w-full flex items-center space-x-4 justify-end">
                            <div class="w-full max-w-lg">
                                @include('partials.publicaciones.buscar')
                            </div>
                            @if(session()->has('id_usuario'))
                                <button type="button" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800" onclick="window.location.href='{{ url('/#') }}'">Publicaciones</button>
                            @endif 
                        </div>
                    </div>
                    <div class="p-2">
                        {{--  @if($publicaciones->isEmpty())
                        {{-- Mensaje de disponibilidad -
                        <div id="alert-2" class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                            </svg>
                            <span class="sr-only">Info</span>
                            <div class="ms-3 text-sm font-medium">
                            Lo sentimmos! Por el momento no hay talleres disponibles
                            </div>
                            <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-2" aria-label="Close">
                            <span class="sr-only">Close</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            </button>
                        </div>
                    @else
                        @foreach($publicaciones->chunk(2) as $chunk)
                            <div class="row p-2">
                                @foreach($chunk as $publicacion)
                                    <div class="col-md-6 p-2">
                                        @include('partials.talleres.card_taller', ['publicacion' => $publicacion])
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    @endif --}}
                        @for ($i = 1; $i <= 10; $i++)
                            @include('partials.publicaciones.acordion_publicaciones')
                        @endfor
                    </div>
                    @include('partials.publicaciones.paginacion')
                </div>
            </div>
        </div>
    </div>
    <div class="w-2/12">
        <div class="sticky top-0 pe-3">
            <br>
            @include('partials.productos1.carrusel')
            <br>
            @include('partials.talleres.carrusel')
        </div>
    </div>
</div>

@include('partials.publicaciones.registrar_publicacion')
@endsection