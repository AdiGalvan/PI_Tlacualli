<!-- Button trigger modal -->
<!--<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button> -->


<!-- INICIO MODAL -->
<div class="modal fade" id="registrar_producto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo producto</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
  
  <!-- INICIO BODY MODAL -->
        <div class="modal-body">
          <form method="" action="">
  
      <div class="mb-3">
        <label class="form-label">Nombre producto</label>
        <input type="text" class="form-control" id="_nprod" name="_nprod" required>
      </div>
      <div class="mb-3">
        <label for="costo" class="form-label">Imágen</label>
        <div class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping"><i class="bi bi-camera"></i></span>
        <input type="file" class="form-control" aria-label="Imágen del Producto" aria-describedby="addon-wrapping" required>
        </div>
    </div>
     
      <div class="mb-3">
        <label class="form-label">Proveedor</label>
        <input type="text" class="form-control" id="_prov" name="_prov" required>
      </div>
  
      <div class="mb-3">
        <label class="form-label">Descripción</label>
        <input type="text" class="form-control" id="_descP" name="_descP" required>
      </div>
  
  
      <div class="mb-3">
        <label class="form-label">Costo</label>
        <input type="text" class="form-control" id="_costoP" name="_costoP" required>
      </div>
  
      <div class="mb-3">
        <label class="form-label">Stock</label>
        <input type="number" class="form-control" id="_stock" name="_stock" required>
      </div>
  
  </form>
  
   
  <!-- FIN BODY MODAL -->
        
        <!-- INICIO FOOTER MODAL -->
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-success" onclick="showSweetAlert1()"><i class="bi bi-bag-check"></i> Agregar</button>
          <button type="button" class="btn btn-outline-warning" data-bs-dismiss="modal"><i class="bi bi-arrow-return-left"></i> Cerrar</button>
        </div>
        <!-- FIN FOOTER MODAL -->
      </div>
    </div>
  </div>
</div>


{{-- Script para el SweetAlert de REGISTRAR PRODUCTO --}}
<script>
  function showSweetAlert1() {
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
                  text: "El producto fue agregado correctamente.",
                  icon: "success"
              });
          } else if (result.dismiss === Swal.DismissReason.cancel) {
              swalWithBootstrapButtons.fire({
                  title: "Cancelado",
                  text: "El producto no se agregó :)",
                  icon: "error"
              });
          }
      });
  }
</script>
