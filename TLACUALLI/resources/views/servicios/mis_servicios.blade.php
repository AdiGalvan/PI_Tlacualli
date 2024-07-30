@extends('layouts.template')


@section('titulo', 'Servicios')

@section('contenido')
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"> 

<link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet" />


<div class="p-4">
    <h1 class="text-green-900 font-sans font-black text-3xl md:text-4xl text-center pb-2 mb-4">Mis solicitudes</h1>

    <div class="bg-white mx-4 sm:mx-auto mt-8 rounded-lg p-6 shadow-lg">
        <form class="flex flex-col sm:flex-row justify-center" role="search" action="{{ route('servicios.search') }}" method="GET">
            <input class="border border-gray-300 rounded-md px-3 py-2 mb-2 sm:mb-0 sm:mr-2 flex-grow" type="text" name="cliente" placeholder="Buscar por Cliente" aria-label="Buscar">
            <input class="border border-gray-300 rounded-md px-3 py-2 mb-2 sm:mb-0 sm:mr-2 flex-grow" type="text" name="proveedor" placeholder="Buscar por Proveedor" aria-label="Buscar">
            <input class="border border-gray-300 rounded-md px-3 py-2 mb-2 sm:mb-0 sm:mr-2 flex-grow" type="date" name="fecha" placeholder="Buscar por Fecha" aria-label="Buscar">
            <button class="bg-gradient-to-r from-green-500 to-green-800 hover:from-green-600 hover:to-green-800 text-white px-4 py-2 rounded-md mt-2 sm:mt-0 transition-colors duration-300" type="submit">Buscar</button>
        </form>
    </div>

     <!-- Botón para disparar modal "Nueva Solicitud"-->
    <div class="mt-4 flex justify-end mx-4 sm:mx-auto">
              <button data-modal-target="modalNuevaSolicitud" data-modal-toggle="modalNuevaSolicitud" class="bg-gradient-to-r from-green-500 to-green-800 hover:from-green-600 hover:to-green-800 text-white font-sans font-bold px-4 py-2 rounded-md text-lg transition-colors duration-300">Nueva solicitud</button>
    </div>
    <!-- Fin botón disparador -->


    <div class="mt-4 mx-4 sm:mx-auto">
        @if(session()->has('noResults'))
        <div class="bg-yellow-200 border-l-4 border-yellow-500 text-yellow-700 p-4 mb-4">
            <p><strong>{{ session('noResults') }}</strong></p>
        </div>
        @endif

        @if(session()->has('confirmacion'))
        <div class="bg-green-200 border-l-4 border-green-500 text-green-700 p-4 mb-4">
            <p><strong>{{ session('confirmacion') }}</strong></p>
        </div>
        @endif

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white shadow-2xl rounded-lg overflow-hidden mb-12">
                <thead class="bg-green-900 text-white">
                    <tr>
                        <th class="px-2 py-2 text-left text-xs sm:text-base">ID</th>
                        <th class="px-2 py-2 text-left text-xs sm:text-base">Cliente</th>
                        <th class="px-2 py-2 text-left text-xs sm:text-base">Proveedor</th>
                        <th class="px-2 py-2 text-left text-xs sm:text-base">Descripción</th>
                        <th class="px-2 py-2 text-left text-xs sm:text-base">Tipos de servicio</th>
                        <th class="px-2 py-2 text-left text-xs sm:text-base">Fecha</th>
                        <th class="px-2 py-2 text-left text-xs sm:text-base">Acciones</th>
                    </tr>
                </thead>
                
                <tbody class="divide-y divide-gray-500">
                    @foreach($solicitudes as $solicitud)
                    <tr>
                        <td class="px-2 py-1 text-sm">{{ $solicitud->id }}</td>
                        <td class="px-2 py-1 text-sm">{{ $solicitud->cliente }}</td>
                        <td class="px-2 py-1 text-sm">{{ $solicitud->proveedor }}</td>
                        <td class="px-2 py-1 text-sm">{{ $solicitud->descripcion }}</td>
                        <td class="px-2 py-1 text-sm">{{ $solicitud->tipo_servicio }}</td>
                        <td class="px-2 py-1 text-sm">{{ $solicitud->fecha }}</td>
                        <td class="px-2 py-1">
                            <!-- INICIA DIV PARA SECCIÓN DE BOTONES -->
                            <div class="inline-flex space-x-1 items-center">
                                <!-- Botón Editar -->
                                <button id="openModalES{{ $solicitud->id }}" class="bg-gradient-to-r from-green-500 to-green-800 hover:from-green-600 hover:to-green-800 text-white font-sans font-bold px-2 py-1 rounded-md text-xs no-underline inline-flex items-center space-x-1 transition-colors duration-300">
                                    <!-- Icono de editar de heroicons -->
                                    <svg data-slot="icon" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="h-4 w-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125"></path>
                                    </svg>
                                    <span>Editar</span>
                                </button>



 <!-- Modal "Editar solicitud" -->
    <div id="modalES{{ $solicitud->id }}" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center hidden">
    <div class="bg-white w-full md:w-3/4 lg:w-1/2 xl:w-1/3 rounded-lg p-6">
    @include('servicios.modal_editar_solicitud') <!-- Incluye el formulario >de "Editar solicitud" en el modal -->
                                        
    <button id="closeModalES{{ $solicitud->id }}" class="absolute top-4 right-4 text-gray-600 hover:text-gray-900">
                                           
    <!-- Icono de cerrar -->
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
    </svg>
    </button>
    </div>
    </div>
