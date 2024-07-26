
<!-- INICIO MODAL -->
<div class="modal fade" id="registrar_taller" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo taller</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

<!-- INICIO BODY MODAL -->
      <div class="modal-body">
        <form method="POST" action="/registroTaller" id=registroTaller enctype="multipart/form-data">
        @csrf

    <div class="mb-3">
      <label class="form-label">Nombre taller</label>
      <input type="text" class="form-control" id="_nt" name="_nt" required placeholder="Ingrese el nombre de su taller">
    </div>

   
    <div class="mb-3">
      <label class="form-label">Descripción</label>
      <input type="text" class="form-control" id="_descT" name="_descT" required placeholder="Ingrese la descripción de su taller">
    </div>

    <div class="mb-3">
      <label class="form-label">Contenido (Imagen JPG o PNG)</label>
      <input type="file" class="form-control" id="_contT" name="_contT" accept="image/jpeg, image/png" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Costo</label>
      <input type="number" class="form-control" id="_costoT" name="_costoT" required placeholder="Ingrese el costo de su taller (0 en caso de ser gratuito)">
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-outline-success" onclick="validarCampos()"><i class="bi bi-check-lg"></i> Agregar</button>
      <button type="button" class="btn btn-outline-warning" data-bs-dismiss="modal" ><i class="bi bi-x-lg"></i> Cancelar</button>
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
                          <label class="form-label">Costo</label>
                          <input type="number" class="form-control" id="_costoT" name="_costoT" required value="{{ !empty($publicacion->costo) ?  $publicacion->costo : '' }}">
                      </div>

                      <div class="modal-footer">
                          <button type="submit" class="btn btn-outline-success"><i class="bi bi-check-lg"></i> Actualizar</button>
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


{{-- Script para el SweetAlert de AGREGAR TALLER --}}
<script>
  function showSweetAlertTaller() {
      const swalWithBootstrapButtons = Swal.mixin({
          customClass: {
              confirmButton: "btn btn-outline-success",
              cancelButton: "btn btn-outline-danger me-3" 
          },
          buttonsStyling: false
      });
      swalWithBootstrapButtons.fire({
          title: "¿Estás seguro?",
          text: "¡No podrás revertir esto!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonText: "Sí, agregarlo",
          cancelButtonText: "No, cancelar",
          reverseButtons: true
      }).then((result) => {
          if (result.isConfirmed) {
              swalWithBootstrapButtons.fire({
                  title: "¡Agregado!",
                  text: "El taller fue agregada correctamente.",
                  icon: "success"
              });
              document.getElementById('registroTaller').submit();
          } else if (result.dismiss === Swal.DismissReason.cancel) {
              swalWithBootstrapButtons.fire({
                  title: "Cancelado",
                  text: "El taller no se agregó :)",
                  icon: "error"
              });
          }
      });
  }
</script>
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

