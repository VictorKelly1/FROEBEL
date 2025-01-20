<x-director.layout>
       <!-- ✅ Mensaje de Éxito -->
       @if (session('success'))
    <div class="alert alert-success">
        <p>{{ session('success') }}</p>
    </div>
@endif

    <div class=" flex items-center posicionregisdesc">


        <form class="formulario1x1" action="{{ route('RegistrarDescuento') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Datos de Persona -->

            <div class="form-group">
                <label for="Nombre">Nombre:</label>
                <input type="text" name="Nombre" id="Nombre" class="form-control" required>
            </div>

            <div class="form-group">
            <label for="Para">Para:</label>
                <select name="Para" id="Para" class="form-control" required>
                    <option value="">Seleccione</option>
                    <option value="Ventas">Ventas </option>
                    <option value="Pagos">Pagos/Ingresos</option>
                </select>
            </div>

            <div class="form-group">
                <label for="Tipo">Tipo:</label>
                <select name="Tipo" id="Tipo" class="form-control" required>
                    <option value="">Seleccione</option>
                    <option value="Fijo">Fijo</option>
                    <option value="Porcentual">Porcentual</option>
                </select>
            </div>


            <div class="form-group">
                <label for="Monto">Monto:</label>
                <input type="number" min="0" name="Monto" id="Monto" class="form-control" required>
            </div>

            <!-- Botón de envío -->
            <button type="submit" class="btn btn-primary">Registrar Descuento</button>
        </form>
    </div>
    <div
        class="posiciontablaregisdesc flex items-center justify-center bg-gray-900 p-6 mt-6 rounded-md border border-blue-500 shadow-md w-3/4 sm:w-2/3 lg:w-1/2 overflow-x-auto">
        <table class="w-full table-auto text-lg text-white border-collapse border border-blue-500 rounded-md">
            <thead class="bg-blue-700 text-center">
                <tr>
                    <th class="px-4 py-2 border-b border-blue-500">Nombre</th>
                    <th class="px-4 py-2 border-b border-blue-500">Para</th>
                    <th class="px-4 py-2 border-b border-blue-500">Tipo</th>
                    <th class="px-4 py-2 border-b border-blue-500">Monto</th>
                    <th class="px-4 py-2 border-b border-blue-500">Edicion</th>
                </tr>
            </thead>
            <tbody id="tableBody">
                @foreach ($Descuentos as $Descuento)
                    <tr class="hover:bg-gray-800 text-center">
                        <td class="px-4 py-2 border-t border-blue-500">
                            {{ $Descuento->Nombre }}
                        </td>
                        <td class="px-4 py-2 border-t border-blue-500">
                            {{ $Descuento->Para }}
                        </td>
                        <td class="px-4 py-2 border-t border-blue-500">
                            {{ $Descuento->Tipo }}
                        </td>
                        <td class="px-4 py-2 border-t border-blue-500">
                            {{ $Descuento->Monto }}
                        </td>
                        <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">
                            <form action="/VistaEditarDescuento/{{ $Descuento->idDescuento }}" method="GET">
                                <button
                                    class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-blue-600">Editar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
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
