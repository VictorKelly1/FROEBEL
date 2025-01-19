<div class="mb-4 text-center">
    <button onclick="printTable()" class="px-6 py-3 bg-blue-500 text-white rounded-lg flex items-center justify-center gap-2 hover:bg-blue-600 transition-all transform hover:scale-105 shadow-md">
        <!-- Icono de impresión -->
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 9V3a2 2 0 012-2h8a2 2 0 012 2v6M6 9l6 6m0 0l6-6m-6 6v5a2 2 0 002 2h2a2 2 0 002-2V6" />
        </svg>
        Imprimir
    </button>
</div>

<script>
    function printTable() {
        const tabla = document.getElementById('miTabla').outerHTML; // Captura la tabla completa

        const ventanaImpresion = window.open('', '_blank'); // Nueva ventana para impresión
        ventanaImpresion.document.write(`
            <html>
                <head>
                    <title>Imprimir Tabla</title>
                    <style>
                        body {
                            font-family: Arial, sans-serif;
                            padding: 20px;
                        }
                        table {
                            width: 100%;
                            border-collapse: collapse;
                        }
                        th, td {
                            border: 1px solid #000;
                            padding: 8px;
                            text-align: left;
                        }
                        th {
                            background-color: rgb(8, 0, 255);
                        }
                        @media print {
                            button {
                                display: none;
                            }
                        }
                    </style>
                </head>
                <body>
                    ${tabla} <!-- Tabla que ya tenías -->
                </body>
            </html>
        `);
        ventanaImpresion.document.close();
        ventanaImpresion.print(); // Imprime directamente
    }
</script>
