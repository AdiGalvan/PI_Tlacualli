<!-- Modal -->
<div class="modal fade" id="cambio_contraseña" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Cambiar contraseña</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="/cambiar_contraseña">
        @csrf
        <div class="form-group">
            <label for="_pda" class="form-label fw-bold">Contraseña Actual</label>
            <input type="password" class="form-control" id="_pda" name="_pda" required>
        </div>
        <div class="form-group">
            <label for="_pdn" class="form-label fw-bold">Nueva Contraseña</label>
            <input type="password" class="form-control" id="_pdn" name="_pdn" required>
        </div>
        <div class="form-group">
            <label for="_pdnc" class="form-label fw-bold">Confirmar Nueva Contraseña</label>
            <input type="password" class="form-control" id="_pdnc" name="_pdnc" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-warning">Cambiar contraseña</button>
      </form>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="eliminar_perfil" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar perfil</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ¿Estas seguro de querer eliminar tu cuenta?
      </div>
      <div class="modal-footer">
        <form method="POST" action="/perfil/eliminar">
        @csrf
        <button type="submit" class="btn btn-primary">Eliminar Cuenta</button>
        </form>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        
      </div>
    </div>
  </div>
</div>
