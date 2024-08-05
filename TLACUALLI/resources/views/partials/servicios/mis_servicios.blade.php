@extends('layouts.template')
@section('titulo','Servicios')
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

    <div class="md:container md:mx-auto mb-20">
    <table class="min-w-full bg-white shadow-2xl rounded-lg overflow-hidden">
        <thead class="bg-green-900 text-white ">
            <tr>
                <th class="px-6 py-3 text-left text-base">ID</th>
                <th class="px-6 py-3 text-left text-base">Clientes</th>
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
                <td class="px-6 py-4 text-base font-semibold">{{ $servicio->id }}</td>
                <td class="px-6 py-4 text-base font-medium">{{ $servicio->cliente }}</td>
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
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

@include('partials.servicios.registrar_servicio')
@endsection


