@extends('layouts.template')
@section('titulo','Mis_Servicios')
@section('contenido')

<p></p>
<h1 class="text-green-900 font-sans font-black text-4xl pt-4 pb-4 flex justify-center"> Mis Servicios</h1>
<p></p>


<div class="container mt-4 d-flex justify-content-end">
    <button type="button" class="bg-gradient-to-r from-green-500 to-green-800 hover:bg-green-600 text-white px-4 py-2 rounded-md"" data-bs-toggle="modal" data-bs-target="#registrar_servicio">Registrar servicio</button>
</div>

<div class="container mt-3">
    @if(session()->has('noResults'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>{{ session('noResults') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if(session()->has('confirmacion'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session('confirmacion') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="md:container md:mx-auto mb-20 overflow-x-auto">
    @if($servicios->isEmpty())
        <div id="alert-2" class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <span class="sr-only">Info</span>
            <div class="ms-3 text-sm font-medium">
            ¡Lo sentimos! Por el momento no hay publicaciones disponibles.
            </div>
            <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-2" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
            </button>
        </div>
        @else
    <table class="min-w-full bg-white shadow-2xl rounded-lg overflow-hidden">
        <thead class="bg-green-900 text-white ">
            <tr>
                <th class="px-6 py-3 text-left text-base">Nombre</th>
                <th class="px-6 py-3 text-left text-base">Descripción</th>
                {{-- <th>Tipos de servicio</th> --}}
                <th class="px-6 py-3 text-left text-base">Costo</th>
                <th class="px-6 py-3 text-left text-base">Fecha de publicación</th>
                <th class="px-6 py-3 text-left text-base">Acciones</th>
            </tr>
        </thead>
        
        <tbody>
            @foreach($servicios as $servicio)
            <tr>
                <td class="px-6 py-4 text-base font-medium">{{ $servicio->nombre }}</td>
                <td class="px-6 py-4 text-base font-medium">{{ $servicio->descripcion }}</td>
                <td class="px-6 py-4 text-base font-medium">
                    @if ( $servicio->costo == 0 )
                        Gratuito
                    @else
                        ${{ $servicio->costo }}
                    @endif
                </td>
                <td class="px-6 py-4 text-base font-medium">{{ $servicio->fecha_publicacion }}</td>
                <td class="px-6 py-4 text-base font-semibold">
                    <button type="button" class="bg-gradient-to-r from-green-500 to-green-800 hover:bg-green-600 text-white px-4 py-2 rounded-md" data-bs-toggle="modal" data-bs-target="#actualizar_servicio{{ $servicio->id }}">Editar</button> 
                    @if($servicio->estatus==1)
                    <form action="{{ route('desactivarServicio', $servicio->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method ('PUT')
                        <button type="submit" class="bg-gradient-to-r from-yellow-500 to-yellow-800 hover:bg-yellow-600 text-white px-4 py-2 rounded-md">Desactivar</button>
                    </form>
                    @else
                    <form action="{{ route('activarServicio', $servicio->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method ('PUT')
                        <button type="submit" class="bg-gradient-to-r from-blue-600 to-blue-900 hover:bg-blue-800 text-white px-4 py-2 rounded-md">Activar</button>
                    </form>
                    @endif
                </td>
            </tr>
            @include('partials.servicios.registrar_servicio', ['servicio' => $servicio])
            @endforeach
        </tbody>
    </table>
    @endif
</div>
{{ $servicios->links('vendor.pagination.centered') }}
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

@include('partials.servicios.registrar_servicio')
@endsection


