<x-director.layout>
        <!-- ✅ Mensaje de Éxito -->
        @if (session('success'))
    <div class="alert alert-success">
        <p>{{ session('success') }}</p>
    </div>
@endif
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

                    </tr>
                </thead>
                <tbody>
                    @foreach ($Pagos as $pago)
                        <tr class="hover:bg-gray-800 bg-transparent">
                            <td class="px-2 py-1 border-t border-purple-500 animate-border">
                                {{ $pago->Nombre }}
                                {{ $pago->ApellidoPaterno }}
                                {{ $pago->ApellidoMaterno }}
                            </td>
                            <td class="px-2 py-1 border-t border-purple-500 animate-border">
                                {{ $pago->Clave }}
                            </td>
                            <td class="px-2 py-1 border-t border-purple-500 animate-border">
                                {{ $pago->FechaInicio }}</td>
                            <td class="px-2 py-1 border-t border-purple-500 animate-border">{{ $pago->FechaFin }}
                            </td>
                            <td class="px-2 py-1 border-t border-purple-500 animate-border">
                                {{ $pago->MetodoPago }}
                            </td>
                            <td class="px-2 py-1 border-t border-purple-500 animate-border">
                                {{ $pago->CuentaRecibido }}</td>
                            <td class="px-2 py-1 border-t border-purple-500 animate-border">{{ $pago->Monto }}
                            </td>

                        </tr>
                    @endforeach
                    {{ $Pagos->links() }}
                </tbody>
            </table>
        </div>


        <script>
        // Mostrar alerta
        document.querySelector('.alert').classList.add('show');

        // Después de 5 segundos, aplicar la clase de desvanecimiento y eliminarla
        setTimeout(() => {
            let alertElement = document.querySelector('.alert');
            alertElement.classList.add('fade-out');

            // Esperar el final de la animación para eliminar el elemento del DOM
            setTimeout(() => {
                alertElement.remove();
            }, 1000); // Aseguramos que la animación de desvanecimiento termine antes de eliminarla
        }, 5000); // 5 segundos de espera
    </script>










</x-director.layout>
