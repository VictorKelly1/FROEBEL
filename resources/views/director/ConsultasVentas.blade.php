<x-director.layout>

    <!-- ✅ Mensaje de Éxito -->
    @if (session('success'))
    <div class="alert alert-success">
        <p>{{ session('success') }}</p>
    </div>
    @endif

    <!-- ✅ Contenedor de la Tabla con Filtros y Búsqueda -->
    <div class="posiciontablas flex items-center justify-center bg-gray-900 p-2 mt-4 rounded-md border border-blue-500 shadow-md w-3/4 sm:w-1/2 lg:w-3/4 overflow-x-auto z-30">
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
                    <input type="search" id="searchInput1" placeholder="Buscar..." class="p-2 bg-gray-800 text-white rounded-md text-sm mt-2 w-full">
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
                    <input type="search" id="searchInput2" placeholder="Buscar..." class="p-2 bg-gray-800 text-white rounded-md text-sm mt-2 w-full">
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
                    <input type="search" id="searchInput3" placeholder="Buscar..." class="p-2 bg-gray-800 text-white rounded-md text-sm mt-2 w-full">
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
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">No Transaccion</th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Nombre</th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Clave</th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Fecha de Inicio</th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Fecha de Fin</th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Cantidad</th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Tipo de Transacción</th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Concepto</th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Método de Pago</th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Monto</th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Día que se realizó</th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    @foreach ($Ventas as $Venta)
                    <tr class="hover:bg-gray-800 bg-transparent">
                        <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">{{ $Venta->idTransaccion }}</td>
                        <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">{{ $Venta->Nombre }} {{ $Venta->ApellidoPaterno }} {{ $Venta->ApellidoMaterno }}</td>
                        <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">{{ $Venta->Clave }}</td>
                        <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">{{ $Venta->FechaInicio }}</td>
                        <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">{{ $Venta->FechaFin }}</td>
                        <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">{{ $Venta->Cantidad }}</td>
                        <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">{{ $Venta->TipoTransaccion }}</td>
                        <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">{{ $Venta->NombreConcepto }}</td>
                        <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">{{ $Venta->MetodoPago }}</td>
                        <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">{{ $Venta->created_at }}</td>
                        <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">{{ $Venta->Monto }}</td>
                        <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">
                            <button onclick="printReceipt({{ $Venta->Clave }})" class="px-4 py-2 bg-yellow-400 text-white rounded-md">Imprimir Recibo</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- ✅ Funcionalidad de Búsqueda en Tiempo Real -->
    <script>
        // Función de filtrado
        function filterTable() {
            let rows = document.querySelectorAll("tbody tr");
            let filters = [
                { column: document.getElementById("columnSelect1").value, input: document.getElementById("searchInput1").value.toLowerCase() },
                { column: document.getElementById("columnSelect2").value, input: document.getElementById("searchInput2").value.toLowerCase() },
                { column: document.getElementById("columnSelect3").value, input: document.getElementById("searchInput3").value.toLowerCase() },
            ];

            let totalAmount = 0; // Variable para acumular el monto total

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

        // Función para imprimir recibo
        function printRecibo(pago) {
            const reciboHTML = `
                <html>
                    <head>
                        <title>Recibo de Pago</title>
                        <style>
                            body { font-family: Arial, sans-serif; padding: 20px; }
                            .recibo { width: 100%; max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ccc; }
                            .recibo h1 { text-align: center; }
                            .recibo table { width: 100%; margin-top: 20px; border-collapse: collapse; }
                            .recibo table th, .recibo table td { padding: 8px 12px; border: 1px solid #ccc; text-align: left; }
                            .recibo table th { background-color: #f2f2f2; }
                        </style>
                    </head>
                    <body>
                        <div class="recibo">
                            <h1>Recibo de Pago</h1>
                            <table>
                                <tr><th>Nombre</th><td>${pago.Nombre} ${pago.ApellidoPaterno} ${pago.ApellidoMaterno}</td></tr>
                                <tr><th>Clave</th><td>${pago.Clave}</td></tr>
                                <tr><th>Inicio de Periodo</th><td>${pago.FechaInicio}</td></tr>
                                <tr><th>Fin de Periodo</th><td>${pago.FechaFin}</td></tr>
                                <tr><th>Método de Pago</th><td>${pago.MetodoPago}</td></tr>
                                <tr><th>Cuenta Recibido</th><td>${pago.CuentaRecibido}</td></tr>
                                <tr><th>Monto Total</th><td>${pago.Monto}</td></tr>
                            </table>
                        </div>
                    </body>
                </html>
            `;

            const ventanaImpresion = window.open('', '_blank');
            ventanaImpresion.document.write(reciboHTML);
            ventanaImpresion.document.close();
            ventanaImpresion.print();
        }
    </script>

</x-director.layout>
