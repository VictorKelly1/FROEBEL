<x-alumno.layout>

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
    <div id="app posicion1">
        
        @if (!empty($Calificaciones) && $Calificaciones->count() > 0)
            <h3>{{ $Calificaciones->first()->NombreAlumno }}</h3>
            <h3>{{ $Calificaciones->first()->ApellidoPaterno }}</h3>
            <h3>{{ $Calificaciones->first()->ApellidoMaterno }}</h3>
        @else
            <h3>Aun no tienes Calificaciones.</h3>
        @endif

        <div class="posiciontablas flex items-center justify-center bg-gray-900 p-2 mt-4 rounded-md border border-blue-500 shadow-md w-3/4 sm:w-1/2 lg:w-3/4 overflow-x-auto z-30">
            <div class="w-full max-w-full">

                <!-- ✅ Botón para imprimir dentro del contenedor de la tabla -->
                <div class="mb-4 text-center">
                    <button onclick="printTable()" class="px-4 py-2 bg-blue-500 text-white rounded-md">Imprimir Tabla</button>
                </div>

                <!-- ✅ Tabla -->
                <table id="miTabla" class="text-sm text-left text-white w-full table-auto z-30">
                    <thead class="bg-blue-700">
                        <tr>
                            <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Materia</th>
                            <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Grupo</th>
                            <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Parcial 1</th>
                            <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Parcial 2</th>
                            <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Parcial 3</th>
                            <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Parcial 4</th>
                            <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Parcial 5</th>
                            <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Parcial 6</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                        @foreach ($Calificaciones as $Calificacion)
                            <tr class="hover:bg-gray-800 bg-transparent">
                                <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">{{ $Calificacion->NombreMateria }}</td>
                                <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">{{ $Calificacion->NombreGrado }} {{ $Calificacion->NivelAcademico }} {{ $Calificacion->Paquete }}</td>
                                <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">{{ $Calificacion->Parcial1 }}</td>
                                <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">{{ $Calificacion->Parcial2 }}</td>
                                <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">{{ $Calificacion->Parcial3 }}</td>
                                <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">{{ $Calificacion->Parcial4 }}</td>
                                <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">{{ $Calificacion->Parcial5 }}</td>
                                <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">{{ $Calificacion->Parcial6 }}</td>
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
                                    background-color: rgb(255, 98, 0);
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

    </div>

</x-alumno.layout>
