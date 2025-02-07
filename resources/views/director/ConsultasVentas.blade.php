<x-director.layout>

    <!-- ✅ Mensaje de Éxito -->
    @if (session('success'))
        <div class="alert alert-success">
            <p>{{ session('success') }}</p>
        </div>
    @endif

    <!-- ✅ Contenedor de la Tabla con Filtros y Búsqueda -->
    <div
        class="posiciontablas flex items-center justify-center bg-gray-900 p-2 mt-4 rounded-md border border-blue-500 shadow-md w-3/4 sm:w-1/2 lg:w-3/4 overflow-x-auto z-30">
        <div class="w-full max-w-full">

            <!-- 🧑‍💻 Filtros (listas y buscadores) -->
            <div class="filters flex gap-4 mb-4">
                <div class="filter-item w-1/3">
                    <!-- Filtro 1: Lista desplegable y buscador -->
                    <select id="columnSelect1" class="p-2 bg-gray-800 text-white rounded-md text-sm w-full">
                        <option value="Nombre">Nombre</option>
                        <option value="Clave">Clave</option>
                        <option value="FechaInicio">Fecha de Inicio</option>
                        <option value="FechaFin">Fecha de Fin</option>
                        <option value="Cantidad">Cantidad</option>
                        <option value="TipoTransaccion">Tipo de Transacción</option>
                        <option value="NombreConcepto">Concepto</option>
                        <option value="MetodoPago">Método de Pago</option>
                        <option value="created_at">Día que se realizó</option>
                        <option value="Monto">Monto</option>
                    </select>
                    <input type="search" id="searchInput1" placeholder="Buscar..."
                        class="p-2 bg-gray-800 text-white rounded-md text-sm mt-2 w-full">
                </div>

                <div class="filter-item w-1/3">
                    <!-- Filtro 2: Lista desplegable y buscador -->
                    <select id="columnSelect2" class="p-2 bg-gray-800 text-white rounded-md text-sm w-full">
                        <option value="Nombre">Nombre</option>
                        <option value="Clave">Clave</option>
                        <option value="FechaInicio">Fecha de Inicio</option>
                        <option value="FechaFin">Fecha de Fin</option>
                        <option value="Cantidad">Cantidad</option>
                        <option value="TipoTransaccion">Tipo de Transacción</option>
                        <option value="NombreConcepto">Concepto</option>
                        <option value="MetodoPago">Método de Pago</option>
                        <option value="created_at">Día que se realizó</option>
                        <option value="Monto">Monto</option>
                    </select>
                    <input type="search" id="searchInput2" placeholder="Buscar..."
                        class="p-2 bg-gray-800 text-white rounded-md text-sm mt-2 w-full">
                </div>

                <div class="filter-item w-1/3">
                    <!-- Filtro 3: Lista desplegable y buscador -->
                    <select id="columnSelect3" class="p-2 bg-gray-800 text-white rounded-md text-sm w-full">
                        <option value="Nombre">Nombre</option>
                        <option value="Clave">Clave</option>
                        <option value="FechaInicio">Fecha de Inicio</option>
                        <option value="FechaFin">Fecha de Fin</option>
                        <option value="Cantidad">Cantidad</option>
                        <option value="TipoTransaccion">Tipo de Transacción</option>
                        <option value="NombreConcepto">Concepto</option>
                        <option value="MetodoPago">Método de Pago</option>
                        <option value="created_at">Día que se realizó</option>
                        <option value="Monto">Monto</option>
                    </select>
                    <input type="search" id="searchInput3" placeholder="Buscar..."
                        class="p-2 bg-gray-800 text-white rounded-md text-sm mt-2 w-full">
                </div>
            </div>

            <!-- ✅ Tabla sin cambios en tamaño -->
            <table class="text-sm text-left text-white w-full table-auto z-30">
                <thead class="bg-blue-700">
                    <tr>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">No. Recivo
                        </th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Nombre</th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Clave</th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Fecha de
                            Inicio</th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Fecha de Fin
                        </th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Cantidad</th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Tipo de
                            Transacción</th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Concepto</th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Método de Pago
                        </th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Monto</th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Día que se
                            realizó</th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    @foreach ($Ventas as $Venta)
                        <tr class="hover:bg-gray-800 bg-transparent">
                            <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">
                                {{ $Venta->idTransaccion }}</td>
                            <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">
                                {{ $Venta->Nombre }} {{ $Venta->ApellidoPaterno }} {{ $Venta->ApellidoMaterno }}</td>
                            <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">
                                {{ $Venta->Clave }}</td>
                            <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">
                                {{ $Venta->FechaInicio }}</td>
                            <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">
                                {{ $Venta->FechaFin }}</td>
                            <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">
                                {{ $Venta->Cantidad }}</td>
                            <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">
                                {{ $Venta->TipoTransaccion }}</td>
                            <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">
                                {{ $Venta->NombreConcepto }}</td>
                            <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">
                                {{ $Venta->MetodoPago }}</td>
                            <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">
                                {{ $Venta->created_at }}</td>
                            <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">
                                {{ $Venta->Monto }}</td>
                            <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">
                                <button onclick="printReceipt({{ $Venta->Clave }})"
                                    class="px-4 py-2 bg-yellow-400 text-white rounded-md">Imprimir Recibo</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- ✅ Funcionalidad de Búsqueda en Tiempo Real -->
    <script>
        // Filtrar la tabla por los valores de los campos seleccionados
        function filterTable() {
            let rows = document.querySelectorAll("tbody tr");
            let filters = [{
                    column: document.getElementById("columnSelect1").value,
                    input: document.getElementById("searchInput1").value.toLowerCase()
                },
                {
                    column: document.getElementById("columnSelect2").value,
                    input: document.getElementById("searchInput2").value.toLowerCase()
                },
                {
                    column: document.getElementById("columnSelect3").value,
                    input: document.getElementById("searchInput3").value.toLowerCase()
                },
            ];

            rows.forEach(row => {
                let show = true;
                filters.forEach(filter => {
                    if (filter.input) {
                        let cell = row.querySelector(`.${filter.column.toLowerCase()}`);
                        if (cell && !cell.textContent.toLowerCase().includes(filter.input)) {
                            show = false;
                        }
                    }
                });
                row.style.display = show ? "" : "none";
            });
        }

        document.querySelectorAll("input[type='search'], select").forEach(element => {
            element.addEventListener("input", filterTable);
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

        // Función para imprimir el recibo
        function printReceipt(clave) {
            let row = document.querySelector(`tr[data-clave="${clave}"]`);
            let content = row.innerHTML; // Aquí puedes personalizar el contenido que se imprimirá
            let printWindow = window.open('', '', 'height=400,width=600');
            printWindow.document.write('<html><head><title>Recibo</title></head><body>');
            printWindow.document.write(content);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();
        }
    </script>

</x-director.layout>
