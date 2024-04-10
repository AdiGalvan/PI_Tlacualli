<!-- Button trigger modal -->
<!--<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button> -->


<!-- INICIO MODAL -->
<div class="modal fade" id="registrar_publicacion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Nueva publicación</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

<!-- INICIO BODY MODAL -->
      <div class="modal-body">
        <form method="" action="">

    <div class="mb-3">
      <label class="form-label">Título publicación</label>
      <input type="text" class="form-control" id="_tp" name="_tp">
    </div>

    <div class="mb-3">
      <label class="form-label">Tipo de publición</label>
      <select class="form-select" id="_tipo" name="_tipo">
        <option value="">Artículo</option>
        <option value="">Servicio</option>
        <option value="">Anuncio</option>
      </select>
    </div> 

    <div class="mb-3">
      <label class="form-label">Descripción</label>
      <input type="text" class="form-control" id="_des" name="_des">
    </div>

    <div class="mb-3">
      <label class="form-label">Contenido</label>
      <input type="file" class="form-control" id="_cont" name="_cont">
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