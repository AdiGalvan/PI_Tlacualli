@extends('layouts.template')

@section('titulo', 'Servicios')

@section('contenido')
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<div class="p-4">
    <h1 class="text-green-900 font-sans font-black text-4xl text-center pb-2 mb-4">Mis solicitudes</h1>

    <div class="bg-white w-1/2 mx-auto mt-8 rounded-lg p-6 shadow-lg">
        <form class="flex justify-center" role="search" action="{{ route('servicios.search') }}" method="GET">
            <input class="border border-gray-300 rounded-md px-3 py-2 mr-2" type="text" name="cliente" placeholder="Buscar por Cliente" aria-label="Buscar">
            <input class="border border-gray-300 rounded-md px-3 py-2 mr-2" type="text" name="proveedor" placeholder="Buscar por Proveedor" aria-label="Buscar">
            <input class="border border-gray-300 rounded-md px-3 py-2 mr-2" type="date" name="fecha" placeholder="Buscar por Fecha" aria-label="Buscar">
            <button class="bg-gradient-to-r from-green-500 to-green-800 hover:bg-green-600 text-white px-4 py-2 rounded-md" type="submit">Buscar</button>
        </form>
    </div>

    <div class="md:container md:mx-auto mb-8"> <!-- CONTAINER BOTÓN NUEVA SOLICITUD -->
    <div class="mt-4 flex justify-end">
        <a href="{{ route('servicios.create') }}" class="bg-gradient-to-r from-green-500 to-green-800 text-white font-sans font-bold px-4 py-2 rounded-md text-lg">Nueva solicitud</a>
    </div>
    </div> <!-- CIERRE DIV CONTAINER -->

    <div class="mt-3 overflow-x-auto">
        @if(session()->has('noResults'))
        <div class="bg-yellow-200 border-l-4 border-yellow-500 text-yellow-700 p-4 mb-4 flex-auto">
            <p><strong>{{ session('noResults') }}</strong></p>
        </div>
        @endif

        @if(session()->has('confirmacion'))
        <div class="bg-green-200 border-l-4 border-green-500 text-green-700 p-4 mb-4">
            <p><strong>{{ session('confirmacion') }}</strong></p>
        </div>
        @endif

<div class="md:container md:mx-auto mb-36"> <!-- CONTAINER TABLE -->
        <table class="min-w-full bg-white shadow-2xl rounded-lg overflow-hidden ">
            <thead class="bg-green-900 text-white ">
                <tr>
                    <th class="px-6 py-3 text-left text-2xl">ID</th>
                    <th class="px-6 py-3 text-left text-2xl">Cliente</th>
                    <th class="px-6 py-3 text-left text-2xl">Proveedor</th>
                    <th class="px-6 py-3 text-left text-2xl flex justify-center">Descripción</th>
                    <th class="px-6 py-3 text-left text-2xl ">Tipos de servicio</th>
                    <th class="px-6 py-3 text-left text-2xl">Fecha</th>
                    <th class="px-6 py-3 text-left text-2xl flex justify-center">Acciones</th>
                </tr>
            </thead>
            
            <tbody class="divide-y divide-gray-500 shadow-md">
                @foreach($solicitudes as $solicitud)
                <tr>
                    <td class="px-6 py-4 text-base font-black">{{ $solicitud->id }}</td>
                    <td class="px-6 py-4 text-base font-semibold">{{ $solicitud->cliente }}</td>
                    <td class="px-6 py-4 text-base font-semibold">{{ $solicitud->proveedor }}</td>
                    <td class="px-6 py-4 text-base font-semibold">{{ $solicitud->descripcion }}</td>
                    <td class="px-6 py-4 text-base font-semibold">{{ $solicitud->tipo_servicio }}</td>
                    <td class="px-6 py-4 text-base font-semibold">{{ $solicitud->fecha }}</td>
                    <td class="px-6 py-4">
    <div class="inline-flex space-x-2 items-center">
        <a href="{{ route('servicios.edit', ['id' => $solicitud->id]) }}" class="bg-gradient-to-r from-yellow-300 to-yellow-500 hover:bg-green-400 text-white font-sans font-bold px-4 py-2 rounded-md no-underline">
            Editar
        </a>
        <form action="{{ route('servicios.editForm', ['id' => $solicitud->id]) }}" method="GET" class="inline-block">
            @csrf
            <button type="submit" class="bg-gradient-to-r from-red-400 to-red-600 hover:bg-yellow-500 text-white font-sans font-bold px-3 py-2 rounded-md no-underline">
                Eliminar
            </button>
        </form>
    </div>
</td>

                </tr>
                @endforeach
            </tbody>
        </table>
</div> <!-- DIV CONTAINER TABLE -->
    </div>
</div>

@endsection
