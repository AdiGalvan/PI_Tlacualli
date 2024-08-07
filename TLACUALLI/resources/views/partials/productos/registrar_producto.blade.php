<!-- INICIO MODAL -->
<div class="modal fade" id="registrar_producto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <!-- modal header -->
      <div class="flex justify-center pt-4 pb-2">
        <h1 class="text-green-900 font-sans font-black text-2xl text-center" id="exampleModalLabel">Nuevo producto</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="/registroProducto" id="registroProducto" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label class="text-green-900 font-sans font-bold pb-2 text-base">Nombre del producto</label>
            <input type="text" class="font-sans font-light px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 w-full" id="_np" name="_np" value="{{ old('_np') }}">
            <p class="text-red-600 font-sans font-bold mt-1">{{ $errors->first('_np') }}</p>
          </div>
          <div class="mb-3">
              <label for="_descP" class="text-green-900 font-sans font-bold pb-2 text-base">Descripción</label>
              <textarea class="font-sans font-light px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 w-full" id="_descP" name="_descP" rows="3">{{ old('_descP') }}</textarea>
              <p class="text-red-600 font-sans font-bold mt-1">{{ $errors->first('_descP') }}</p>
          </div>
          <div class="mb-3">
            <label class="text-green-900 font-sans font-bold pb-2 text-base">Costo unitario</label>
            <input type="number" class="font-sans font-light px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 w-full" id="_costoP" name="_costoP" value="{{ old('_costoP') }}">
            <p class="text-red-600 font-sans font-bold mt-1">{{ $errors->first('_costoP') }}</p>
          </div>
          <div class="mb-3">
            <label class="text-green-900 font-sans font-bold pb-2 text-base">Stock</label>
            <input type="number" class="font-sans font-light px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 w-full" id="_stockP" name="_stockP" value="{{ old('_stockP') }}">
            <p class="text-red-600 font-sans font-bold mt-1">{{ $errors->first('_stockP') }}</p>
          </div>
          
          <!-- INPUT FILE -->
          <div class="mb-3">
            <label class="text-green-900 font-sans font-bold pb-2 text-base">Contenido (Imagen JPG o PNG)</label>
            
            <!-- Input de archivo oculto -->
            <input type="file" id="fileInput" name="_contP[]" accept="image/jpeg, image/png" class="hidden" multiple onchange="updateFileNames()" value="{{ old('_contP') }}">
            <br>
            <!-- Botón personalizado que activa el input oculto -->
            <label for="fileInput" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 cursor-pointer">
              Examinar
            </label>
            
            <!-- Nombres de los archivos seleccionados -->
            <span id="fileNames" class="ml-4 text-gray-700 font-sans font-light">Ningún archivo seleccionado</span>
          </div>
          <p class="text-red-600 font-sans font-bold mt-1">{{ $errors->first('_contP') }}</p>
          <!-- FIN INPUT FILE -->
          
          <div class="modal-footer">
            <button type="submit" class="bg-gradient-to-r from-green-500 to-green-800 hover:from-green-600 hover:to-green-800 text-white px-4 py-2 rounded-lg mr-2 font-semibold font-sans"><i class="bi bi-check-lg"></i> Agregar</button>
            <button type="button" class="bg-gradient-to-r from-gray-500 to-gray-800 hover:from-gray-600 hover:to-gray-800 text-white px-4 py-2 rounded-lg mr-2 font-semibold font-sans" data-bs-dismiss="modal"><i class="bi bi-x-lg"></i> Cancelar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- INICIO MODAL DE ACTUALIZACIÓN DE PRODUCTO-->
