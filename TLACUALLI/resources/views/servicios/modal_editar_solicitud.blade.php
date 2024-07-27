<!-- Modal de Edición de Solicitud -->
<div id="modalEditarSolicitud" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center hidden">
    <div class="bg-white w-full md:w-3/4 lg:w-1/2 xl:w-1/3 rounded-lg p-6 relative">
        <!-- Cierre del modal -->
        <button id="closeModalEditar" class="absolute top-4 right-4 text-gray-600 hover:text-gray-900">
            <!-- Icono de cerrar -->
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>

        <!-- Formulario dentro del modal -->
        <form method="POST" action="{{ route('servicios.update', ['id' => $solicitud->id]) }}" class="bg-white w-7/12 mx-auto mt-8 rounded-lg p-6 shadow-lg">
    @csrf <!-- Generación del token -->
    <h1 class="text-green-900 font-sans font-black text-4xl text-center pb-2 mb-4">Editar solicitud de servicio</h1>
    
    
    <div class="mb-3" hidden>
        <label class="text-green-900">Nombre</label>
        <select class="form-select" name="nombre" id="nombre">
            <option value="">Selecciona una opción</option>
            @foreach ($opciones as $id => $nombre)
                <option value="{{ $id }}" @if ($solicitud->id_cliente == $id) selected @endif>{{ $nombre }}</option>
            @endforeach
        </select>
        <p class="text-danger fst-italic">{{$errors->first('nombre')}}</p>
    </div>

    <div class="mb-3">
        <label class="text-green-900 font-sans font-bold pb-2 text-lg">Proveedor</label>
        <select class="form-select font-sans font-light focus:outline-none focus:ring-2 focus:ring-green-500" name="proveedor" id="proveedor">
            <option value="">Selecciona una opción</option>
            @foreach ($opciones as $id => $nombre)
                <option value="{{ $id }}" @if ($solicitud->id_proveedor == $id) selected @endif>{{ $nombre }}</option>
            @endforeach
        </select>
        <p class="text-red-600 text-sm font-sans font-bold">{{ $errors->first('proveedor') }}</p>
    </div>

    <div class="mb-3">
        <label class="text-green-900 font-sans font-bold pb-2 text-lg">Descripción</label>
        <textarea class="form-control font-sans font-light focus:outline-none focus:ring-2 focus:ring-green-500" id="descripcion" name="descripcion" rows="1">{{ $solicitud->descripcion }}</textarea>
        <p class="text-red-600 text-sm font-sans font-bold">{{ $errors->first('descripcion') }}</p>
    </div>

    <div class="mb-3">
        <label class="text-green-900 font-sans font-bold pb-2 text-lg">Tipo de servicio</label>
        <select class="form-select font-sans font-light focus:outline-none focus:ring-2 focus:ring-green-500" id="t_servicio" name="t_servicio">
            <option value="">Selecciona una opción</option>
            @foreach ($t_servicio as $id => $nombre)
                <option value="{{ $id }}" @if ($solicitud->id_publicacion == $id) selected @endif>{{ $nombre }}</option>
            @endforeach
        </select>
        <p class="text-red-600 text-sm font-sans font-bold">{{ $errors->first('t_servicio') }}</p>
    </div>

    <div class="mb-3">
        <label class="text-green-900 font-sans font-bold pb-2 text-lg">Fecha que requiere el servicio</label>
        <input type="date" class="form-control font-sans font-light focus:outline-none focus:ring-2 focus:ring-green-500" id="fecha" name="fecha" value="{{ $solicitud->fecha }}">
        <p class="text-red-600 text-sm font-sans font-bold">{{ $errors->first('fecha') }}</p>
    </div>

    <div class="d-flex justify-content-end mt-3">
        <button type="submit" class="bg-gradient-to-r from-green-500 to-green-800 hover:from-green-600 hover:to-green-800 text-white px-4 py-2 rounded-lg mr-2 font-semibold"">Editar</button>
        <a href="/mis_servicios" class="bg-gradient-to-r from-gray-500 to-gray-800 hover:from-gray-600 hover:to-gray-800 text-white px-4 py-2 rounded-lg font-semibold">Cancelar</a>
    </div>
</form>
    </div>
</div>
<!-- Fin del Modal de Edición de Solicitud -->
