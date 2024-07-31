<nav class="bg-white dark:bg-gray-900 shadow-md">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-2">
    <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
        <img src="{{ asset('images/TlacualliLogo.png') }}" alt="Tlacualli" width="45" height="45">
        <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Tlacualli</span>
    </a>
    <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
      <button type="button" class="text-white bg-green-800 hover:bg-green-900 focus:ring-4 focus:outline-none focus:ring-green-700 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" data-bs-toggle="modal" data-bs-target="#login">Iniciar Sesión</button>
      @include('partials.login')
    </div>
    <div class="hidden w-full md:block md:w-auto" id="navbar-default">
      <ul class="font-medium flex flex-col p-4 md:p-0 bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:bg-transparent dark:bg-gray-800 md:dark:bg-gray-900">
        <li>
          <a href="/" class="{{request()->routeIs('inicio')?'disabled fw-bolder ':'w_o'}} font-semibold text-lg block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-green-700 md:p-0 dark:text-white md:dark:hover:text-green-900 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Home</a>
        </li>
        <li>
          <a href="/talleres" class="{{request()->routeIs('talleres')?'disabled':'w_o'}} font-semibold text-lg block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-green-700 md:p-0 dark:text-white md:dark:hover:text-green-900 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Talleres</a>
        </li>
        <li>
          <a href="publicaciones" class="{{request()->routeIs('publicaciones')?'disabled':'w_o'}} font-semibold text-lg block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-green-700 md:p-0 dark:text-white md:dark:hover:text-green-900 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Publicaciones</a>
        </li>
        <li>
          <a href="mis_servicios" class="{{request()->routeIs('servicios')?'disabled':'w_o'}} font-semibold text-lg block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-green-700 md:p-0 dark:text-white md:dark:hover:text-green-900 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Servicios</a>
        </li>
        <li>
          <a href="productosCards" class="{{request()->routeIs('productosCards')?'disabled ':'w_o'}} font-semibold text-lg block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-green-700 md:p-0 dark:text-white md:dark:hover:text-green-900 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Productos</a>
        </li>
        <li>
          <a href="#" class="{{request()->routeIs('productosCards')?'disabled ':'w_o'}} font-semibold text-lg block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-green-700 md:p-0 dark:text-white md:dark:hover:text-green-900 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Solicitudes</a>
        </li>
      </ul>
    </div>
  </div>
</nav>