
<!-- INICIO MODAL -->
<div class="modal fade" id="registrar_taller" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <!-- modal header -->
      <div class="flex justify-center pt-4 pb-2">
        <h1 class="text-green-900 font-sans font-black text-2xl text-center" id="exampleModalLabel">Nuevo taller</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

<!-- INICIO BODY MODAL -->
      <div class="modal-body">
        <form method="POST" action="/registroTaller" id=registroTaller enctype="multipart/form-data">
        @csrf

    <div class="mb-3">
      <label class="text-green-900 font-sans font-bold pb-2 text-base">Nombre taller</label>
      <input type="text" class="font-sans font-light px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 w-full" id="_nt" name="_nt"  placeholder="Ingrese el nombre de su taller" value="{{ old('_nt') }}">
      <p class="text-red-600 font-sans font-bold mt-1">{{ $errors->first('_nt') }}</p>
    </div>

   
    <div class="mb-3">
      <label class="text-green-900 font-sans font-bold pb-2 text-base">Descripción</label>
      <input type="text" class="font-sans font-light px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 w-full" id="_descT" name="_descT"  placeholder="Ingrese la descripción de su taller" value="{{ old('_descT') }}">
      <p class="text-red-600 font-sans font-bold mt-1">{{ $errors->first('_descT') }}</p>
    </div>

   <!-- INPUT FILE -->
<div class="mb-3">
  <label class="text-green-900 font-sans font-bold pb-2 text-base">Contenido (Imagen JPG o PNG)</label>
  
  <!-- Input de archivo oculto -->
  <input type="file" id="fileInput" name="_contT" accept="image/jpeg, image/png" class="hidden" onchange="updateFileName()">
  <br>
  <!-- Botón personalizado que activa el input oculto -->
  <label for="fileInput" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 cursor-pointer">
    Examinar
  </label>
  
  <!-- Nombre del archivo seleccionado -->
  <span id="fileName" class="ml-4 text-gray-700 font-sans font-light">Ningún archivo seleccionado</span>
</div>
<p class="text-red-600 font-sans font-bold mt-1">{{ $errors->first('_contT') }}</p>
<!-- FIN INPUT FILE -->


    <div class="mb-3">
      <label class="text-green-900 font-sans font-bold pb-2 text-base">Costos</label>
      <input type="number" class="font-sans font-light px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 w-full" id="_costoT" name="_costoT" placeholder="Ingrese el costo de su taller (0 en caso de ser gratuito)" value="{{ old('_costoT') }}">
      <p class="text-red-600 font-sans font-bold mt-1">{{ $errors->first('_costoT') }}</p>
    </div>

    <div class="mb-3">
        <label class="text-green-900 font-sans font-bold pb-2 text-base">Fecha de inicio del taller</label>
        <input type="date" class="font-sans font-light px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 w-full" id="_fechaInicioT" name="_fechaInicioT" value="{{ old('_fechaInicioT') }}">
        <p class="text-red-600 font-sans font-bold mt-1">{{ $errors->first('_fechaInicioT') }}</p>
    </div>
    
    <div class="modal-footer">
      <button type="submit" class="bg-gradient-to-r from-green-500 to-green-800 hover:from-green-600 hover:to-green-800 text-white px-4 py-2 rounded-lg mr-2 font-semibold font-sans" onclick="validarCampos()"><i class="bi bi-check-lg"></i> Agregar</button>
      <button type="button" class="bg-gradient-to-r from-gray-500 to-gray-800 hover:from-gray-600 hover:to-gray-800 text-white px-4 py-2 rounded-lg mr-2 font-semibold font-sans" data-bs-dismiss="modal" ><i class="bi bi-x-lg"></i> Cancelar</button>
     </div>

</form>

 
<!-- FIN BODY MODAL -->
      
      <!-- INICIO FOOTER MODAL -->
      
      <!-- FIN FOOTER MODAL -->


    </div>
  </div>
</div>
</div>

@foreach($publicaciones as $publicacion)
  @if(isset($publicacion))
    <!--INICIO DE MODAL DE ACTUALIZACION-->
    <div class="modal fade" id="actualizar_taller{{ $publicacion->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
              <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Actualización de taller</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <form method="POST" action="{{ !empty($publicacion->id) ? route('actualizarTaller', $publicacion->id) : '' }}" enctype="multipart/form-data">
                      @csrf
                      @method('PUT')

                      <div class="mb-3">
                          <label class="form-label">Nombre taller</label>
                          <input type="text" class="form-control" id="_nt" name="_nt" required value="{{ !empty($publicacion) ?  $publicacion : '' }}"<>
                      </div>

                      <div class="mb-3">
                          <label class="form-label">Descripción</label>
                          <input type="text" class="form-control" id="_descT" name="_descT" required value="{{ !empty($publicacion->descripcion) ?  $publicacion->descripcion : '' }}">
                      </div>

                      <div class="mb-3">
                          <label class="form-label">Contenido (Imagen JPG o PNG)</label>
                          <input type="file" class="form-control" id="_contT" name="_contT" accept="image/jpeg, image/png">
                      </div>

                      <div class="mb-3">
                          <label class="form-label">Costos</label>
                          <input type="number" class="form-control" id="_costoT" name="_costoT" required value="{{ !empty($publicacion->costo) ?  $publicacion->costo : '' }}">
                      </div>

                      <div class="modal-footer">
                          <button type="submit" class="bg-gradient-to-r from-green-500 to-green-800 hover:from-green-600 hover:to-green-800 text-white px-4 py-2 rounded-lg mr-2 font-semibold font-sans"> Actualizar</button>
                          <button type="button" class="btn btn-outline-warning" data-bs-dismiss="modal"><i class="bi bi-x-lg"></i> Cancelar</button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
    </div>
  @endif
@endforeach
 
<!-- FIN BODY MODAL -->
    </div>
  </div>
</div>
</div>


<script>
  document.addEventListener('DOMContentLoaded', function() {
    var modals = document.querySelectorAll('.modal');
    modals.forEach(function(modal) {
        modal.addEventListener('hidden.bs.modal', function() {
            if (document.querySelectorAll('.modal.show').length === 0) {
                document.body.classList.remove('modal-open');
                document.querySelectorAll('.modal-backdrop').forEach(function(backdrop) {
                    backdrop.remove();
                });
            }
        });
    });
});
</script>
<script>
  function validarCampos() {
    var nombreTaller = document.getElementById('_nt').value;
    var descripcionTaller = document.getElementById('_descT').value;
    var contenidoTaller = document.getElementById('_contT').value.length;
    var costoTaller = document.getElementById('_costoT').value.length;

    if (nombreTaller === "") {
      alert("Por favor, ingrese el nombre del taller.");
    } else if (descripcionTaller === "") {
      alert("Por favor, ingrese la descripción del taller.");
    } else if (contenidoTaller === "") {
      alert("Por favor, suba una imagen para el taller.");
    } else if (costoTaller === "") {
      alert("Por favor, ingrese el costo del taller.");
    } else {
      showSweetAlertTaller();
      document.getElementById('registroTaller').submit(); // Envía el formulario si todos los campos están completos
    }
  }
</script>

 <!-- script input file -->
 <script>
  function updateFileName() {
    var fileInput = document.getElementById('fileInput');
    var fileNameSpan = document.getElementById('fileName');
    if (fileInput.files.length > 0) {
      fileNameSpan.textContent = fileInput.files[0].name;
    } else {
      fileNameSpan.textContent = 'Ningún archivo seleccionado';
    }
  }
</script>
 <!-- script input file -->