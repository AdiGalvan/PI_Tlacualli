<!-- Formulario dentro del modal -->
<link href="{{ asset('css/mensajesValidacion.css') }}" rel="stylesheet">
<script src="{{ asset('js/app.js') }}" defer></script>
    <form method="POST" action="{{ route('servicios.update', ['id' => $solicitud->id]) }}" class="bg-white w-full rounded-lg p-6">
    @csrf <!-- Generación del token -->
    <h1 class="text-green-900 font-sans font-black text-4xl text-center pb-2 mb-4">Editar solicitud de servicio</h1>
    
    
    <div class="mb-3" hidden>
        <label class="text-green-900">Nombre {{ $solicitud->id }}</label>
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
        <button type="button" id="closeModalES{{ $solicitud->id }}" class="bg-gradient-to-r from-gray-500 to-gray-800 hover:from-gray-600 hover:to-gray-800 text-white px-4 py-2 rounded-lg font-semibold">Cancelar</button>
    </div>
</form>
<!-- Fin del Modal de Edición de Solicitud -->