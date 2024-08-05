<h2 class="text-green-900 font-sans font-black text-4xl pt-4 pb-4 flex justify-center">Historial de Órdenes</h2>
                @if(!$mis_ordenes_con->isEmpty())
                    <table class="min-w-full bg-white shadow-1xl rounded-lg overflow-hidden font-sans">
                        <thead class="bg-green-900 text-white ">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-1xl">Proveedor</th>
                                        <th class="px-6 py-3 text-left text-1xl">Correo</th>
                                        <th class="px-6 py-3 text-left text-1xl">Producto</th>
                                        <th class="px-6 py-3 text-left text-1xl">Descripción</th>
                                        <th class="px-6 py-3 text-left text-1xl">Costo</th>
                                        <th class="px-6 py-3 text-left text-1xl">Cantidad</th>
                                        <th class="px-6 py-3 text-left text-1xl">Total</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-500 shadow-md">
                                @foreach ($mis_ordenes_con as $m_orden)
                                    <tr>
                                        <td class="px-6 py-4 text-base font-semiblack">{{ $m_orden->producto->proveedor->nombre }}</td>
                                        <td class="px-6 py-4 text-base font-semibold">{{ $m_orden->producto->proveedor->correo }}</td>
                                        <td class="px-6 py-4 text-base font-semibold">{{ $m_orden->producto->nombre }}</td>
                                        <td class="px-6 py-4 text-base font-semibold">{{ $m_orden->producto->descripcion }}</td>
                                        <td class="px-6 py-4 text-base font-semibold">{{ $m_orden->producto->costo }}</td>
                                        <td class="px-6 py-4 text-base font-semibold">{{ $m_orden->cantidad }}</td>
                                        <td class="px-6 py-4 text-base font-semibold">{{ $m_orden->subtotal }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                    </table>
                    @else
                        <p class="mb-6 text-2xl text-center font-light font-sans text-black  dark:text-white mt-5 w-full">No tienes órdenes concluidas</p>
                    @endif
                        

                    <h2 class="text-green-900 font-sans font-black text-4xl pt-4 pb-4 flex justify-center">Historial de Talleres</h2>

                    @if(!$mis_inscritos_con->isEmpty())
                    <table class="min-w-full bg-white shadow-1xl rounded-lg overflow-hidden font-sans">
                        <thead class="bg-green-900 text-white ">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-1xl">Tallerista</th>
                                        <th class="px-6 py-3 text-left text-1xl">Correo</th>
                                        <th class="px-6 py-3 text-left text-1xl">Taller</th>
                                        <th class="px-6 py-3 text-left text-1xl">Descripción</th>
                                        <th class="px-6 py-3 text-left text-1xl">Costo</th>
                                        <th class="px-6 py-3 text-left text-1xl">Fecha de Registro</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-500 shadow-md">
                                    @foreach ($mis_inscritos_con as $ins)
                                    <tr>
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
                                    </tr>
                                @endforeach
                                </tbody>
                    </table>
                    @else
                    <p class="mb-6 text-2xl text-center font-light font-sans text-black  dark:text-white mt-5 w-full">No tienes talleres concluidos</p>
                    @endif

                    <h2 class="text-green-900 font-sans font-black text-4xl pt-4 pb-4 flex justify-center">Historial de Servicios</h2>

                    @if(!$mis_solicitudes_con->isEmpty())
                    <table class="min-w-full bg-white shadow-1xl rounded-lg overflow-hidden font-sans">
                        <thead class="bg-green-900 text-white ">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-1xl">Proveedor</th>
                                        <th class="px-6 py-3 text-left text-1xl">Correo</th>
                                        <th class="px-6 py-3 text-left text-1xl">Servicio</th>
                                        <th class="px-6 py-3 text-left text-1xl">Instrucciones</th>
                                        <th class="px-6 py-3 text-left text-1xl">Costo</th>
                                        <th class="px-6 py-3 text-left text-1xl">Fecha de Servicio</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-500 shadow-md">
                                    @foreach ($mis_solicitudes_con as $sol)
                                    <tr>
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
                                    </tr>
                                @endforeach
                                </tbody>
                    </table>
                    @else
                    <p class="mb-6 text-2xl text-center font-light font-sans text-black  dark:text-white mt-5 w-full">No tienes servicios concluidos</p>
                    @endif