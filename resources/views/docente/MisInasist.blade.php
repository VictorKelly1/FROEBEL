<x-docente.layout>
    <!-- ✅ Mensaje de Éxito -->
    @if (session('success'))
    <div class="alert alert-success">
        <p>{{ session('success') }}</p>
    </div>
@endif
    <!-- ✅ Mensaje de Éxito -->
    @if (session('success'))
        <div class="alert alert-success">
            <p>{{ session('success') }}</p>
        </div>
    @endif

    <!-- 🧑‍💻 Campo de Búsqueda -->
    <div class="relative mb-4">
        <div class="posiciontablaalumno absolute top-0 right-0 p-2">
            <input type="search" id="searchInput" placeholder="Buscar Alumno..." class="buscador-input"
                style="width: 1110px; height: 10%; padding: 18px; background-color: #2d2d2d; color: white; border-radius: 5px;">
        </div>
    </div>
    <!-- ✅ Contenedor de la Tabla con Búsqueda -->
    <div
        class="posiciontablas flex items-center justify-center bg-gray-900 p-2 mt-4 rounded-md border border-red-500 shadow-md w-3/4 sm:w-1/2 lg:w-3/4 overflow-x-auto z-30">
        <div class="w-full max-w-full">


            <!-- ✅ Tabla sin cambios en tamaño -->
            <table class="text-sm text-left text-white w-full table-auto z-30">
                <thead class="bg-red-700">
                    <tr>
                    <th class="px-4 py-2 text-lg border-b border-red-500 animate-border text-center">Persona:</th>
                    <th class="px-4 py-2 text-lg border-b border-red-500 animate-border text-center">Nombre:</th>
                    <th class="px-4 py-2 text-lg border-b border-red-500 animate-border text-center"> Grupo:</th>
                    <th class="px-4 py-2 text-lg border-b border-red-500 animate-border text-center">Fecha:</th>
                    <th class="px-4 py-2 text-lg border-b border-red-500 animate-border text-center">Motivo</th>
                    <th class="px-4 py-2 text-lg border-b border-red-500 animate-border text-center">Justificar</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    @foreach ($Inasistencias as $Inasistencia)
                    <tr class="hover:bg-gray-800 bg-transparent">

                            <!-- Foto -->
                            <td class="px-4 py-2 border-t border-red-500 animate-border text-center">
                                @if ($Inasistencia->Foto)
                                    <img src="{{ asset('fotos/' . $Inasistencia->Foto) }}" alt="Usuario"
                                        class="w-28 h-28 rounded-full">
                                @else
                                    <span class="text-gray-500">Sin foto</span>
                                @endif
                            </td>
                            <td class="px-4 py-2 border-t border-red-500 animate-border text-center">
                                {{ $Inasistencia->Nombre }} {{ $Inasistencia->ApellidoPaterno }} {{ $Inasistencia->ApellidoMaterno }}</td>

                                <td class="px-4 py-2 border-t border-red-500 animate-border text-center">{{ $Inasistencia->Grupo }}</td>
                                <td class="px-4 py-2 border-t border-red-500 animate-border text-center">{{ $Inasistencia->Fecha }}</td>
                                <td class="px-4 py-2 border-t border-red-500 animate-border text-center">{{ $Inasistencia->Motivo }}</td>
                                <td class="px-4 py-2 border-t border-red-500 animate-border text-center">
                                <form action="" method="GET">
                                    @csrf
                                    <button
                                        class="bg-red-600 text-white px-4 py-3 rounded-lg transition-all duration-500 hover:bg-purple-600 hover:-translate-y-2 hover:shadow-2xl">
                                        Justificar
                                    </button>
                                </form>
                            </td>

                        </tr>
                    @endforeach
                   
                </tbody>
            </table>

        </div>
    </div>


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
    
</x-docente.layout>
