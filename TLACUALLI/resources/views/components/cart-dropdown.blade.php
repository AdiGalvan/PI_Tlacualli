<!-- resources/views/components/cart-dropdown.blade.php -->
<button id="dropdownCartButton" data-dropdown-toggle="dropDownCart" data-dropdown-placement="left-end" class="text-white bg-gradient-to-r from-yellow-500 to-yellow-800 hover:bg-yellow-600 font-medium rounded-lg text-xs px-3 py-2.5 pr-4 text-center inline-flex items-center" type="button">
    <!-- Material Icon -->
    <span class="material-icons text-sm mr-2">shopping_cart</span>
    Carrito
    <svg class="w-2 h-2 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
    </svg>
</button>

<!-- Dropdown menu -->
<div id="dropDownCart" class="z-50 hidden bg-transparent shadow-2xl w-96 dark:bg-gray-700 font-sans">
  <!-- Tabla del carrito -->
  <table class="min-w-full w-96 divide-y divide-gray-200 dark:divide-gray-700 mt-5 ml-5 font-sans">
    <thead class="bg-gray-100 dark:bg-gray-800">
      <tr>
        <th scope="col" class="px-4 py-2 text-left text-xs font-sans text-green-900 uppercase tracking-wider"></th>
        <th scope="col" class="px-4 py-2 text-left text-xs font-sans text-green-900 uppercase tracking-wider">Nombre</th>
        <th scope="col" class="px-4 py-2 text-left text-xs font-sans text-green-900 uppercase tracking-wider">Cantidad</th>
        <th scope="col" class="px-4 py-2 text-left text-xs font-sans text-green-900 uppercase tracking-wider">Subtotal</th>
        <th scope="col" class="px-4 py-2 text-left text-xs font-sans text-green-900 uppercase tracking-wider"></th>
      </tr>
    </thead>
        <tbody class="bg-white divide-y divide-gray-300 dark:bg-gray-900 dark:divide-gray-700 font-sans">
        @if($carrito->isEmpty() && $carrito_talleres->isEmpty())
            <tr>
                <td colspan="5" class="px-4 py-2 text-center text-gray-600 dark:text-gray-400 font-sans">
                    Carrito vacío. No tienes productos ni talleres en tu carrito.
                </td>
            </tr>
        @else
            @forelse($carrito as $producto)
                <tr>
                    <td class="px-4 py-2">
                        @if($producto->contenido)
                            @php
                                $imagenes = json_decode($producto->contenido, true);
                                $primeraImagen = $imagenes[0] ?? null;
                            @endphp
                            @if($primeraImagen)
                                <img src="{{ asset('storage/' . $primeraImagen) }}" alt="{{ $producto->nombre }}" class="w-12 h-12 object-cover rounded">
                            @else
                                No disponible
                            @endif
                        @else
                            No disponible
                        @endif
                    </td>
                    <td class="px-4 py-2 font-sans font-semibold text-gray-900 dark:text-gray-200">{{ $producto->nombre }}</td>
                    <td class="px-4 py-2 font-sans font-semibold text-gray-900 dark:text-gray-200">{{ $producto->pivot->cantidad }}</td>
                    <td class="px-4 py-2 font-sans font-semibold text-gray-900 dark:text-gray-200">${{ number_format($producto->pivot->subtotal, 2) }}</td>
                    <td>
                        <form action="{{ route('carrito.eliminar', $producto->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                <span class="material-icons">delete</span>
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
            @endforelse

            @forelse($carrito_talleres as $c_taller)
                <tr>
                    
                    <td class="px-4 py-2">
                        <img class="w-12 h-12 object-cover rounded" src="{{ asset('storage/' . $c_taller->publicacion->contenido) }}" alt="{{ $c_taller->nombre }}">
                    </td>
                    <td class="px-4 py-2 font-sans font-semibold text-gray-900 dark:text-gray-200">{{ $c_taller->publicacion->nombre }}</td>
                    <td colspan=""></td>
                    <td class="px-4 py-2 font-sans font-semibold text-gray-900 dark:text-gray-200">${{ number_format($c_taller->publicacion->costo, 2) }}</td>
                    <td>
                        <form action="{{ route('taller.eliminar', $c_taller->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-3 rounded focus:outline-none focus:shadow-outline">
                                <span class="material-icons">delete</span>
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
            @endforelse

            @if($carrito->isNotEmpty() || $carrito_talleres->isNotEmpty())
                <tr>
                    <td class="px-4 py-2 text-center">
                        <span class="font-sans font-bold text-green-900">Total:</span>
                    </td>
                    <td colspan="2" class="px-4 py-2 text-center font-sans font-semibold text-xl text-gray-500 dark:text-gray-400"></td>
                    <td class="px-4 py-2 text-center font-sans font-semibold">
                        ${{ number_format($total_carrito, 2) }}
                    </td>
                    <td colspan="1" class="px-4 py-2 text-center font-sans font-semibold text-gray-500 dark:text-gray-400"></td>
                </tr>
                <tr>
                    <td colspan="2" class="justify-start px-3 py-2 font-sans font-semibold">
                    <form action="{{ route('carrito.confirmar') }}" method="POST">
                            @csrf
                                <button type="submit" class="bg-gradient-to-r from-green-500 to-green-800 text-white font-sans font-semibold px-2 py-2 rounded-md text-md">
                                    <i class="material-icons">check</i> Confirmar Compra
                                </button>
                        </form>
                    </td>
                    <td colspan="2"></td>
                    <td colspan="1"></td>
                </tr>
            @endif
        @endif
    </tbody>
  </table>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('dropdownCartButton').addEventListener('click', function() {
            const dropdown = document.getElementById('dropDownCart');
            dropdown.classList.toggle('hidden');
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const dropdown = document.getElementById('dropDownCart');
        const button = document.querySelector('[data-bs-toggle="dropdown"]');
        
        button.addEventListener('click', function () {
            const rect = dropdown.getBoundingClientRect();
            const viewportHeight = window.innerHeight;
            
            if (rect.bottom > viewportHeight) {
                dropdown.style.top = `-${rect.height}px`; // Ajusta la posición del dropdown hacia arriba
            } else {
                dropdown.style.top = '100%'; // Ajusta la posición del dropdown hacia abajo
            }
        });
    });
</script>
