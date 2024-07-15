<!-- publicciones/create.blade.php -->
<div class="modal fade" id="registrar_publicacion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Nueva publicación</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <!-- INICIO BODY MODAL -->
      <div class="modal-body">
    <form method="post" action="{{ route('publicaciones.store') }}" enctype="multipart/form-data">
        @csrf
        
        <div class="mb-3">
            <label class="form-label">{{ __('Nombre') }}</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
            <p class="text-danger fst-italic">{{ $errors->first('nombre') }}</p>
        </div>

        <div class="mb-3">
            <label class="form-label">{{ __('Tipo ID') }}</label>
            <select class="form-select" id="id_tipo" name="id_tipo" required>
                <option value="">Selecciona una opción</option>
                <option value="1">Artículo</option>
                <option value="2">Servicio</option>
                <option value="3">Anuncio</option>
            </select>
            <p class="text-danger fst-italic">{{ $errors->first('id_tipo') }}</p>
        </div> 

        <div class="mb-3">
            <label class="form-label">{{ __('Descripcion') }}</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{ old('descripcion') }}" required>
            <p class="text-danger fst-italic">{{ $errors->first('descripcion') }}</p>
        </div>

        


        <div class="modal-footer">
            <button type="submit" class="btn btn-outline-success"><i class="bi bi-check-lg"></i> Guardar</button>
            <button type="button" class="btn btn-outline-warning" data-bs-dismiss="modal"><i class="bi bi-x-lg"></i> Cancelar</button>
        </div>
    </form>
</div>

      <!-- FIN BODY MODAL -->
    </div>
  </div>
</div>

{{-- Script para el SweetAlert de AGREGAR PUBLICACIÓN --}}
<script>
  function showSweetAlertPublicacion() {
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
          confirmButtonText: "Sí, agregarla",
          cancelButtonText: "No, cancelar",
          reverseButtons: true
      }).then((result) => {
          if (result.isConfirmed) {
              swalWithBootstrapButtons.fire({
                  title: "¡Agregado!",
                  text: "La publicación fue agregada correctamente.",
                  icon: "success"
              });
          } else if (result.dismiss === Swal.DismissReason.cancel) {
              swalWithBootstrapButtons.fire({
                  title: "Cancelado",
                  text: "La publicación no se agregó :)",
                  icon: "error"
              });
          }
      });
  }
</script>
<script>
  function validarCampos() {
      var titulo = document.getElementById('_tp').value;
      var tipo = document.getElementById('_tipo').value;
      var descripcion = document.getElementById('_des').value;
      var contenido = document.getElementById('_cont').value;

      if (titulo === "" || tipo === "" || descripcion === "" || contenido === "") {
          alert("Por favor, complete todos los campos.");
      } else {
          showSweetAlertPublicacion();
      }
  }
</script>

