@extends('layouts.template')
@section('titulo', 'Publicaciones')
@section('contenido')

<div class="flex flex-wrap mt-3">
    <div class="w-full pt-5 px-5 text-center items-center">
        <div class="w-full">
            <div class="container">
                <h2 class="mb-6 text-3xl text-center font-semibold font-sans text-dark uppercase dark:text-white w-full">Publicaciones</h2>
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
                          {{--   @include('partials.publicaciones.buscar') --}}
                        </div>
                        @if ($usuario->roles->id == 5)
                            <a href="{{ route('mis_publicaciones') }}" class="bg-gradient-to-r from-green-500 to-green-800 text-white font-sans font-bold px-4 py-2 rounded-md text-md"> Mis publicaciones</a>
                      
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
    {{-- <div class="w-2/12">
        <div class="sticky top-0 pe-3">
            <br>
            @include('partials.productos.carrusel')
            <br>
            @include('partials.talleres.carrusel')
        </div>
    </div> --}}
</div>



@include('partials.publicaciones.registrar_publicacion')
@endsection


