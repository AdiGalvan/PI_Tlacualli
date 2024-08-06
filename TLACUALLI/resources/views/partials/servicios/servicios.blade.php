@extends('layouts.template')
@section('titulo','Servicios')
@section('contenido')

<p></p>
{{-- @dd($servicios) --}}
<h1 class="text-green-900 font-sans font-black text-4xl pt-4 pb-4 flex justify-center">Servicios</h1>
<p></p>
<div class="bg-white w-full max-w-4xl mx-auto mt-8 rounded-lg p-6 shadow-lg">
    <form class="flex flex-col md:flex-row md:gap-4 gap-4" role="search" action="/mis_servicios/search" method="GET">
        <div class="flex flex-grow">
            <input class="border border-gray-300 rounded-md px-3 py-2 w-full" type="text" name="proveedor" placeholder="Buscar por Proveedor" aria-label="Buscar">
        </div>
        <button class="bg-gradient-to-r from-green-500 to-green-800 hover:bg-green-600 text-white px-4 py-2 rounded-md w-full md:w-auto" type="submit">Buscar</button>
    </form>
</div>




<div class="container mt-4 d-flex justify-content-end">
    {{-- Contenedor para los botones --}}
    <div class="d-flex gap-2">

        @if ($usuario->roles->id == 3 || $usuario->roles->id == 7)
            {{-- Son los servicios que yo como procesador de residuos publico y puedo dar al publico --}}
            <a href="{{ route('mis_servicios') }}" class="bg-gradient-to-r from-green-500 to-green-800 hover:bg-green-600 text-white px-4 py-2 rounded-md">Mis servicios</a> 
        @endif
        @if ($usuario->roles->id != 3 && $usuario->roles->id != null)         
        @endif

    </div>
</div>



<div class="container mt-3">
    @if(session()->has('noResults'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>{{ session('noResults') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if(session()->has('confirmacion'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session('confirmacion') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="md:container md:mx-auto mb-20">
    <table class="min-w-full bg-white shadow-2xl rounded-lg overflow-hidden">
        <thead class="bg-green-900 text-white ">
            <tr>
                <th class="px-6 py-3 text-left text-base">Nombre</th>
                <th class="px-6 py-3 text-left text-base">Descripción</th>
                <th class="px-6 py-3 text-left text-base">Proveedor</th>
                {{-- <th>Tipos de servicio</th> --}}
                <th class="px-6 py-3 text-left text-base">Costo</th>
                <th class="px-6 py-3 text-left text-base">Fecha</th>
                <th class="px-6 py-3 text-left text-base">Acciones</th>
            </tr>
        </thead>
        
        <tbody class="divide-y divide-gray-500 shadow-md">
            @foreach($servicios as $servicio)
            {{-- @dd($servicio->usuario) --}}
            <tr>
                <td class="px-6 py-4 text-base font-semibold">{{ $servicio->nombre }}</td>
                <td class="px-6 py-4 text-base font-medium">{{ $servicio->descripcion }}</td>
                <td class="px-6 py-4 text-base font-medium">{{ $servicio->usuario->nombre_usuario }}</td>
                @if ($servicio->costo)
                    <td>${{ $servicio->costo }}</td>
                @else 
                    <td class="px-6 py-4 text-base font-medium">Gratuito</td>   
                @endif
                <td class="px-6 py-4 text-base font-medium">{{ $servicio->fecha_publicacion }}</td>
                <td class="px-6 py-4 text-base font-semibold">
                    <button type="button" class="bg-gradient-to-r from-green-500 to-green-800 hover:bg-green-600 text-white px-4 py-2 rounded-md" data-bs-toggle="modal" data-bs-target="#servicioModal{{ $servicio->id }}">Detalles</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
</div>
{{ $servicios->links('vendor.pagination.centered') }}
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

@include('partials.servicios.modal_servicio')

@endsection
