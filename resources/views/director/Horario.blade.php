<x-director.layout>
    <!-- ✅ Mensaje de Éxito -->
    @if (session('success'))
    <div class="alert alert-success">
        <p>{{ session('success') }}</p>
    </div>
@endif
    <div class=" flex items-center posicionregisdesc">
        <form class="formulario2x2 z-30" action="{{ route('AsignarHorario') }}" method="POST" enctype="multipart/form-data">
            @csrf


            <div class="form-group">
                <label for="Aula">Aula:</label>
                <select name="idAula" id="Aula" class="form-control" required>
                    <option value="">Selecciona Aula</option>
                    @foreach ($Aulas as $Aula)
                        <option value="{{ $Aula->idAula }}">{{ $Aula->Nombre }} - Piso: {{ $Aula->Piso }} </option>
                    @endforeach

                </select>
            </div>

            <div class="form-group">
                <label for="GrupoMat">GrupoMat:</label>
                <select name="idGrupoMat" id="GrupoMat" class="form-control" required>
                    <option value="">Selecciona materia y grupo</option>
                    @foreach ($GrupMat as $GrupoMat)
                        <option value="{{ $GrupoMat->IdGrupoMateria }}">
                            {{ $GrupoMat->NombreMateria }}
                            {{ $GrupoMat->NombreGrado }}
                            {{ $GrupoMat->NivelAcademico }}
                            {{ $GrupoMat->Paquete }}
                        </option>
                    @endforeach

                </select>
            </div>

            <div class="form-group">
                <label for="Lunes">Lunes:</label>
                <input type="text" name="HoraL" id="Lunes" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="Martes">Martes:</label>
                <input type="text" name="HoraM" id="Martes" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="Miercoles">Miercoles:</label>
                <input type="text" name="HoraMi" id="Miercoles" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="Jueves">Jueves:</label>
                <input type="text" name="HoraJ" id="Jueves" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="Viernes">Viernes:</label>
                <input type="text" name="HoraV" id="Viernes" class="form-control" required>
            </div>


            <!-- Botón de envío -->
            <button type="submit" class="btn btn-primary">Asignar</button>

        </form>
    </div>







    <!-- ✅ Mensaje de Éxito -->
    @if (session('success'))
        <div class="alert alert-success">
            <p>{{ session('success') }}</p>
        </div>
    @endif

    <!-- 🧑‍💻 Campo de Búsqueda -->
    <div class="relative mb-4">
        <div class="posiciontablahorario absolute top-0 right-0 p-2">
            <input type="search" id="searchInput" placeholder="Buscar Alumno..." class="buscador-input"
                style="width: 950px; height: 10%; padding: 18px; background-color: #2d2d2d; color: white; border-radius: 5px; z-30">
        </div>
    </div>
   <!-- ✅ Contenedor Compacto de la Tabla con Búsqueda -->
<div class="posiciontablahorario flex items-center justify-center bg-gray-900 p-1 mt-2 rounded-md border border-blue-500 shadow-md w-full sm:w-3/4 lg:w-2/3 overflow-x-auto z-30">
    <div class="w-full">

        <!-- ✅ Tabla Compacta -->
        <table class="text-xs text-left text-white w-full table-auto z-30">
            <thead class="bg-blue-700 text-center">
                <tr>
                    <th class="px-1 py-1 border-b border-purple-500">Aula</th>
                    <th class="px-1 py-1 border-b border-purple-500">Materia</th>
                    <th class="px-1 py-1 border-b border-purple-500">Grupo</th>
                    <th class="px-1 py-1 border-b border-purple-500">Lunes</th>
                    <th class="px-1 py-1 border-b border-purple-500">Martes</th>
                    <th class="px-1 py-1 border-b border-purple-500">Miércoles</th>
                    <th class="px-1 py-1 border-b border-purple-500">Jueves</th>
                    <th class="px-1 py-1 border-b border-purple-500">Viernes</th>
                    <th class="px-1 py-1 border-b border-purple-500">Quitar</th>
                </tr>
            </thead>
            <tbody id="tableBody">
                @foreach ($Horarios as $Horario)
                    <tr class="hover:bg-gray-800 text-center">
                        <td class="px-1 py-1 border-t border-purple-500">{{ $Horario->NombreAula }}</td>
                        <td class="px-1 py-1 border-t border-purple-500">{{ $Horario->NombreMateria }}</td>
                        <td class="px-1 py-1 border-t border-purple-500">{{ $Horario->ClavePeriodo }}</td>
                        <td class="px-1 py-1 border-t border-purple-500">{{ $Horario->HoraL }}</td>
                        <td class="px-1 py-1 border-t border-purple-500">{{ $Horario->HoraM }}</td>
                        <td class="px-1 py-1 border-t border-purple-500">{{ $Horario->HoraMi }}</td>
                        <td class="px-1 py-1 border-t border-purple-500">{{ $Horario->HoraJ }}</td>
                        <td class="px-1 py-1 border-t border-purple-500">{{ $Horario->HoraV }}</td>
                        <td class="px-1 py-1 border-t border-purple-500">
                            <form action="/Horario/{{ $Horario->idHorario }}" method="GET">
                                <button class="bg-red-600 text-white px-1 py-0.5 rounded hover:bg-red-700 text-xs">🗑️</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- ✅ Paginación -->
        <div class="mt-2 text-center text-white">
            {{ $Horarios->links() }}
        </div>
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

</x-director.layout>
