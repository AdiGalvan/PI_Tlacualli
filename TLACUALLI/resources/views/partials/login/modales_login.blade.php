<!-- Modal para cambiar contraseña -->
<div class="modal fade" id="cambio_contraseña" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- modal header -->
      <div class="flex justify-center pt-4 pb-2">
        <h1 class="text-green-900 font-sans font-black text-2xl text-center" id="exampleModalLabel">Cambiar contraseña</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <form method="POST" action="/cambiar_contraseña">
          @csrf
          <div class="form-group mb-4">
            <label for="_pda" class="text-green-900 font-sans font-bold pb-2 text-sm">Contraseña Actual</label>
            <input type="password" class="font-sans font-light px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 w-full" id="_pda" name="_pda" value="{{ old('_pda') }}">
            @if ($errors->has('_pda'))
              <p class="text-red-600 font-sans font-bold mt-1">{{ $errors->first('_pda') }}</p>
            @endif
          </div>
          <div class="form-group mb-4">
            <label for="_pdn" class="text-green-900 font-sans font-bold pb-2 text-sm">Nueva Contraseña</label>
            <input type="password" class="font-sans font-light px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 w-full" id="_pdn" name="_pdn" value="{{ old('_pdn') }}">
            @if ($errors->has('_pdn'))
              <p class="text-red-600 font-sans font-bold mt-1">{{ $errors->first('_pdn') }}</p>
            @endif
          </div>
          <div class="form-group mb-4">
            <label for="_pdnc" class="text-green-900 font-sans font-bold pb-2 text-sm">Confirmar Nueva Contraseña</label>
            <input type="password" class="font-sans font-light px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 w-full" id="_pdnc" name="_pdnc" value="{{ old('_pdnc') }}">
            @if ($errors->has('_pdnc'))
              <p class="text-red-600 font-sans font-bold mt-1">{{ $errors->first('_pdnc') }}</p>
            @endif
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="bg-gradient-to-r from-green-500 to-green-800 hover:from-green-600 hover:to-green-800 text-white px-4 py-2 rounded-lg mr-2 font-semibold font-sans">Cambiar contraseña</button>
        <button type="button" class="bg-gradient-to-r from-gray-500 to-gray-800 hover:from-gray-600 hover:to-gray-800 text-white px-4 py-2 rounded-lg mr-2 font-semibold font-sans" data-bs-dismiss="modal">Cancelar</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal para eliminar perfil -->
<div class="modal fade" id="eliminar_perfil" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- modal header -->
      <div class="flex justify-center pt-4 pb-2">
        <h1 class="text-green-900 font-sans font-black text-2xl text-center" id="exampleModalLabel">Eliminar perfil</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p class="font-sans font-normal text-lg text-center">¿Estás seguro de querer eliminar tu cuenta?</p>
      </div>
      <div class="modal-footer">
        <form method="POST" action="/perfil/eliminar">
          @csrf
          <button type="submit" class="bg-gradient-to-r from-green-500 to-green-800 hover:from-green-600 hover:to-green-800 text-white px-4 py-2 rounded-lg mr-2 font-semibold">Eliminar Cuenta</button>
        </form>
        <button type="button" class="bg-gradient-to-r from-gray-500 to-gray-800 hover:from-gray-600 hover:to-gray-800 text-white px-4 py-2 rounded-lg mr-2 font-semibold" data-bs-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
