<!-- INICIO MODAL -->
<div class="modal fade" id="registrar_servicio" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo servicio</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="/registroServicio" id="registroServicio" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label class="form-label">Nombre del servicio</label>
            <input type="text" class="form-control" id="_ns" name="_ns" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Resumen de servicio</label>
            <input type="text" class="form-control" id="_descS" name="_descS" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Costo por servicio</label>
            <input type="number" class="form-control" id="_costoS" name="_costoS" required>
          </div>
          <div class="mb-3">
              <label for="_notaS" class="form-label">Descripción</label>
              <textarea class="form-control" id="_notaS" name="_notaS" rows="3"></textarea>
          </div> 
          <div class="modal-footer">
            <button type="submit" class="btn btn-outline-success" onclick="validarCampos()"><i class="bi bi-check-lg"></i> Agregar</button>
            <button type="button" class="btn btn-outline-warning" data-bs-dismiss="modal"><i class="bi bi-x-lg"></i> Cancelar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
{{-- Modal de actualización de servicio --}}
<div class="modal fade" id="actualizar_servicio{{ $servicio->id ?? '' }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Actualizar servicio</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ !empty($servicio->id) ? route ('actualizarServicio', $servicio->id) : '' }}" id="actualizarServicio" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="mb-3">
            <label class="form-label">Nombre del servicio</label>
            <input type="text" class="form-control" id="_ns" name="_ns" required value="{{ !empty($servicio->nombre) ? $servicio->nombre : '' }}">
          </div>
          <div class="mb-3">
            <label class="form-label">Resumen de servicio</label>
            <input type="text" class="form-control" id="_descS" name="_descS" required value="{{ !empty($servicio->descripcion) ? $servicio->descripcion : '' }}">
          </div>
          <div class="mb-3">
            <label class="form-label">Costo por servicio</label>
            <input type="number" class="form-control" id="_costoS" name="_costoS" required value="{{ !empty($servicio->costo) ? $servicio->costo : '' }}">
          </div>
          <div class="mb-3">
              <label for="_notaS" class="form-label">Descripción</label>
              <textarea class="form-control" id="_notaS" name="_notaS" rows="3">{{ !empty($servicio->notas) ? $servicio->notas : '' }}</textarea>
          </div>        
          <div class="modal-footer">
            <button type="submit" class="btn btn-outline-success"><i class="bi bi-check-lg"></i> Agregar</button>
            <button type="button" class="btn btn-outline-warning" data-bs-dismiss="modal"><i class="bi bi-x-lg"></i> Cancelar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>





  