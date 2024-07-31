<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"> 
<link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet" />

<!-- INICIO MODAL NUEVO TALLER -->
<div id="registrar_taller" tabindex="-1" aria-hidden="true" class="fixed inset-0 z-50 flex items-center justify-center hidden">
  <div class="relative w-full max-w-lg p-4 mx-auto bg-white rounded-lg shadow-lg">
    <!-- modal header -->
    <div class="flex items-center justify-between p-4 border-b">
      <h1 class="text-green-900 font-sans font-black text-4xl pb-2 mb-4 text-center">Nuevo taller</h1>
      <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center" data-modal-hide="registrar_taller">
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
        </svg>
        <span class="sr-only">Close modal</span>
      </button>
    </div>
    <!-- fin modal header -->

    <!-- INICIO BODY MODAL -->
    <div class="p-4">
      <form method="POST" action="/registroTaller" id="registroTaller" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <div class="mb-3">
          <label class="text-green-900 font-sans font-bold pb-2 text-lg">Nombre taller</label>
          <input type="text" class="border rounded p-2 w-full focus:outline-none focus:ring-2 focus:ring-green-500" id="_nt" name="_nt" required placeholder="Ingrese el nombre de su taller">
        </div>

        <div class="mb-3">
          <label class="text-green-900 font-sans font-bold pb-2 text-lg">Descripción</label>
          <input type="text" class="border rounded p-2 w-full focus:outline-none focus:ring-2 focus:ring-green-500" id="_descT" name="_descT" required placeholder="Ingrese la descripción de su taller">
        </div>

        <div class="mb-3">
          <label class="text-green-900 font-sans font-bold pb-2 text-lg">Contenido (Imagen JPG o PNG)</label>
          <input type="file" class="border rounded p-2 w-full focus:outline-none focus:ring-2 focus:ring-green-500" id="_contT" name="_contT" accept="image/jpeg, image/png" required>
        </div>

        <div class="mb-3">
          <label class="text-green-900 font-sans font-bold pb-2 text-lg">Costo</label>
          <input type="number" class="border rounded p-2 w-full focus:outline-none focus:ring-2 focus:ring-green-500" id="_costoT" name="_costoT" required placeholder="Ingrese el costo de su taller (0 en caso de ser gratuito)">
        </div>

        <!-- modal footer -->
        <div class="flex justify-end mt-3">
          <button type="button" class="bg-gradient-to-r from-green-500 to-green-800 hover:from-green-600 hover:to-green-800 text-white px-4 py-2 rounded-lg mr-2 font-semibold" onclick="validarCampos()">Agregar</button>
          <button type="button" class="bg-gradient-to-r from-gray-500 to-gray-800 hover:from-gray-600 hover:to-gray-800 text-white px-4 py-2 rounded-lg font-semibold" data-modal-hide="registrar_taller">Cancelar</button>
        </div>
        <!-- fin modal footer -->
      </form>
    </div>
    <!-- FIN BODY MODAL -->
  </div>
</div>
<!-- FIN MODAL NUEVO TALLER -->


<!-- INICIO DE MODAL DE ACTUALIZACION -->
<div id="actualizar_taller" tabindex="-1" aria-hidden="true" class="fixed inset-0 z-50 flex items-center justify-center hidden">
  <div class="relative w-full max-w-lg p-4 mx-auto bg-white rounded-lg shadow-lg">
    <div class="relative bg-white rounded-lg shadow">
      <!-- modal header -->
      <div class="flex items-center justify-between p-4 border-b">
        <h1 class="text-green-900 font-sans font-black text-4xl pb-2 mb-4">Actualización de taller</h1>
        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center" data-modal-hide="actualizar_taller">
          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
          </svg>
          <span class="sr-only">Close modal</span>
        </button>
      </div>
      <!-- fin modal header -->

      <div class="p-4">
        <form method="POST" action="{{ !empty($publicacion->id) ? route('actualizarTaller', $publicacion->id) : '' }}" enctype="multipart/form-data" class="space-y-4">
          @csrf
          @method('PUT')

          <div class="mb-3">
            <label class="text-green-900 font-sans font-bold pb-2 text-lg">Nombre taller</label>
            <input type="text" class="border rounded p-2 w-full focus:outline-none focus:ring-2 focus:ring-green-500" id="_nt" name="_nt" required value="{{ !empty($publicacion->nombre) ? $publicacion->nombre : '' }}">
          </div>

          <div class="mb-3">
            <label class="text-green-900 font-sans font-bold pb-2 text-lg">Descripción</label>
            <input type="text" class="border rounded p-2 w-full focus:outline-none focus:ring-2 focus:ring-green-500" id="_descT" name="_descT" required value="{{ !empty($publicacion->descripcion) ? $publicacion->descripcion : '' }}">
          </div>

          <div class="mb-3">
            <label class="text-green-900 font-sans font-bold pb-2 text-lg">Contenido (Imagen JPG o PNG)</label>
            <input type="file" class="border rounded p-2 w-full focus:outline-none focus:ring-2 focus:ring-green-500" id="_contT" name="_contT" accept="image/jpeg, image/png">
          </div>

          <div class="mb-3">
            <label class="text-green-900 font-sans font-bold pb-2 text-lg">Costo</label>
            <input type="number" class="border rounded p-2 w-full focus:outline-none focus:ring-2 focus:ring-green-500" id="_costoT" name="_costoT" required value="{{ !empty($publicacion->costo) ? $publicacion->costo : '' }}">
          </div>

          <div class="flex justify-end">
            <button type="submit" class="bg-gradient-to-r from-green-500 to-green-800 hover:from-green-600 hover:to-green-800 text-white px-4 py-2 rounded-lg mr-2 font-semibold">Actualizar</button>
            <button type="button" class="bg-gradient-to-r from-gray-500 to-gray-800 hover:from-gray-600 hover:to-gray-800 text-white px-4 py-2 rounded-lg font-semibold" data-modal-hide="actualizar_taller">Cancelar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- FIN DE MODAL DE ACTUALIZACION -->


<script>
  function showSweetAlertTaller() {
    const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
        confirmButton: "btn btn-outline-success",
        cancelButton: "btn btn-outline-danger me-3"
      },
      buttonsStyling: false
    });
    swalWithBootstrapButtons.fire({
      title: "¿Estás seguro?",
      text: "¡No podrás revertir esto!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonText: "Sí, agregarlo",
      cancelButtonText: "No, cancelar",
      reverseButtons: true
    }).then((result) => {
      if (result.isConfirmed) {
        swalWithBootstrapButtons.fire({
          title: "¡Agregado!",
          text: "El taller fue agregado correctamente.",
          icon: "success"
        });
        document.getElementById('registroTaller').submit();
      } else if (result.dismiss === Swal.DismissReason.cancel) {
        swalWithBootstrapButtons.fire({
          title: "Cancelado",
          text: "El taller no se agregó :)",
          icon: "error"
        });
      }
    });
  }
</script>

<!-- <script>
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
</script> -->

<script>
  function validarCampos() {
    var nombreTaller = document.getElementById('_nt').value;
    var descripcionTaller = document.getElementById('_descT').value;
    var contenidoTaller = document.getElementById('_contT').value;
    var costoTaller = document.getElementById('_costoT').value;

    if (nombreTaller === "" || descripcionTaller === "" || contenidoTaller === "" || costoTaller === "") {
      alert("Por favor, complete todos los campos.");
    } else {
      showSweetAlertTaller();
    }
  }
</script>

<script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
