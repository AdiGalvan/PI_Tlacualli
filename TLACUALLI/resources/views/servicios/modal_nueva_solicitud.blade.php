<form method="POST" action="{{ route('servicios.store') }}" class="bg-white w-full rounded-lg p-6">
    @csrf <!-- Generación del token -->

    <h1 class="text-green-900 font-sans font-black text-4xl text-center pb-2 mb-4">Solicitud de Servicio</h1>

    <div class="mb-3" hidden>
        <label class="text-green-900">Nombre</label>
        <input type="text" name="nombre" class="form-control font-sans font-light" value="@if(session()->has('id_usuario')) {{ session('id_usuario') }} @endif" id="nombre">
        <p class="text-danger fst-italic">{{$errors->first('nombre')}}</p>
    </div>

    <div class="mb-3">
        <label for="proveedor" class="text-green-900 font-sans font-bold pb-2 text-lg">Proveedor</label>
        <select class="form-select font-sans font-light focus:outline-none focus:ring-2 focus:ring-green-500 @if($errors->has('proveedor')) focus:ring-red-600 @endif"
                name="proveedor" id="proveedor" required>
            <option value="" @if (null == old('proveedor')) selected @endif>Selecciona una opción</option>
            @foreach ($opciones as $id => $nombre)
                <option value="{{ $id }}" {{ old('proveedor') == $id ? 'selected' : '' }}>{{ $nombre }}</option>
            @endforeach
        </select>
        <p class="text-red-600 text-sm font-sans font-bold">{{ $errors->first('proveedor') }}</p>
    </div>

    <div class="mb-3">
        <label for="descripcion" class="text-green-900 font-sans font-bold pb-2 text-lg">Descripción</label>
        <textarea class="form-control font-sans font-light focus:outline-none focus:ring-2 focus:ring-green-500 @if($errors->has('descripcion')) focus:ring-red-600 @endif"
                  id="descripcion" name="descripcion" rows="1" required>{{ old('descripcion') }}</textarea>
        <p class="text-red-600 text-sm font-sans font-bold">{{ $errors->first('descripcion') }}</p>
    </div>

    <div class="mb-3">
        <label for="t_servicio" class="text-green-900 font-sans font-bold pb-2 text-lg">Tipo de servicio</label>
        <select class="form-select font-sans font-light focus:outline-none focus:ring-2 focus:ring-green-500 @if($errors->has('t_servicio')) focus:ring-red-600 @endif"
                id="t_servicio" name="t_servicio" required>
            <option value="" @if (null == old('t_servicio')) selected @endif>Selecciona una opción</option>
            @foreach ($t_servicio as $id => $nombre)
                <option value="{{ $id }}" {{ old('t_servicio') == $id ? 'selected' : '' }}>{{ $nombre }}</option>
            @endforeach
        </select>
        <p class="text-red-600 text-sm font-sans font-bold">{{ $errors->first('t_servicio') }}</p>
    </div>

    <div class="mb-3">
        <label for="fecha" class="text-green-900 font-sans font-bold pb-2 text-lg">Fecha que requiere el servicio</label>
        <input type="date" class="form-control font-sans font-light focus:outline-none focus:ring-2 focus:ring-green-500 @if($errors->has('fecha')) focus:ring-red-600 @endif"
               id="fecha" name="fecha" value="{{ old('fecha') }}" required>
        <p class="text-red-600 text-sm font-sans font-bold">{{ $errors->first('fecha') }}</p>
    </div>
      
    <div class="flex justify-end mt-3">
        <button type="submit" class="bg-gradient-to-r from-green-500 to-green-800 hover:from-green-600 hover:to-green-800 text-white px-4 py-2 rounded-lg mr-2 font-semibold">Aceptar</button>
        <button type="button" id="closeModalNS" class="bg-gradient-to-r from-gray-500 to-gray-800 hover:from-gray-600 hover:to-gray-800 text-white px-4 py-2 rounded-lg font-semibold">Cancelar</button>
    </div>
</form>
