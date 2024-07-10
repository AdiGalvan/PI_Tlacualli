@extends('layouts.template')
@section('titulo','Publicaciones')
@section('contenido')


<div class="row mt-3">
    <div class="col-10 pt-5 ps-5">
        <br><br>
        @include('partials.carrusel_home')
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
                    <h1 class="text-center">Publicaciones</h1>
                
                    <div class="row">
                        <div class="col-5">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Buscar publicación ..." aria-label="Buscar productos" aria-describedby="button-search">
                                <button class="btn btn-outline-primary" type="button" id="button-search"><i class="bi bi-search"></i> Buscar</button>
                            </div>        
                        </div>
                        <div class="col-5"></div>
                        
                        <div class="float-right col-2 justify-content-end">
                            <a href="{{ route('publicaciones.index') }}" class="btn btn-outline-primary btn-sm float-right" id="registrar_publicacion" data-placement="left"><i class="bi bi-bag-plus"></i>  Agregar Publicación</a>
                        </div>
                    </div>
                    
                    <div class="container-fluid mt-5">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    @if ($message = Session::get('success'))
                                        <div class="alert alert-success m-4">
                                            <p>{{ $message }}</p>
                                        </div>
                                    @endif
                                    
                                </div>
                                {!! $publicaciones->links() !!}
                            </div>
                        </div>
                    </div>
                    <div class="row p-2">
                        @foreach ($publicaciones as $i => $publicacion)
                            @include('partials.publicaciones.publicaciones_acordion', ['publicacion' => $publicacion, 'i' => $i])
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
<!-- @include('partials.publicaciones.create') -->

@endsection
