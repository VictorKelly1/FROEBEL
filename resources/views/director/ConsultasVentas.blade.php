<x-director.layout>

    <!-- ✅ Mensaje de Éxito -->
    @if (session('success'))
        <div class="alert alert-success">
            <p>{{ session('success') }}</p>
        </div>
    @endif

    <!-- 🧑‍💻 Campo de Búsqueda -->
    <div class="relative mb-4">
        <div class="posiciontablaalumno absolute top-0 right-0 p-2">
            <input type="search" id="searchInput" placeholder="Buscar Alumno..." class="buscador-input"
                style="width: 1110px; height: 10%; padding: 18px; background-color: #2d2d2d; color: white; border-radius: 5px;">
        </div>
    </div>
    <!-- ✅ Contenedor de la Tabla con Búsqueda -->
    <div
        class="posiciontablas flex items-center justify-center bg-gray-900 p-2 mt-4 rounded-md border border-blue-500 shadow-md w-3/4 sm:w-1/2 lg:w-3/4 overflow-x-auto z-30">
        <div class="w-full max-w-full">


            <!-- ✅ Tabla sin cambios en tamaño -->
            <table class="text-sm text-left text-white w-full table-auto z-30">
                <thead class="bg-blue-700">
                    <tr>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">
                        Nombre</th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">
                         Clave
                        </th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">
                        Fecha de Inicio</th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">
                        Fecha de Fin</th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">
                         Cantidad
                        </th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">
                        Tipo de Transaccion</th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">
                        Concepto</th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">
                        Metodo de Pago</th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">
                        Monto</th>

                    </tr>
                </thead>
                <tbody id="tableBody">
                    @foreach ($Ventas as $Venta)
                        <tr class="hover:bg-gray-800 bg-transparent">
  
                            <!-- Matrícula -->
                            <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">{{ $Venta->Nombre }}{{ $Venta->ApellidoPaterno }} {{ $Venta->ApellidoMaterno }}</td>
                            <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">{{ $Venta->Clave }} 
                            <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">{{ $Venta->FechaInicio }}</td>
                            <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">{{ $Venta->FechaFin }}</td>
                            <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">{{ $Venta->Cantidad }}</td>
                            <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">{{ $Venta->TipoTransaccion }}</td>
                            <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">{{ $Venta->NombreConcepto }}</td>
                            <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">{{ $Venta->MetodoPago }}</td>
                            <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">{{ $Venta->Monto }}</td>
                        </tr>
                   @endforeach

                </tbody>
            </table>
        </div>
    </div>

    <!-- ✅ Funcionalidad de Búsqueda en Tiempo Real -->
    <script>
        document.getElementById("searchInput").addEventListener("input", function() {
            var filter = this.value.toLowerCase();
            var rows = document.getElementById("tableBody").getElementsByTagName("tr");

            Array.from(rows).forEach(function(row) {
                var text = row.textContent.toLowerCase();
                if (text.includes(filter)) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
        });
    </script>

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
