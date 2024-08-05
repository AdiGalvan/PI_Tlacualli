
@extends('layouts.template')
@section('titulo','Solicitudes')
@section('contenido')

<div class="container mt-">
    <h2 class="text-green-900 font-sans font-black text-4xl pt-4 pb-4 flex justify-center">Productos Ordenados</h2>
        @if(!$mis_ordenes->isEmpty())
        <table class="min-w-full bg-white shadow-1xl rounded-lg overflow-hidden font-sans">
            <thead class="bg-green-900 text-white ">
                        <tr>
                            <th class="px-6 py-3 text-left text-1xl">Cliente</th>
                            <th class="px-6 py-3 text-left text-1xl">Correo</th>
                            <th class="px-6 py-3 text-left text-1xl">Teléfono</th>
                            <th class="px-6 py-3 text-left text-1xl">Nombre del Producto</th>
                            <th class="px-6 py-3 text-left text-1xl">Descripción</th>
                            <th class="px-6 py-3 text-left text-1xl">Costo unitario</th>
                            <th class="px-6 py-3 text-left text-1xl">Cantidad</th>
                            <th class="px-6 py-3 text-left text-1xl">Total</th>
                            <th class="px-6 py-3 text-left text-1xl">Fecha de pedido</th>
                            <th class="px-6 py-3 text-left text-1xl"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-500 shadow-md">
                    @foreach ($mis_ordenes as $m_orden)
                        <tr>
                            <td class="px-6 py-4 text-base font-semiblack">{{ $m_orden->orden->usuario->nombre }}</td>
                            <td class="px-6 py-4 text-base font-semibold">{{ $m_orden->orden->usuario->correo }}</td>
                            @if ($m_orden->orden->usuario->telefono!=null)
                            <td class="px-6 py-4 text-base font-semibold">{{ $m_orden->orden->usuario->telefono }}</td>
                            @else
                            <td class="px-6 py-4 text-base font-semibold">No registrado</td>
                            @endif
                            <td class="px-6 py-4 text-base font-semibold">{{ $m_orden->producto->nombre }}</td>
                            <td class="px-6 py-4 text-base font-semibold">{{ $m_orden->producto->descripcion }}</td>
                            <td class="px-6 py-4 text-base font-semibold">{{ $m_orden->producto->costo }}</td>
                            <td class="px-6 py-4 text-base font-semibold">{{ $m_orden->cantidad }}</td>
                            <td class="px-6 py-4 text-base font-semibold">{{ $m_orden->subtotal }}</td>
                            <td class="px-6 py-4 text-base font-semibold">{{ $m_orden->created_at->format('Y-m-d') }}</td>
                            <td class="px-6 py-4 text-base font-semibold">
                                @if ($m_orden->conclusion == 1)
                                    <form action="{{ route('concluirOrden', ['id' => $m_orden->id, 'id2' => $m_orden->id_orden]) }}" method="POST">
                                        @csrf
                                        @method('PUT') <!-- Usa PATCH si solo deseas actualizar un recurso -->
                                        <button type="submit" class="bg-gradient-to-r from-gray-500 to-gray-800 hover:from-gray-600 hover:to-gray-800 text-white px-4 py-2 rounded-lg mr-2 font-semibold font-sans">Concluir</button>
                                    </form>
                                @else
                                    <p>Concluido</p>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
        </table>
        @else
            <p class="mb-6 text-2xl text-center font-light font-sans text-black  dark:text-white mt-5 w-full">No tienes órdenes de productos pendientes</p>
        @endif
            

        <h2 class="text-green-900 font-sans font-black text-4xl pt-4 pb-4 flex justify-center">Talleres Solicitados</h2>

        @if(!$mis_inscritos->isEmpty())
        <table class="min-w-full bg-white shadow-1xl rounded-lg overflow-hidden font-sans">
            <thead class="bg-green-900 text-white ">
                        <tr>
                            <th class="px-6 py-3 text-left text-1xl">Cliente</th>
                            <th class="px-6 py-3 text-left text-1xl">Correo</th>
                            <th class="px-6 py-3 text-left text-1xl">Teléfono</th>
                            <th class="px-6 py-3 text-left text-1xl">Nombre del Taller</th>
                            <th class="px-6 py-3 text-left text-1xl">Descripción</th>
                            <th class="px-6 py-3 text-left text-1xl">Costo</th>
                            <th class="px-6 py-3 text-left text-1xl">Fecha de Inscripción</th>
                            <th class="px-6 py-3 text-left text-1xl"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-500 shadow-md">
                        @foreach ($mis_inscritos as $ins)
                        <tr>
                            <td class="px-6 py-4 text-base font-semibold">{{ $ins->cliente->nombre }}</td>
                            <td class="px-6 py-4 text-base font-semibold">{{ $ins->cliente->correo }}</td>
                            @if ($ins->cliente->telefono!=null)
                            <td class="px-6 py-4 text-base font-semibold">{{ $ins->cliente->telefono }}</td>
                            @else
                            <td class="px-6 py-4 text-base font-semibold">No registrado</td>
                            @endif
                            @if ($ins->publicacion)
                                <td class="px-6 py-4 text-base font-semibold">{{ $ins->publicacion->nombre }}</td>
                                <td class="px-6 py-4 text-base font-semibold">{{ $ins->publicacion->descripcion }}</td>
                                <td class="px-6 py-4 text-base font-semibold">{{ $ins->publicacion->costo }}</td>
                                <td class="px-6 py-4 text-base font-semibold">{{ $ins->created_at->format('Y-m-d') }}</td>
                            @else
                                <td colspan="4">No hay detalles del taller disponibles.</td>
                            @endif
                            <td>
                            @if ($ins->conclusion == 1)
                                <form action="{{ route('concluirRelacion', $ins->id) }}" method="POST">
                                    @csrf
                                    @method('PUT') <!-- Usa PATCH si solo deseas actualizar un recurso -->
                                    <button type="submit" class="bg-gradient-to-r from-gray-500 to-gray-800 hover:from-gray-600 hover:to-gray-800 text-white px-4 py-2 rounded-lg mr-2 font-semibold font-sans">Concluir</button>
                                </form>
                            @else
                                <p>Concluido</p>
                            @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
        </table>
        @else
        <p class="mb-6 text-2xl text-center font-light font-sans text-black  dark:text-white mt-5 w-full">No tienes solicitudes de talleres pendientes</p>
        @endif

        <h2 class="text-green-900 font-sans font-black text-4xl pt-4 pb-4 flex justify-center">Servicios Solicitados</h2>

        @if(!$mis_solicitudes->isEmpty())
        <table class="min-w-full bg-white shadow-1xl rounded-lg overflow-hidden font-sans">
            <thead class="bg-green-900 text-white ">
                        <tr>
                            <th class="px-6 py-3 text-left text-1xl">Cliente</th>
                            <th class="px-6 py-3 text-left text-1xl">Correo</th>
                            <th class="px-6 py-3 text-left text-1xl">Teléfono</th>
                            <th class="px-6 py-3 text-left text-1xl">Servicio solicitado</th>
                            <th class="px-6 py-3 text-left text-1xl">Instrucciones</th>
                            <th class="px-6 py-3 text-left text-1xl">Costo</th>
                            <th class="px-6 py-3 text-left text-1xl">Fecha de Servicio</th>
                            <th class="px-6 py-3 text-left text-1xl"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-500 shadow-md">
                        @foreach ($mis_solicitudes as $sol)
                        <tr>
                            <td class="px-6 py-4 text-base font-semibold">{{ $sol->cliente->nombre }}</td>
                            <td class="px-6 py-4 text-base font-semibold">{{ $sol->cliente->correo }}</td>
                            @if ($sol->cliente->telefono!=null)
                            <td class="px-6 py-4 text-base font-semibold">{{ $sol->cliente->telefono }}</td>
                            @else
                            <td class="px-6 py-4 text-base font-semibold">No registrado</td>
                            @endif
                            @if ($sol->servicio)
                                <td class="px-6 py-4 text-base font-semibold">{{ $sol->servicio->nombre }}</td>
                                <td class="px-6 py-4 text-base font-semibold">{{ $sol->descripcion }}</td>
                                <td class="px-6 py-4 text-base font-semibold">{{ $sol->servicio->costo }}</td>
                                <td class="px-6 py-4 text-base font-semibold">{{ $sol->fecha}}</td>
                            @else
                                <td colspan="4">No hay detalles del servicio disponibles.</td>
                            @endif
                            <td>
                            @if ($sol->conclusion == 1)
                                <form action="{{ route('concluirServicio', $sol->id) }}" method="POST">
                                    @csrf
                                    @method('PUT') <!-- Usa PATCH si solo deseas actualizar un recurso -->
                                    <button type="submit" class="bg-gradient-to-r from-gray-500 to-gray-800 hover:from-gray-600 hover:to-gray-800 text-white px-4 py-2 rounded-lg mr-2 font-semibold font-sans">Concluir</button>
                                </form>
                            @else
                                <p>Concluido</p>
                            @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
        </table>
        @else
        <p class="mb-6 text-2xl text-center font-light font-sans text-black  dark:text-white mt-5 w-full">No tienes solicitudes de servicios pendientes</p>
        @endif
</div>
@endsection
