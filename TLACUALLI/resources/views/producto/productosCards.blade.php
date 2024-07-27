@extends('layouts.template')
@section('titulo','Productos')
@section('contenido')

<div class="row mt-5">
    <div class="col-2">
        <div class="sticky-top">
            @include('partials.productos1.filtros')
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
            <div class="col-2 d-flex justify-content-end">
                @if(session()->has('id_usuario'))
                <button type="button" class="btn btn-outline-success" onclick="window.location.href='{{ url('/productos') }}'">
                    <i class="bi bi-bag-plus"></i> Productos
                </button>
                @endif
            </div>
        </div>
        <div class="row p-2">
            @foreach($productos as $producto)
                <div class="col-md-3 p-2">
                    @include('producto.card_producto', ['producto' => $producto])
                </div>
            @endforeach
        </div>
    </div>
    <div class="col-2">
        <div class="sticky-top pe-3">
            <br>
            @include('partials.productos1.carrusel')
            <br>
            @include('partials.publicaciones.carrusel')
            <br>
            @include('partials.talleres.carrusel')
        </div>
    </div>
</div>

@include('partials.productos1.script_productos')
@endsection
