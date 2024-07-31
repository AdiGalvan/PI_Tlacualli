@extends('layouts.template')
@section('titulo','Inicio')
@section('contenido')

{{-- @include('partials.home.carrousel')  --}} 
{{-- Carrousel o Sección con imagen ↓↓  --}}



<div class="grid grid-cols-1">
    <div class="w-full mx-auto">
        @include('partials.carrusel_home')
    </div>
</div>



@include('partials.home.misionVision')

<div class="container-fluid px-lg-5 mt-5">
    <div class="row mb-4">
        @auth
        Autenticado
        @endauth
        @guest
        No autenticado
        @endguest

    <!-- <div class="row mb-4">
        <div class="col-12 text-center">
            <h2>Publicaciones </h2>
        </div>
    </div> -->
    <!-- <div class="mb-4">
        <div class="w-full text-center">
            <h2 class="text-4xl font-black text-yellow-500 dark:text-white font-ui-sans-serif">Publicaciones</h2>
        </div>
    </div> -->


    @include('partials.home.carrouselCard')

    @include('partials.home.preguntasFrecuentes')

    @include('partials.home.contacto')
    

    <!-- <div class="row mb-4 mt-5">
        <div class="col-12 text-center">
            <h2>Aliados</h2>
        </div>
    </div> -->
    @include('partials.home.alidados')

@endsection
