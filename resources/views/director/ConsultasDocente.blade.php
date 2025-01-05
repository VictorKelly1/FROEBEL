<x-director.layout>

    <!-- ✅ Mensaje de Éxito -->
    @if (session('success'))
    <div class="alert alert-success">
        <p>{{ session('success') }}</p>
    </div>
@endif

   <!-- 🧑‍💻 Campo de Búsqueda -->
   <div class="relative mb-4">
                <div class="posiciontablaalumno absolute top-0 right-0 p-2">
                    <input type="search" id="searchInput" placeholder="Buscar Alumno..." 
                        class="buscador-input" style="width: 1120px; height: 10%; padding: 18px; background-color: #2d2d2d; color: white; border-radius: 5px;">
                </div>
            </div>
    <!-- ✅ Contenedor de la Tabla con Búsqueda -->
    <div class="posiciontablas flex items-center justify-center bg-gray-900 p-2 mt-4 rounded-md border border-blue-500 shadow-md w-3/4 sm:w-1/2 lg:w-3/4 overflow-x-auto z-30">
        <div class="w-full max-w-full">


            <!-- ✅ Tabla sin cambios en tamaño -->
            <table class="text-sm text-left text-white w-full table-auto z-30">
                <thead class="bg-blue-700">
                    <tr>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Nombre</th>
                
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">CURP</th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Fecha de
                            Nacimiento</th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Género</th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Ciudad</th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Municipio
                        </th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Código
                            Postal</th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">
                            Colonia/Fraccionamiento</th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Calle</th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Número
                            Exterior</th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Estado Civil
                        </th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Nacionalidad
                        </th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Foto</th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Carrera</th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">FechaIngreso
                        </th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Estado</th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">RFC</th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">NoINE</th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Sueldo</th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Editar</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    @foreach ($Docentes as $Docente)
                    <tr>
                            <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">
                                {{ $Docente->Nombre }}  {{ $Docente->ApellidoPaterno }}  {{ $Docente->ApellidoMaterno }}</td>
                            <td class="px-6 py-4 border-t border-blue-500 animate-border text-center">
                                {{ $Docente->CURP }}</td>
                            <td class="px-6 py-4 border-t border-blue-500 animate-border text-center">
                                {{ $Docente->FechaNacimiento }}</td>
                            <td class="px-6 py-4 border-t border-blue-500 animate-border text-center">
                                {{ $Docente->Genero }}</td>
                            <td class="px-6 py-4 border-t border-blue-500 animate-border text-center">
                                {{ $Docente->Ciudad }}</td>
                            <td class="px-6 py-4 border-t border-purblueple-500 animate-border text-center">
                                {{ $Docente->Municipio }}</td>
                            <td class="px-6 py-4 border-t border-blue-500 animate-border text-center">
                                {{ $Docente->CodigoPostal }}</td>
                            <td class="px-6 py-4 border-t border-blue-500 animate-border text-center">
                                {{ $Docente->ColFrac }}</td>
                            <td class="px-6 py-4 border-t border-blue-500 animate-border text-center">
                                {{ $Docente->Calle }}</td>
                            <td class="px-6 py-4 border-t border-blue-500 animate-border text-center">
                                {{ $Docente->NumeroExterior }}</td>
                            <td class="px-6 py-4 border-t border-blue-500 animate-border text-center">
                                {{ $Docente->EstadoCivil }}</td>
                            <td class="px-6 py-4 border-t border-blue-500 animate-border text-center">
                                {{ $Docente->Nacionalidad }}</td>
                            <td class="px-6 py-4 border-t border-blue-500 animate-border text-center">
                                {{ $Docente->Foto }}</td>
                            <td class="px-6 py-4 border-t border-blue-500 animate-border text-center">
                                {{ $Docente->Carrera }}</td>
                            <td class="px-6 py-4 border-t border-blue-500 animate-border text-center">
                                {{ $Docente->FechaIngreso }}</td>
                            <td class="px-6 py-4 border-t border-blue-500 animate-border text-center">
                                {{ $Docente->Estado }}</td>
                            <td class="px-6 py-4 border-t border-blue-500 animate-border text-center">
                                {{ $Docente->RFC }}</td>
                            <td class="px-6 py-4 border-t border-blue-500 animate-border text-center">
                                {{ $Docente->NoINE }}</td>
                            <td class="px-6 py-4 border-t border-blue-500 animate-border text-center">
                                {{ $Docente->Sueldo }}</td>
                            <td class="px-6 py-4 border-t border-blue-500 animate-border text-center">
                                <form action="/VistaEditarDocente/{{ $Docente->idDocente }}" method="GET">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Edición</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    {{ $Docentes->links() }}
                </tbody>
            </table>
        </div>





        <script>
        document.getElementById("searchInput").addEventListener("input", function() {
            var filter = this.value.toLowerCase();
            var rows = document.getElementById("tableBody").getElementsByTagName("tr");

            Array.from(rows).forEach(function(row) {
                var text = row.textContent.toLowerCase();
                if (text.includes(filter)) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
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
