@extends('layouts.template')
@section('titulo', 'Publicaciones')
@section('contenido')

<div class="flex flex-wrap mt-3">
    <div class="w-10/12 pt-5 px-5">
        @include('partials.publicaciones.carruselPrincipal')
        <div class="mt-3">
            <div class="w-full">
                <div class="container">
                    <h2 class="mb-6 text-3xl text-center font-semibold text-dark uppercase dark:text-white mt-5 w-full">Publicaciones</h2>
                     @auth
                    Autenticado
                    {{ $usuario->roles->id }}
                    @endauth
                    @guest
                    No autenticado
                    @endguest
                    <div class="flex flex-wrap mb-4 justify-end px-5">
                        <div class="w-full flex items-center space-x-4 justify-end">
                            <div class="w-full max-w-lg">
                                @include('partials.publicaciones.buscar')
                            </div>
                            @if ($usuario->roles->id == 5)
                                <a href="{{ route('mis_publicaciones') }}" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"> Mis publicaciones</a>
                          
                            @endif
                        </div>
                    </div>
                    <div class="p-2">
                        @foreach ($publicaciones as $index => $publicacion)
                            @include('partials.publicaciones.acordion_publicaciones', ['publicacion' => $publicacion, 'index' => $loop->index + 1])
                        @endforeach
                            
                    </div>
                    @include('partials.publicaciones.paginacion')
                </div>
            </div>
        </div>
    </div>
    <div class="w-2/12">
        <div class="sticky top-0 pe-3">
            <br>
            @include('partials.productos.carrusel')
            <br>
            @include('partials.talleres.carrusel')
        </div>
    </div>
</div>



@include('partials.publicaciones.registrar_publicacion')
@endsection