<!-- Fin modal "Editar Solicitud" -->

<!-- Botón Eliminar -->
<button id="openModalElS{{ $solicitud->id }}" class="bg-gradient-to-r from-yellow-300 to-yellow-500 hover:from-yellow-400 hover:to-yellow-600 text-white font-sans font-bold px-2 py-1 rounded-md text-xs no-underline inline-flex items-center space-x-1 transition-colors duration-300">
<!-- Icono de bote de basura -->
<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-4 w-4">
<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 9l6 6 6-6"></path>
</svg>
<span>Eliminar</span>
</button>


<!-- Modal "Editar solicitud" -->
<div id="modalElS{{ $solicitud->id }}" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center hidden">
<div class="bg-white w-full md:w-3/4 lg:w-1/2 xl:w-1/3 rounded-lg p-6">
<h1 class="text-green-900 font-sans font-black text-4xl text-center pb-2 mb-4">Eliminar solicitud de servicio</h1>
¿Seguro que desea eliminar?{{-- Cambiar mensaje por lo que se requiera --}}
<link href="{{ asset('css/mensajesValidacion.css') }}" rel="stylesheet">
<script src="{{ asset('js/app.js') }}" defer></script>

<form method="POST" action="{{ route('servicios.softDelete', ['id' => $solicitud->id]) }}" class="bg-white w-full rounded-lg p-6">
@csrf <!-- Generación del token -->
<div class="flex justify-end mt-3">
<button type="submit" class="bg-gradient-to-r from-yellow-300 to-yellow-500 hover:from-yellow-400 hover:to-yellow-600 text-white px-4 py-2 rounded-lg mr-2 font-semibold">Aceptar</button>
<button type="button" id="closeModalElS{{ $solicitud->id }}" class="bg-gradient-to-r from-gray-500 to-gray-800 hover:from-gray-600 hover:to-gray-800 text-white px-4 py-2 rounded-lg font-semibold">Cancelar</button>
</div>
</form>

<button id="closeModalElS{{ $solicitud->id }}" class="absolute top-4 right-4 text-gray-600 hover:text-gray-900">
<!-- Icono de cerrar -->
<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
</svg>
</button>
</div>
</div>
<!-- Fin modal "Eliminar Solicitud" -->

</div> <!-- ¿de qué es este div? -->
<!-- TERMINA DIV PARA SECCIÓN DE BOTONES -->
</td>
</tr>
                    
@endforeach
</tbody>
</table>
</div>
</div>


<!-- Modal "Nueva solicitud" -->
 <!-- Main modal -->
<div id="modalNuevaSolicitud" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)]">
    <div class="bg-white w-9/12 md:w-3/4 lg:w-1/2 xl:w-1/3 rounded-lg p-6">
      
    <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">

            <!-- Modal header -->
    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
    <div class="flex-grow flex justify-center">
        <h1 class="text-green-900 font-sans font-black text-4xl pb-2 mb-4">Solicitud de Servicio</h1>
    </div>
    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="modalNuevaSolicitud">
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
        </svg>
        <span class="sr-only">Close modal</span>
    </button>
