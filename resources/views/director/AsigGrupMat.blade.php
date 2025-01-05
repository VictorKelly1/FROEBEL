<x-director.layout>
    <!-- ✅ Mensaje de Éxito -->
    @if (session('success'))
    <div class="alert alert-success">
        <p>{{ session('success') }}</p>
    </div>
@endif
    <!-- ✅ Formulario Compacto para Asignación de Materia a Grupo -->
    <div
        class="posiciontablasmedia flex items-center justify-center bg-gray-900 p-6 mt-6 rounded-md border border-blue-500 shadow-md w-3/4 sm:w-2/3 lg:w-1/2">
        <form class="w-full text-white text-base" action="{{ route('AsignarGrupMateria') }}" method="POST"
            enctype="multipart/form-data">
            @csrf

             <!-- 🔍 Buscador -->
    <input type="text" id="searchInput" placeholder="Buscar..." class="mb-4 p-2 rounded-md border border-blue-500 text-black w-full md:w-1/2">
   
            <!-- 📖 Materia -->
            <div class="mb-4">
                <label for="Materia" class="block mb-2 text-lg">Materia:</label>
                <select name="idMateria" id="Materia"
                    class="w-full px-4 py-2 rounded-md bg-gray-800 border border-blue-500 text-white text-lg" required>
                    <option value="">Seleccione..</option>
                    @foreach ($Materias as $Materia)
                        <option value="{{ $Materia->idMateria }}">{{ $Materia->Clave }} - {{ $Materia->NombreMateria }}
                            {{ $Materia->Tipo }}</option>
                    @endforeach
                </select>
            </div>

            <!-- 📚 Grupo -->
            <div class="mb-4">
                <label for="Grupo" class="block mb-2 text-lg">Grupo:</label>
                <select name="idGrupo" id="Grupo"
                    class="w-full px-4 py-2 rounded-md bg-gray-800 border border-blue-500 text-white text-lg" required>
                    <option value="">Seleccione..</option>
                    @foreach ($Grupos as $Grupo)
                        <option value="{{ $Grupo->idGrupo }}">{{ $Grupo->NombreGrado }} {{ $Grupo->NivelAcademico }}
                            {{ $Grupo->Paquete }}</option>
                    @endforeach
                </select>
            </div>

            <!-- ✅ Botón de Envío -->
            <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 rounded-md text-lg">
                Asignar
            </button>
        </form>
    </div>

   <!-- ✅ Contenedor con Buscador y Tabla Compacta -->
<div
    class="posiciontablasbaja flex flex-col items-center justify-center bg-gray-900 p-6 mt-6 rounded-md border border-blue-500 shadow-md w-3/4 sm:w-2/3 lg:w-1/2 overflow-x-auto">

    <!-- ✅ Tabla Compacta -->
    <table class="w-full text-lg text-white border-collapse border border-blue-500 rounded-md">
        <thead class="bg-blue-700 text-center">
            <tr>
                <th class="px-4 py-2 border-b border-blue-500">Clave</th>
                <th class="px-4 py-2 border-b border-blue-500">Nombre</th>
                <th class="px-4 py-2 border-b border-blue-500">Grupo</th>
                <th class="px-4 py-2 border-b border-blue-500">Quitar Materia</th>
            </tr>
        </thead>
        <tbody id="tableBody">
            @foreach ($GrupMat as $GruposMat)
                <tr class="hover:bg-gray-800 text-center">
                    <td class="px-4 py-2 border-t border-blue-500">
                        {{ $GruposMat->Clave }}
                    </td>
                    <td class="px-4 py-2 border-t border-blue-500">
                        {{ $GruposMat->NombreMateria }} {{ $GruposMat->Tipo }}
                    </td>
                    <td class="px-4 py-2 border-t border-blue-500">
                        {{ $GruposMat->NombreGrado }} {{ $GruposMat->NivelAcademico }} {{ $GruposMat->Paquete }}
                    </td>
                    <td class="px-4 py-2 border-t border-blue-500">
                        <form action="/EliminarGruposMateria/{{ $GruposMat->IdGrupoMateria }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button
                                class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 text-lg">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>


    <!-- ✅ Paginación -->
    <div class="mt-4 text-lg text-center text-white">
        {{ $GrupMat->links() }}
    </div>

    <script>


document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('searchInput');
    const tableBody = document.getElementById('tableBody');
    const rows = tableBody.getElementsByTagName('tr');

    searchInput.addEventListener('keyup', function () {
        const searchValue = searchInput.value.toLowerCase();

        Array.from(rows).forEach(row => {
            const rowText = row.textContent.toLowerCase();
            row.style.display = rowText.includes(searchValue) ? '' : 'none';
        });
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

<script>



    
</script>


</x-director.layout>
