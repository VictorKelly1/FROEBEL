<x-director.layout>
    <!-- ✅ Mensaje de Éxito -->
    @if (session('success'))
    <div class="alert alert-success">
        <p>{{ session('success') }}</p>
    </div>
@endif
    <!-- 🧑‍💻 Campo de Búsqueda para Filtrar Alumnos y Tutores (tamaño original) -->
    <div class="relative mb-4">
        <div class="absolute top-0 right-0 p-2">
            <input type="search" id="searchInput" placeholder="Buscar Alumno o Tutor..." 
                class="buscador-input" style="width: 550px; height: 50px; padding: 8px; background-color: #2d2d2d; color: white; border-radius: 5px;">
        </div>
    </div>



    <!-- ✅ Formulario de Asignación con tamaño aumentado -->
    <form class="posiciontablas bg-gray-900 p-4 rounded-md border border-blue-500 shadow-md w-full max-w-3xl mx-auto" 
          action="{{ route('AsignarTutoresAlum') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Alumno -->
        <label for="Alumno" class="block text-lg font-medium text-white mb-2">Alumno:</label>
        <select name="idAlumno" id="Alumno" class="form-control w-full p-3 mb-3 rounded-md text-lg" required>
            <option value="">Seleccione</option>
            @foreach ($Alumnos as $Alumno)
                <option value="{{ $Alumno->idAlumno }}" class="alumno-option">
                    {{ $Alumno->Matricula }} - {{ $Alumno->Nombre }} {{ $Alumno->ApellidoPaterno }} {{ $Alumno->ApellidoMaterno }}
                </option>
            @endforeach
        </select>

        <!-- Tutor -->
        <label for="Tutor" class="block text-lg font-medium text-white mb-2">Tutor:</label>
        <select name="idTutor" id="Tutor" class="form-control w-full p-3 mb-3 rounded-md text-lg" required>
            <option value="">Seleccione</option>
            @foreach ($Tutores as $Tutor)
                <option value="{{ $Tutor->idTutor }}" class="tutor-option">
                    {{ $Tutor->Nombre }} {{ $Tutor->ApellidoPaterno }} {{ $Tutor->ApellidoMaterno }}
                </option>
            @endforeach
        </select>

        <!-- Parentesco -->
        <label for="Tipo" class="block text-lg font-medium text-white mb-2">Parentesco:</label>
        <input type="text" name="Tipo" id="Tipo" class="form-control w-full p-3 mb-3 rounded-md text-lg" required>

        <!-- Botón de Envío -->
        <button type="submit" class="btn btn-primary bg-blue-600 text-white px-6 py-3 rounded-md hover:bg-blue-700 w-full mt-4">
            Asignar
        </button>
    </form>






   <!-- ✅ Contenedor con Buscador y Tabla -->
<div class="posiciontablasbaja flex flex-col items-center justify-center bg-gray-900 p-4 mt-4 rounded-md border border-blue-500 shadow-md md:w-3/4 lg:w-2/3 overflow-x-auto">

<!-- ✅ Buscador -->
<div class="w-full mb-4">
    <input 
        type="text" 
        id="searchInput" 
        class="w-full p-2 border border-blue-500 rounded-md text-gray-900" 
        placeholder="🔍 Buscar en la tabla...">
</div>

<!-- ✅ Tabla -->
<table class="w-full text-sm text-white border-collapse border border-blue-500 rounded-md">
    <thead class="bg-blue-700 text-center">
        <tr>
            <th class="px-3 py-2 border-b border-blue-500">Matrícula</th>
            <th class="px-3 py-2 border-b border-blue-500">Nombre del Alumno</th>
            <th class="px-3 py-2 border-b border-blue-500">Nombre del Tutor</th>
            <th class="px-3 py-2 border-b border-blue-500">Parentesco</th>
            <th class="px-3 py-2 border-b border-blue-500">Desasignación</th>
        </tr>
    </thead>
    <tbody id="tableBody">
        @foreach ($AlumTutor as $AlumnoTutor)
            <tr class="hover:bg-gray-800 text-center">
                <td class="px-3 py-2 border-t border-blue-500">{{ $AlumnoTutor->Matricula }}</td>
                <td class="px-3 py-2 border-t border-blue-500">{{ $AlumnoTutor->NombreAlum }} {{ $AlumnoTutor->ApellidoPatA }} {{ $AlumnoTutor->ApellidoMatA }}</td>
                <td class="px-3 py-2 border-t border-blue-500">{{ $AlumnoTutor->NombreTutor }} {{ $AlumnoTutor->ApellidoPaternoT }} {{ $AlumnoTutor->ApellidoMatT }}</td>
                <td class="px-3 py-2 border-t border-blue-500">{{ $AlumnoTutor->Tipo }}</td>
                <td class="px-3 py-2 border-t border-blue-500">
                    <form action="/AlumTutor/{{ $AlumnoTutor->idAlumnoTutor }}" method="GET">
                        <button class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">Desasignar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>





<script>

// ✅ Filtrado en la tabla
document.getElementById('searchInput').addEventListener('input', function () {
    let filter = this.value.toLowerCase();
    let rows = document.querySelectorAll('#tableBody tr');
    
    rows.forEach(row => {
        let text = row.textContent.toLowerCase();
        row.style.display = text.includes(filter) ? '' : 'none';
    });
});



</script>









    <!-- ✅ Paginación -->
    <div class="mt-4 text-xs text-center">
        {{ $AlumTutor->links() }}
    </div>

    <!-- ✅ Funcionalidad de Búsqueda para Filtrar Alumnos y Tutores -->
    <script>
        document.getElementById("searchInput").addEventListener("input", function() {
            var filter = this.value.toLowerCase();
            
            // Filtrar Alumnos
            var alumnos = document.getElementsByClassName("alumno-option");
            Array.from(alumnos).forEach(function(option) {
                if (option.textContent.toLowerCase().includes(filter)) {
                    option.style.display = "";
                } else {
                    option.style.display = "none";
                }
            });

            // Filtrar Tutores
            var tutores = document.getElementsByClassName("tutor-option");
            Array.from(tutores).forEach(function(option) {
                if (option.textContent.toLowerCase().includes(filter)) {
                    option.style.display = "";
                } else {
                    option.style.display = "none";
                }
            });
        });
    </script>




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
