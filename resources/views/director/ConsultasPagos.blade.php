<x-director.layout>
    <!-- ✅ Mensaje de Éxito -->
    @if (session('success'))
    <div class="alert alert-success">
        <p>{{ session('success') }}</p>
    </div>
    @endif

    <!-- ✅ Contenedor de la Tabla con Búsqueda -->
    <div class="posiciontablas flex items-center justify-center bg-gray-900 p-4 mt-4 rounded-md border border-blue-500 shadow-md w-full sm:w-3/4 lg:w-3/4 overflow-x-auto z-30">
        <div class="w-full max-w-full">

            <!-- ✅ Filtros -->
            <div class="filters mb-4 flex gap-4 w-full">
                <div class="filter-item w-1/3">
                    <!-- Filtro 1 -->
                    <select id="columnSelect1" class="p-2 bg-gray-800 text-white rounded-md text-sm w-full">
                        <option value="Nombre">Nombre</option>
                        <option value="Clave">Clave</option>
                        <option value="FechaInicio">Inicio de Periodo</option>
                        <option value="FechaFin">Fin de Periodo</option>
                        <option value="MetodoPago">Método de Pago</option>
                        <option value="CuentaRecibido">Cuenta Recibido</option>
                        <option value="Monto">Monto Total</option>
                    </select>
                    <input type="search" id="searchInput1" placeholder="Buscar..." class="p-2 bg-gray-800 text-white rounded-md text-sm mt-2 w-full">
                </div>

                <div class="filter-item w-1/3">
                    <!-- Filtro 2 -->
                    <select id="columnSelect2" class="p-2 bg-gray-800 text-white rounded-md text-sm w-full">
                        <option value="Nombre">Nombre</option>
                        <option value="Clave">Clave</option>
                        <option value="FechaInicio">Inicio de Periodo</option>
                        <option value="FechaFin">Fin de Periodo</option>
                        <option value="MetodoPago">Método de Pago</option>
                        <option value="CuentaRecibido">Cuenta Recibido</option>
                        <option value="Monto">Monto Total</option>
                    </select>
                    <input type="search" id="searchInput2" placeholder="Buscar..." class="p-2 bg-gray-800 text-white rounded-md text-sm mt-2 w-full">
                </div>

                <div class="filter-item w-1/3">
                    <!-- Filtro 3 -->
                    <select id="columnSelect3" class="p-2 bg-gray-800 text-white rounded-md text-sm w-full">
                        <option value="Nombre">Nombre</option>
                        <option value="Clave">Clave</option>
                        <option value="FechaInicio">Inicio de Periodo</option>
                        <option value="FechaFin">Fin de Periodo</option>
                        <option value="MetodoPago">Método de Pago</option>
                        <option value="CuentaRecibido">Cuenta Recibido</option>
                        <option value="Monto">Monto Total</option>
                    </select>
                    <input type="search" id="searchInput3" placeholder="Buscar..." class="p-2 bg-gray-800 text-white rounded-md text-sm mt-2 w-full">
                </div>
            </div>

            <!-- ✅ Tabla -->
            <table class="text-sm text-left text-white w-full table-auto z-30">
                <thead class="bg-blue-700">
                    <tr>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Nombre</th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Clave</th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Inicio de Periodo</th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Fin de Periodo</th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Método de Pago</th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Cuenta Recibido</th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Monto Total</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    @foreach ($Pagos as $pago)
                    <tr class="hover:bg-gray-800 bg-transparent">
                        <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">{{ $pago->Nombre }} {{ $pago->ApellidoPaterno }} {{ $pago->ApellidoMaterno }}</td>
                        <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">{{ $pago->Clave }}</td>
                        <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">{{ $pago->FechaInicio }}</td>
                        <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">{{ $pago->FechaFin }}</td>
                        <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">{{ $pago->MetodoPago }}</td>
                        <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">{{ $pago->CuentaRecibido }}</td>
                        <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">{{ $pago->Monto }}</td>
                    </tr>
                    @endforeach
                    {{ $Pagos->links() }}
                </tbody>
            </table>
        </div>
    </div>

    <script>
        // Función de filtrado
        function filterTable() {
            let rows = document.querySelectorAll("tbody tr");
            let filters = [
                { column: document.getElementById("columnSelect1").value, input: document.getElementById("searchInput1").value.toLowerCase() },
                { column: document.getElementById("columnSelect2").value, input: document.getElementById("searchInput2").value.toLowerCase() },
                { column: document.getElementById("columnSelect3").value, input: document.getElementById("searchInput3").value.toLowerCase() },
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

</x-director.layout>
