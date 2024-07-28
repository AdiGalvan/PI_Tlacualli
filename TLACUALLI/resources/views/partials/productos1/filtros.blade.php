
<div class="flex flex-wrap px-4">
    <!-- Sección de Categorías y Tags -->
    <div class="flex-none w-full lg:w-1/3 px-4 mb-4 lg:mb-0">
        <div class="w-full max-w-xs p-3 bg-white border border-gray-200 rounded-lg shadow sm:p-4 md:p-6 dark:bg-gray-800 dark:border-gray-700"> 
            <h2 class="text-lg text-green-600 font-semibold mb-2">Categories</h2>
            <div>
                <ul>
                    <li class="px-3 mb-2 text-gray-500 font-semibold hover:text-green-900">Abonos <span class="text-yellow-300">(4)</span></li>
                    <li class="px-3 mb-2 text-gray-500 font-semibold hover:text-green-900">Contenedores <span class="text-yellow-300">(1)</span></li>
                    <li class="px-3 mb-2 text-gray-500 font-semibold hover:text-green-900">Repelentes <span class="text-yellow-300">(2)</span></li>
                    <li class="px-3 mb-2 text-gray-500 font-semibold hover:text-green-900">Tierra <span class="text-yellow-300">(1)</span></li>
                    <li class="px-3 mb-2 text-gray-500 font-semibold hover:text-green-900">Fauna <span class="text-yellow-300">(8)</span></li>
                    <li class="px-3 mb-2 text-gray-500 font-semibold hover:text-green-900">Composta <span class="text-yellow-300">(3)</span></li>
                    <li class="px-3 mb-2 text-gray-500 font-semibold hover:text-green-900">Herramientas <span class="text-yellow-300">(2)</span></li>
                </ul>
            </div>
        </div>
        
        <div class="mt-3 w-full max-w-xs p-3 bg-white border border-gray-200 rounded-lg shadow sm:p-4 md:p-6 dark:bg-gray-800 dark:border-gray-700">
            <h2 class="text-lg text-green-600 font-semibold mb-4">Tags</h2>
            <div class="grid grid-cols-2 gap-2">
                <div>
                    <button type="button" class="focus:outline-none text-black bg-gray-100 font-semibold hover:text-white hover:bg-yellow-200 focus:ring-4 focus:ring-yellow-500 font-medium rounded-sm text-sm px-2.5 py-0.5 dark:focus:ring-yellow-700">Abono</button> 
                    <button type="button" class="focus:outline-none text-black bg-gray-100 font-semibold hover:text-white hover:bg-yellow-200 focus:ring-4 focus:ring-yellow-500 font-medium rounded-sm text-sm px-2.5 py-0.5 dark:focus:ring-yellow-700">Plantas</button> 
                    <button type="button" class="focus:outline-none text-black bg-gray-100 font-semibold hover:text-white hover:bg-yellow-200 focus:ring-4 focus:ring-yellow-500 font-medium rounded-sm text-sm px-2.5 py-0.5 dark:focus:ring-yellow-700">Tierra</button> 
                </div>
                <div>
                    <button type="button" class="focus:outline-none text-black bg-gray-100 font-semibold hover:text-white hover:bg-yellow-200 focus:ring-4 focus:ring-yellow-500 font-medium rounded-sm text-sm px-2.5 py-0.5 dark:focus:ring-yellow-700">Kit </button> 
                    <button type="button" class="focus:outline-none text-black bg-gray-100 font-semibold hover:text-white hover:bg-yellow-200 focus:ring-4 focus:ring-yellow-500 font-medium rounded-sm text-sm px-2.5 py-0.5 dark:focus:ring-yellow-700">Repelente</button> 
                </div>
                <div class="mb-2">
                    <button type="button" class="focus:outline-none text-black bg-gray-100 font-semibold hover:text-white hover:bg-yellow-200 focus:ring-4 focus:ring-yellow-500 font-medium rounded-sm text-sm px-2.5 py-0.5 dark:focus:ring-yellow-700">Fauna</button> 
                    <button type="button" class="focus:outline-none text-black bg-gray-100 font-semibold hover:text-white hover:bg-yellow-200 focus:ring-4 focus:ring-yellow-500 font-medium rounded-sm text-sm px-2.5 py-0.5 dark:focus:ring-yellow-700">Contenedor</button> 
                </div>
            </div>
        </div>
    </div>
    
    @include('partials.productos1.carrusel')
    
    
    