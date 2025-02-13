<x-director.layout>
    <!-- ✅ Mensaje de Éxito -->
    @if (session('success'))
        <div class="alert alert-success">
            <p>{{ session('success') }}</p>
        </div>
    @endif

    <!-- ✅ Contenedor de la Tabla con Búsqueda y Filtros -->
    <div
        class="posiciontablas flex items-center justify-center bg-gray-900 p-2 mt-4 rounded-md border border-blue-500 shadow-md w-3/4 sm:w-1/2 lg:w-3/4 overflow-x-auto z-30">
        <div class="w-full max-w-full">
            <!-- 🧑‍💻 Filtros (listas y buscadores) -->
            <div class="filters flex gap-4 mb-4">
                <div class="filter-item w-1/3">
                    <!-- Filtro 1: Lista desplegable y buscador -->
                    <select id="columnSelect1" class="p-2 bg-gray-800 text-white rounded-md text-sm w-full">
                        <option value="nombre">Nombre</option>
                        <option value="clave">Clave</option>
                        <option value="fechainicio">Fecha de Inicio</option>
                        <option value="fechafin">Fecha de Fin</option>
                        <option value="cantidad">Cantidad</option>
                        <option value="tipotransaccion">Tipo de Transacción</option>
                        <option value="nombreconcepto">Concepto</option>
                        <option value="metodopago">Método de Pago</option>
                        <option value="created_at">Día que se realizó</option>
                        <option value="monto">Monto</option>
                    </select>
                    <input type="search" id="searchInput1" placeholder="Buscar..."
                        class="p-2 bg-gray-800 text-white rounded-md text-sm mt-2 w-full">
                </div>

                <div class="filter-item w-1/3">
                    <!-- Filtro 2: Lista desplegable y buscador -->
                    <select id="columnSelect2" class="p-2 bg-gray-800 text-white rounded-md text-sm w-full">
                        <option value="nombre">Nombre</option>
                        <option value="clave">Clave</option>
                        <option value="fechainicio">Fecha de Inicio</option>
                        <option value="fechafin">Fecha de Fin</option>
                        <option value="cantidad">Cantidad</option>
                        <option value="tipotransaccion">Tipo de Transacción</option>
                        <option value="nombreconcepto">Concepto</option>
                        <option value="metodopago">Método de Pago</option>
                        <option value="created_at">Día que se realizó</option>
                        <option value="monto">Monto</option>
                    </select>
                    <input type="search" id="searchInput2" placeholder="Buscar..."
                        class="p-2 bg-gray-800 text-white rounded-md text-sm mt-2 w-full">
                </div>

                <div class="filter-item w-1/3">
                    <!-- Filtro 3: Lista desplegable y buscador -->
                    <select id="columnSelect3" class="p-2 bg-gray-800 text-white rounded-md text-sm w-full">
                        <option value="nombre">Nombre</option>
                        <option value="clave">Clave</option>
                        <option value="fechainicio">Fecha de Inicio</option>
                        <option value="fechafin">Fecha de Fin</option>
                        <option value="cantidad">Cantidad</option>
                        <option value="tipotransaccion">Tipo de Transacción</option>
                        <option value="nombreconcepto">Concepto</option>
                        <option value="metodopago">Método de Pago</option>
                        <option value="created_at">Día que se realizó</option>
                        <option value="monto">Monto</option>
                    </select>
                    <input type="search" id="searchInput3" placeholder="Buscar..."
                        class="p-2 bg-gray-800 text-white rounded-md text-sm mt-2 w-full">
                </div>
            </div>

            <!-- ✅ Label para mostrar el monto total filtrado -->
            <div class="mt-4">
                <label class="text-white">Monto Total Filtrado: </label>
                <span id="totalAmount" class="text-white font-bold">$0.00</span>
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
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Dia que se
                            Realizo</th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Monto</th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    @foreach ($Compras as $Compra)
                        <tr class="hover:bg-gray-800 bg-transparent">
                            <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">
                                {{ $Compra->idTransaccion }}</td>
                            <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">
                                {{ $Compra->Nombre }} {{ $Compra->ApellidoPaterno }} {{ $Compra->ApellidoMaterno }}</td>
                            <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">
                                {{ $Compra->Clave }}</td>
                            <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">
                                {{ $Compra->FechaInicio }}</td>
                            <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">
                                {{ $Compra->FechaFin }}</td>
                            <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">
                                {{ $Compra->Cantidad }}</td>
                            <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">
                                {{ $Compra->TipoTransaccion }}</td>
                            <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">
                                {{ $Compra->NombreConcepto }}</td>
                            <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">
                                {{ $Compra->MetodoPago }}</td>
                            <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">
                                {{ $Compra->created_at }}</td>
                            <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">
                                {{ $Compra->Monto }}</td>
                            <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">
                                <button onclick="imprimirRecibo({{ $Compra->id }})"
                                    class="bg-blue-500 text-white px-4 py-2 rounded-md">Imprimir Recibo</button>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-800 bg-transparent">
                            <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">
                                {{ $Compra->idTransaccion }}</td>
                            <td class="px-4 py-2 border-t border-blue-500 animate-border text-center nombre">
                                {{ $Compra->Nombre }} {{ $Compra->ApellidoPaterno }} {{ $Compra->ApellidoMaterno }}
                            </td>
                            <td class="px-4 py-2 border-t border-blue-500 animate-border text-center clave">
                                {{ $Compra->Clave }}</td>
                            <td class="px-4 py-2 border-t border-blue-500 animate-border text-center fechainicio">
                                {{ $Compra->FechaInicio }}</td>
                            <td class="px-4 py-2 border-t border-blue-500 animate-border text-center fechafin">
                                {{ $Compra->FechaFin }}</td>
                            <td class="px-4 py-2 border-t border-blue-500 animate-border text-center cantidad">
                                {{ $Compra->Cantidad }}</td>
                            <td class="px-4 py-2 border-t border-blue-500 animate-border text-center tipotransaccion">
                                {{ $Compra->TipoTransaccion }}</td>
                            <td class="px-4 py-2 border-t border-blue-500 animate-border text-center nombreconcepto">
                                {{ $Compra->NombreConcepto }}</td>
                            <td class="px-4 py-2 border-t border-blue-500 animate-border text-center metodopago">
                                {{ $Compra->MetodoPago }}</td>
                            <td class="px-4 py-2 border-t border-blue-500 animate-border text-center created_at">
                                {{ $Compra->created_at }}</td>
                            <td class="px-4 py-2 border-t border-blue-500 animate-border text-center monto">
                                {{ $Compra->Monto }}</td>
                            <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">
                                <button onclick="imprimirRecibo({{ $Compra->id }})"
                                    class="bg-blue-500 text-white px-4 py-2 rounded-md">Imprimir Recibo</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- ✅ Funcionalidad de Búsqueda en Tiempo Real -->
    <script>
        // Filtrado de la tabla
        function filterTable() {
            let rows = document.querySelectorAll("tbody tr"); <<
            <<
            << < HEAD
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
                }, ===
                ===
                =
                let filters = [{
                        column: document.getElementById("columnSelect1").value.toLowerCase(),
                        input: document.getElementById("searchInput1").value.toLowerCase()
                    },
                    {
                        column: document.getElementById("columnSelect2").value.toLowerCase(),
                        input: document.getElementById("searchInput2").value.toLowerCase()
                    },
                    {
                        column: document.getElementById("columnSelect3").value.toLowerCase(),
                        input: document.getElementById("searchInput3").value.toLowerCase()
                    } >>>
                    >>>
                    > b1607a490be5b4457b16946d56704392eb231b58
                ];

                let totalAmount = 0; // Variable para acumular el monto total

                rows.forEach(row => {
                    let show = true;
                    filters.forEach(filter => {
                        if (filter.input) {
                            let cell = row.querySelector(`.${filter.column}`);
                            if (cell && !cell.textContent.toLowerCase().includes(filter.input)) {
                                show = false;
                            }
                        }
                    });
                    row.style.display = show ? "" : "none";

                    // Sumar el monto si la fila es visible
                    if (show) {
                        let montoCell = row.querySelector(".monto");
                        if (montoCell) {
                            totalAmount += parseFloat(montoCell.textContent) || 0;
                        }
                    }
                });

                // Actualizar el monto total en el label
                document.getElementById("totalAmount").textContent = `$${totalAmount.toFixed(2)}`;
            }

            document.querySelectorAll("input[type='search'], select").forEach(element => {
                element.addEventListener("input", filterTable);
            });

            // Función para imprimir el recibo
            function imprimirRecibo(id) {
                const row = document.querySelector(`tr[data-id='${id}']`);
                const data = row.innerText;
                const windowContent = `
                <html>
                    <head>
                        <title>Recibo de Pago</title>
                        <style>
                            body { font-family: Arial, sans-serif; margin: 20px; }
                            .recibo { border: 1px solid #000; padding: 20px; }
                        </style>
                    </head>
                    <body>
                        <div class="recibo">
                            <h2>Recibo de Pago</h2>
                            <pre>${data}</pre>
                        </div>
                    </body>
                </html>
            `;
                const printWindow = window.open('', '', 'height=500,width=800');
                printWindow.document.write(windowContent);
                printWindow.document.close();
                printWindow.print();
            }
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
