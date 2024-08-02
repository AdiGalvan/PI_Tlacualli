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
        <form method="POST" action="/registroPublicacion" id="registroPublicacion" enctype="multipart/form-data">
          @csrf
    <div class="mb-3">
      <label class="form-label">Título publicación</label>
      <input type="text" class="form-control" id="_tp" name="_tp" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Tipo de publición</label>
      <select class="form-select" id="_tipo" name="_tipo" required>
        <option value="">Selecciona una opcion</option>
        <option value="1">Artículo</option>
        <option value="3">Servicio</option>
        <option value="4">Anuncio</option>
      </select>
    </div> 

    <div class="mb-3">
      <label class="form-label">Descripción</label>
      <input type="text" class="form-control" id="_des" name="_des" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Contenidos</label>
      <input type="file" class="form-control" id="_cont" name="_cont" accept=".pdf" required>
    </div>

    <div class="modal-footer">
      <button type="submit" class="btn btn-outline-success" onclick="validarCampos()"><i class="bi bi-check-lg"></i> Agregar</button>
      <button type="button" class="btn btn-outline-warning" data-bs-dismiss="modal"><i class="bi bi-x-lg"></i> Cancelar</button>
     </div>

</form>

 
<!-- FIN BODY MODAL -->
      
      <!-- INICIO FOOTER MODAL -->
      
      <!-- FIN FOOTER MODAL -->


    </div>
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
          document.getElementById('registroPublicacion').submit(); // Envía el formulario si todos los campos están completos

      }
  }
</script>