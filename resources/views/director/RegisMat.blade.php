<x-director.layout>
@if (session('success'))
    <div class="alert alert-success">
        <p>{{ session('success') }}</p>
    </div>
@endif
<div class=" flex items-center posicionregisdesc ">
      
    <form class="formulario1x1" action="{{ route('RegistrarMateria') }}" method="POST" enctype="multipart/form-data">
    @csrf
            <!-- Datos de Materia -->
        

            <div class="form-group">
                <label for="Clave">Clave:</label>
                <input type="text" name="Clave" id="Clave" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="NombreMateria">Materia:</label>
                <input type="text" name="NombreMateria" id="NombreMateria" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="Tipo">Tipo:</label>
                <input  type="text" name="Tipo" id="Tipo" class="form-control" required>
            </div>

            <!-- Botón de envío -->
            <button type="submit" class="btn btn-primary">Registrar Materia</button>
        </form>
    </div>



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
                    <th class="px-1 py-1 border-b border-purple-500">Clave</th>
                    <th class="px-1 py-1 border-b border-purple-500">Materia</th>
                    <th class="px-1 py-1 border-b border-purple-500">Tipo</th>
                  
                </tr>
            </thead>
            <tbody id="tableBody">
                @foreach ($Materias as $Materia)
                    <tr class="hover:bg-gray-800 text-center">
                        <td class="px-1 py-1 border-t border-purple-500">{{ $Materia->Clave }}</td>
                        <td class="px-1 py-1 border-t border-purple-500">{{ $Materia->Materia }}</td>
                        <td class="px-1 py-1 border-t border-purple-500">{{ $Materia->Tipo }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- ✅ Paginación -->
        <div class="mt-2 text-center text-white">
            
        </div>
    </div>
</div>





    <!-- ✅ Funcionalidad de Búsqueda en Tiempo Real -->
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