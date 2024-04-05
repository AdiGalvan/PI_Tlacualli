@extends('layouts.template')
@section('titulo','Tienda')
@section('contenido')


<div class="container p-5">
    
    <h1 class="text-center">Productos</h1>

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
    
    @for ($i = 0; $i < 3; $i++)
    <div class="row p-2">
        @for ($j = 0; $j < 4; $j++)
            <div class="col-md-3 p-2">
                @include('partials.card_producto')
            </div>
        @endfor
    </div>
@endfor

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


@include('partials.nuevo_producto')
@include('partials.script_productos')
@endsection
