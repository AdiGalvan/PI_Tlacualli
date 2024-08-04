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




  