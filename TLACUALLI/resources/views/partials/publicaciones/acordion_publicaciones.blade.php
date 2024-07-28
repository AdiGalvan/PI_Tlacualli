<div class="accordion mt-3" id="accordionExample{{ $i }}">
    <div class="accordion-item border border-gray-200 rounded-lg overflow-hidden">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed flex justify-between items-center w-full text-left px-4 py-2 bg-gray-100 hover:bg-gray-200 focus:outline-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $i }}" aria-expanded="false" aria-controls="collapse{{ $i }}">
                <div class="flex items-center space-x-2">
                    <div class="flex-shrink-0">
                        <img src="{{ asset('images/pdf.png') }}" alt="" class="h-5 w-auto mr-2">
                    </div>
                    <div class="flex-grow">
                        <strong>Titulo</strong>
                        <br>
                        Documento
                    </div>
                    <div class="flex-shrink-0">
                        Fecha:
                        <br>
                        10/10/10
                    </div>
                </div>
            </button>
        </h2>
        <div id="collapse{{ $i }}" class="accordion-collapse collapse" data-bs-parent="#accordionExample{{ $i }}">
            <div class="accordion-body flex justify-between items-center p-4">
                <div>
                    <strong>Resumen</strong> 
                    <p>Se puede leer el resumen del documento</p>
                </div>
                <button class="btn btn-outline-primary border border-blue-500 text-blue-500 hover:bg-blue-500 hover:text-white py-2 px-4 rounded">
                    <i class="bi bi-file-earmark-pdf"></i> Acceder al documento
                </button>
            </div>
        </div>
    </div>
</div>
