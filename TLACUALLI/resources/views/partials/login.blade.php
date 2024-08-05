


<div class="modal fade" id="login" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- modal header -->
      <div class=" flex justify-center pt-4 pb-2">
        <p class="text-green-900 font-sans font-black text-2xl text-center">
        @auth
        Bienvenido, {{ Auth::user()->nombre_usuario }}
        @else
</p>
        <h1 class="text-green-900 font-sans font-black text-2xl text-center" id="exampleModalLabel">Iniciar sesión</h1>
        @endguest
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        @auth
        <center>
        <a href="/perfil"><button type="button" class="text-green-700 hover:text-white border border-green-700 border-4 hover:bg-green-800 focus:ring-2 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800" >Ver perfil</button> </a>
        <a href="/historial"><button type="button" class="text-green-700 hover:text-white border border-green-700 border-4 hover:bg-green-800 focus:ring-2 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800" >Ver historial</button> </a>
        <a href="/notificaciones"><button type="button" class="text-green-700 hover:text-white border border-green-700 border-4 hover:bg-green-800 focus:ring-2 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800" >Ver solicitudes</button> </a>
</center>
        <form method="POST" action="/logout">
          @csrf
        </div>
        <div class="modal-footer">
        <button type="submit" class="bg-gradient-to-r from-green-600 to-green-800 hover:from-green-600 hover:to-green-800 text-white px-4 py-2 rounded-lg mr-2 font-semibold font-sans" name="cerrar_sesion" id="cerrar_sesion">Cerrar sesión</button>
        </form>
        
        @endauth
        @guest
        <form method="POST" action="/login">
          @csrf
          <div class="mb-3 pr-2 ps-2">
            <label for="nombre_usuario" class="text-green-900 font-sans font-bold pb-2 text-lg">Correo</label>
            <input type="text" class="font-sans font-light text-base px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 w-full" name="correo" id="correo"/>
            <p class="text-red-600 font-sans font-bold mt-1">{{ $errors->first('correo') }}</p>
          </div>
          <div class="mb-3 pr-2 ps-2">
            <label for="contraseña" class="text-green-900 font-sans font-bold pb-2 text-lg">Contraseña</label>
            <input type="password" class="font-sans font-light text-base px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 w-full" name="contraseña" id="contraseña"/>
            <p class="text-red-600 font-sans font-bold mt-1">{{ $errors->first('contraseña') }}</p>
          </div>
          <a href="/registrar" id=""><p class="text-green-800 font-sans font-semibold text-sm text-center underline">¿Eres nuevo? Regístrate para iniciar sesión</p></a>
      </div>
      <div class="modal-footer">
        <button type="submit" class="bg-gradient-to-r from-green-600 to-green-800 hover:from-green-600 hover:to-green-800 text-white px-4 py-2 rounded-lg mr-2 font-semibold font-sans" name="iniciar_sesion" id="iniciar_sesion">Iniciar sesión</button>
        </form>
        @endguest
        <button type="button" class="bg-gradient-to-r from-gray-500 to-gray-800 hover:from-gray-600 hover:to-gray -800 text-white px-4 py-2 rounded-lg mr-2 font-semibold font-sans" data-bs-dismiss="modal">Cancelar</button>
        </div>
        

      
    </div>
  </div>
</div>



