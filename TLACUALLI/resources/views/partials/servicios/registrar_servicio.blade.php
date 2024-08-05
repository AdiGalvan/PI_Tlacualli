<!-- INICIO MODAL -->
<div class="modal fade" id="registrar_servicio" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <!-- modal header -->
      <div class="flex justify-center pt-4 pb-2">
        <h1 class="text-green-900 font-sans font-black text-3xl text-center" id="exampleModalLabel">Nuevo servicio</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="/registroServicio" id="registroServicio" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label class="text-green-900 font-sans font-bold pb-2 text-base">Nombre del servicio</label>
            <input type="text" class="font-sans font-light px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 w-full" id="_ns" name="_ns" >
            <p class="text-red-600 font-sans font-bold mt-1">{{ $errors->first('_ns') }}</p>
          </div>
          <div class="mb-3">
            <label class="text-green-900 font-sans font-bold pb-2 text-base">Resumen de servicio</label>
            <input type="text" class="font-sans font-light px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 w-full" id="_descS" name="_descS" >
            <p class="text-red-600 font-sans font-bold mt-1">{{ $errors->first('_descS') }}</p>
          </div>
          <div class="mb-3">
            <label class="text-green-900 font-sans font-bold pb-2 text-base">Costo por servicio</label>
            <input type="number" class="font-sans font-light px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 w-full" id="_costoS" name="_costoS" >
            <p class="text-red-600 font-sans font-bold mt-1">{{ $errors->first('_costoS') }}</p>
          </div>
          <div class="mb-3">
              <label for="_notaS" class="text-green-900 font-sans font-bold pb-2 text-base">Descripción</label>
              <textarea class="font-sans font-light px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 w-full" id="_notaS" name="_notaS" rows="3"></textarea>
              <p class="text-red-600 font-sans font-bold mt-1">{{ $errors->first('_notaS') }}</p>
            </div> 
          <div class="modal-footer">
            <button type="submit" class="bg-gradient-to-r from-green-500 to-green-800 hover:from-green-600 hover:to-green-800 text-white px-4 py-2 rounded-lg mr-2 font-semibold font-sans" onclick="validarCampos()"><i class="bi bi-check-lg"></i> Agregar</button>
            <button type="button" class="bg-gradient-to-r from-gray-500 to-gray-800 hover:from-gray-600 hover:to-gray-800 text-white px-4 py-2 rounded-lg mr-2 font-semibold font-sans" data-bs-dismiss="modal"><i class="bi bi-x-lg"></i> Cancelar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
{{-- Modal de actualización de servicio --}}
<div class="modal fade" id="actualizar_servicio{{ $servicio->id ?? '' }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <!-- modal header -->
      <div class="flex justify-center pt-4 pb-2">
        <h1 class="text-green-900 font-sans font-black text-2xl text-center" id="exampleModalLabel">Actualizar servicio</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ !empty($servicio->id) ? route ('actualizarServicio', $servicio->id) : '' }}" id="actualizarServicio" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="mb-3">
            <label class="text-green-900 font-sans font-bold pb-2 text-base">Nombre del servicio</label>
            <input type="text" class="font-sans font-light px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 w-full" id="_ns" name="_ns"  value="{{ !empty($servicio->nombre) ? $servicio->nombre : '' }}">
            <p class="text-red-600 font-sans font-bold mt-1">{{ $errors->first('_ns') }}</p>
          </div>
          <div class="mb-3">
            <label class="text-green-900 font-sans font-bold pb-2 text-base">Resumen de servicio</label>
            <input type="text" class="font-sans font-light px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 w-full" id="_descS" name="_descS"  value="{{ !empty($servicio->descripcion) ? $servicio->descripcion : '' }}">
            <p class="text-red-600 font-sans font-bold mt-1">{{ $errors->first('_descS') }}</p>
          </div>
          <div class="mb-3">
            <label class="text-green-900 font-sans font-bold pb-2 text-base">Costo por servicio</label>
            <input type="number" class="font-sans font-light px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 w-full" id="_costoS" name="_costoS"  value="{{ !empty($servicio->costo) ? $servicio->costo : '' }}">
            <p class="text-red-600 font-sans font-bold mt-1">{{ $errors->first('_costoS') }}</p>
          </div>
          <div class="mb-3">
              <label for="_notaS" class="text-green-900 font-sans font-bold pb-2 text-base">Descripción</label>
              <textarea class="font-sans font-light px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 w-full" id="_notaS" name="_notaS" rows="3">{{ !empty($servicio->notas) ? $servicio->notas : '' }}</textarea>
              <p class="text-red-600 font-sans font-bold mt-1">{{ $errors->first('_notaS') }}</p>
            </div>        
          <div class="modal-footer">
            <button type="submit" class="bg-gradient-to-r from-green-500 to-green-800 hover:from-green-600 hover:to-green-800 text-white px-4 py-2 rounded-lg mr-2 font-semibold font-sans"><i class="bi bi-check-lg"></i> Agregar</button>
            <button type="button" class="bg-gradient-to-r from-gray-500 to-gray-800 hover:from-gray-600 hover:to-gray-800 text-white px-4 py-2 rounded-lg mr-2 font-semibold font-sans" data-bs-dismiss="modal"><i class="bi bi-x-lg"></i> Cancelar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>





  