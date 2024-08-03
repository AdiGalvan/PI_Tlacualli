{{-- @extends('layouts.template')
@section('titulo','Mis_Talleres')
@section('contenido')

<div class="row mt-5">
    <div class="col-2">
        <div class="sticky-top">
            @include('partials.talleres.filtros')
        </div>
    </div>
    <div class="col-8">  
        <h1 class="text-center">Mis talleres</h1>
        
        <div class="row">
            <div class="col-5">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Buscar taller ..." aria-label="Buscar productos" aria-describedby="button-search">
                    <button class="btn btn-outline-primary" type="button" id="button-search"><i class="bi bi-search"></i> Buscar</button>
                </div>        
            </div>
            <div class="col-5">
            </div>
            <div class="col-2 justify-content-end">
                <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#registrar_taller" ><i class="bi bi-file-plus"></i> Agregar taller</button> 
            </div>
        </div>
        
        @if($publicaciones->isEmpty())
            <p>No hay talleres disponibles.</p>
        @else
            @foreach($publicaciones->chunk(2) as $chunk)
                <div class="row p-2">
                    @foreach($chunk as $publicacion)
                        <div class="col-md-6 p-2">
                            @include('partials.talleres.card_ed_del_taller', ['publicacion' => $publicacion])
                        </div>
                    @endforeach
                </div>
            @endforeach
        @endif
        
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
    <div class="col-2">
        <div class="sticky-top pe-3">
            <br>
            @include('partials.productos.carrusel')
            <br>
            @include('partials.publicaciones.carrusel')
            <br>
            @include('partials.talleres.carrusel')
        </div>
    </div>
</div>

@include('partials.talleres.registrar_taller')
@endsection

 --}}

@extends('layouts.template')
@section('titulo','Mis_Talleres')
@section('contenido')

<div class="mt-5 flex justify-center">
    <div class="w-full lg:w-10/12">  
        <h2 class="mb-6 text-3xl text-center font-semibold font-sans text-dark uppercase dark:text-white mt-5 w-full">Mis Talleres</h2>
        <div class="flex justify-end space-x-4 px-5 mb-6">
            <button type="button" class="bg-gradient-to-r from-green-500 to-green-800 text-white font-sans font-bold px-4 py-2 rounded-md text-md" onclick="window.location.href='{{ url('/talleres') }}'">Regresar</button>
            <button type="button" class="bg-gradient-to-r from-green-500 to-green-800 text-white font-sans font-bold px-4 py-2 rounded-md text-md" data-bs-toggle="modal" data-bs-target="#registrar_taller"> Agregar taller</button>
        </div>
        
        @if($publicaciones->isEmpty())
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
            <div class="px-5 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach($publicaciones as $publicacion)
                    <div class="p-2">
                        @include('partials.talleres.card_ed_del_taller', ['publicacion' => $publicacion])
                    </div>
                @endforeach
            </div>
        @endif
        @include('partials.talleres.paginacion')
    </div>
</div>
@include('partials.talleres.registrar_taller')
@endsection
