@extends('layouts.template')
@section('titulo','Publicaciones')
@section('contenido')


<div class="row mt-3">
    <div class="col-10">
        <div id="carouselExampleIndicators" class="carousel slide bg-primary" data-bs-ride="carousel" >
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRd1TV6F79DQaHvrNU60Dx1ansavn0RcZq4FJsyNP_4OQ&s" class="d-block mx-auto" alt="Imagen1" style="max-width: 100%;" width="450px"; height="300px">
                </div>
                <div class="carousel-item">
                    <img src="https://abono.in/wp-content/uploads/2022/04/2-Bags-With-Content.jpg" class="d-block mx-auto" alt="Imagen2" style="max-width: 100%;" width="450px"; height="300px">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
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
                                <input type="text" class="form-control" placeholder="Buscar productos ..." aria-label="Buscar productos" aria-describedby="button-search">
                                <button class="btn btn-outline-primary" type="button" id="button-search">Buscar</button>
                            </div>        
                        </div>
                        <div class="col-5">
                        </div>
                        <div class="col-2 justify-content-end">
                            <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#registrar_producto">Agregar Producto</button>
                        </div>
                    </div>
                    
                    <div class="row p-2">
                        @for ($i = 1; $i <= 10; $i++)
                            @include('partials.publicaciones.acordion_publicaciones')
                        @endfor
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
    <div class="col-2 bg-primary">
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


@include('partials.publicaciones.nueva_publicacion')
@endsection
