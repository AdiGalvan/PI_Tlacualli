@extends('layouts.template')
@section('titulo','Servicios')
@section('contenido')
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<div class="container mx-auto px-4">

<!-- MENSAJE DE CONFIRMACIÓN CON BOOTSTRAP -->
@if(session()->has ('confirmacion'))
<div class= "alert alert-success alert-dismissible fade show" role="alert">
<strong>{{session('confirmacion')}}</strong>
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

 
      <h1 class="text-green-900 font-sans font-black text-4xl text-center pt-10">Solicitud de Servicio</h1>

      <!-- INICIO DEL FORM -->
      <form method="POST" action="{{ route('servicios.store') }}" class="bg-white w-7/12 mx-auto mt-8 rounded-lg p-6">
        @csrf <!-- Generación del token -->

        <div class="mb-3" hidden>
          <label class="text-green-900">Nombre</label>
          <input type="text" name="nombre" class="form-control font-sans font-light" value="@if(session()->has('id_usuario')) {{ session('id_usuario') }} @endif" id="nombre" ></input>
        <p class= "text-danger fst-italic">{{$errors->first('nombre')}}</p>
        </div>

        <div class="mb-3">
          <label class="text-green-900 font-sans font-bold pb-2 text-lg">Proveedor</label>
          <select class="form-select font-sans font-light" name="proveedor" id="proveedor">
          <option value="" @if (null == old('proveedor')) selected @endif>Selecciona una opción</option>
            @foreach ($opciones as $id => $nombre)
                <option value="{{ $id }}" {{ old('proveedor') == $id ? 'selected' : '' }}>{{ $nombre }}</option>
            @endforeach
        </select>
        <p class= "text-danger fst-italic">{{$errors->first('proveedor')}}</p>
        </div>


        <div class="mb-3">
          <label class="text-green-900 font-sans font-bold pb-2 text-lg">Descripción</label>
          <textarea class="form-control font-sans font-light" id="descripcion" name="descripcion" rows="1">{{ old('descripcion') }}</textarea>
          <p class= "text-danger fst-italic">{{$errors->first('descripcion')}}</p>
        </div>

        
        <div class="mb-3">
          <label class="text-green-900 font-sans font-bold pb-2 text-lg">Tipo de servicio</label>
          <select class="form-select font-sans font-light" id="t_servicio" name="t_servicio">
          <option value="" @if (null == old('t_servicio')) selected @endif>Selecciona una opción</option>
           @foreach ($t_servicio as $id => $nombre)
           <option value="{{ $id }}" {{ old('t_servicio') == $id ? 'selected' : '' }}>{{$nombre}}</option>
           @endforeach
          </select>
          <p class= "text-danger fst-italic">{{$errors->first('t_servicio')}}</p>
        </div>
       
        <div class="mb-3">
          <label class="text-green-900 font-sans font-bold pb-2 text-lg">Fecha que requiere el servicio</label>
          <input type="date" class="form-control font-sans font-light" id="fecha" name="fecha" value="{{ old('fecha') }}">
          <p class= "text-danger fst-italic">{{$errors->first('fecha')}}</p>
        </div>
      
       
        <div class="flex justify-end mt-3">
    <button type="submit" class="bg-green-600 hover:bg-green-900 text-white px-4 py-2 rounded-lg mr-2 font-semibold">Aceptar</button>
    <a href="/mis_servicios" class="bg-gray-600 hover:bg-gray-800 text-white px-4 py-2 rounded-lg font-semibold">Cancelar</a>
</div>

      </form>
      <!-- FIN FORM -->

</div> <!-- Cierre del div del container -->


<br>
<br>

@endsection
