@foreach($solicitudes as $solicitud)
<div class="modal fade" id="miSolicitudModal{{ $solicitud->id }}" tabindex="-1" aria-labelledby="exampleModalLabel{{ $solicitud->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel{{ $solicitud->id }}">Detalles de tu servicio solicitado</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Instrucciones detalladas</label>
                    <input type="text" class="form-control" id="_descS" name="_descS" required value="{{ $solicitud->descripcion }}">          
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-success"><i class="bi bi-check-lg"></i>Cancelar</button>
                <button type="button" class="btn btn-outline-warning"><i class="bi bi-x-lg"></i>Reportar</button>
            </div>
        </div>
    </div>
</div>
@endforeach
