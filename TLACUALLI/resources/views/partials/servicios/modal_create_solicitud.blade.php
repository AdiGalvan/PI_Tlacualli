  <!-- Modal -->
  <div class="modal fade" id="create_solicitud" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content fw-bold">
        
        <div class="modal-header">
          <h1 class="modal-title fs-5 text-danger fw-bold " id="staticBackdropLabel">Ingresa un Libro</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

            <div class="modal-body">
                <!-- FORMULARIO -->
                <form method="POST" action="{{ route('servicios.store') }}">
                    @csrf <!-- Generación del token -->

                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <select class="form-select" name="nombre" id="nombre">
                            @foreach ($opciones as $id => $nombre)
                                <option value="{{ $id }}" {{ old('nombre') == $id ? 'selected' : '' }}>{{ $nombre }}</option>
                            @endforeach
                        </select>
                        <p class="text-danger fst-italic">{{$errors->first('nombre')}}</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Proveedor</label>
                        <select class="form-select" name="proveedor" id="proveedor">
                            @foreach ($opciones as $id => $nombre)
                                <option value="{{ $id }}" {{ old('proveedor') == $id ? 'selected' : '' }}>{{ $nombre }}</option>
                            @endforeach
                        </select>
                        <p class="text-danger fst-italic">{{$errors->first('proveedor')}}</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Descripción</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" rows="2">{{ old('descripcion') }}</textarea>
                        <p class="text-danger fst-italic">{{$errors->first('descripcion')}}</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tipo de servicio</label>
                        <select class="form-select" id="t_servicio" name="t_servicio">
                            @foreach ($t_servicio as $id => $nombre)
                                <option value="{{ $id }}" {{ old('t_servicio') == $id ? 'selected' : '' }}>{{$nombre}}</option>
                            @endforeach
                        </select>
                        <p class="text-danger fst-italic">{{$errors->first('t_servicio')}}</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Fecha que requiere el servicio</label>
                        <input type="date" class="form-control" id="fecha" name="fecha" value="{{ old('fecha') }}">
                        <p class="text-danger fst-italic">{{$errors->first('fecha')}}</p>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success">Aceptar</button>
                    </div>
                </form>
                <!-- FIN DEL FORMULARIO -->
            </div>
        </div>
    </div>
</div>
