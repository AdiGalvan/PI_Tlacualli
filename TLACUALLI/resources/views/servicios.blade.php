@extends('layouts.template')
@section('titulo','Servicios')
@section('contenido')

<div class="container mt-5 col-md-6">

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
      <form method="POST" action="{{ route('servicios.store') }}">
        @csrf <!-- Generación del token -->

        <div class="mb-3">
          <label class="form-label">Nombre</label>
         <!--  <input type="text" class="form-control" id="nombre" name="nombre"> -->
         <select class="form-select" name="nombre" id="nombre">
            @foreach ($opciones as $id => $nombre)
                <option value="{{ $id }}">{{ $nombre }}</option>
            @endforeach
        </select>
        </div>

        <div class="mb-3">
          <label class="form-label">Proveedor</label>
          <select class="form-select" name="proveedor" id="proveedor">
            @foreach ($opciones as $id => $nombre)
                <option value="{{ $id }}">{{ $nombre }}</option>
            @endforeach
        </select>
        </div>

        <div class="mb-3">
          <label class="form-label">Descripción</label>
          <textarea class="form-control" id="descripcion" name="descripcion" rows="2"></textarea>
        </div>

       
        <div class="mb-3">
          <label class="form-label">Fecha</label>
          <input type="date" class="form-control" id="fecha" name="fecha">
        </div>

      
       
        <div class="d-flex justify-content-end mt-3">
          <button type="submit" class="btn btn-success me-2">Aceptar</button>
          <a href="/" class="btn btn-secondary">Cancelar</a>
        </div>
      </form>
      <!-- FIN FORM -->
    </div> <!-- Cierre del div del card-body -->
  </div> <!-- Cierre del div del card -->
</div> <!-- Cierre del div del container -->

@endsection
