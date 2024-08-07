{{-- @extends('layouts.template')
@section('titulo','Publicaciones')
@section('contenido')

<div class="row mt-3">
    <div class="col-10 pt-5 ps-5">
        <br><br>
        <div class="row mt-3">
            <div class="col-2">
                <div class="container sticky-top">
                    <div class="sticky-top">
                        @include('partials.publicaciones.filtros')
                    </div>
                </div>
            </div>
            <div class="col-10">
                
                <div class="container">
            
                    <h1 class="text-center">Tus publicaciones</h1>
                    @auth
                    Autenticado
                    @endauth
                    @guest
                    No autenticado
                    @endguest
                
                    <div class="row">
                        <div class="col-5">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Buscar publicación ..." aria-label="Buscar productos" aria-describedby="button-search">
                                <button class="btn btn-outline-primary" type="button" id="button-search"><i class="bi bi-search"></i> Buscar</button>
                            </div>        
                        </div>
                        <div class="col-5">
                        </div>
                        @auth
                        <div class="col-2 justify-content-end">
                            <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#registrar_publicacion"><i class="bi bi-file-earmark-text"></i> Registrar publicación</button>
                        </div>
                        @endauth
                        @guest
                            
                        @endguest
                    </div>
                    
                    <div class="row p-2">
                        @foreach ($publicaciones as $index => $publicacion)
                            @include('partials.publicaciones.acordion_publicaciones', ['publicacion' => $publicacion, 'index' => $loop->index + 1])
                        @endforeach
                            
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
            @include('partials.productos.carrusel')
            <br>
            @include('partials.talleres.carrusel')
        </div>
    </div>
</div>


@include('partials.publicaciones.registrar_publicacion')
@endsection
 --}}



@extends('layouts.template')
@section('titulo','Publicaciones')
@section('contenido')

<div class="mt-5 flex justify-center">
    <div class="w-full lg:w-10/12">  
        <h2 class="text-green-900 font-sans font-black text-4xl text-center">Mis Publicaciones</h2>
        
        <div class="flex justify-end space-x-4 px-5 mb-6 pt-6">
            <button type="button" class="bg-gradient-to-r from-gray-500 to-gray-800 text-white font-sans font-bold px-4 py-2 rounded-md text-md" onclick="window.location.href='{{ url('/publicaciones') }}'">Regresar</button>
            @auth
            {{-- <button type="button" class="bg-gradient-to-r from-gray-500 to-gray-800 hover:from-gray-600 hover:to-gray-800 text-white px-4 py-2 rounded-lg mr-2 font-semibold font-sans" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#registrar_publicacion">Registrar publicación</button> --}}
            <button type="button" class="bg-gradient-to-r from-green-500 to-green-800 text-white font-sans font-bold px-4 py-2 rounded-md text-md" data-bs-toggle="modal" data-bs-target="#registrar_publicacion">Registrar Publicación</button> 
            @endauth
            @guest
                
            @endguest
            
        </div>
        
        @if($publicaciones->isEmpty())
        <div id="alert-2" class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <span class="sr-only">Info</span>
            <div class="ms-3 text-sm font-medium">
            ¡Lo sentimos! Por el momento no hay publicaciones disponibles.
            </div>
            <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-2" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
            </button>
        </div>
        @else
            <div class="px-5">
                @foreach ($publicaciones as $index => $publicacion)
                        <div class="p-2">
                            @include('partials.publicaciones.acordion_publicaciones', ['publicacion' => $publicacion, 'index' => $loop->index + 1])
                        </div>
                @endforeach
            </div>
        @endif
        @include('partials.talleres.paginacion')
    </div>
</div>
@include('partials.publicaciones.registrar_publicacion')
@endsection
