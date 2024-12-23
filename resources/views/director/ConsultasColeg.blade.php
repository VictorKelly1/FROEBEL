<x-director.layout>
    <div class="flex items-center justify-center bg-gray-900 p-2 posiciontablas borderAnimation">
        <div class="overflow-x-auto">
            <table class=" text-xs text-left text-white">
                <thead>
                    <tr class="bg-transparent">
                        <th class="px-2 py-1 border-b border-purple-500 animate-border">Nombre</th>
                        <th class="px-2 py-1 border-b border-purple-500 animate-border">Clave</th>
                        <th class="px-2 py-1 border-b border-purple-500 animate-border">Inicio de Periodo</th>
                        <th class="px-2 py-1 border-b border-purple-500 animate-border">Fin de Periodo</th>
                        <th class="px-2 py-1 border-b border-purple-500 animate-border">Metodo de Pago</th>
                        <th class="px-2 py-1 border-b border-purple-500 animate-border">Cuenta Recibido</th>
                        <th class="px-2 py-1 border-b border-purple-500 animate-border">Monto Total</th>
                        <th class="px-2 py-1 border-b border-purple-500 animate-border">Ver mas</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Colegiaturas as $Colegiatura)
                        <tr class="hover:bg-gray-800 bg-transparent">
                            <td class="px-2 py-1 border-t border-purple-500 animate-border">
                                {{ $Colegiatura->Nombre }}
                                {{ $Colegiatura->ApellidoPaterno }}
                                {{ $Colegiatura->ApellidoMaterno }}
                            </td>
                            <td class="px-2 py-1 border-t border-purple-500 animate-border">{{ $Colegiatura->Clave }}
                            </td>
                            <td class="px-2 py-1 border-t border-purple-500 animate-border">
                                {{ $Colegiatura->FechaInicio }}</td>
                            <td class="px-2 py-1 border-t border-purple-500 animate-border">{{ $Colegiatura->FechaFin }}
                            </td>
                            <td class="px-2 py-1 border-t border-purple-500 animate-border">
                                {{ $Colegiatura->MetodoPago }}
                            </td>
                            <td class="px-2 py-1 border-t border-purple-500 animate-border">
                                {{ $Colegiatura->CuentaRecibido }}</td>
                            <td class="px-2 py-1 border-t border-purple-500 animate-border">{{ $Colegiatura->Monto }}
                            </td>
                            <td class="px-4 py-2 border-t border-purple-500 animate-border text-center">
                                <form action="" method="GET">
                                    @csrf
                                    <button
                                        class="bg-orange-600 text-white px-4 py-3 rounded-lg transition-all duration-500 hover:bg-purple-600 hover:-translate-y-2 hover:shadow-2xl">Imprimir</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    {{ $Colegiaturas->links() }}
                </tbody>
            </table>
        </div>
    </div>







































</x-director.layout>
