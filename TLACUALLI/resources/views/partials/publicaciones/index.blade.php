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
                            <button class="btn btn-outline-primary btn-sm float-right" data-bs-toggle="modal" data-bs-target="#registrar_publicacion"><i class="bi bi-bag-plus"></i> Agregar Publicación</button>
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
                                    <div class="card-body bg-white">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-hover">
                                                <thead class="thead">
                                                    <tr>
                                                        <th>No. Publicacion</th>
                                                        <th>Título de la publicacion</th>
                                                        <th>Tipo de publición</th>
                                                        <th>Descripción</th>
                                                        <!-- <th>Contenido</th> -->
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php $i = 0; @endphp
                                                    @foreach ($publicaciones as $publicacion)
                                                        <tr>
                                                            <td>{{ ++$i }}</td>
                                                            <td>{{ $publicacion->nombre }}</td>
                                                            <td>{{ $publicacion->tipos_publicaciones }}</td>
                                                            <td>{{ $publicacion->descripcion }}</td>
                                                            <!-- <td>{{ $publicacion->contenido }}</td> -->
                                                            <td>
                                                                <div class="flex justify-center rounded-lg text-lg" role="group">
                                                                    <button class="btn btn-outline-primary btn-sm float-right" data-bs-toggle="modal" data-bs-target="#edit_publicacion" data-nombre="{{ $publicacion->nombre }}"><i class="bi bi-bag-plus"></i> Editar Título</button> 


                                                                        @csrf
                                                                        @method('PUT')
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                {!! $publicaciones->links() !!}
                            </div>
                        </div>
                    </div>
                    <!-- <div class="row p-2">
                        @foreach ($publicaciones as $i => $publicacion)
                            @include('partials.publicaciones.show', ['publicacion' => $publicacion, 'i' => $i])
                        @endforeach
                    </div> -->
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
<!-- @include('partials.publicaciones.edit') -->

@endsection
