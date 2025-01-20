<x-docente.layout>


  
    <!-- ✅ Contenedor de la Tabla con Búsqueda -->
    <div class="posiciontablas flex items-center justify-center bg-gray-900 p-2 mt-4 rounded-md border border-blue-500 shadow-md w-3/4 sm:w-1/2 lg:w-3/4 overflow-x-auto z-30">
        <div class="w-full max-w-full">


            <!-- ✅ Tabla sin cambios en tamaño -->
            <table class="text-sm text-left text-white w-full table-auto z-30">
                <thead class="bg-red-700">
                    <tr>

                   
                        <th class="px-3 py-2 border-b border-red-500 animate-border">Aula</th>
                        <th class="px-3 py-2 border-b border-red-500 animate-border">Periodo</th>
                        <th class="px-3 py-2 border-b border-red-500 animate-border">Materia</th>
                        <th class="px-3 py-2 border-b border-red-500 animate-border">Lunes</th>
                        <th class="px-3 py-2 border-b border-red-500 animate-border">Martes</th>
                        <th class="px-3 py-2 border-b border-red-500 animate-border">Miercoles</th>
                        <th class="px-3 py-2 border-b border-red-500 animate-border">Jueves</th>
                        <th class="px-3 py-2 border-b border-red-500 animate-border">Viernes</th>

                    </tr>
                </thead>
                <tbody id="tableBody">
                    @foreach ($Horarios as $Horario)
                        <tr class="hover:bg-gray-800 bg-transparent text-center">

   
                        <td class="px-4 py-2 border-t border-red-500 animate-border text-center">{{ $Horario->NombreAula }}</td>
                        <td class="px-4 py-2 border-t border-red-500 animate-border text-center">{{ $Horario->ClavePeriodo }}</td>
                        <td class="px-4 py-2 border-t border-red-500 animate-border text-center">{{ $Horario->NombreMateria }}</td>
                        <td class="px-4 py-2 border-t border-red-500 animate-border text-center">{{ $Horario->HoraL }}</td>
                        <td class="px-4 py-2 border-t border-red-500 animate-border text-center">{{ $Horario->HoraM }}</td>
                        <td class="px-4 py-2 border-t border-red-500 animate-border text-center">{{ $Horario->HoraMi }}</td>
                        <td class="px-4 py-2 border-t border-red-500 animate-border text-center">{{ $Horario->HoraJ }}</td>
                        <td class="px-4 py-2 border-t border-red-500 animate-border text-center">{{ $Horario->HoraV }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


    </div>

    <!-- Script de Búsqueda -->
    <script>
        document.getElementById("searchInput").addEventListener("input", function () {
            let filter = this.value.toLowerCase();
            let rows = document.querySelectorAll("#tableBody tr");

            rows.forEach(row => {
                let text = row.textContent.toLowerCase();
                row.style.display = text.includes(filter) ? "" : "none";
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
</x-docente.layout>
