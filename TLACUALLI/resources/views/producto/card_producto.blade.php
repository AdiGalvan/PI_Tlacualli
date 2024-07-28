<div class="max-w-xs mx-auto bg-white border border-gray-200 rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700">
    <a href="#">
        <img class="w-full h-auto rounded-t-lg" src="https://5.imimg.com/data5/SELLER/Default/2021/11/MY/VT/ZQ/125956067/vermi-compost-5kg-pack-1000x1000.jpg" alt="product image" />
    </a>
    <div class="px-4 py-3">
        <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white truncate">{{ $producto->nombre }}</h5>
        <div class="flex items-center mt-2.5 mb-3">
            {{-- Sección de Estrellas --}}
            <div class="flex items-center space-x-1 rtl:space-x-reverse">
                @for ($i = 0; $i < 5; $i++)
                    <svg class="w-4 h-4 {{ $i < 4 ? 'text-yellow-300' : 'text-gray-200 dark:text-gray-600' }}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                    </svg>
                @endfor
            </div>
            <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ml-3">5.0</span>
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




  <!-- MODAL TAILWIND -->
<div id="default-modal{{ $producto->id }}" tabindex="-1" aria-hidden="true" class="hidden fixed inset-0 z-50 flex items-center justify-center w-full h-full bg-black bg-opacity-50">
    <div class="relative w-full max-w-xl p-2 mx-auto bg-white rounded-lg shadow-lg dark:bg-gray-700">
        <!-- Modal content -->
        <div class="relative">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                <!-- Carousel -->
                <div class="relative w-full">
                    <div id="carouselExampleIndicators" class="carousel slide relative" data-bs-ride="carousel">
                        <div class="carousel-inner relative overflow-hidden w-full">
                            <div class="carousel-item active">
                                <img src="https://arcencohogar.vtexassets.com/arquivos/ids/287615/1231849.jpg?v=637651663702500000" class="d-block w-full" alt="Imagen1">
                            </div>
                        </div>
                        <button class="carousel-control-prev absolute top-1/2 -translate-y-1/2 left-0 px-2 py-1 text-white bg-gray-800 bg-opacity-50 rounded-r" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </button>
                        <button class="carousel-control-next absolute top-1/2 -translate-y-1/2 right-0 px-2 py-1 text-white bg-gray-800 bg-opacity-50 rounded-l" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </button>
                    </div>
                </div>

                <!-- Product details -->
                <div class="p-2">
                    <h2 class="text-xl font-bold mb-2">{{ $producto->nombre }}</h2>
                    <div class="mb-2 flex items-center">
                        <small class="text-warning">
                            <i class="bi bi-star-fill text-yellow-500"></i>
                            <i class="bi bi-star-fill text-yellow-500"></i>
                            <i class="bi bi-star-fill text-yellow-500"></i>
                            <i class="bi bi-star-fill text-yellow-500"></i>
                            <i class="bi bi-star-half text-yellow-500"></i>
                        </small>
                        <span class="ml-2 text-sm">4.5</span>
                        <div class="ml-2 bg-green-500 text-white text-sm px-2 py-1 rounded">30 comentarios</div>
                    </div>
                    <div class="text-xl font-semibold mb-2">$ {{ $producto->costo }}</div>
                    <p class="mb-2">{{ $producto->descripcion }}</p>
                    <hr class="my-2">

                    <!-- Quantity selector -->
                    <div class="flex items-center mb-2">
                        <button type="button" class="bg-gray-200 text-gray-600 px-2 py-1 rounded-l-lg" aria-label="Decrease quantity">-</button>
                        <input type="number" step="1" max="10" value="1" name="quantity" class="w-12 text-center border border-gray-300 rounded-md py-1" aria-label="Quantity">
                        <button type="button" class="bg-gray-200 text-gray-600 px-2 py-1 rounded-r-lg" aria-label="Increase quantity">+</button>
                    </div>

                    <div class="flex items-center gap-2 mt-2">
                        <button data-modal-hide="default-modal" type="button" class="bg-green-700 text-white hover:bg-green-800 rounded-lg px-4 py-1.5 text-sm font-medium focus:ring-4 focus:ring-green-300">Agregar</button>
                        <div class="flex items-center">
                            <svg class="w-8 h-8 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12.01 6.001C6.5 1 1 8 5.782 13.001L12.011 20l6.23-7C23 8 17.5 1 12.01 6.002Z"/>
                            </svg>
                        </div>
                    </div>

                    <hr class="my-2">
                    <table class="table-auto w-full border border-gray-300">
                        <tbody>
                            <tr>
                                <td class="border-b px-2 py-1 font-medium">Código del Producto:</td>
                                <td class="border-b px-2 py-1">FBB00255</td>
                            </tr>
                            <tr>
                                <td class="border-b px-2 py-1 font-medium">Stock:</td>
                                <td class="border-b px-2 py-1">{{ $producto->stock }}</td>
                            </tr>
                            <tr>
                                <td class="border-b px-2 py-1 font-medium">Categoría:</td>
                                <td class="border-b px-2 py-1">Abonos</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
