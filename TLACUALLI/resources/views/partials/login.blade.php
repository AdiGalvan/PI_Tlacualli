


<div class="modal fade" id="login" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        @if(session()->has('usuario'))
        Bienvenido, {{ session('usuario') }}
        @else
        <h5 class="modal-title" id="exampleModalLabel">Iniciar sesión</h5>
        @endif
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        @if(session()->has('usuario'))
        <a href="/perfil"><button type="button" class="btn btn-outline-secondary" >Ver perfil</button> </a>
        <form method="POST" action="/logout">
          @csrf
        </div>
        <div class="modal-footer">
        <button type="submit" class="btn btn-outline-success" name="cerrar_sesion" id="cerrar_sesion">Cerrar sesión</button>
        </form>
        
        @else
        <form method="POST" action="/login">
          @csrf
          <div class="mb-3">
            <label for="nombre_usuario" class="form-label">Correo</label>
            <input type="text" class="form-control" name="correo" id="correo" required/>
          </div>
          <div class="mb-3">
            <label for="contraseña" class="form-label">Contraseña</label>
            <input type="password" class="form-control" name="contraseña" id="contraseña" required/>
          </div>
          <a href="/registrar" id="">¿Eres nuevo? Regístrate para iniciar sesión</a>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-outline-success" name="iniciar_sesion" id="iniciar_sesion">Iniciar sesión</button>
        </form>
        @endif
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
        </div>
        

      
    </div>
  </div>
</div>



