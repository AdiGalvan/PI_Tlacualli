<!-- modal_nueva_solicitud.blade.php -->
<link href="{{ asset('css/mensajesValidacion.css') }}" rel="stylesheet">
<script src="{{ asset('js/app.js') }}" defer></script>
<form id="solicitudForm" method="POST" action="{{ route('servicios.store') }}" class="bg-white w-full rounded-lg p-6">
    @csrf <!-- Generación del token -->

    <h1 class="text-green-900 font-sans font-black text-4xl text-center pb-2 mb-4">Solicitud de Servicio</h1>

    <div class="mb-3" hidden>
        <label class="text-green-900">Nombre</label>
        <input type="text" name="nombre" id="nombre" class="form-control font-sans font-light" value="{{ old('nombre', session('id_usuario', '')) }}">
        <p class="text-red-600 text-sm font-sans font-bold" id="error-nombre"></p>
    </div>

    <div class="mb-3">
        <label for="proveedor" class="text-green-900 font-sans font-bold pb-2 text-lg">Proveedor</label>
        <select class="form-select font-sans font-light focus:outline-none focus:ring-2 focus:ring-green-500" name="proveedor" id="proveedor">
            <option value="" @selected(old('proveedor') === '')>Selecciona una opción</option>
            @foreach ($opciones as $id => $nombre)
                <option value="{{ $id }}" @selected(old('proveedor') == $id)>{{ $nombre }}</option>
            @endforeach
        </select>
        <p class="text-red-600 text-sm font-sans font-bold" id="error-proveedor">{{ $errors->first('proveedor') }}</p>
    </div>

    <div class="mb-3">
        <label for="descripcion" class="text-green-900 font-sans font-bold pb-2 text-lg">Descripción</label>
        <textarea id="descripcion" name="descripcion" class="form-control font-sans font-light focus:outline-none focus:ring-2 focus:ring-green-500">{{ old('descripcion') }}</textarea>
        <p class="text-red-600 text-sm font-sans font-bold" id="error-descripcion">{{ $errors->first('descripcion') }}</p>
    </div>

    <div class="mb-3">
        <label for="t_servicio" class="text-green-900 font-sans font-bold pb-2 text-lg">Tipo de servicio</label>
        <select class="form-select font-sans font-light focus:outline-none focus:ring-2 focus:ring-green-500" id="t_servicio" name="t_servicio">
            <option value="" @selected(old('t_servicio') === '')>Selecciona una opción</option>
            @foreach ($t_servicio as $id => $nombre)
                <option value="{{ $id }}" @selected(old('t_servicio') == $id)>{{ $nombre }}</option>
            @endforeach
        </select>
        <p class="text-red-600 text-sm font-sans font-bold" id="error-t_servicio">{{ $errors->first('t_servicio') }}</p>
    </div>

    <div class="mb-3">
        <label for="fecha" class="text-green-900 font-sans font-bold pb-2 text-lg">Fecha que requiere el servicio</label>
        <input type="date" id="fecha" name="fecha" class="form-control font-sans font-light focus:outline-none focus:ring-2 focus:ring-green-500" value="{{ old('fecha') }}">
        <p class="text-red-600 text-sm font-sans font-bold" id="error-fecha">{{ $errors->first('fecha') }}</p>
    </div>

    <div class="flex justify-end mt-3">
        <button type="submit" class="bg-gradient-to-r from-green-500 to-green-800 hover:from-green-600 hover:to-green-800 text-white px-4 py-2 rounded-lg mr-2 font-semibold">Aceptar</button>
        <button type="button" id="closeModalNS" class="bg-gradient-to-r from-gray-500 to-gray-800 hover:from-gray-600 hover:to-gray-800 text-white px-4 py-2 rounded-lg font-semibold">Cancelar</button>
    </div>
</form>
