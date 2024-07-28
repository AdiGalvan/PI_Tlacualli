@extends('layouts.template')
@section('titulo','Tienda')
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
                <div class="col-5">
                </div>
                <div class="col-2 justify-content-end">
                    <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#registrar_producto"><i class="bi bi-bag-plus"></i> Agregar </button>
                </div>
                
            </div>
<<<<<<< Updated upstream
            
          {{--   @for ($i = 0; $i < 3; $i++)
            <div class="row p-2">
                @for ($j = 0; $j < 4; $j++)
                    <div class="col-md-3 p-2">
                        @include('partials.productos.card_producto')
                    </div>
                @endfor
            </div>
            @endfor --}}
            
            <div class="container-fluid mt-5">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <div style="display: flex; justify-content: space-between; align-items: center;">
        
                                    <span id="card_title">
                                        {{ __('Productos') }}
                                    </span>
        
                                     <div class="float-right">
                                        <a href="{{ route('productos.create') }}" class="btn btn-outline-primary btn-sm float-right"  data-placement="left"><i class="bi bi-bag-plus"></i>Agregar Producto</a>
                                      </div>
                                </div>
                            </div>
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
                                                    <td>{{ ++$i }}</td>
                                                    
                                                    <td>{{ $producto->nombre }}</td>
                                                    <td>{{ $producto->descripcion }}</td>
                                                    <td>{{ $producto->costo }}</td>
                                                    <td>{{ $producto->stock }}</td>
                                                    <td>{{ $producto->estatus }}</td>
                                                    <td>{{ $producto->proveedor_id }}</td>
        
                                                    <td>
                                                        <form action="{{ route('productos.destroy',$producto->id) }}" method="POST">
                                                            <a class="btn btn-sm btn-outline-secondary " href="{{ route('productos.show',$producto->id) }}"><i class="bi bi-info-circle"></i> Más información</a>
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
                        {!! $productos->links() !!}
                    </div>
                </div>
            </div>
=======
           
            <div class="col-md-3 p-2">
                @include('partials.productos.card_producto')
            </div>   
>>>>>>> Stashed changes
        
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



@include('partials.productos1.registrar_producto')
@include('partials.productos1.script_productos')
@endsection
