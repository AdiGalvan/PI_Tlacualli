<div class="accordion mt-3" id="accordionExample{{ $index }}">
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}" aria-expanded="false" aria-controls="collapse{{ $index }}">
                <div class="row">
                    <div class="col-1 ">
                        <img src="{{ asset('images/pdf.png') }}" alt="" class="mr-2" style="max-height: 20px;"> 
                    </div>
                    <div class="col-8">
                        <strong>{{ $publicacion->nombre }}</strong>
                        <br>
                        Documento
                    </div>
                    <div class="col-2">
                    <span class="fecha-publicacion">Fecha: {{ $publicacion->fecha_publicacion }}</span>
                    </div>
                </div>
            </button>
        </h2>
        <div id="collapse{{ $index }}" class="accordion-collapse collapse" data-bs-parent="#accordionExample{{ $index }}">
            <div class="accordion-body d-flex justify-content-between align-items-center">
                <div>
                    <strong>Resumen</strong> 
                    <p>{{ $publicacion->descripcion }}</p>
                </div>
                <a href="{{ asset('storage/' . $publicacion->contenido) }}" target="_blank" class="btn btn-outline-primary">
                    <i class="bi bi-file-earmark-pdf"></i> Acceder al documento
                </a>            </div>
            
        </div>
    </div>
</div>
