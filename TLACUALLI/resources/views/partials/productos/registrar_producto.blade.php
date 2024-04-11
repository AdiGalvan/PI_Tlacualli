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
      <input type="text" class="form-control" id="_nprod" name="_nprod">
    </div>

   
    <div class="mb-3">
      <label class="form-label">Proveedor</label>
      <input type="text" class="form-control" id="_prov" name="_prov">
    </div>

    <div class="mb-3">
      <label class="form-label">Descripción</label>
      <input type="text" class="form-control" id="_descP" name="_descP">
    </div>


    <div class="mb-3">
      <label class="form-label">Costo</label>
      <input type="text" class="form-control" id="_costoP" name="_costoP">
    </div>

    <div class="mb-3">
      <label class="form-label">Stock</label>
      <input type="number" class="form-control" id="_stock" name="_stock">
    </div>

</form>

 
<!-- FIN BODY MODAL -->
      
      <!-- INICIO FOOTER MODAL -->
      <div class="modal-footer">
      <button type="button" class="btn btn-success">Aceptar</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
       </div>
      <!-- FIN FOOTER MODAL -->


    </div>
  </div>
</div>
</div>