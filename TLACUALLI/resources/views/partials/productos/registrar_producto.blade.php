<!-- INICIO MODAL -->
<div class="modal fade" id="registrar_producto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo producto</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="/registroProducto" id=registroProducto enctype="multipart/form-data">
        @csrf

    <div class="mb-3">
      <label class="form-label">Nombre del producto</label>
      <input type="text" class="form-control" id="_np" name="_np" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Descripción</label>
      <input type="text" class="form-control" id="_descP" name="_descP" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Costo unitario</label>
      <input type="number" class="form-control" id="_costoP" name="_costoP" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Stock</label>
      <input type="number" class="form-control" id="_stockP" name="_stockP" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Contenido (Imagen JPG o PNG)</label>
      <input type="file" class="form-control" id="_contP" name="_contP" accept="image/jpeg, image/png" required>
    </div>

    <div class="modal-footer">
      <button type="button" class="btn btn-outline-success" onclick="validarCampos()"><i class="bi bi-check-lg"></i> Agregar</button>
      <button type="button" class="btn btn-outline-warning" data-bs-dismiss="modal" ><i class="bi bi-x-lg"></i> Cancelar</button>
     </div>

</form>
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
              document.getElementById('registroProdcuto').submit();
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
    var nombreProducto = document.getElementById('_np').value;
    var descripcionProducto = document.getElementById('_descP').value;
    var contenidoProducto = document.getElementById('_contP').value.length;
    var costoProducto = document.getElementById('_costoP').value.length;
    var stockProducto = document.getElementById('_stockP').value

    if (nombreProducto === "") {
      alert("Por favor, ingrese el nombre.");
    } else if (descripcionProducto === "") {
      alert("Por favor, ingrese la descripción.");
    } else if (contenidoProducto === "") {
      alert("Por favor, suba una imagen.");
    } else if (costoProducto === "") {
      alert("Por favor, ingrese el costo.");
    } else if (stockProducto === "") {
      alert("Por favor, ingrese el stock.");
     else {
      showSweetAlertTaller();
      document.getElementById('registroProducto').submit(); // Envía el formulario si todos los campos están completos
      }
    }
  }
</script>

