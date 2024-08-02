{{-- @extends('layouts.template')
@section('titulo','TablaProductos')
@section('contenido')

<div class="row mt-5">
    <div class="col-2">
    </div>
    <div class="col-8">  
        
    
            <h1 class="text-center">Tabla Productos</h1>
        
            <div class="row">
                <div class="col-5">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Buscar productos ..." aria-label="Buscar productos" aria-describedby="button-search">
                        <button class="btn btn-outline-primary" type="button" id="button-search"><i class="bi bi-search"></i> Buscar</button>
                    </div>        
                </div>
                <div class="col-5">
                </div>
                <div class="float-right col-2 justify-content-end">
                    <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#registrar_producto"><i class="bi bi-file-earmark-text"></i>Agregar producto</button>
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
                                                <th>No</th>
                                                
                                                <th>Nombre</th>
                                                <th>Descripcion</th>
                                                <th>Costo</th>
                                                <th>Stock</th>
                                                <th>Estatus</th>
                                                <th>Proveedor Id</th>
        
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($productos as $producto)
                                                <tr>
                                                    
                                                    
                                                    <td>{{ $producto->nombre }}</td>
                                                    <td>{{ $producto->descripcion }}</td>
                                                    <td>{{ $producto->costo }}</td>
                                                    <td>{{ $producto->stock }}</td>
                                                    <td>{{ $producto->estatus }}</td>
                                                    <td>{{ $producto->proveedor_id }}</td>
        
                                                    <td>
                                                        <form action="{{ route('productos.destroy',$producto->id) }}" method="POST">
                                                            <a class="btn btn-sm btn-outline-warning" href="{{ route('productos.edit',$producto->id) }}"><i class="bi bi-pencil-square"></i></a>
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-outline-danger btn-sm"><i class="bi bi-trash3"></i></button>
                                                        </form> 
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="row justify-content-center mt-5">
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
            @include('partials.productos.carrusel')
            <br>
            @include('partials.publicaciones.carrusel')
            <br>
            @include('partials.talleres.carrusel')
        </div>
    </div>
</div>



@include('partials.productos.registrar_producto')
@include('partials.productos.script_productos')
@endsection
 
 --}}


@extends('layouts.template')
@section('titulo','TablaProductos')
@section('contenido')

<div class="row mt-5">
    <div class="flex items-center justify-center mb-6 space-x-4">
        <h2 class="text-3xl font-semibold text-dark uppercase dark:text-white">Tabla Productos</h2>
    </div>
    <div class="flex justify-end space-x-4 px-5 mb-6">
        <button type="button" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800" onclick="window.location.href='{{ url('/productos') }}'">Regresar</button>
        <button type="button" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"data-bs-toggle="modal" data-bs-target="#registrar_producto">Agregar producto</button> 

    </div>
            <div class="container-fluid mt-5">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body bg-white">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead class="thead">
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Descripcion</th>
                                                <th>Costo</th>
                                                <th>Stock</th>
                                                <th>Estatus</th>
        
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($productos as $producto)
                                                <tr>
                                                    <td>{{ $producto->nombre }}</td>
                                                    <td>{{ $producto->descripcion }}</td>
                                                    <td>{{ $producto->costo }}</td>
                                                    <td>{{ $producto->stock }}</td>
                                                    <td>{{ $producto->estatus }}</td>
        
                                                    <td>
                                                        {{-- <form action="{{ route('productos.destroy',$producto->id) }}" method="POST">
                                                            <a class="btn btn-sm btn-outline-warning" href="{{ route('productos.edit',$producto->id) }}"><i class="bi bi-pencil-square"></i></a>
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-outline-danger btn-sm"><i class="bi bi-trash3"></i></button>
                                                        </form> --}}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('partials.productos.paginacion')
    </div>
</div>
@include('partials.productos.registrar_producto')
@include('partials.productos.script_productos')
@endsection
 