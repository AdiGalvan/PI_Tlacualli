@extends('layouts.template')
@section('titulo','Servicios')
@section('contenido')

<p></p>
{{-- @dd($servicios) --}}
<center><h1>Servicios</h1></center>
<p></p>
<div class="container mt-3">
    <form class="d-flex" role="search" action="" method="GET">
        <input class="form-control me-2" type="text" name="cliente" placeholder="Buscar por Cliente" aria-label="Buscar">
        <input class="form-control me-2" type="text" name="proveedor" placeholder="Buscar por Proveedor" aria-label="Buscar">
        <input class="form-control me-2" type="date" name="fecha" placeholder="Buscar por Fecha" aria-label="Buscar">
        <button class="btn btn-success" type="submit">Buscar</button>
    </form>
</div>

<div class="container mt-4 d-flex justify-content-end">
    {{-- Contenedor para los botones --}}
    <div class="d-flex gap-2">

        @if ($usuario->roles->id == 3)
            {{-- Son los servicios que yo como procesador de residuos publico y puedo dar al publico --}}
            <a href="{{ route('mis_servicios') }}" class="btn btn-warning">Mis servicios</a> 

            {{-- Son las solicitudes que me han hecho otros usuarios a mis servicios como procesador de residuos --}}
            <a href="" class="btn btn-warning">Solicitudes</a>
        @endif
        @if ($usuario->roles->id != 3 && $usuario->roles->id != null)
            {{-- Son las solicitudes que yo como usuario le he hecho a los procesadores de residuos, por ejemplo --}}
            <a href="{{ route('mis_solicitudes') }}" class="btn btn-warning">Mis servicios solicitados</a>            
        @endif

    </div>
</div>

{{ $usuario->roles->id}}


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

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Proveedor</th>
                {{-- <th>Tipos de servicio</th> --}}
                <th>Costo</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
        </thead>
        
        <tbody>
            @foreach($servicios as $servicio)
            {{-- @dd($servicio->usuario) --}}
            <tr>
                <td>{{ $servicio->nombre }}</td>
                <td>{{ $servicio->descripcion }}</td>
                <td>{{ $servicio->usuario->nombre_usuario }}</td>
                @if ($servicio->costo)
                    <td>${{ $servicio->costo }}</td>
                @else 
                    <td>Gratuito</td>   
                @endif
                <td>{{ $servicio->fecha_publicacion }}</td>
                <td>
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#servicioModal{{ $servicio->id }}">Detalles</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

@include('partials.servicios.modal_servicio')

@endsection
