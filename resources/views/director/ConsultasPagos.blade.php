<x-director.layout>
        <!-- ✅ Mensaje de Éxito -->
        @if (session('success'))
    <div class="alert alert-success">
        <p>{{ session('success') }}</p>
    </div>
@endif
    <!-- ✅ Contenedor de la Tabla con Búsqueda -->
    <div
        class="posiciontablas flex items-center justify-center bg-gray-900 p-2 mt-4 rounded-md border border-blue-500 shadow-md w-3/4 sm:w-1/2 lg:w-3/4 overflow-x-auto z-30">
        <div class="w-full max-w-full">


            <!-- ✅ Tabla sin cambios en tamaño -->
            <table class="text-sm text-left text-white w-full table-auto z-30">
                <thead class="bg-blue-700">
                    <tr>
                    <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Nombre</th>
                    <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Clave</th>
                    <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Inicio de Periodo</th>
                    <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Fin de Periodo</th>
                    <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Metodo de Pago</th>
                    <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Cuenta Recibido</th>
                    <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Monto Total</th>

                    </tr>
                </thead>
                <tbody id="tableBody">
                    @foreach ($Pagos as $pago)
                    <tr class="hover:bg-gray-800 bg-transparent">
                    <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">
                                {{ $pago->Nombre }}
                                {{ $pago->ApellidoPaterno }}
                                {{ $pago->ApellidoMaterno }}
                            </td>
                            <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">
                                {{ $pago->Clave }}
                            </td>
                            <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">
                                {{ $pago->FechaInicio }}</td>
                                <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">{{ $pago->FechaFin }}
                            </td>
                            <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">
                                {{ $pago->MetodoPago }}
                            </td>
                            <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">
                                {{ $pago->CuentaRecibido }}</td>
                                <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">{{ $pago->Monto }}
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
