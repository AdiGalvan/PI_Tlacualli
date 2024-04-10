<div class="accordion mt-3" id="accordionExample{{ $i }}">
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $i }}" aria-expanded="false" aria-controls="collapse{{ $i }}">
                <div class="row">
                    <div class="col-1 ">
                        <img src="{{ asset('images/PDF.png') }}" alt="Imagen {{ $i }}" class="mr-2" style="max-height: 20px;"> 
                    </div>
                    <div class="col-8">
                        <strong>Titulo</strong>
                        <br>
                        Documento
                    </div>
                    <div class="col-2">
                        Fecha:
                        <br>
                        10/10/10
                    </div>
                </div>
            </button>
        </h2>
        <div id="collapse{{ $i }}" class="accordion-collapse collapse" data-bs-parent="#accordionExample{{ $i }}">
            <div class="accordion-body d-flex justify-content-between align-items-center">
                <div>
                    <strong>Resumen</strong> 
                    <p>Se puede leer el resumen del documento</p>
                </div>
                <button class="btn btn-outline-primary"><i class="bi bi-file-earmark-pdf"></i> Acceder al documento</button>
            </div>
            
        </div>
    </div>
</div>