</div>

            <!-- Modal body -->
            <div class="p-4 md:p-5">
                <form class="space-y-4" method="POST" action="{{ route('servicios.store') }}">
                @csrf

                <div class="mb-3">
    <label for="proveedor" class="text-green-900 font-sans font-bold pb-2 text-lg">Proveedor</label>
    <select class="form-select font-sans font-light focus:outline-none focus:ring-2 focus:ring-green-500"
            name="proveedor" id="proveedor">
        <option value="" @if (null == old('proveedor')) selected @endif>Selecciona una opción</option>
        @foreach ($opciones as $id => $nombre)
            <option value="{{ $id }}" {{ old('proveedor') == $id ? 'selected' : '' }}>{{ $nombre }}</option>
        @endforeach
    </select>
    <br>
    @if($errors->has('proveedor')) <p class="bg-gray-600 text-white text-sm font-sans font-bold rounded-lg px-2 py-2 min-h-[2.5rem] inline-block border-0 mb-2">
         {{ $errors->first('proveedor') }}
        </p>
    @endif
</div>

                
<div class="mb-3">
    <label for="descripcion" class="text-green-900 font-sans font-bold pb-2 text-lg">Descripción</label>
    <textarea class="form-control font-sans font-light focus:outline-none focus:ring-2 focus:ring-green-500"
              id="descripcion" name="descripcion" rows="1">{{ old('descripcion') }}</textarea>
              <br>
    @if($errors->has('descripcion')) <p class="bg-gray-600 text-white text-sm font-sans font-bold rounded-lg px-2 py-2 min-h-[2.5rem] inline-block border-0 mb-2">
         {{ $errors->first('descripcion') }}
        </p>
    @endif
</div>

<div class="mb-3">
    <label for="t_servicio" class="text-green-900 font-sans font-bold pb-2 text-lg">Tipo de servicio</label>
    <select class="form-select font-sans font-light focus:outline-none focus:ring-2 focus:ring-green-500"
            id="t_servicio" name="t_servicio">
        <option value="" @if (null == old('t_servicio')) selected @endif>Selecciona una opción</option>
        @foreach ($t_servicio as $id => $nombre)
            <option value="{{ $id }}" {{ old('t_servicio') == $id ? 'selected' : '' }}>{{ $nombre }}</option>
        @endforeach
    </select>
    <br>
    @if($errors->has('t_servicio')) <p class="bg-gray-600 text-white text-sm font-sans font-bold rounded-lg px-2 py-2 min-h-[2.5rem] inline-block border-0 mb-2">
         {{ $errors->first('t_servicio') }}
        </p>
    @endif
</div>

<div class="mb-3">
    <label for="fecha" class="text-green-900 font-sans font-bold pb-2 text-lg">Fecha que requiere el servicio</label>
    <input type="date" class="form-control font-sans font-light focus:outline-none focus:ring-2 focus:ring-green-500 rounded-lg"
           id="fecha" name="fecha" value="{{ old('fecha') }}">
           <br>
    @if($errors->has('fecha')) <p class="bg-gray-600 text-white text-sm font-sans font-bold rounded-lg px-2 py-2 min-h-[2.5rem] inline-block border-0 mb-2">
         {{ $errors->first('fecha') }}
        </p>
    @endif
</div>
      
       
        <div class="flex justify-end mt-3">
    <button type="submit" class="bg-gradient-to-r from-green-500 to-green-800 hover:from-green-600 hover:to-green-800 text-white px-4 py-2 rounded-lg mr-2 font-semibold">Aceptar</button>
    <a href="/mis_servicios" class="bg-gradient-to-r from-gray-500 to-gray-800 hover:from-gray-600 hover:to-gray-800 text-white px-4 py-2 rounded-lg font-semibold">Cancelar</a>
</div>
                </form>
            </div>
        </div>
    </div>
</div> 
<!-- Fin modal "Nueva Solicitud" -->


<!-- Script que controla el modal NS (El script está alojado en la carpeta "public")-->
<!-- <script src="{{ asset('js/modal_nueva_solicitud.js') }}"></script> -->

<!-- Script para editar solicitud -->
<script src="{{ asset('js/modal_editar_solicitud.js') }}"></script>

<!-- Script para eliminar solicitud -->
<script src="{{ asset('js/modal_eliminar_solicitud.js') }}"></script>



<script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>

@endsection
