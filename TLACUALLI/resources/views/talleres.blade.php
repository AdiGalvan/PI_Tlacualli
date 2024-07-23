@extends('layouts.template')
@section('titulo','Talleres')
@section('contenido')

<div class="row mt-5">
    <div class="col-2">
        <div class="sticky-top">
            @include('partials.talleres.filtros')
        </div>
    </div>
    {{-- @dd($usuario) --}}
    <div class="col-8">

        <h1 class="text-center">Talleres</h1>

        <div class="row">
            <div class="col-5">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Buscar taller ..." aria-label="Buscar productos" aria-describedby="button-search">
                    <button class="btn btn-outline-primary" type="button" id="button-search"><i class="bi bi-search"></i> Buscar</button>
                </div>
            </div>
            <div class="col-5">
            </div>
            @if ($usuario->roles->id == 6)
            <div class="col-2 justify-content-end">
                <a href="{{ route('mis_talleres') }}" class="btn btn-outline-success"><i class="bi bi-folder"></i> Mis talleres</a>
            </div>
            @endif
        </div>

        @if($publicaciones->isEmpty())
            <p>No hay talleres disponibles.</p>
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
            @include('partials.productos1.carrusel')
            <br>
            @include('partials.publicaciones.carrusel')
            <br>
            @include('partials.talleres.carrusel')
        </div>
    </div>
</div>

@include('partials.talleres.registrar_taller')
@endsection
