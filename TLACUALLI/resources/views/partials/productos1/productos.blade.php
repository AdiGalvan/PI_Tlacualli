<!-- Sección de Productos -->
<div class="col-span-8">
    <div class="flex justify-between mb-4">
        <div class="w-full sm:w-2/12 flex justify-end">
            @if(session()->has('id_usuario'))
            <button type="button" class="bg-green-500 text-white px-4 py-2 rounded flex items-center" onclick="window.location.href='{{ url('/productos') }}'">
                <i class="bi bi-bag-plus mr-2"></i> Productos
            </button>
            @endif
        </div>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 p-2">
        @foreach($productos as $producto)
            <div class="p-2">
                @include('producto.card_producto', ['producto' => $producto])
            </div>
        @endforeach
    </div>
</div>
