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
                    <div class="col-lg-6 mt-3 justify-content-end">
                        <div class="container d-flex">
                            <div id="carouselExampleIndicators{{ $servicio->id }}" class="carousel slide" data-bs-ride="carousel" style="max-width: 800px;">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="{{ asset('storage/' . $servicio->contenido) }}" alt="" class="card-img-top" style="height: 200px; object-fit: fit;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="ps-lg-8 mt-6 mt-lg-0">
                            <h2 class="mb-1 h1">{{ $servicio->nombre }}</h2>
                            <div class="mb-4">
                                <small class="text-warning">
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-half text-warning"></i>
                                </small>
                                <span>
                                    <small>4.5</small>
                                </span>
                                <div class="ms-2 badge bg-success">30 comentarios</div>
                                <div class="fs-4">
                                    @if ($servicio->costo)
                                        <span class="fw-bold text-dark">Costo por servicio: $ {{ $servicio->costo }}</span>
                                    @else
                                    <span class="fw-bold text-dark">Servicio gratuito</span>
                                    @endif
                                </div>
                                <br>
                                <span class="fw-bold text-dark">Proveedor del servicio:</span> 
                                <p>{{ $servicio->usuario->nombre_usuario }}</p>
                                <span class="fw-bold text-dark">Descripción del servicio: </span>
                                <p>{{ $servicio->descripcion }}</p>
                                <span class="fw-bold text-dark">Fecha de publicación </span>
                                <p>{{ $servicio->fecha_publicacion }}</p>
                                <hr class="my-6">
                                <div class="mt-3 row justify-content-start g-2 align-items-center">
                                    <div class="col-lg-4 col-md-5 col-6 d-grid">
                                            <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#solicitarServicioModal{{ $servicio->id }}">
                                                <i class="bi bi-cart-check"></i> Solicitar servicio 
                                            </button>
                                    </div>
                                    <div class="col-md-4 col-5">
                                        <a class="btn btn-light" href="#" data-bs-toggle="tooltip" data-bs-html="true" aria-label="Compare" onclick="toggleLike(this)">
                                            <i id="heart-icon" class="bi bi-heart" style="color: black;"></i>
                                        </a>
                                    </div>
                                </div>
                                <hr class="my-6">
                                <div>
                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <td>Nota:</td>
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Modal pequeño para solicitar servicio --}}
<div class="modal fade" id="solicitarServicioModal{{ $servicio->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Solicitar Servicio</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>¿Está seguro que desea solicitar este servicio?</p>
                <p><strong>Servicio:</strong> {{ $servicio->nombre }}</p>
                <p><strong>Costo:</strong> 
                    @if ($servicio->costo)
                        $ {{ $servicio->costo }}
                    @else
                        Gratuito
                    @endif
                </p>
                <form action="{{ route('solicitarServicio', ['servicio_id' => $servicio->id, 'proveedor_id' => $servicio->usuario->id] ) }}" method="POST" style="display: inline;">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Descripción</label>
                        <input type="text" class="form-control" id="_descS" name="_descS" required placeholder="Añada una descripción detallada de los días, periodos o detalles importantes de su servicio a solicitar">
                    </div>
            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success" onclick="confirmarSolicitud({{ $servicio->id }})">Confirmar Solicitud</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

<script>
    function confirmarSolicitud(event) {
        // Obtener el valor del campo de descripción
        var descripcion = document.getElementById('_descS').value;
    
        // Verificar si el campo de descripción está vacío
        if (descripcion.trim() === '') {
            alert('Por favor, complete la descripción antes de confirmar la solicitud.');
            event.preventDefault(); // Prevenir el envío del formulario
            return;
        }
    
        // Si el campo de descripción está lleno, permitir el envío del formulario
        console.log('Solicitud confirmada con descripción:', descripcion);
        // Aquí puedes añadir lógica adicional, como cerrar el modal
    }
    
    // Agregar evento para validar el formulario antes de enviarlo
    document.addEventListener('DOMContentLoaded', function () {
        var form = document.querySelector('form'); // Selecciona el formulario
        form.addEventListener('submit', confirmarSolicitud); // Añade el evento submit
    });
    
    // Agregar evento para recargar la página cuando se cierra el modal de solicitud
    document.addEventListener('hidden.bs.modal', function (event) {
        if (event.target.id.startsWith('solicitarServicioModal')) {
            location.reload();
        }
    }, false);
    </script>
    
