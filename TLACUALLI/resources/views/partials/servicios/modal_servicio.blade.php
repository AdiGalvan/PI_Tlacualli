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
                            <h2 class="mb-1 h1 font-sans font-black text-green-900 text-2x1 text-center">{{ $servicio->nombre }}</h2>
                            <span class="font-sans font-bold text-2xl">{{ $servicio->usuario->nombre_usuario }}</span>
                            <br>
                            <br>
                                        <p class="text-green-900 font-sans font-bold pb-2 text-base">Sobre este servicio:</p>
                                   
                                    
                                        @if ($servicio->notas)
                                            <p class="text-lg font-sans font-light">{{ $servicio->notas }}</p>    
                                        @else
                                            <p class="text-lg font-sans font-light">Sin notas</p>
                                        @endif
                                        
                                 <br>
                                 <br>
                            <form method="POST" action="{{ route('registroSolicitud', [$servicio->id,$servicio->id_usuario]) }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="fecha_servicio" class="text-green-900 font-sans font-bold pb-2 text-base">Fecha de Servicio</label>
                                    <input type="date" class="font-sans font-light px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 w-full" id="fecha_servicio" name="fecha_servicio">
                                    <p class="text-red-600 font-sans font-bold mt-1">{{ $errors->first('fecha_servicio') }}</p>
                                </div>
                                <div class="mb-3">
                                    <label for="instrucciones" class="text-green-900 font-sans font-bold pb-2 text-base">Instrucciones (opcional)</label>
                                    <textarea class="font-sans font-light px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 w-full" id="instrucciones" name="instrucciones" rows="3"></textarea>
                                </div>
                                <div class="flex justify-end">
                                    <button type="submit" class="bg-gradient-to-r from-green-500 to-green-800 hover:from-green-600 hover:to-green-800 text-white px-4 py-2 rounded-lg mr-2 font-semibold font-sans">
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

    
