
<head>
  <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
</head> 
<nav class="border-gray-200 bg-gray-50 dark:bg-gray-800 dark:border-gray-700">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <a href="/" class="flex items-center">
      <img src="{{ asset('images/TlacualliLogo.png') }}" alt="Tlacualli" width="45" height="45">
        <span class="self-center text-2xl font-semibold whitespace-nowrap text-black px-2"> Tlacualli</span>
    </a>
    <button data-collapse-toggle="navbar-solid-bg" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-solid-bg" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
        </svg>
    </button>
    <div class="hidden w-full md:block md:w-auto" id="navbar-solid-bg">
      <ul class="flex flex-col font-medium mt-4 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-transparent dark:bg-gray-800 md:dark:bg-transparent dark:border-gray-700">
        <li>
          <a {{request()->routeIs('inicio')?'disabled fw-bolder ':'w_o'}} href="/" class="mb-4 self-center text-xl font-semibold block px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-green-700 dark:text-white md:dark:hover:text-green-900 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Home</a>
        </li>
        <li>
          <a {{request()->routeIs('talleres')?'disabled':'w_o'}} href="/talleres" class="mb-4 self-center text-xl font-semibold block px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-green-700 dark:text-white md:dark:hover:text-green-900 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Talleres</a>
        </li>
        <li>
          <a {{request()->routeIs('publicaciones')?'disabled':'w_o'}} href="/publicaciones" class="self-center text-xl font-semibold block px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-green-700 dark:text-white md:dark:hover:text-green-900 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Publicaciones</a>
        </li>
        @if(session()->has('id_usuario'))
        <li>
          <a {{request()->routeIs('servicios')?'disabled':'w_o'}} href="/mis_servicios" class="self-center text-xl font-semibold block px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-green-700 dark:text-white md:dark:hover:text-green-900 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Servicios</a>
        </li>
        @endif
        <li>
          <a {{request()->routeIs('productosCards')?'disabled':'w_o'}} href="/productosCards" class="self-center text-xl font-semibold block px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-green-700 dark:text-white md:dark:hover:text-green-900 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Productos</a>
        </li>
        <li>
          <a data-bs-toggle="modal" data-bs-target="#login" class="self-center text-xl font-semibold block px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-green-700 dark:text-white md:dark:hover:text-green-900 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent"> Iniciar Sesión</a>
        </li>
{{--         <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
          <button type="button" class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
            <span class="sr-only">Open user menu</span>
            <img class="w-8 h-8 rounded-full" src="/docs/images/people/profile-picture-3.jpg" alt="user photo">
          </button>
          <!-- Dropdown menu -->
          <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600" id="user-dropdown">
            <div class="px-4 py-3">
              <span class="block text-sm text-gray-900 dark:text-white">Bonnie Green</span>
              <span class="block text-sm  text-gray-500 truncate dark:text-gray-400">name@flowbite.com</span>
            </div>
            <ul class="py-2" aria-labelledby="user-menu-button">
              <li>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Iniciar Sesión</a>
              </li>
              <li>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Settings</a>
              </li>
              <li>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Earnings</a>
              </li>
              <li>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign out</a>
              </li>
            </ul>
          </div>
          <button data-collapse-toggle="navbar-user" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-user" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="https://cdn-icons-png.flaticon.com/512/219/219969.png" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
            </svg>
        </button>
      </div> --}}
      </ul>
    </div>
  </div>
</nav>


{{-- 
<nav class="navbar navbar-expand-lg custom-bg">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="{{ asset('images/TlacualliLogo.png') }}" alt="" width="45" height="45">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link fs-3 {{request()->routeIs('inicio')?'disabled fw-bolder ':'w_o'}}" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fs-3 {{request()->routeIs('talleres')?'disabled':'w_o'}}" aria-current="page" href="/talleres">Talleres</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fs-3 {{request()->routeIs('publicaciones')?'disabled':'w_o'}}" aria-current="page" href="/publicaciones">Publicaciones</a>
          </li>
          @if(session()->has('id_usuario'))
          <li class="nav-item">
          <a class="nav-link fs-3 {{request()->routeIs('servicios')?'disabled':'w_o'}}" aria-current="page" href="/mis_servicios">Servicios</a>
          </li>
          @endif
          <li class="nav-item">
            <a class="nav-link fs-3 {{request()->routeIs('productosCards')?'disabled ':'w_o'}}" aria-current="page" href="/productosCards">Productos</a>
          </li>
        </ul>
        <div class="btn-group custom-icons">
            <button type="button" class="bton btn btn-outline-secondary">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"></path>
                </svg>
            </button>
            <button type="button" class="bton btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#login">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"/>
              </svg>
            </button>
            @include('partials.login')
            <button type="button" class="bton btn btn-outline-secondary">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                  </svg>
            </button>
        </div>
        
      </div>
    </div>
  </nav> --}}



  {{-- LOGIN --}}
  


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



