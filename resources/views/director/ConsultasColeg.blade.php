<x-director.layout>
    @if (session('success'))
    <div class="alert alert-success">
        <p>{{ session('success') }}</p>
    </div>
    @endif

    <div class="posiciontablasmedia table-container bg-gray-900 p-4 mt-4 rounded-md border border-blue-500 shadow-md md:w-3/4 lg:w-2/3 overflow-x-auto">
        <!-- Contenedor de filtros -->
        <div class="filters flex flex-col md:flex-row items-center justify-start gap-4 mb-4">
            <!-- Filtros aquí -->
        </div>

        <!-- Label para mostrar el monto total -->
        <div class="mt-4">
            <label class="text-white">Monto Total Filtrado: </label>
            <span id="totalAmount" class="text-white font-bold">$0.00</span>
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
                    <th class="px-3 py-2 border-b border-blue-500">Acciones</th>
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
                        <button onclick="printReceipt(
                            '{{ $Colegiatura->Nombre }}',
                            '{{ $Colegiatura->ApellidoPaterno }}',
                            '{{ $Colegiatura->ApellidoMaterno }}',
                            '{{ $Colegiatura->Clave }}',
                            '{{ $Colegiatura->FechaInicio }}',
                            '{{ $Colegiatura->FechaFin }}',
                            '{{ $Colegiatura->MetodoPago }}',
                            '{{ $Colegiatura->CuentaRecibido }}',
                            '{{ $Colegiatura->Monto }}',
                            '{{ $Colegiatura->created_at }}'
                        )" class="px-4 py-2 bg-yellow-400 text-white rounded-md hover:bg-green-600">
                            Imprimir Recibo
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Script para generar el recibo -->
    <script>
        function printReceipt(nombre, apellidoPaterno, apellidoMaterno, clave, fechaInicio, fechaFin, metodoPago, cuentaRecibido, monto, createdAt) {
            const receiptContent = `
                <div style="font-family: 'Arial', sans-serif; width: 90%; max-width: 400px; margin: auto; padding: 20px; border: 1px solid #e0e0e0; border-radius: 10px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); background: #fff; color: #333;">
                    <!-- Encabezado con logo y detalles del colegio -->
                    <div style="text-align: center; margin-bottom: 20px;">
                        <img src="{{ asset('images/logoWelcome.png') }}" alt="Logo Colegio" style="width: 100px; height: auto; margin-bottom: 10px;">
                        <h1 style="font-size: 20px; font-weight: bold; color: #2c3e50; margin: 5px 0;">COLEGIO FROEBEL</h1>
                        <p style="font-size: 12px; color: #7f8c8d; margin: 0;">Dirección: Av. Principal #123, Ciudad</p>
                        <p style="font-size: 12px; color: #7f8c8d; margin: 0;">Teléfono: (555) 123-4567</p>
                        <p style="font-size: 12px; color: #7f8c8d; margin: 0;">Email: info@colegiofroebel.com</p>
                    </div>

                    <!-- Título del recibo -->
                    <h2 style="font-size: 18px; font-weight: bold; color: #34495e; text-align: center; margin-bottom: 15px;">RECIBO DE PAGO</h2>

                    <!-- Detalles del pago -->
                    <div style="margin-bottom: 20px;">
                        <p style="font-size: 14px; margin: 5px 0;"><strong>Alumno:</strong> ${nombre} ${apellidoPaterno} ${apellidoMaterno}</p>
                        <p style="font-size: 14px; margin: 5px 0;"><strong>Clave:</strong> ${clave}</p>
                        <p style="font-size: 14px; margin: 5px 0;"><strong>Período:</strong> ${fechaInicio} - ${fechaFin}</p>
                        <p style="font-size: 14px; margin: 5px 0;"><strong>Método de Pago:</strong> ${metodoPago}</p>
                        <p style="font-size: 14px; margin: 5px 0;"><strong>Cuenta Recibido:</strong> ${cuentaRecibido}</p>
                        <p style="font-size: 14px; margin: 5px 0;"><strong>Fecha de Pago:</strong> ${new Date(createdAt).toLocaleDateString()}</p>
                    </div>

                    <!-- Desglose del monto -->
                    <div style="background: #f8f9fa; padding: 10px; border-radius: 5px; margin-bottom: 20px; text-align: center;">
                        <p style="font-size: 16px; font-weight: bold; color: #27ae60; margin: 0;">Monto Total: $${parseFloat(monto).toFixed(2)}</p>
                    </div>

                  

                    <!-- Pie de página -->
                    <div style="text-align: center; font-size: 12px; color: #7f8c8d; border-top: 1px solid #e0e0e0; padding-top: 10px;">
                        <p style="margin: 0;">Este es un comprobante de pago oficial.</p>
                        <p style="margin: 0;">Gracias por su confianza.</p>
                    </div>
                </div>
            `;

            // Crear un iframe oculto para la impresión
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

            // Imprimir directamente desde el iframe
            iframe.contentWindow.focus();
            iframe.contentWindow.print();
        }
    </script>
</x-director.layout>