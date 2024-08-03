<!-- Button trigger modal -->
<!--<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button> -->


<!-- INICIO MODAL -->
<div class="modal fade" id="registrar_publicacion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <!-- modal header -->
      <div class="flex justify-center pt-4 pb-2">
        <h1 class="text-green-900 font-sans font-black text-2xl text-center" id="exampleModalLabel">Nueva publicación</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

<!-- INICIO BODY MODAL -->
      <div class="modal-body">
        <form method="POST" action="/registroPublicacion" id="registroPublicacion" enctype="multipart/form-data">
          @csrf
    <div class="mb-3">
      <label class="text-green-900 font-sans font-bold pb-2 text-base">Título publicación</label>
      <input type="text" class="font-sans font-light px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 w-full" id="_tp" name="_tp" required>
    </div>

    <div class="mb-3" hidden>
      <label class="text-green-900 font-sans font-bold pb-2 text-base">Tipo de publición</label>
      <select class="font-sans font-light px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 w-full" id="_tipo" name="_tipo" required>
        <option value="">Selecciona una opcion</option>
        <option value="1" selected>Artículo</option>
        <option value="3">Servicio</option>
        <option value="4">Anuncio</option>
      </select>
    </div> 

    <div class="mb-3">
      <label class="text-green-900 font-sans font-bold pb-2 text-base">Descripción</label>
      <input type="text" class="font-sans font-light px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 w-full" id="_des" name="_des" required>
    </div>

    <!--  INPUT FILE -->
    <div class="mb-3">
  <label class="text-green-900 font-sans font-bold pb-2 text-base" for="_cont">Contenidos</label>
<p>
  <!-- Input de archivo oculto -->
  <input type="file" id="_cont" name="_cont" accept=".pdf" class="hidden" onchange="updateFileName()">

  <!-- Botón personalizado -->
  <label for="_cont" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
    Examinar
  </label>

  <!-- Nombre del archivo seleccionado   -->
  <span id="fileName" class="ml-4 text-gray-700 font-sans font-light">Ningún archivo seleccionado</span>
</div>

<!-- FIN INPUT FILE -->

    <div class="modal-footer">
      <button type="submit" class="bg-gradient-to-r from-green-500 to-green-800 hover:from-green-600 hover:to-green-800 text-white px-4 py-2 rounded-lg mr-2 font-semibold font-sans"
      onclick="validarCampos()"><i class="bi bi-check-lg"></i> Agregar</button>
      <button type="button" class="bg-gradient-to-r from-gray-500 to-gray-800 hover:from-gray-600 hover:to-gray-800 text-white px-4 py-2 rounded-lg mr-2 font-semibold font-sans" data-bs-dismiss="modal" data-bs-dismiss="modal"><i class="bi bi-x-lg"></i> Cancelar</button>
     </div>

</form>

 
<!-- FIN BODY MODAL -->
      
      <!-- INICIO FOOTER MODAL -->
      
      <!-- FIN FOOTER MODAL -->


    </div>
  </div>
</div>
</div>

<script>
  function validarCampos() {
      var titulo = document.getElementById('_tp').value;
      var tipo = document.getElementById('_tipo').value;
      var descripcion = document.getElementById('_des').value;
      var contenido = document.getElementById('_cont').value;

      if (titulo === "" || tipo === "" || descripcion === "" || contenido === "") {
          alert("Por favor, complete todos los campos.");
      } else {
          showSweetAlertPublicacion();
          document.getElementById('registroPublicacion').submit(); // Envía el formulario si todos los campos están completos

      }
  }
</script>

<!-- SCRIPT INPUT FILE -->
<script>
  function updateFileName() {
    const input = document.getElementById('_cont');
    const fileName = document.getElementById('fileName');
    fileName.textContent = input.files.length > 0 ? input.files[0].name : 'Ningún archivo seleccionado';
  }
</script>
<!-- FIN SCRIPT INPUT FILE -->