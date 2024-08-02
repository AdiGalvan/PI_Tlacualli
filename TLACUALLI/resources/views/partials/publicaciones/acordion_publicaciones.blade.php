{{-- <div class="accordion mt-3" id="accordionExample{{ $index }}">
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
                </a>            
            </div>
        </div>
    </div>
</div>  
 --}}

<head>
  {{--   <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.2.3/dist/cdn.min.js" defer></script> --}}
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>

</head>
<div class="space-y-4" id="accordionExample{{ $index }}">
    <!-- Accordion Item 1 -->
    <div class="border rounded-lg shadow-md bg-white">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}" aria-expanded="false" aria-controls="collapse{{ $index }}">
            {{-- <button class="accordion-button collapsed" class="flex items-center justify-between w-full p-4 font-medium text-gray-500 border-b border-gray-200 hover:bg-blue-100 focus:outline-none focus:ring-4 focus:ring-blue-200" aria-expanded="open === 1" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}" aria-expanded="false" aria-controls="collapse{{ $index }}"> --}}
                <div class="flex items-center">
                    <img {{ asset('images/pdf.png') }} alt="" class="mr-2" style="max-height: 20px;">
                    <div class="px-3 mt-3 mb-3">
                        <strong>{{ $publicacion->nombre }}</strong><br>
                        Documento
                    </div>
                </div>
                <div class="px-5 mt-3 mb-3">
                    Fecha:<br>
                    {{ $publicacion->fecha_publicacion }}
                </div>
            </button>
        </h2>
        <div x-show="open === 1" x-cloak class="p-4 border-t border-gray-200">
            <div class="flex justify-between items-center">
                <div>
                    <strong>Resumen</strong>
                    <p>{{ $publicacion->descripcion }}</p>
                </div>
                <a href="{{ asset('storage/' . $publicacion->contenido) }}" target="_blank"  class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2" >
                    <i class="bi bi-file-earmark-pdf"></i> Acceder al documento
                </a>  
            </div>
        </div>
    </div>
    <br>
</div>
 