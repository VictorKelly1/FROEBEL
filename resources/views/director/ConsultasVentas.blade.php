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
                    <input type="search" id="searchInput1" placeholder="Buscar..." class="p-2 bg-gray-800 text-white rounded-md text-sm mt-2 w-full">
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
                    <input type="search" id="searchInput2" placeholder="Buscar..." class="p-2 bg-gray-800 text-white rounded-md text-sm mt-2 w-full">
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
                        <td class="px-4 py-2 border-t border-blue-500 animate-border text-center nombre">{{ $Venta->Nombre }} {{ $Venta->ApellidoPaterno }} {{ $Venta->ApellidoMaterno }}</td>
                        <td class="px-4 py-2 border-t border-blue-500 animate-border text-center clave">{{ $Venta->Clave }}</td>
                        <td class="px-4 py-2 border-t border-blue-500 animate-border text-center fechainicio">{{ $Venta->FechaInicio }}</td>
                        <td class="px-4 py-2 border-t border-blue-500 animate-border text-center fechafin">{{ $Venta->FechaFin }}</td>
                        <td class="px-4 py-2 border-t border-blue-500 animate-border text-center cantidad">{{ $Venta->Cantidad }}</td>
                        <td class="px-4 py-2 border-t border-blue-500 animate-border text-center tipotransaccion">{{ $Venta->TipoTransaccion }}</td>
                        <td class="px-4 py-2 border-t border-blue-500 animate-border text-center nombreconcepto">{{ $Venta->NombreConcepto }}</td>
                        <td class="px-4 py-2 border-t border-blue-500 animate-border text-center metodopago">{{ $Venta->MetodoPago }}</td>
                        <td class="px-4 py-2 border-t border-blue-500 animate-border text-center monto">{{ $Venta->Monto }}</td>
                        <td class="px-4 py-2 border-t border-blue-500 animate-border text-center created_at">{{ $Venta->created_at }}</td>
                        <td>
                            <!-- Botón de "Imprimir Recibo" -->
                            <button onclick="printReceipt(
                                '{{ $Venta->Nombre }}',
                                '{{ $Venta->ApellidoPaterno }}',
                                '{{ $Venta->ApellidoMaterno }}',
                                '{{ $Venta->Clave }}',
                                '{{ $Venta->FechaInicio }}',
                                '{{ $Venta->FechaFin }}',
                                '{{ $Venta->MetodoPago }}',
                                '{{ $Venta->Monto }}',
                                '{{ $Venta->created_at }}'
                            )" class="px-4 py-2 bg-yellow-400 text-white rounded-md hover:bg-green-600">
                                Imprimir Recibo
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- ✅ Script para generar el recibo -->
    <script>
        function printReceipt(nombre, apellidoPaterno, apellidoMaterno, clave, fechaInicio, fechaFin, metodoPago, monto, createdAt) {
            const receiptContent = `
                <div style="font-family: 'Arial', sans-serif; width: 90%; max-width: 400px; margin: auto; padding: 20px; border: 1px solid #e0e0e0; border-radius: 10px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); background: #fff; color: #333;">
                    <div style="text-align: center; margin-bottom: 20px;">
                        <img src="{{ asset('images/logoWelcome.png') }}" alt="Logo Colegio" style="width: 100px; height: auto; margin-bottom: 10px;">
                        <h1 style="font-size: 20px; font-weight: bold; color: #2c3e50; margin: 5px 0;">COLEGIO FROEBEL</h1>
                        <p style="font-size: 12px; color: #7f8c8d; margin: 0;">Dirección: Av. Principal #123, Ciudad</p>
                        <p style="font-size: 12px; color: #7f8c8d; margin: 0;">Teléfono: (555) 123-4567</p>
                        <p style="font-size: 12px; color: #7f8c8d; margin: 0;">Email: info@colegiofroebel.com</p>
                    </div>
                    <h2 style="font-size: 18px; font-weight: bold; color: #34495e; text-align: center; margin-bottom: 15px;">RECIBO DE PAGO</h2>
                    <div style="margin-bottom: 20px;">
                        <p style="font-size: 14px; margin: 5px 0;"><strong>Alumno:</strong> ${nombre} ${apellidoPaterno} ${apellidoMaterno}</p>
                        <p style="font-size: 14px; margin: 5px 0;"><strong>Clave:</strong> ${clave}</p>
                        <p style="font-size: 14px; margin: 5px 0;"><strong>Período:</strong> ${fechaInicio} - ${fechaFin}</p>
                        <p style="font-size: 14px; margin: 5px 0;"><strong>Método de Pago:</strong> ${metodoPago}</p>
                        <p style="font-size: 14px; margin: 5px 0;"><strong>Monto Total:</strong> $${parseFloat(monto).toFixed(2)}</p>
                        <p style="font-size: 14px; margin: 5px 0;"><strong>Fecha de Pago:</strong> ${new Date(createdAt).toLocaleDateString()}</p>
                    </div>
                    <div style="text-align: center; font-size: 12px; color: #7f8c8d; border-top: 1px solid #e0e0e0; padding-top: 10px;">
                        <p style="margin: 0;">Este es un comprobante de pago oficial.</p>
                        <p style="margin: 0;">Gracias por su confianza.</p>
                    </div>
                </div>
            `;
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
                            body { font-family: Arial, sans-serif; margin: 0; padding: 20px; text-align: center; background: #fff; }
                            @media print {
                                body { width: 100mm; height: 150mm; margin: 0 auto; }
                            }
                        </style>
                    </head>
                    <body>
                        ${receiptContent}
                    </body>
                </html>
            `);
            iframeDocument.close();

            iframe.contentWindow.focus();
            iframe.contentWindow.print();
        }

        // Filtrado de la tabla
        document.addEventListener("DOMContentLoaded", function () {
            const columnSelect1 = document.getElementById('columnSelect1');
            const searchInput1 = document.getElementById('searchInput1');
            const columnSelect2 = document.getElementById('columnSelect2');
            const searchInput2 = document.getElementById('searchInput2');
            const columnSelect3 = document.getElementById('columnSelect3');
            const searchInput3 = document.getElementById('searchInput3');
            const tableBody = document.getElementById('tableBody');
            
            function filterTable() {
                const rows = tableBody.querySelectorAll('tr');
                rows.forEach(row => {
                    let matchesFilter = true;

                    const column1 = row.querySelector(`.${columnSelect1.value}`);
                    if (column1 && !column1.textContent.toLowerCase().includes(searchInput1.value.toLowerCase())) {
                        matchesFilter = false;
                    }

                    const column2 = row.querySelector(`.${columnSelect2.value}`);
                    if (column2 && !column2.textContent.toLowerCase().includes(searchInput2.value.toLowerCase())) {
                        matchesFilter = false;
                    }

                    const column3 = row.querySelector(`.${columnSelect3.value}`);
                    if (column3 && !column3.textContent.toLowerCase().includes(searchInput3.value.toLowerCase())) {
                        matchesFilter = false;
                    }

                    row.style.display = matchesFilter ? '' : 'none';
                });
            }

            searchInput1.addEventListener('input', filterTable);
            columnSelect1.addEventListener('change', filterTable);

            searchInput2.addEventListener('input', filterTable);
            columnSelect2.addEventListener('change', filterTable);

            searchInput3.addEventListener('input', filterTable);
            columnSelect3.addEventListener('change', filterTable);
        });
    </script>
</x-director.layout>
