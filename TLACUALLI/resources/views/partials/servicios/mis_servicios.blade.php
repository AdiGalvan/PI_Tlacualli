@extends('layouts.template')
@section('titulo','Servicios')
@section('contenido')

<p></p>
<center><h1>Mis servicios</h1></center>
<p></p>
<div class="container mt-3">
    <form class="d-flex" role="search" action="" method="GET">
        <input class="form-control me-2" type="text" name="cliente" placeholder="Buscar por Cliente" aria-label="Buscar">
        {{-- <input class="form-control me-2" type="text" name="proveedor" placeholder="Buscar por Proveedor" aria-label="Buscar"> --}}
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
                <th>Nombre</th>
                <th>Descripción</th>
                {{-- <th>Tipos de servicio</th> --}}
                <th>Costo</th>
                <th>Fecha de publicación</th>
                <th>Acciones</th>
            </tr>
        </thead>
        
        <tbody>
            @foreach($servicios as $servicio)
            <tr>
                <td>{{ $servicio->id }}</td>
                <td>{{ $servicio->cliente }}</td>
                <td>{{ $servicio->nombre }}</td>
                <td>{{ $servicio->descripcion }}</td>
                <td>
                    @if ( $servicio->costo == 0 )
                        Gratuito
                    @else
                        ${{ $servicio->costo }}
                    @endif
                </td>
                <td>{{ $servicio->fecha_publicacion }}</td>
                <td>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#actualizar_servicio{{ $servicio->id }}">Editar</button> 
                    @if($servicio->estatus==1)
                    <form action="{{ route('desactivarServicio', $servicio->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method ('PUT')
                        <button type="submit" class="btn btn-danger btn-sm">Desactivar</button>
                    </form>
                    @else
                    <form action="{{ route('activarServicio', $servicio->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method ('PUT')
                        <button type="submit" class="btn btn-danger btn-sm">Activar</button>
                    </form>
                    @endif
                </td>
            </tr>
            @include('partials.servicios.registrar_servicio', ['servicio' => $servicio])
            @endforeach
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

@include('partials.servicios.registrar_servicio')
@endsection


