@extends('layouts.template')
@section('titulo','TablaProductos')
@section('contenido')

<div class="flex flex-col lg:flex-row mt-5">
    <div class="w-full lg:w-1/6 flex flex-col items-end">
        <div class="sticky top-0">
            @include('partials.productos1.filtros')
        </div>
    </div>
    
    <div class="w-full lg:w-2/3 px-4">
        <h1 class="text-center text-2xl font-bold">Tabla Productos</h1>
        <div class="flex flex-wrap items-center my-4">
            <div class="w-full lg:w-1/2 flex">
                <div class="relative w-full">
                    <input type="text" class="w-full p-2 border border-gray-300 rounded-l-md focus:outline-none" placeholder="Buscar productos ...">
                    <button class="absolute right-0 p-2 bg-blue-500 text-white rounded-r-md hover:bg-blue-700 focus:ring-4 focus:ring-blue-300">Buscar</button>
                </div>
            </div>
            <div class="w-full lg:w-1/2 flex justify-end">
                <a href="{{ route('productos.create') }}" class="p-2 bg-blue-500 text-white rounded-md hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 text-xs"><i class="bi bi-bag-plus"></i> Agregar Producto</a>
            </div>
        </div>
        
        <div class="bg-white shadow-md rounded my-6">
            @if ($message = Session::get('success'))
                <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
                    <p>{{ $message }}</p>
                </div>
            @endif

            <div class="p-4">
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 bg-gray-200 text-gray-600 font-bold uppercase text-sm">No</th>
                                <th class="py-2 px-4 bg-gray-200 text-gray-600 font-bold uppercase text-sm">Nombre</th>
                                <th class="py-2 px-4 bg-gray-200 text-gray-600 font-bold uppercase text-sm">Descripcion</th>
                                <th class="py-2 px-4 bg-gray-200 text-gray-600 font-bold uppercase text-sm">Costo</th>
                                <th class="py-2 px-4 bg-gray-200 text-gray-600 font-bold uppercase text-sm">Stock</th>
                                <th class="py-2 px-4 bg-gray-200 text-gray-600 font-bold uppercase text-sm">Estatus</th>
                                <th class="py-2 px-4 bg-gray-200 text-gray-600 font-bold uppercase text-sm">Proveedor Id</th>
                                <th class="py-2 px-4 bg-gray-200 text-gray-600 font-bold uppercase text-sm">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($productos as $producto)
                                <tr class="hover:bg-gray-100">
                                    <td class="py-2 px-4 border-b border-gray-200">{{ ++$i }}</td>
                                    <td class="py-2 px-4 border-b border-gray-200">{{ $producto->nombre }}</td>
                                    <td class="py-2 px-4 border-b border-gray-200">{{ $producto->descripcion }}</td>
                                    <td class="py-2 px-4 border-b border-gray-200">{{ $producto->costo }}</td>
                                    <td class="py-2 px-4 border-b border-gray-200">{{ $producto->stock }}</td>
                                    <td class="py-2 px-4 border-b border-gray-200">{{ $producto->estatus }}</td>
                                    <td class="py-2 px-4 border-b border-gray-200">{{ $producto->proveedor_id }}</td>
                                    <td class="py-2 px-4 border-b border-gray-200">
                                        <div class="flex space-x-2">
                                            <a href="{{ route('productos.edit', $producto->id) }}" class="p-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-700 focus:ring-4 focus:ring-yellow-300 text-xs"><svg class="w-[20px] h-[20px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.779 17.779 4.36 19.918 6.5 13.5m4.279 4.279 8.364-8.643a3.027 3.027 0 0 0-2.14-5.165 3.03 3.03 0 0 0-2.14.886L6.5 13.5m4.279 4.279L6.499 13.5m2.14 2.14 6.213-6.504M12.75 7.04 17 11.28"/></svg>
                                            </a>
                                            <form action="{{ route('productos.destroy', $producto->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="p-2 bg-red-500 text-white rounded-md hover:bg-red-700 focus:ring-4 focus:ring-red-300 text-xs"><svg class="w-[20px] h-[20px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                                  </svg>
                                                  </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {!! $productos->links() !!}
        </div>
    </div>
</div>

@include('partials.productos1.registrar_producto')
@include('partials.productos1.script_productos')
@endsection
