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
  </nav>