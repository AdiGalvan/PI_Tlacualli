<!-- INICIO MODAL -->
<div class="modal fade" id="registrar_servicio" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo servicio</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="/registroServicio" id="registroServicio" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label class="form-label">Nombre del servicio</label>
            <input type="text" class="form-control" id="_ns" name="_ns" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Descripción</label>
            <input type="text" class="form-control" id="_descS" name="_descS" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Costo por servicio</label>
            <input type="number" class="form-control" id="_costoS" name="_costoS" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Nota (opcional)</label>
            <input type="text" class="form-control" id="_notaS" name="_notaS">
          </div>
          <div class="mb-3">
            <label class="form-label">Contenido (Imagen JPG o PNG)</label>
            <input type="file" class="form-control" id="_contS" name="_contS" accept="image/jpeg, image/png" required>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-success" onclick="validarCampos()"><i class="bi bi-check-lg"></i> Agregar</button>
            <button type="button" class="btn btn-outline-warning" data-bs-dismiss="modal"><i class="bi bi-x-lg"></i> Cancelar</button>
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
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Actualizar servicio</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ !empty($servicio->id) ? route ('actualizarServicio', $servicio->id) : '' }}" id="actualizarServicio" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="mb-3">
            <label class="form-label">Nombre del servicio</label>
            <input type="text" class="form-control" id="_ns" name="_ns" required value="{{ !empty($servicio->nombre) ? $servicio->nombre : '' }}">
          </div>
          <div class="mb-3">
            <label class="form-label">Descripción</label>
            <input type="text" class="form-control" id="_descS" name="_descS" required value="{{ !empty($servicio->descripcion) ? $servicio->descripcion : '' }}">
          </div>
          <div class="mb-3">
            <label class="form-label">Costo por servicio</label>
            <input type="number" class="form-control" id="_costoS" name="_costoS" required value="{{ !empty($servicio->costo) ? $servicio->costo : '' }}">
          </div>
          <div class="mb-3">
            <label class="form-label">Nota (opcional)</label>
            <input type="text" class="form-control" id="_notaS" name="_notaS" value="{{ !empty($servicio->nota) ? $servicio->nota : '' }}">
          </div>
          <div class="mb-3">
            <label class="form-label">Contenido (Imagen JPG o PNG)</label>
            <!-- Mostrar la imagen actual -->
            @if (!empty($servicio->contenido))
              <div class="mb-3">
                <img src="{{ asset('storage/' . $servicio->contenido) }}" alt="Imagen del servicio" class="img-fluid" style="max-height: 200px;">
              </div>
              <!-- Campo oculto para enviar el nombre de la imagen existente -->
              <input type="hidden" name="_contS" value="{{ $servicio->contenido }}">
            @endif
            <!-- Campo para subir una nueva imagen -->
            <input type="file" class="form-control" id="_contS" name="_contS" accept="image/jpeg, image/png">
          </div>          
          <div class="modal-footer">
            <button type="submit" class="btn btn-outline-success"><i class="bi bi-check-lg"></i> Agregar</button>
            <button type="button" class="btn btn-outline-warning" data-bs-dismiss="modal"><i class="bi bi-x-lg"></i> Cancelar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  function validarCampos() {
    var nombreServicio = document.getElementById('_ns').value.length;
    var descripcionServicio = document.getElementById('_descS').value.length;
    var costoServicio = document.getElementById('_costoS').value.length;
    var notaServicio = document.getElementById('_notaS').value.length;
    var contenidoServicio = document.getElementById('_contS').files.length;

    if (nombreServicio === 0) {
      alert("Por favor, ingrese el nombre del servicio.");
    } else if (descripcionServicio === 0) {
      alert("Por favor, ingrese la descripción.");
    } else if (costoServicio === 0) {
      alert("Por favor, ingrese el costo.");
    } else if (contenidoServicio === 0) {
      alert("Por favor, suba una imagen.");
    } else {
      showSweetAlertServicio();
    }
  }

  function showSweetAlertServicio() {
    const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
        confirmButton: "btn btn-outline-success",
        cancelButton: "btn btn-outline-danger me-3" 
      },
      buttonsStyling: false
    });
    
    swalWithBootstrapButtons.fire({
      title: "¡Agregado!",
      text: "El servicio fue agregado correctamente.",
      icon: "success"
    });
    
    document.getElementById('registroServicio').submit();
  }  
</script>




  