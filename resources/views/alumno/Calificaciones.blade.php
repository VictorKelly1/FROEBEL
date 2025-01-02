<x-alumno.layout>

    <div id="app posicion1">
        <!-- Botón para imprimir la tabla -->
        <button class="posicion2" id="btn-imprimir" onclick="printTable()">🖨️ IMPRIMIR</button>

        <div class="flex items-center justify-center bg-gray-900 p-2 posiciontablas borderAnimation ">

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <div class="overflow-x-auto">
                @if (!empty($Calificaciones) && $Calificaciones->count() > 0)
                    <h3>{{ $Calificaciones->first()->NombreAlumno }}</h3>
                    <h3>{{ $Calificaciones->first()->ApellidoPaterno }}</h3>
                    <h3>{{ $Calificaciones->first()->ApellidoMaterno }}</h3>
                @else
                    <h3>Aun no tienes Calificaciones.</h3>
                @endif
                <table class=" text-xs text-left text-white">
                    <thead>
                        <tr class="bg-transparent">

                            <th class="px-2 py-1 border-b border-purple-500 animate-border">Materia</th>
                            <th class="px-2 py-1 border-b border-purple-500 animate-border">Grupo</th>
                            <th class="px-2 py-1 border-b border-purple-500 animate-border">Parcial 1</th>
                            <th class="px-2 py-1 border-b border-purple-500 animate-border">Parcial 2</th>
                            <th class="px-2 py-1 border-b border-purple-500 animate-border">Parcial 3</th>
                            <th class="px-2 py-1 border-b border-purple-500 animate-border">Parcial 4</th>
                            <th class="px-2 py-1 border-b border-purple-500 animate-border">Parcial 5</th>
                            <th class="px-2 py-1 border-b border-purple-500 animate-border">Parcial 6</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                        @foreach ($Calificaciones as $Calificacion)
                            <tr class="hover:bg-gray-800 bg-transparent">


                                <td class="px-2 py-1 border-t border-purple-500 animate-border">
                                    {{ $Calificacion->NombreMateria }}</td>
                                <td class="px-2 py-1 border-t border-purple-500 animate-border">
                                    {{ $Calificacion->NombreGrado }}
                                    {{ $Calificacion->NivelAcademico }}
                                    {{ $Calificacion->Paquete }}
                                </td>
                                <td class="px-2 py-1 border-t border-purple-500 animate-border">
                                    {{ $Calificacion->Parcial1 }}</td>
                                <td class="px-2 py-1 border-t border-purple-500 animate-border">
                                    {{ $Calificacion->Parcial2 }}</td>
                                <td class="px-2 py-1 border-t border-purple-500 animate-border">
                                    {{ $Calificacion->Parcial3 }}</td>
                                <td class="px-2 py-1 border-t border-purple-500 animate-border">
                                    {{ $Calificacion->Parcial4 }}</td>
                                <td class="px-2 py-1 border-t border-purple-500 animate-border">
                                    {{ $Calificacion->Parcial5 }}</td>
                                <td class="px-2 py-1 border-t border-purple-500 animate-border">
                                    {{ $Calificacion->Parcial6 }}</td>

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
