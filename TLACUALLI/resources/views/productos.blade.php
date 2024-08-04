{{-- @extends('layouts.template')
@section('titulo','Productos')
@section('contenido')

<div class="row mt-5">
    <div class="col-2">
        <div class="sticky-top">
            @include('partials.productos.filtros')
        </div>
    </div>
    <div class="col-8">  
        <h1 class="text-center">Productos</h1>
        <div class="row">
            <div class="col-5">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Buscar productos ..." aria-label="Buscar productos" aria-describedby="button-search">
                    <button class="btn btn-outline-primary" type="button" id="button-search"><i class="bi bi-search"></i> Buscar</button>
                </div>        
            </div>
            <div class="col-5"></div>
            @if ($usuario->roles->id == 8)
            <div class="float-right col-2 justify-content-end">
                <a href="{{ route('mis_productos') }}" class="btn btn-outline-success"><i class="bi bi-folder"></i> Mis productos</a>            
            </div>    
            @endif
            
        </div>
        <div class="row p-2">
            @foreach($productos as $producto)
                <div class="col-md-3 p-2">
                    @include('partials.productos.card_producto', ['producto' => $producto])
                </div>
            @endforeach
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

@include('partials.productos.script_productos')
@include('partials.productos.registrar_producto')
@endsection
 --}}

@extends('layouts.template')
@section('titulo','Productos')
@section('contenido')

<div class="flex flex-wrap justify-center">
    <h2 class="mb-6 text-3xl text-center font-semibold font-sans text-dark uppercase dark:text-white mt-5 w-full">Productos</h2>
    <div class="w-full lg:w-10/12">
        <div class="flex flex-wrap mb-4 justify-end px-5 mt-3">
            <div class="w-full flex items-center space-x-4 justify-end px-5">
                <div class="w-full max-w-lg">
                    {{-- @include('partials.productos.buscar') --}}
                </div>
            @if ($usuario->roles->id == 8)
                <div class="float-right col-2 justify-content-end">
                    <a href="{{ route('mis_productos') }}" class="bg-gradient-to-r from-green-500 to-green-800 text-white font-sans font-bold px-4 py-2 rounded-md text-md"> Mis productos</a>            
                </div>    
            @endif
            </div>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-2">
            <div class="lg:col-span-1 w-full p-2">
                <div class="sticky top-0 p-3">
                    <h2 class="text-lg text-center font-semibold font-sans text-dark uppercase dark:text-white w-full">Promociones </h2>
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
        ¡Lo sentimos! Por el momento no hay talleres disponibles.
    </div>
    <button type="button" class="ms-2 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1 hover:bg-red-200 inline-flex items-center justify-center h-6 w-6 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-2" aria-label="Close">
        <span class="sr-only">Close</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
        </svg>
    </button>
</div>

                    @else
                        @foreach($productos->chunk(1) as $chunk)
                            <div class="flex flex-wrap -mx-2 mb-4">
                                @foreach($chunk as $producto)
                                    <div class="w-full sm:w-1/2 md:w-1/3 p-2">
                                        @include('partials.productos.card_producto', ['producto' => $producto])
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        @include('partials.publicaciones.paginacion')
    </div>
</div>
@include('partials.productos.script_productos')
@endsection