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

{{-- <head>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>

</head> --}}
<div class="accordion mt-3" id="accordionExample{{ $index }}" data-accordion="collapse">
  <h2 id="accordion-collapse-heading-{{ $index }}">
    <button type="button" class="flex items-center justify-between w-full p-3 font-medium text-black bg-white border border-b-0 border-gray-300 rounded-t-lg focus:ring-2 focus:ring-gray-200 dark:focus:ring-gray-600 dark:border-gray-600 dark:text-gray-300 gap-2" data-accordion-target="#accordion-collapse-body-{{ $index }}" aria-expanded="true" aria-controls="accordion-collapse-body-{{ $index }}">
        <div class="flex items-center">
            <img src="{{ asset('images/pdf.png') }}" alt="" class="mr-2" style="max-height: 20px;">
            <div class="px-3 mt-3 mb-3 text-black">
                <strong>{{ $publicacion->nombre }}</strong><br>
                Documento
            </div>
        </div>
        <div class="px-5 mt-3 mb-3 text-black">
            Fecha:<br>
            {{ $publicacion->fecha_publicacion }}
        </div>   
      <svg data-accordion-icon class="w-4 h-4 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
      </svg>
    </button>
  </h2>
  <div id="accordion-collapse-body-{{ $index }}" class="hidden rounded-b-lg transition-all duration-300 ease-in-out bg-white text-black" aria-labelledby="accordion-collapse-heading-{{ $index }}">
    <div x-show="open === {{ $index }}" x-cloak class="p-4 border-t border-gray-200">
        <div class="flex justify-between items-center">
            <div>
                <strong>Resumen</strong>
                <p>{{ $publicacion->descripcion }}</p>
            </div>
            <a href="{{ asset('storage/' . $publicacion->contenido) }}" target="_blank" class="bg-gradient-to-r from-green-500 to-green-800 text-white font-sans font-bold px-4 py-2 rounded-md text-md">
                <i class="bi bi-file-earmark-pdf"></i> Acceder al documento
            </a>  
        </div>
    </div>
  </div>
</div>
