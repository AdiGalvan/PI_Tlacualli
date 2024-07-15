

<!-- INICIO MODAL -->
<div class="modal fade" id="registrar_publicacion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Nueva publicación</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

<!-- INICIO BODY MODAL -->
      <div class="modal-body">
      <form method="post" action="{{ route('publicaciones.store') }}" enctype="multipart/form-data">
          @csrf

    <div class="mb-3">
      <label class="form-label">{{ __('Nombre') }}</label>
      <input type="text" class="form-control" id="nombre" name="nombre" value="{{old('nombre', $publicacion->nombre)}}" required>
      <p class="text-danger fst-italic">{{$errors->first('nombre')}} </p>
    </div>

    <div class="mb-3">
      <label class="form-label">{{ __('Tipo ID') }}</label>
      <select class="form-select" id="id_tipo" name="id_tipo" value="{{old('id_tipo', $publicacion->id_tipo)}}" required>
        <option value="">Selecciona una opcion</option>
        <option value="1">Artículo</option>
        <option value="2">Servicio</option>
        <option value="3">Anuncio</option>
      </select>
      <p class="text-danger fst-italic">{{$errors->first('id_tipo')}} </p>
    </div> 

    <div class="mb-3">
      <label class="form-label">{{ __('Descripcion') }}</label>
      <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{old('descripcion', $publicacion->descripcion)}}" required>
      <p class="text-danger fst-italic">{{$errors->first('descripcion')}} </p>
    </div>

    

    <div class="modal-footer">
      <button type="submit" class="btn btn-outline-success" onclick="validarCampos()"><i class="bi bi-check-lg"></i> {{ __('Submit') }}</button>
      <button type="button" class="btn btn-outline-warning" data-bs-dismiss="modal"><i class="bi bi-x-lg"></i> Cancelar</button>
     </div>

</form>

 
<!-- FIN BODY MODAL -->
      
      <!-- INICIO FOOTER MODAL -->
      
      <!-- FIN FOOTER MODAL -->


    </div>
  </div>
</div>
</div>

