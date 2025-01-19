<x-director.layout>
    @if (session('success'))
    <div class="alert alert-success">
        <p>{{ session('success') }}</p>
    </div>
    @endif

    <div class="posiciontablasmedia table-container bg-gray-900 p-4 mt-4 rounded-md border border-blue-500 shadow-md md:w-3/4 lg:w-2/3 overflow-x-auto">
        <!-- Contenedor de filtros -->
        <div class="filters flex flex-col md:flex-row items-center justify-start gap-4 mb-4">
            <div class="flex flex-col">
                <select id="columnSelect1" class="p-1 bg-gray-800 text-white rounded-md text-sm">
                    <option value="nombre">Nombre</option>
                    <option value="clave">Clave</option>
                    <option value="fechainicio">Inicio de Periodo</option>
                    <option value="fechafin">Fin de Periodo</option>
                    <option value="metodopago">Método de Pago</option>
                    <option value="cuentarecibido">Cuenta Recibido</option>
                    <option value="monto">Monto Total</option>
                    <option value="created_at">Día que se realizó</option>
                </select>
                <input type="search" id="searchInput1" placeholder="Buscar..."
                    class="p-2 bg-gray-800 text-white rounded-md text-sm mt-2" style="width: 200px;">
            </div>
            <div class="flex flex-col">
                <select id="columnSelect2" class="p-1 bg-gray-800 text-white rounded-md text-sm">
                    <option value="nombre">Nombre</option>
                    <option value="clave">Clave</option>
                    <option value="fechainicio">Inicio de Periodo</option>
                    <option value="fechafin">Fin de Periodo</option>
                    <option value="metodopago">Método de Pago</option>
                    <option value="cuentarecibido">Cuenta Recibido</option>
                    <option value="monto">Monto Total</option>
                    <option value="created_at">Día que se realizó</option>
                </select>
                <input type="search" id="searchInput2" placeholder="Buscar..."
                    class="p-2 bg-gray-800 text-white rounded-md text-sm mt-2" style="width: 200px;">
            </div>
            <div class="flex flex-col">
                <select id="columnSelect3" class="p-1 bg-gray-800 text-white rounded-md text-sm">
                    <option value="nombre">Nombre</option>
                    <option value="clave">Clave</option>
                    <option value="fechainicio">Inicio de Periodo</option>
                    <option value="fechafin">Fin de Periodo</option>
                    <option value="metodopago">Método de Pago</option>
                    <option value="cuentarecibido">Cuenta Recibido</option>
                    <option value="monto">Monto Total</option>
                    <option value="created_at">Día que se realizó</option>
                </select>
                <input type="search" id="searchInput3" placeholder="Buscar..."
                    class="p-2 bg-gray-800 text-white rounded-md text-sm mt-2" style="width: 200px;">
            </div>
        </div>

        <!-- Tabla -->
        <table class="text-sm text-white border-collapse border border-blue-500 rounded-md w-full">
            <thead class="bg-blue-700 text-center">
                <tr>
                    <th class="px-3 py-2 border-b border-blue-500">Nombre</th>
                    <th class="px-3 py-2 border-b border-blue-500">Clave</th>
                    <th class="px-3 py-2 border-b border-blue-500">Inicio de Periodo</th>
                    <th class="px-3 py-2 border-b border-blue-500">Fin de Periodo</th>
                    <th class="px-3 py-2 border-b border-blue-500">Método de Pago</th>
                    <th class="px-3 py-2 border-b border-blue-500">Cuenta Recibido</th>
                    <th class="px-3 py-2 border-b border-blue-500">Monto Total</th>
                    <th class="px-3 py-2 border-b border-blue-500">Día que se realizó</th>
                    <th class="px-3 py-2 border-b border-blue-500">Acciones</th> <!-- Columna para el botón -->
                </tr>
            </thead>
            <tbody>
                @foreach ($Colegiaturas as $Colegiatura)
                <tr class="hover:bg-gray-800 text-center">
                    <td class="nombre">{{ $Colegiatura->Nombre }} {{ $Colegiatura->ApellidoPaterno }} {{ $Colegiatura->ApellidoMaterno }}</td>
                    <td class="clave">{{ $Colegiatura->Clave }}</td>
                    <td class="fechainicio">{{ $Colegiatura->FechaInicio }}</td>
                    <td class="fechafin">{{ $Colegiatura->FechaFin }}</td>
                    <td class="metodopago">{{ $Colegiatura->MetodoPago }}</td>
                    <td class="cuentarecibido">{{ $Colegiatura->CuentaRecibido }}</td>
                    <td class="monto">{{ $Colegiatura->Monto }}</td>
                    <td class="created_at">{{ $Colegiatura->created_at }}</td>
                    <td>
                        <!-- Botón de "Imprimir Recibo" -->
                        <button onclick="printReceipt('{{ $Colegiatura->Nombre }}', '{{ $Colegiatura->ApellidoPaterno }}', '{{ $Colegiatura->ApellidoMaterno }}', '{{ $Colegiatura->Clave }}', '{{ $Colegiatura->FechaInicio }}', '{{ $Colegiatura->FechaFin }}', '{{ $Colegiatura->MetodoPago }}', '{{ $Colegiatura->CuentaRecibido }}', '{{ $Colegiatura->Monto }}', '{{ $Colegiatura->created_at }}')" class="px-4 py-2 bg-yellow-400 text-white rounded-md hover:bg-green-600">
                            Imprimir Recibo
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        // Filtrado de la tabla
        function filterTable() {
            let rows = document.querySelectorAll("tbody tr");
            let filters = [
                { column: document.getElementById("columnSelect1").value, input: document.getElementById("searchInput1").value.toLowerCase() },
                { column: document.getElementById("columnSelect2").value, input: document.getElementById("searchInput2").value.toLowerCase() },
                { column: document.getElementById("columnSelect3").value, input: document.getElementById("searchInput3").value.toLowerCase() }
            ];

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
            });
        }

        document.querySelectorAll("input[type='search'], select").forEach(element => {
            element.addEventListener("input", filterTable);
        });

        // Función para imprimir el recibo de cada línea
        function printReceipt(nombre, apellidoPaterno, apellidoMaterno, clave, fechaInicio, fechaFin, metodoPago, cuentaRecibido, monto, createdAt) {
            const receiptContent = `
                <div style="font-family: Arial, sans-serif; width: 100%; padding: 20px;">
                    <h2 style="text-align: center; color:rgb(253, 227, 0);">Recibo de Pago</h2>
                    <p><strong>Nombre:</strong> ${nombre} ${apellidoPaterno} ${apellidoMaterno}</p>
                    <p><strong>Clave:</strong> ${clave}</p>
                    <p><strong>Inicio de Periodo:</strong> ${fechaInicio}</p>
                    <p><strong>Fin de Periodo:</strong> ${fechaFin}</p>
                    <p><strong>Método de Pago:</strong> ${metodoPago}</p>
                    <p><strong>Cuenta Recibido:</strong> ${cuentaRecibido}</p>
                    <p><strong>Monto Total:</strong> $${monto}</p>
                    <p><strong>Día que se realizó:</strong> ${createdAt}</p>
                </div>
            `;

            // Crear un iframe oculto para el recibo
            const iframe = document.createElement('iframe');
            iframe.style.position = 'absolute';
            iframe.style.width = '0px';
            iframe.style.height = '0px';
            iframe.style.border = 'none';
            document.body.appendChild(iframe);
            const iframeDocument = iframe.contentWindow.document;

            iframeDocument.open();
            iframeDocument.write(`
                <html>
                    <head>
                        <title>Recibo de Pago</title>
                        <style>
                            body { font-family: Arial, sans-serif; }
                        </style>
                    </head>
                    <body>
                        ${receiptContent}
                    </body>
                </html>
            `);
            iframeDocument.close();

            // Imprimir directamente desde el iframe
            iframe.contentWindow.focus();
            iframe.contentWindow.print();
        }
    </script>
</x-director.layout>
