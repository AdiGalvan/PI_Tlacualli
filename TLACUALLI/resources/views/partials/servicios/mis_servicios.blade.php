@extends('layouts.template')
@section('titulo','Servicios')
@section('contenido')

<p></p>
<center><h1>Mis servicios</h1></center>
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
    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#registrar_servicio">Registrar servicio</button>
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
                <th>ID</th>
                <th>Clientes</th>
                <th>Descripción</th>
                <th>Tipos de servicio</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
        </thead>
        
        <tbody>
            @foreach($solicitudes as $solicitud)
            <tr>
                <td>{{ $solicitud->id }}</td>
                <td>{{ $solicitud->cliente }}</td>
                <td>{{ $solicitud->descripcion }}</td>
                <td>{{ $solicitud->tipo_servicio }}</td>
                <td>{{ $solicitud->fecha }}</td>
                <td>
                     <a href="{{-- {{ route('servicios.edit', ['id' => $solicitud->id]) }}--}}" class="btn btn-primary">Editar</a> 
                    <form action="{{--{{ route('servicios.editForm', ['id' => $solicitud->id]) }}--}}" method="GET" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

@include('partials.servicios.registrar_servicio')
@endsection