@if($productos->isEmpty())
@else
<div class="modal fade" id="actualizar_producto{{ $producto->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <!-- modal header -->
      <div class="flex justify-center pt-4 pb-2">
        <h1 class="text-green-900 font-sans font-black text-2xl text-center" id="exampleModalLabel">Actualizar producto</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('actualizarProducto', $producto->id) }}" id="actualizar_producto" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="mb-3">
            <label class="text-green-900 font-sans font-bold pb-2 text-base">Nombre del producto</label>
            <input type="text" class="font-sans font-light px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 w-full" id="_np" name="_np" value="{{ $producto->nombre }}">
            <p class="text-red-600 font-sans font-bold mt-1">{{ $errors->first('_np') }}</p>
          </div>
          <div class="mb-3">
            <label for="_descP" class="text-green-900 font-sans font-bold pb-2 text-base">Descripción</label>
            <textarea class="font-sans font-light px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 w-full" id="_descP" name="_descP" rows="3">{{ old('_descP', $producto->descripcion) }}</textarea>
            <p class="text-red-600 font-sans font-bold mt-1">{{ $errors->first('_descP') }}</p>
        </div>

          <div class="mb-3">
            <label class="text-green-900 font-sans font-bold pb-2 text-base">Costo unitario</label>
            <input type="number" class="font-sans font-light px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 w-full" id="_costoP" name="_costoP" value="{{ $producto->costo }}">
            <p class="text-red-600 font-sans font-bold mt-1">{{ $errors->first('_costoP') }}</p>
          </div>
          <div class="mb-3">
            <label class="text-green-900 font-sans font-bold pb-2 text-base">Stock</label>
            <input type="number" class="font-sans font-light px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 w-full" id="_stockP" name="_stockP" value="{{ $producto->stock }}">
            <p class="text-red-600 font-sans font-bold mt-1">{{ $errors->first('_stockP') }}</p>
          </div>
          <div class="mb-3">
            <label class="text-green-900 font-sans font-bold pb-2 text-base">Contenido (Imágenes JPG o PNG)</label>
            @if (!empty($producto->contenido))
              @foreach(json_decode($producto->contenido) as $imagen)
                <div class="mb-3">
                  <img src="{{ asset('storage/' . $imagen) }}" alt="Imagen de producto" class="img-fluid" style="max-height: 200px;">
                  <label class="flex items-center mt-2">
                    <input type="checkbox" name="eliminarImagenes[]" value="{{ $imagen }}"> Eliminar imagen
                  </label>
                </div>
              @endforeach
            @endif
            <input type="file" class="font-sans font-light px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 w-full" id="_contP[]" name="_contP[]" accept="image/jpeg, image/png" multiple>
            <p class="text-red-600 font-sans font-bold mt-1">{{ $errors->first('_contP') }}</p>
          </div>
          <div class="modal-footer">
            <button type="submit" class="bg-gradient-to-r from-green-500 to-green-800 hover:from-green-600 hover:to-green-800 text-white px-4 py-2 rounded-lg mr-2 font-semibold font-sans"><i class="bi bi-check-lg"></i> Actualizar</button>
            <button type="button" class="bg-gradient-to-r from-gray-500 to-gray-800 hover:from-gray-600 hover:to-gray-800 text-white px-4 py-2 rounded-lg mr-2 font-semibold font-sans" data-bs-dismiss="modal"><i class="bi bi-x-lg"></i> Cancelar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!--INICIO DE MODAL DE Desactivacion-->
  <div class="modal fade" id="desactivar_producto{{ $producto->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- modal header -->
      <div class="flex justify-center pt-4 pb-2">
        <h1 class="text-green-900 font-sans font-black text-2xl text-center" id="exampleModalLabel">Desactivar producto: {{ $producto->nombre }}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p class="font-sans font-normal text-lg text-center">¿Estás seguro de querer desactivar este producto?</p>
      </div>
      <div class="modal-footer">
        <form method="POST" action="{{ route('desactivarProducto', $producto->id) }}">
          @csrf
          @method('PUT')
          <button type="submit" class="bg-gradient-to-r from-green-500 to-green-800 hover:from-green-600 hover:to-green-800 text-white px-4 py-2 rounded-lg mr-2 font-semibold">Desactivar</button>
        </form>
        <button type="button" class="bg-gradient-to-r from-gray-500 to-gray-800 hover:from-gray-600 hover:to-gray-800 text-white px-4 py-2 rounded-lg mr-2 font-semibold" data-bs-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<!--INICIO DE MODAL DE Activacion-->
  <div class="modal fade" id="activar_producto{{ $producto->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- modal header -->
      <div class="flex justify-center pt-4 pb-2">
        <h1 class="text-green-900 font-sans font-black text-2xl text-center" id="exampleModalLabel">Activar producto: {{ $producto->nombre }}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p class="font-sans font-normal text-lg text-center">¿Estás seguro de querer activar este producto?</p>
      </div>
      <div class="modal-footer">
        <form method="POST" action="{{ route('activarProducto', $producto->id) }}">
          @csrf
          @method('PUT')
          <button type="submit" class="bg-gradient-to-r from-green-500 to-green-800 hover:from-green-600 hover:to-green-800 text-white px-4 py-2 rounded-lg mr-2 font-semibold">Activar</button>
        </form>
        <button type="button" class="bg-gradient-to-r from-gray-500 to-gray-800 hover:from-gray-600 hover:to-gray-800 text-white px-4 py-2 rounded-lg mr-2 font-semibold" data-bs-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
@endif

<script>
  document.addEventListener('DOMContentLoaded', function() {
    var modals = document.querySelectorAll('.modal');
    modals.forEach(function(modal) {
        modal.addEventListener('hidden.bs.modal', function() {
            if (document.querySelectorAll('.modal.show').length === 0) {
                document.body.classList.remove('modal-open');
                document.querySelectorAll('.modal-backdrop').forEach(function(backdrop) {
                    backdrop.remove();
                });
            }
        });
    });
});
</script>
<script>
  function validarCampos() {
    var nombreProducto = document.getElementById('_np').value.length;
    var descripcionProducto = document.getElementById('_descP').value.length;
    var contenidoProducto = document.getElementById('_contP').length;
    var costoProducto = document.getElementById('_costoP').value.length;
    var stockProducto = document.getElementById('_stockP').value.length;

    if (nombreProducto === "") {
      alert("Por favor, ingrese el nombre.");
    } else if (descripcionProducto === "") {
      alert("Por favor, ingrese la descripción.");
    } else if (contenidoProducto === 0) {
      alert("Por favor, suba una imagen.");
    } else if (costoProducto === "") {
      alert("Por favor, ingrese el costo.");
    } else if (stockProducto === "") {
      alert("Por favor, ingrese el stock.");
    } else {
      showSweetAlertTaller();
    }
  }
</script>

 <!-- script input file -->
 <script>
  function updateFileName() {
    var fileInput = document.getElementById('fileInput');
    var fileNameSpan = document.getElementById('fileName');
    if (fileInput.files.length > 0) {
      fileNameSpan.textContent = fileInput.files[0].name;
    } else {
      fileNameSpan.textContent = 'Ningún archivo seleccionado';
    }
  }
</script>
 <!-- script input file -->

 <script>
  function updateFileNames() {
    var input = document.getElementById('fileInput');
    var output = document.getElementById('fileNames');
    var children = "";
    for (var i = 0; i < input.files.length; i++) {
      children += input.files.item(i).name + (i < input.files.length - 1 ? ", " : "");
    }
    output.textContent = children ? children : "Ningún archivo seleccionado";
  }
</script>