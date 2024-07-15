<!-- publicciones/create.blade.php -->
<div class="modal fade" id="edit_publicacion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar título</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

                <!-- INICIO BODY MODAL -->
                <div class="modal-body">
                        <form method="POST" action="{{ route('publicaciones.update', $publicacion->id) }}" role="form" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <label class="form-label">{{ __('Nombre') }}</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $publicacion->nombre) }}" required>
                            <p class="text-danger fst-italic">{{ $errors->first('nombre') }}</p>
                        </div>

                        <!-- <div class="mb-3">
                            <label class="form-label">{{ __('Tipo ID') }}</label>
                            <select class="form-select" id="edit_id_tipo" name="id_tipo" required>
                                <option value="">Selecciona una opción</option>
                                <option value="1">Artículo</option>
                                <option value="2">Servicio</option>
                                <option value="3">Anuncio</option>
                            </select>
                            <p class="text-danger fst-italic">{{ $errors->first('id_tipo') }}</p>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">{{ __('Descripcion') }}</label>
                            <input type="text" class="form-control" id="edit_descripcion" name="descripcion" value="{{ old('descripcion') }}" required>
                            <p class="text-danger fst-italic">{{ $errors->first('descripcion') }}</p>
                        </div> -->

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-outline-success"><i class="bi bi-check-lg"></i> Guardar</button>
                            <button type="button" class="btn btn-outline-warning" data-bs-dismiss="modal"><i class="bi bi-x-lg"></i> Cancelar</button>
                        </div>
                    </form>
                </div>
                <!-- FIN BODY MODAL -->
            </div>
        </div>
    </div>

  