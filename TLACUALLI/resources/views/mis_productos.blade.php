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
                     {!! $productos->links() !!} 
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

{{-- <div class="md:container md:mx-auto mb-36">
    <div class="flex items-center justify-center mb-6 space-x-4">
        <h2 class="text-3xl font-semibold font-sans text-dark uppercase dark:text-white">Tabla Productos</h2>
    </div>

    <div class="flex justify-start space-x-4 px-5 mb-6">
</div>

    <div class="flex justify-end space-x-4 px-5 mb-6">
        <button type="button" class="bg-gradient-to-r from-gray-500 to-gray-800 text-white font-sans font-bold px-4 py-2 rounded-md text-md" onclick="window.location.href='{{ url('/productos') }}'">Regresar</button>
        <button type="button" class="bg-gradient-to-r from-green-500 to-green-800 text-white font-sans font-bold px-4 py-2 rounded-md text-md" data-bs-toggle="modal" data-bs-target="#registrar_producto">Agregar producto</button> 

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
            @include('partials.productos.paginacion')
    </div>
</div>
@include('partials.productos.registrar_producto')
@include('partials.productos.script_productos')
@endsection
  --}}

<div class="md:container md:mx-auto mb-30 mt-5"> <!-- CONTAINER TABLE -->
    <div class="flex items-center justify-center mb-6 space-x-4">
        <h2 class="text-green-900 font-sans font-black text-4xl text-center w-full">Tabla Productos</h2>
    </div>
    <div class="flex justify-end space-x-4 px-5 mb-6">
        <button type="button" class="bg-gradient-to-r from-gray-500 to-gray-800 text-white font-sans font-bold px-4 py-2 rounded-md text-md" onclick="window.location.href='{{ url('/productos') }}'">Regresar</button>
        <button type="button" class="bg-gradient-to-r from-green-500 to-green-800 text-white font-sans font-bold px-4 py-2 rounded-md text-md" data-bs-toggle="modal" data-bs-target="#registrar_producto">Agregar producto</button> 

    </div>
    <table class="min-w-full bg-white shadow-lg rounded-lg overflow-hidden font-sans">
    <thead class="bg-green-900 text-white">
        <tr>
            <th class="px-6 py-3 text-left text-xl">ID</th>
            <th class="px-6 py-3 text-center text-xl">Nombre</th>
            <th class="px-6 py-3 text-center text-xl">Descripción</th>
            <th class="px-6 py-3 text-center text-xl">Costo</th>
            <th class="px-6 py-3 text-center text-xl">Stock</th>
            <th class="px-6 py-3 text-center text-xl">Imagen</th>
            <th class="px-6 py-3 text-center text-xl">Acciones</th>
        </tr>
    </thead>

    <tbody class="divide-y divide-gray-500">
        @foreach ($productos as $producto)
        <tr>
            <td class="px-6 py-4 text-base font-black">{{ $producto->id }}</td>
            <td class="px-6 py-4 text-base font-semibold text-center">{{ $producto->nombre }}</td>
            <td class="px-6 py-4 text-base font-semibold text-center">{{ $producto->descripcion }}</td>
            <td class="px-6 py-4 text-base font-semibold text-center">{{ $producto->costo }}</td>
            <td class="px-6 py-4 text-base font-semibold text-center">{{ $producto->stock }}</td>
            <td class="px-6 py-4 flex items-center justify-center">
                @if($producto->contenido)
                    <img src="{{ asset('storage/' . $producto->contenido) }}" alt="{{ $producto->nombre }}" class="w-24 h-24 object-cover">
                @else
                    No disponible
                @endif
            </td>
            <td class="px-6 py-4 text-center">
                <div class="flex justify-center space-x-2">
                    <button type="button" class="bg-gradient-to-r from-green-500 to-green-800 text-white font-sans font-bold px-4 py-2 rounded-md text-md" data-bs-toggle="modal" data-bs-target="#actualizar_producto{{ $producto->id }}">
                        <i class="bi bi-pencil-square"></i> Editar
                    </button>
                    @include('partials.productos.registrar_producto', ['producto' => $producto ?? new stdClass()])
                    @if ($producto->estatus)
                        <button type="button" class="bg-gradient-to-r from-yellow-500 to-yellow-800 hover:bg-yellow-600 text-white px-4 py-2 rounded-md font-sans font-bold " data-bs-toggle="modal" data-bs-target="#desactivar_producto{{ $producto->id }}">Desactivar</button>
                    @else
                        <button type="button" class="bg-gradient-to-r from-blue-600 to-blue-900 hover:bg-blue-800 text-white px-4 py-2 rounded-md font-sans font-bold " data-bs-toggle="modal" data-bs-target="#activar_producto{{ $producto->id }}">Activar</button>
                    @endif
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>


    </div>   
</div> <!-- DIV CONTAINER TABLE -->
@include('partials.productos.registrar_producto', ['producto' => $producto ?? new stdClass()])
@include('partials.productos.script_productos')
@endsection