<div class="accordion mt-3" id="accordionExample{{ $publicacion->id }}">
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $i }}" aria-expanded="false" aria-controls="collapse{{ $i }}">
                <div class="row">
                    <div class="col-1">
                        <img src="{{ asset('images/pdf.png') }}" alt="" class="mr-2" style="max-height: 20px;">
                    </div>
                    <div class="col-8">
                        <strong>{{ $publicacion->nombre }}</strong>
                        <br>
                        {{ $publicacion->id_tipo == 1 ? 'Artículo' : ($publicacion->id_tipo == 2 ? 'Servicio' : 'Anuncio') }}
                    </div>
                    <div class="col-2">
                        Fecha:
                        <br>
                        {{ $publicacion->created_at->format('d/m/Y') }}
                    </div>
                </div>
            </button>
        </h2>
        <div id="collapse{{ $i }}" class="accordion-collapse collapse" data-bs-parent="#accordionExample{{ $i }}">
            <div class="accordion-body d-flex justify-content-between align-items-center">
                <div>
                    <strong>Resumen</strong>
                    <p>{{ $publicacion->descripcion }}</p>
                </div>
                <a href="{{ Storage::url($publicacion->contenido) }}" class="btn btn-outline-primary" target="_blank"><i class="bi bi-file-earmark-pdf"></i> Acceder al documento</a>
            </div>
        </div>
    </div>
</div>
