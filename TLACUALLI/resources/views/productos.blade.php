@extends('layouts.template')
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
