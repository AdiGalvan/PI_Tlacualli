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

<!-- MENSAJE DE ERROR CON BOOTSTRAP -->
@if($errors->any())
@foreach($errors->all() as $error)
<!-- <div class= "alert alert-danger alert-dismissible fade show" role="alert">
<strong>{{$error}}</strong>
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div> -->
@endforeach
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
         <select class="form-select" name="nombre" id="nombre" value="{{old('nombre')}}">
            @foreach ($opciones as $id => $nombre)
                <option value="{{ $id }}">{{ $nombre }}</option>
            @endforeach
        </select>
        <p class= "text-danger fst-italic">{{$errors->first('nombre')}}</p>
        </div>

        <div class="mb-3">
          <label class="form-label">Proveedor</label>
          <select class="form-select" name="proveedor" id="proveedor" value="{{old('proveedor')}}">
            @foreach ($opciones as $id => $nombre)
                <option value="{{ $id }}">{{ $nombre }}</option>
            @endforeach
        </select>
        <p class= "text-danger fst-italic">{{$errors->first('proveedor')}}</p>
        </div>


        <div class="mb-3">
          <label class="form-label">Descripción</label>
          <textarea class="form-control" id="descripcion" name="descripcion" rows="2" value="{{old('descripcion')}}"></textarea>
          <p class= "text-danger fst-italic">{{$errors->first('descripcion')}}</p>
        </div>

        
        <div class="mb-3">
          <label class="form-label">Tipo de servicio</label>
          <select class="form-select" id="t_servicio" name="t_servicio" value="{{old('t_servicio')}}">
           @foreach ($t_servicio as $id => $nombre)
           <option value="{{ $id }}">{{$nombre}}</option>
           @endforeach
          </select>
          <p class= "text-danger fst-italic">{{$errors->first('t_servicio')}}</p>
        </div>
       
        <div class="mb-3">
          <label class="form-label">Fecha que requiere el servicio </label>
          <input type="date" class="form-control" id="fecha" name="fecha" value="{{old('fecha')}}">
          <p class= "text-danger fst-italic">{{$errors->first('fecha')}}</p>
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
