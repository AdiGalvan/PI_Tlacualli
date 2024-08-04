@extends('layouts.template')
@section('titulo','Servicios')
@section('contenido')

<div class="container mt-5 col-md-6">

<!-- MENSAJE DE CONFIRMACIÓN CON BOOTSTRAP -->
@if(session()->has ('confirmacion'))
<div class= "alert alert-success alert-dismissible fade show" role="alert">
<strong>{{session('confirmacion')}}</strong>
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

  <div class="card">
    <div class="card-body">
      <center><h3 class="card-title">Solicitud de servicio</h3></center>

      <!-- INICIO DEL FORM -->
      <form method="POST" action="{{ route('servicios.update', ['id' => $solicitud->id]) }}">
    @csrf <!-- Generación del token -->

    <div class="mb-3">
        <label class="form-label">Nombre</label>
        <select class="form-select" name="nombre" id="nombre">
            <option value="">Selecciona una opción</option>
            @foreach ($opciones as $id => $nombre)
                <option value="{{ $id }}" @if ($solicitud->id_cliente == $id) selected @endif>{{ $nombre }}</option>
            @endforeach
        </select>
        <p class="text-danger fst-italic">{{$errors->first('nombre')}}</p>
    </div>

    <div class="mb-3">
        <label class="form-label">Proveedor</label>
        <select class="form-select" name="proveedor" id="proveedor">
            <option value="">Selecciona una opción</option>
            @foreach ($opciones as $id => $nombre)
                <option value="{{ $id }}" @if ($solicitud->id_proveedor == $id) selected @endif>{{ $nombre }}</option>
            @endforeach
        </select>
        <p class="text-danger fst-italic">{{$errors->first('proveedor')}}</p>
    </div>

    <div class="mb-3">
        <label class="form-label">Descripción</label>
        <textarea class="form-control" id="descripcion" name="descripcion" rows="1">{{ $solicitud->descripcion }}</textarea>
        <p class="text-danger fst-italic">{{$errors->first('descripcion')}}</p>
    </div>

    <div class="mb-3">
        <label class="form-label">Tipo de servicio</label>
        <select class="form-select" id="t_servicio" name="t_servicio">
            <option value="">Selecciona una opción</option>
            @foreach ($t_servicio as $id => $nombre)
                <option value="{{ $id }}" @if ($solicitud->id_publicacion == $id) selected @endif>{{ $nombre }}</option>
            @endforeach
        </select>
        <p class="text-danger fst-italic">{{$errors->first('t_servicio')}}</p>
    </div>

    <div class="mb-3">
        <label class="form-label">Fecha que requiere el servicio</label>
        <input type="date" class="form-control" id="fecha" name="fecha" value="{{ $solicitud->fecha }}">
        <p class="text-danger fst-italic">{{$errors->first('fecha')}}</p>
    </div>

    <div class="d-flex justify-content-end mt-3">
        <button type="submit" class="btn btn-primary">Editar</button>
        <a href="/mis_servicios" class="btn btn-secondary">Cancelar</a>
    </div>
</form>
      <!-- FIN FORM -->
    </div> <!-- Cierre del div del card-body -->
  </div> <!-- Cierre del div del card -->
</div> <!-- Cierre del div del container -->

@endsection
