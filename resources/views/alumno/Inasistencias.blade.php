<x-alumno.layout>

<div
        class="posiciontablas flex items-center justify-center bg-gray-900 p-2 mt-4 rounded-md border border-blue-500 shadow-md w-3/4 sm:w-1/2 lg:w-3/4 overflow-x-auto z-30">
        <div class="w-full max-w-full">


            <!-- ✅ Tabla sin cambios en tamaño -->
            <table class="text-sm text-left text-white w-full table-auto z-30">
                <thead class="bg-blue-700">
                    <tr>

                    <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Foto</th>
                    <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Nombre</th>
                    <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Fecha</th>
                    <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Motivo</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                        @foreach ($Inasistencias as $Inasistencia)
                        <tr class="hover:bg-gray-800 bg-transparent">


                        <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">
                                    {{ $Inasistencia->Foto }}</td>
                                    <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">
                                    {{ $Inasistencia->Nombre }}
                                    {{ $Inasistencia->ApellidoPaterno }}
                                    {{ $Inasistencia->ApellidoMaterno }}
                                </td>
                                <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">
                                    {{ $Inasistencia->Fecha }}</td>
                                    <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">
                                    {{ $Inasistencia->Motivo }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>








<script>

function printTable() {
    const tabla = document.getElementById('miTabla').outerHTML; // Captura la tabla completa
    
    const ventanaImpresion = window.open('', '_blank'); // Abre una nueva ventana para impresión
    ventanaImpresion.document.write(`
        <html>
            <head>
                <title>Imprimir Tabla</title>
                <style>
                    table {
                        width: 100%;
                        border-collapse: collapse;
                        margin: 20px 0;
                    }
                    th, td {
                        border: 1px solid #000;
                        padding: 8px;
                        text-align: left;
                    }
                    th {
                        background-color:rgb(255, 98, 0);
                    }
                    @media print {
                        button {
                            display: none;
                        }
                    }
                </style>
            </head>
            <body>
                ${tabla}
                <script>
                    window.onload = function() {
                        window.print();
                        window.close();
                    }
                </script>
            </body>
        </html>
    `);
    ventanaImpresion.document.close();
}



</script>








</x-alumno.layout>
