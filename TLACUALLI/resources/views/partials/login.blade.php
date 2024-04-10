<div class="modal fade" id="login" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Login</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="nombre_usuario" class="form-label">Usuario</label>
            <input type="text" class="form-control" name="nombre_usuario" id="nombre_usuario" required/>
          </div>
          <div class="mb-3">
            <label for="contraseña" class="form-label">Contraseña</label>
            <input type="password" class="form-control" name="contraseña" id="contraseña" required/>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        @include('partials.nuevo_usuario')
        <button type="submit" class="btn btn-outline-success" name="iniciar_sesion" id="iniciar_sesion">Login</button>
        <button type="button" class="btn btn-outline-success" name="registro" id="registro">Sign up</button>
        
    </div>
      
    </div>
  </div>
</div>



