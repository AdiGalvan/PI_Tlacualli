<!--------- Modal ----------->
<div
  class="modal fade"
  id="registroUsuario"
  tabindex="-1"
  aria-labelledby="exampleModalLabel"
  aria-hidden="true"
>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registro</h5>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="tipo_registro" class="form-label"
              >Tipo de registro</label
            >
            <div class="input-group">
              <button
                class="btn btn-outline-secondary dropdown-toggle"
                type="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              ></button>

              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Tallerista</a></li>
                <li><a class="dropdown-item" href="#"></a></li>
                <li><a class="dropdown-item" href="#"></a></li>
              </ul>
              <input
                type="text"
                class="form-control"
                name="tipo_registro"
                id="tipo_registro"
                required
              />
            </div>
          </div>
          <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input
              type="text"
              class="form-control"
              name="nombre"
              id="nombre"
              required
              
            />
          </div>
          <div class="mb-3">
            <label for="apellidos" class="form-label">Apellidos</label>
            <input
              type="text"
              class="form-control"
              name="apellidos"
              id="apellidos"
              required
            />
          </div>
          <div class="mb-3">
            <label for="correo" class="form-label"
              >Correo electrónico</label
            >
            <input
              type="text"
              class="form-control"
              name="correo"
              id="correo"
              required
            />
          </div>
          <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input
              type="tel"
              class="form-control"
              name="telefono"
              id="telefono"
              required
              minlength="10"
            />
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button
          type="submit"
          class="btn btn-success"
          id="registrar_usuario"
          data-bs-dismiss="modal"
        >
          Registrar
        </button>
        <button type="" class="btn btn-success" data-bs-dismiss="modal">
          Cancelar
        </button>
      </div>
    </div>
  </div>
</div>
<!--------Termina modal--------- -->

<script>
  document
    .getElementById("registrar_usuario")
    .addEventListener("click", function () {
      Swal.fire({
        position: "center",
        icon: "success",
        title: "Registro completado con éxito",
        showConfirmButton: false,
        timer: 2500,
      });
    });
</script>
