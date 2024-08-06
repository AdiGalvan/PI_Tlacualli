{{-- @extends('layouts.template')
@section('titulo', 'Publicaciones')
@section('contenido')

<div class="flex flex-wrap">
    <div class="w-full pt-5 px-5 text-center items-center">
        <div class="w-full">
            <div class="container">
                <h2 class="mb-6 text-green-900 font-sans font-black text-4xl text-center w-full">Publicaciones</h2>
                 @auth
                Autenticado
                {{ $usuario->roles->id }}
                @endauth
                @guest
                No autenticado
                @endguest
                <div class="flex flex-wrap mb-4 justify-end">
                    <div class="w-full flex items-center space-x-4 justify-end">
                        <div class="w-full max-w-lg">
                          {{--   @include('partials.publicaciones.buscar') 
                        </div>
                        @if ($usuario->roles->id == 5)
                            <a href="{{ route('mis_publicaciones') }}" class="bg-gradient-to-r from-green-500 to-green-800 text-white font-sans font-bold px-4 py-2 rounded-md text-md"> Mis publicaciones</a>
                        @endif
                    </div>
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
                    <div class="">
                        @foreach ($publicaciones as $index => $publicacion)
                                <div class="p-2">
                                    @include('partials.publicaciones.acordion_publicaciones', ['publicacion' => $publicacion, 'index' => $loop->index + 1])
                                </div>
                        @endforeach
                    </div>
                @endif
                @include('partials.publicaciones.paginacion')
            </div>
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
        <h2 class="text-green-900 font-sans font-black text-4xl text-center">Publicaciones</h2>
        
            <div class="flex flex-wrap mb-4 justify-end px-5">
                <div class="w-full flex items-center space-x-4 justify-end">
                    <div class="w-full max-w-lg">
                      {{--   @include('partials.publicaciones.buscar') --}}
                    </div>
                    @if ($usuario->roles->id == 5 || $usuario->roles->id == 7)
                        <a href="{{ route('mis_publicaciones') }}" class="bg-gradient-to-r from-green-500 to-green-800 text-white font-sans font-bold px-4 py-2 rounded-md text-md"> Mis publicaciones</a>
                    @endif
                </div>
            </div>
        
        @if($publicaciones->isEmpty())
        <div id="alert-2" class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <span class="sr-only">Info</span>
            <div class="ms-3 text-sm font-medium">
            Lo sentimmos! Por el momento no hay publicaciones disponibles
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
