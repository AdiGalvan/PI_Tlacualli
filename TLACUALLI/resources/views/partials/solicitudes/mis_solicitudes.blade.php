@extends('layouts.template')
@section('titulo','Mis solicitudes')
@section('contenido')

<p></p>
<center><h1>Mis solicitudes</h1></center>
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
    {{-- <div class="d-flex gap-2">
        <a href="{{ route('mis_solicitudes') }}" class="btn btn-warning">Mis solicitudes</a> 
        <a href="" class="btn btn-warning">Solicitudes</a>
    </div> --}}
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

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Proveedor</th>
                <th>Costo</th>
                <th>Fecha de publicación</th>
                <th>Fecha de solicitud</th>
                <th>Acciones</th>
            </tr>
        </thead>
        
        <tbody>
            @foreach($solicitudes as $solicitud)
            <tr>
                <td>{{ $solicitud->servicio->nombre }}</td>
                <td>{{ $solicitud->servicio->descripcion }}</td>
                <td>{{ $solicitud->proveedor->nombre_usuario }}</td>
                @if ($solicitud->servicio->costo)
                    <td>${{ $solicitud->servicio->costo }}</td>
                @else 
                    <td>Gratuito</td>   
                @endif
                <td>{{ $solicitud->servicio->created_at }}</td>
                <td>{{ $solicitud->fecha }}</td>
                <td>
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#miSolicitudModal{{ $solicitud->id }}">Detalles</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@include('partials.solicitudes.modal_mi_solicitud')

@endsection
