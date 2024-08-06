{{-- <nav class="navbar navbar-expand-lg custom-bg">
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
          <li class="nav-item">
          <a class="nav-link fs-3 {{request()->routeIs('servicios')?'disabled':'w_o'}}" aria-current="page" href="/servicios">Servicios</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fs-3 {{request()->routeIs('productos')?'disabled ':'w_o'}}" aria-current="page" href="/productos">Productos</a>
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
  <nav class="bg-white dark:bg-gray-900 shadow-md">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-2">
    <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
        <img src="{{ asset('images/TlacualliLogo.png') }}" alt="Tlacualli" width="45" height="45">
        <span class="self-center text-2xl font-semibold font-sans whitespace-nowrap dark:text-white">Tlacualli</span>
    </a>
    <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
    @auth
    <button type="button" class="text-white bg-green-800 hover:bg-green-900 focus:ring-4 focus:outline-none focus:ring-green-700 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" data-bs-toggle="modal" data-bs-target="#login">{{Auth::user()->nombre_usuario}}</button>
        @else
      <button type="button" class="text-white bg-green-800 hover:bg-green-900 focus:ring-4 focus:outline-none focus:ring-green-700 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" data-bs-toggle="modal" data-bs-target="#login">Iniciar Sesión</button>
     @endguest
    @include('partials.login')
    <div class="mx-1">
    <x-cart-dropdown />
    </div>
    </div>
    <div class="hidden w-full md:block md:w-auto" id="navbar-default">
      <ul class="font-medium flex flex-col p-4 md:p-0 bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:bg-transparent dark:bg-gray-800 md:dark:bg-gray-900">
        <li>
          <a href="/" class="{{request()->routeIs('inicio')?'disabled ':'w_o'}} font-semibold font-sans text-lg block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-green-700 md:p-0 dark:text-white md:dark:hover:text-green-900 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Home</a>
        </li>
        <li>
          <a href="/talleres" class="{{request()->routeIs('talleres')?'disabled':'w_o'}} font-semibold font-sans text-lg block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-green-700 md:p-0 dark:text-white md:dark:hover:text-green-900 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Talleres</a>
        </li>
        <li>
          <a href="publicaciones" class="{{request()->routeIs('publicaciones')?'disabled':'w_o'}} font-semibold font-sans text-lg block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-green-700 md:p-0 dark:text-white md:dark:hover:text-green-900 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Publicaciones</a>
        </li>
        <li>
          <a href="servicios" class="{{request()->routeIs('servicios')?'disabled':'w_o'}} font-semibold font-sans text-lg block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-green-700 md:p-0 dark:text-white md:dark:hover:text-green-900 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Servicios</a>
        </li>
        <li>
          <a {{-- aria-current="page"  --}}href="/productos" class="{{request()->routeIs('productos')?'disabled ':'w_o'}} font-semibold font-sans text-lg block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-green-700 md:p-0 dark:text-white md:dark:hover:text-green-900 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Productos</a>
        </li>
        <li>
          <a href="notificaciones" class="{{request()->routeIs('#')?'disabled ':'w_o'}} font-semibold font-sans text-lg block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-green-700 md:p-0 dark:text-white md:dark:hover:text-green-900 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Solicitudes</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
