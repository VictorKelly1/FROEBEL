<x-director.layout>


     <!-- ✅ Mensaje de Éxito -->
     @if (session('success'))
    <div class="alert alert-success">
        <p>{{ session('success') }}</p>
    </div>
@endif

    <div class="posiciontablas flex items-center justify-center bg-gray-900 p-2 mt-4 rounded-md border border-blue-500 shadow-md w-3/4 sm:w-1/2 lg:w-3/4 overflow-x-auto z-30">
    <div class="w-full max-w-full">
            <!-- ✅ Tabla sin cambios en tamaño -->
            <table class="text-sm text-left text-white w-full table-auto z-30">
            <thead class="bg-blue-700">
            
                    <form class="" action="{{ route('BuscarColegiaturaFaltante') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="mb-4 posicion1">
                            <label for="Formato">La clave debe comenzar con 'C-', 'E-' o 'I-', seguida de dos letras
                                mayúsculas y dos números (ejemplo: C-AB12 o I-CD34).</label>
                            <input type="text" name="Clave" id="searchInput" class="px-4 py-2 text-white rounded"
                                placeholder="Buscar Colegiatura/Inscripcion por la clave..."
                                pattern="^(C-|I-|E-)[A-Z]{2}\d{2}$" maxlength="6" required>
                        </div>

                        <button
                            class="bg-red-600 text-white px-4 py-3 rounded-lg transition-all duration-500 hover:bg-purple-600 hover:-translate-y-2 hover:shadow-2xl">Buscar
                        </button>

                    </form>


                    <tr>
                    <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Foto del
                            Alumno</th>
                            <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Matrícula
                        </th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">
                            Nombre</th>
                            <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">CURP</th>
                        <th class="px-4 py-2 text-lg border-b border-purple-500 animate-border text-center">
                            Fecha Ingreso</th>
                            <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Estado
                        </th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Día que se realizó</th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Comunicado
                        </th>
                       
                </thead>
                <tbody id="tableBody">
                    @foreach ($Faltantes as $Faltante)
                    <tr class="hover:bg-gray-800 bg-transparent">
                        
                            <!-- Foto -->
                            <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">
                                @if ($Faltante->Foto)
                                    <img src="{{ asset('fotos/' . $Faltante->Foto) }}" alt="Usuario"
                                        class="w-28 h-28 rounded-full">
                                @else
                                    <span class="text-gray-500">Sin foto</span>
                                @endif
                            </td>

                            <!-- Matrícula -->
                            <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">{{ $Faltante->Matricula }}
                            </td>

                            <!-- Nombre -->
                            <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">
                                {{ $Faltante->Nombre }} {{ $Faltante->ApellidoPaterno }}
                                {{ $Faltante->ApellidoMaterno }}</td>

                            <!-- CURP -->
                            <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">{{ $Faltante->CURP }}</td>

                            <!-- FechaInicio -->
                            <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">
                                {{ $Faltante->FechaIngreso }}</td>


                            <!-- Estado -->
                            <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">{{ $Faltante->Estado }}</td>
                            <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">{{ $Faltante->created_at }}</td>
                            <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">
                                <form action="/VistaComunicadoPersonal/{{ $Faltante->idAlumno }}" method="GET">
                                    @csrf
                                    <button
                                        class="bg-blue-900 text-white px-4 py-3 rounded-lg transition-all duration-500 hover:bg-purple-600 hover:-translate-y-2 hover:shadow-2xl">
                                        Comunicado
                                    </button>

                                </form>
                            </td>


                        </tr>
                    @endforeach
                    {{ $Faltantes->links() }}
                </tbody>
            </table>
        </div>
    </div>

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
    <style>
        .custom-cell {
            min-width: 230px;
        }

        .rounded-full {
            border-radius: 50%;
        }

        .object-cover {
            object-fit: cover;
        }

        body {
            margin: 0;
            padding: 0;
        }
    </style>
</x-director.layout>
