<h2 class="mb-6 text-3xl text-center font-semibold font-sans text-dark uppercase dark:text-white mt-5 w-full">Productos Ordenados</h2>
                @if(!$mis_ordenes->isEmpty())
                    <table class="min-w-full bg-white shadow-1xl rounded-lg overflow-hidden font-sans">
                        <thead class="bg-green-900 text-white ">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-1xl">Proveedor</th>
                                        <th class="px-6 py-3 text-left text-1xl">Correo</th>
                                        <th class="px-6 py-3 text-left text-1xl">Id</th>
                                        <th class="px-6 py-3 text-left text-1xl">Nombre del Producto</th>
                                        <th class="px-6 py-3 text-left text-1xl">Descripción</th>
                                        <th class="px-6 py-3 text-left text-1xl">Costo</th>
                                        <th class="px-6 py-3 text-left text-1xl">Cantidad</th>
                                        <th class="px-6 py-3 text-left text-1xl">Total</th>
                                        <th class="px-6 py-3 text-left text-1xl">Acción</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-500 shadow-md">
                                @foreach ($mis_ordenes as $m_orden)
                                    <tr>
                                        <td class="px-6 py-4 text-base font-black">{{ $m_orden->producto->proveedor->nombre }}</td>
                                        <td class="px-6 py-4 text-base font-semibold">{{ $m_orden->producto->proveedor->correo }}</td>
                                        <td class="px-6 py-4 text-base font-semibold">{{ $m_orden->id }}</td>
                                        <td class="px-6 py-4 text-base font-semibold">{{ $m_orden->producto->nombre }}</td>
                                        <td class="px-6 py-4 text-base font-semibold">{{ $m_orden->producto->descripcion }}</td>
                                        <td class="px-6 py-4 text-base font-semibold">{{ $m_orden->producto->costo }}</td>
                                        <td class="px-6 py-4 text-base font-semibold">{{ $m_orden->cantidad }}</td>
                                        <td class="px-6 py-4 text-base font-semibold">{{ $m_orden->subtotal }}</td>
                                        <td class="px-6 py-4 text-base font-semibold">
                                            @if ($m_orden->conclusion == 1)
                                                <form action="{{ route('cancelarOrden', ['id' => $m_orden->id]) }}" method="POST">
                                                    @csrf
                                                    @method('PUT') <!-- Usa PATCH si solo deseas actualizar un recurso -->
                                                    <button type="submit" class="bg-gradient-to-r from-gray-500 to-gray-800 hover:from-gray-600 hover:to-gray-800 text-white px-4 py-2 rounded-lg mr-2 font-semibold font-sans">Cancelar</button>
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
                        <p class="mb-6 text-l text-center font-semibold font-sans text-dark uppercase dark:text-white mt-5 w-full">No tienes ordenes pendientes</p>
                    @endif
                        

                    <h2 class="mb-6 text-3xl text-center font-semibold font-sans text-dark uppercase dark:text-white mt-5 w-full">Talleres Solicitados</h2>

                    @if(!$mis_inscritos->isEmpty())
                    <table class="min-w-full bg-white shadow-1xl rounded-lg overflow-hidden font-sans">
                        <thead class="bg-green-900 text-white ">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-1xl">ID de Relación</th>
                                        <th class="px-6 py-3 text-left text-1xl">Proveedor</th>
                                        <th class="px-6 py-3 text-left text-1xl">Correo</th>
                                        <th class="px-6 py-3 text-left text-1xl">Nombre del Taller</th>
                                        <th class="px-6 py-3 text-left text-1xl">Descripción</th>
                                        <th class="px-6 py-3 text-left text-1xl">Costo</th>
                                        <th class="px-6 py-3 text-left text-1xl">Fecha de Publicación</th>
                                        <th class="px-6 py-3 text-left text-1xl">Acción</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-500 shadow-md">
                                    @foreach ($mis_inscritos as $ins)
                                    <tr>
                                        <td class="px-6 py-4 text-base font-semibold">{{ $ins->id }}</td>
                                        <td class="px-6 py-4 text-base font-semibold">{{ $ins->publicacion->usuario->nombre }}</td>
                                        <td class="px-6 py-4 text-base font-semibold">{{ $ins->publicacion->usuario->correo }}</td>
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
                                            <form action="{{ route('cancelarRelacion', ['id' => $ins->id]) }}" method="POST">
                                                @csrf
                                                @method('PUT') <!-- Usa PATCH si solo deseas actualizar un recurso -->
                                                <button type="submit" class="bg-gradient-to-r from-gray-500 to-gray-800 hover:from-gray-600 hover:to-gray-800 text-white px-4 py-2 rounded-lg mr-2 font-semibold font-sans">Cancelar</button>
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
                    <p class="mb-6 text-l text-center font-semibold font-sans text-dark uppercase dark:text-white mt-5 w-full">No tienes solicitudes de talleres pendientes</p>
                    @endif

                    <h2 class="mb-6 text-3xl text-center font-semibold font-sans text-dark uppercase dark:text-white mt-5 w-full">Servicios Solicitados</h2>

                    @if(!$mis_solicitudes->isEmpty())
                    <table class="min-w-full bg-white shadow-1xl rounded-lg overflow-hidden font-sans">
                        <thead class="bg-green-900 text-white ">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-1xl">ID solicitud</th>
                                        <th class="px-6 py-3 text-left text-1xl">Proveedor</th>
                                        <th class="px-6 py-3 text-left text-1xl">Correo</th>
                                        <th class="px-6 py-3 text-left text-1xl">Nombre del Servicio</th>
                                        <th class="px-6 py-3 text-left text-1xl">Notas</th>
                                        <th class="px-6 py-3 text-left text-1xl">Costo</th>
                                        <th class="px-6 py-3 text-left text-1xl">Fecha de Servicio</th>
                                        <th class="px-6 py-3 text-left text-1xl">Acción</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-500 shadow-md">
                                    @foreach ($mis_solicitudes as $sol)
                                    <tr>
                                        <td class="px-6 py-4 text-base font-semibold">{{ $sol->id }}</td>
                                        <td class="px-6 py-4 text-base font-semibold">{{ $sol->servicio->usuario->nombre }}</td>
                                        <td class="px-6 py-4 text-base font-semibold">{{ $sol->servicio->usuario->correo }}</td>
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
                                            <form action="{{ route('cancelarServicio', ['id' => $sol->id]) }}" method="POST">
                                                @csrf
                                                @method('PUT') <!-- Usa PATCH si solo deseas actualizar un recurso -->
                                                <button type="submit" class="bg-gradient-to-r from-gray-500 to-gray-800 hover:from-gray-600 hover:to-gray-800 text-white px-4 py-2 rounded-lg mr-2 font-semibold font-sans">Cancelar</button>
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
                    <p class="mb-6 text-l text-center font-semibold font-sans text-dark uppercase dark:text-white mt-5 w-full">No tienes solicitudes de talleres pendientes</p>
                    @endif