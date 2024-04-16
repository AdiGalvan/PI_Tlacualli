
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
        <form method="" action="">

    <div class="mb-3">
      <label class="form-label">Nombre taller</label>
      <input type="text" class="form-control" id="_nt" name="_nt" required>
    </div>

   
    <div class="mb-3">
      <label class="form-label">Descripción</label>
      <input type="text" class="form-control" id="_descT" name="_descT" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Contenido</label>
      <input type="file" class="form-control" id="_contT" name="_contT" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Costo</label>
      <input type="text" class="form-control" id="_costoT" name="_costoT" required>
    </div>

</form>

 
<!-- FIN BODY MODAL -->
      
      <!-- INICIO FOOTER MODAL -->
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-success" onclick="showSweetAlertTaller()"><i class="bi bi-check-lg"></i> Agregar</button>
        <button type="button" class="btn btn-outline-warning" data-bs-dismiss="modal"><i class="bi bi-x-lg"></i> Cancelar</button>
       </div>
      <!-- FIN FOOTER MODAL -->


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