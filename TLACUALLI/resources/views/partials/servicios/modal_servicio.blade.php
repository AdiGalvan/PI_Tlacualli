{{-- Modal de más --}}
@foreach($servicios as $servicio)
<div class="modal fade" id="servicioModal{{ $servicio->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-body p-8">
                <div class="position-absolute top-0 end-0 me-3 mt-3">
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close">
                    </button>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="ps-lg-8 mt-6 mt-lg-0">
                            <h2 class="mb-1 h1">{{ $servicio->nombre }}</h2>
                            <span class="fw-bold text-dark">{{ $servicio->usuario->nombre_usuario }}</span>
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <td>Sobre este servicio:</td>
                                    </tr>
                                    <tr>
                                        @if ($servicio->notas)
                                            <td>{{ $servicio->notas }}</td>    
                                        @else
                                            <td>Sin notas</td>
                                        @endif
                                        
                                    </tr>
                                </tbody>
                            </table> 
                            <form method="POST" action="{{ route('registroSolicitud', [$servicio->id,$servicio->id_usuario]) }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="fecha_servicio" class="form-label">Fecha de Servicio</label>
                                    <input type="date" class="form-control" id="fecha_servicio" name="fecha_servicio" required>
                                </div>
                                <div class="mb-3">
                                    <label for="instrucciones" class="form-label">Instrucciones (opcional)</label>
                                    <textarea class="form-control" id="instrucciones" name="instrucciones" rows="3" required></textarea>
                                </div>
                                <div class="col-lg-4 col-md-5 col-6 d-grid">
                                    <button type="submit" class="text-white bg-green-800 hover:bg-green-900 focus:ring-4 focus:outline-none focus:ring-green-700 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        <i class="bi bi-cart-check"></i> Solicitar servicio 
                                    </button>
                                </div>
                            </form> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endforeach

    
