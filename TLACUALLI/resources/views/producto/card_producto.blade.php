{{-- Ejemplo de card producto en Taildwin --}}
<div class="max-w-lg mx-auto bg-white border border-gray-200 rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700">
    <a href="#">
        <img class="w-full h-auto rounded-t-lg" src="https://5.imimg.com/data5/SELLER/Default/2021/11/MY/VT/ZQ/125956067/vermi-compost-5kg-pack-1000x1000.jpg" alt="product image" />
    </a>
    <div class="px-4 py-3">
        <a href="#">
             <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">{{ $producto->nombre }}</h5>
        </a>
        <div class="flex items-center mt-2.5 mb-3">
             <div class="flex items-center space-x-1 rtl:space-x-reverse">
                <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                </svg>
                <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                </svg>
                <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                </svg>
                <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                </svg>
                <svg class="w-4 h-4 text-gray-200 dark:text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                </svg>
            </div>
            <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ms-3">5.0</span>
        </div>
        <div class="flex items-center justify-between">
            <span class="text-md font-bold text-gray-900 dark:text-white">$ {{ $producto->costo }}</span>
            <svg class="w-[35px] h-[35px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12.01 6.001C6.5 1 1 8 5.782 13.001L12.011 20l6.23-7C23 8 17.5 1 12.01 6.002Z"/>
            </svg>
        </div>
        <hr class="my-3 border-gray-900 dark:bg-gray-900">
        <div class="flex items-center justify-between">
            <button data-modal-target="default-modal{{ $producto->id }}" data-modal-toggle="default-modal{{ $producto->id }}" class="block text-white bg-green-700 hover:bg-green-900 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-xs px-3 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800" type="button">
                Más Información
            </button>
        </div>
    </div>
</div>
 
 <br>
 <br>
 <br>{{-- Fin de ejemplo card producto --}}
 
 
  <!-- MODAL TAILDWIN -->
  <div id="default-modal{{ $producto->id }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-3md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            {{-- <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div> --}}
            <div style="margin-right: 10px;">
              <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                  <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                  </svg>
                  <span class="sr-only">Close modal</span>
              </button>
            </div>
            <div class="row">
              <div class="col-lg-6 mt-3 justify-content-end">
                  
                  <div class="container d-flex">
                      <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" style="max-width: 800px;">
                          <div class="carousel-inner">
                              <div class="carousel-item active">
                                  <img src="https://arcencohogar.vtexassets.com/arquivos/ids/287615/1231849.jpg?v=637651663702500000" class="d-block w-100" alt="Imagen1">
                              </div>
                          </div>
                          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="visually-hidden">Previous</span>
                          </button>
                          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="visually-hidden">Next</span>
                          </button>
                      </div>
                  </div>
              </div>
              <div class="col-lg-6">
                  <div class="ps-lg-8 mt-6 mt-lg-0">
                      <h2 class="mb-1 h1">{{ $producto->nombre }}</h2>
                      <div class="mb-4">
                          <small class="text-warning">
                              <i class="bi bi-star-fill text-warning"></i>
                              <i class="bi bi-star-fill text-warning"></i>
                              <i class="bi bi-star-fill text-warning"></i>
                              <i class="bi bi-star-fill text-warning"></i>
                              <i class="bi bi-star-half text-warning"></i>
                          </small>
                          <span>
                              <small>4.5</small>
                          </span>
                          <div class="ms-2 badge bg-success">30 comentarios</div>
                          <div class="fs-4">
                              <span class="fw-bold text-dark">$ {{ $producto->costo }}</span>
                          </div>
                          <br>
                          <p>{{ $producto->descripcion }}</p>
                          <hr class="my-6">
                          {{-- <div class="mb-4">
                              <button type="button" class="btn btn-outline-secondary">250g</button>
                              <button type="button" class="btn btn-outline-secondary">500g</button>
                              <button type="button" class="btn btn-outline-secondary">1kg</button>
                          </div> --}}
                          <div>
                              <div class="input-group input-spinner">
                                  <input type="button" value="-" class="button-minus btn btn-sm" data-field="quantity">
                                  <input type="number" step="1" max="10" value="1" name="quantity" class="quantity-field form-control-sm form-input">
                                  <input type="button" value="+" class="button-plus btn btn-sm" data-field="quantity">
                              </div>
                          </div>
                          <div class="mt-3 row justify-content-start g-2 align-items-center">
                              <div class="col-lg-4 col-md-5 col-6 d-grid">
                                  <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                      <button data-modal-hide="default-modal" type="button"  onclick="showSweetAlert()" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700">Agregar</button>
                                  </div>
                              </div>
                              <div class="col-md-4 col-5" style="margin-left: 100px;">
                                  <svg class="w-[35px] h-[35px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12.01 6.001C6.5 1 1 8 5.782 13.001L12.011 20l6.23-7C23 8 17.5 1 12.01 6.002Z"/>
                                  </svg>   
                                  {{-- <a class="btn btn-light" href="#" data-bs-toggle="tooltip" data-bs-html="true" aria-label="Compare" onclick="toggleLike(this)">
                                      <i id="heart-icon" class="bi bi-heart" style="color: black;"></i>
                                  </a> --}}
                              </div>
                          </div>
                          <hr class="my-6">
                          <div>
                              <table class="table table-borderless">
                                  <tbody>
                                      <tr>
                                          <td>Código del Producto:</td>
                                          <td>FBB00255</td>
                                      </tr>
                                      <tr>
                                          <td>Stock:</td>
                                          <td>{{ $producto->stock }}</td>
                                      </tr>
                                      <tr>
                                          <td>Categoría:</td>
                                          <td>Abonos</td>
                                      </tr>
                                  </tbody>
                              </table>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
            <!-- Modal footer -->
            {{-- <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button data-modal-hide="default-modal" type="button" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700">Agregar al carrito</button>
            </div> --}}
        </div>
    </div>
</div>