@extends('layouts.template')

@section('titulo', 'Servicios')

@section('contenido')
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<div class="p-4">
    <h1 class="text-green-900 font-sans font-black text-3xl md:text-4xl text-center pb-2 mb-4">Mis solicitudes</h1>

    <div class="bg-white mx-4 sm:mx-auto mt-8 rounded-lg p-6 shadow-lg">
        <form class="flex flex-col sm:flex-row justify-center" role="search" action="{{ route('servicios.search') }}" method="GET">
            <input class="border border-gray-300 rounded-md px-3 py-2 mb-2 sm:mb-0 sm:mr-2 flex-grow" type="text" name="cliente" placeholder="Buscar por Cliente" aria-label="Buscar">
            <input class="border border-gray-300 rounded-md px-3 py-2 mb-2 sm:mb-0 sm:mr-2 flex-grow" type="text" name="proveedor" placeholder="Buscar por Proveedor" aria-label="Buscar">
            <input class="border border-gray-300 rounded-md px-3 py-2 mb-2 sm:mb-0 sm:mr-2 flex-grow" type="date" name="fecha" placeholder="Buscar por Fecha" aria-label="Buscar">
            <button class="bg-gradient-to-r from-green-500 to-green-800 hover:from-green-600 hover:to-green-800 text-white px-4 py-2 rounded-md mt-2 sm:mt-0 transition-colors duration-300" type="submit">Buscar</button>
        </form>
    </div>

    <div class="mt-4 flex justify-end mx-4 sm:mx-auto">
        <a href="{{ route('servicios.create') }}" class="bg-gradient-to-r from-green-500 to-green-800 hover:from-green-600 hover:to-green-800 text-white font-sans font-bold px-4 py-2 rounded-md text-lg transition-colors duration-300">Nueva solicitud</a>
    </div>

    <div class="mt-4 mx-4 sm:mx-auto">
        @if(session()->has('noResults'))
        <div class="bg-yellow-200 border-l-4 border-yellow-500 text-yellow-700 p-4 mb-4">
            <p><strong>{{ session('noResults') }}</strong></p>
        </div>
        @endif

        @if(session()->has('confirmacion'))
        <div class="bg-green-200 border-l-4 border-green-500 text-green-700 p-4 mb-4">
            <p><strong>{{ session('confirmacion') }}</strong></p>
        </div>
        @endif

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white shadow-2xl rounded-lg overflow-hidden mb-12">
                <thead class="bg-green-900 text-white">
                    <tr>
                        <th class="px-2 py-2 text-left text-xs sm:text-base">ID</th>
                        <th class="px-2 py-2 text-left text-xs sm:text-base">Cliente</th>
                        <th class="px-2 py-2 text-left text-xs sm:text-base">Proveedor</th>
                        <th class="px-2 py-2 text-left text-xs sm:text-base">Descripción</th>
                        <th class="px-2 py-2 text-left text-xs sm:text-base">Tipos de servicio</th>
                        <th class="px-2 py-2 text-left text-xs sm:text-base">Fecha</th>
                        <th class="px-2 py-2 text-left text-xs sm:text-base">Acciones</th>
                    </tr>
                </thead>
                
                <tbody class="divide-y divide-gray-500">
                    @foreach($solicitudes as $solicitud)
                    <tr>
                        <td class="px-2 py-1 text-sm">{{ $solicitud->id }}</td>
                        <td class="px-2 py-1 text-sm">{{ $solicitud->cliente }}</td>
                        <td class="px-2 py-1 text-sm">{{ $solicitud->proveedor }}</td>
                        <td class="px-2 py-1 text-sm">{{ $solicitud->descripcion }}</td>
                        <td class="px-2 py-1 text-sm">{{ $solicitud->tipo_servicio }}</td>
                        <td class="px-2 py-1 text-sm">{{ $solicitud->fecha }}</td>
                        <td class="px-2 py-1">

                            <!-- INICIA DIV PARA SECCIÓN DE BOTONES -->
                            <div class="inline-flex space-x-1 items-center">
                                <!-- Botón Editar -->
                                <a href="{{ route('servicios.edit', ['id' => $solicitud->id]) }}" class="bg-gradient-to-r from-green-500 to-green-800 hover:from-green-600 hover:to-green-800 text-white font-sans font-bold px-2 py-1 rounded-md text-xs no-underline inline-flex items-center space-x-1 transition-colors duration-300">
                                    <!-- Icono de editar de heroicons -->
                                    <svg data-slot="icon" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="h-4 w-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125"></path>
                                    </svg>
                                    <span>Editar</span>
                                </a>

                                <!-- Botón Eliminar -->
                                <form action="{{ route('servicios.editForm', ['id' => $solicitud->id]) }}" method="GET" class="inline-block">
                                    @csrf
                                    <button type="submit" class="bg-gradient-to-r from-yellow-300 to-yellow-500 hover:from-yellow-400 hover:to-yellow-600 text-white font-sans font-bold px-2 py-1 rounded-md text-xs no-underline inline-flex items-center space-x-1 transition-colors duration-300">
                                        <!-- Icono de bote de basura -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M4 7h16"></path>
                                            <path d="M10 11v6"></path>
                                            <path d="M14 11v6"></path>
                                            <path d="M5 7h14l1 13H4L5 7z"></path>
                                            <path d="M8 7V3h8v4"></path>
                                        </svg>
                                        <span>Eliminar</span>
                                    </button>
                                </form>
                            </div>
                            <!-- Fin sección de botones -->

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
