<x-alumno.layout>

    <div id="app posicion1">
        <!-- Botón para imprimir la tabla -->
        <button class= "posicion2" id="btn-imprimir" onclick="printTable()">🖨️ IMPRIMIR</button>

        <div class="flex items-center justify-center bg-gray-900 p-2 posiciontablas borderAnimation ">

            <div class="overflow-x-auto">
               
                <table class=" text-xs text-left text-white">
                    <thead>
                        <tr class="bg-transparent">

                            <th class="px-2 py-1 border-b border-purple-500 animate-border">Aula</th>
                            <th class="px-2 py-1 border-b border-purple-500 animate-border">Materia</th>
                            <th class="px-2 py-1 border-b border-purple-500 animate-border">Lunes</th>
                            <th class="px-2 py-1 border-b border-purple-500 animate-border">Martes</th>
                            <th class="px-2 py-1 border-b border-purple-500 animate-border">Miercoles</th>
                            <th class="px-2 py-1 border-b border-purple-500 animate-border">Jueves</th>
                            <th class="px-2 py-1 border-b border-purple-500 animate-border">Viernes</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                        @foreach ($Horarios as $Horario)
                            <tr class="hover:bg-gray-800 bg-transparent">


                                <td class="px-2 py-1 border-t border-purple-500 animate-border">
                                    {{ $Horario->NombreAula }}</td>
                                <td class="px-2 py-1 border-t border-purple-500 animate-border">
                                    {{ $Horario->NombreMateria }}
                                </td>
                                <td class="px-2 py-1 border-t border-purple-500 animate-border">
                                    {{ $Horario->HoraL }}</td>
                                <td class="px-2 py-1 border-t border-purple-500 animate-border">
                                    {{ $Horario->HoraM }}</td>
                                    <td class="px-2 py-1 border-t border-purple-500 animate-border">
                                    {{ $Horario->HoraMi }}</td>
                                    <td class="px-2 py-1 border-t border-purple-500 animate-border">
                                    {{ $Horario->HoraJ }}</td>
                                    <td class="px-2 py-1 border-t border-purple-500 animate-border">
                                    {{ $Horario->HoraV }}</td>
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
