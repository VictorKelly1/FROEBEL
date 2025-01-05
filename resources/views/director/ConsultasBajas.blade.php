<x-director.layout>
   
    <!-- ✅ Mensaje de Éxito -->
    @if (session('success'))
    <div class="alert alert-success">
        <p>{{ session('success') }}</p>
    </div>
@endif

    <div class="flex items-center justify-center bg-gray-900 p-2 posiciontablas borderAnimation overflow-x-hidden z-40">
        <div class="overflow-x-auto w-full max-w-full z-40">

            <table class="text-sm text-left text-white w-full table-auto z-40">
                <thead>

                <form class="" action="{{ route('ListaBajas') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-4 posicion1">
                <input type="text" id="searchInput" class="px-4 py-2 text-white rounded" placeholder="Deceas">
               </div>


               
               <button
               class="bg-red-600 text-white px-4 py-3 rounded-lg transition-all duration-500 hover:bg-purple-600 hover:-translate-y-2 hover:shadow-2xl">Buscar
              </button>

               </form>


                    <tr class="bg-transparent">
                        <th class="px-4 py-2 text-lg border-b border-purple-500 animate-border text-center">Foto del
                            Alumno</th>
                        <th class="px-4 py-2 text-lg border-b border-purple-500 animate-border text-center">Matrícula
                        </th>
                        <th class="custom-cell px-4 py-2 text-lg border-b border-purple-500 animate-border text-center">
                            Nombre</th>
                        <th class="px-4 py-2 text-lg border-b border-purple-500 animate-border text-center">CURP</th>
                        <th class="px-4 py-2 text-lg border-b border-purple-500 animate-border text-center">
                            Fecha Ingreso</th>
                        <th class="px-4 py-2 text-lg border-b border-purple-500 animate-border text-center">Estado
                        </th>
                        
                </thead>
                <tbody id="tableBody">
                    @foreach ($Faltantes as $Faltante)
                        <tr class="hover:bg-gray-800 bg-transparent">
                            <!-- Foto -->
                            <td class="px-6 py-4 border-t border-purple-500 animate-border text-center">
                                @if ($Faltante->Foto)
                                    <img src="{{ asset('fotos/' . $alumno->Foto) }}" alt="Usuario"
                                        class="w-28 h-28 rounded-full">
                                @else
                                    <span class="text-gray-500">Sin foto</span>
                                @endif
                            </td>

                            <!-- Matrícula -->
                            <td class="px-4 py-2 border-t border-purple-500 animate-border">{{ $Faltante->Matricula }}</td>

                            <!-- Nombre -->
                            <td class="custom-cell px-4 py-2 border-t border-purple-500 animate-border text-center">
                                {{ $Faltante->Nombre }} {{ $Faltante->ApellidoPaterno }} {{ $Faltante->ApellidoMaterno }}</td>

                            <!-- CURP -->
                            <td class="px-4 py-2 border-t border-purple-500 animate-border">{{ $Faltante->CURP }}</td>

                            <!-- FechaInicio -->
                            <td class="px-4 py-2 border-t border-purple-500 animate-border">{{ $Faltante->FechaIngreso }}</td>


                            <!-- Estado -->
                            <td class="px-4 py-2 border-t border-purple-500 animate-border">{{ $Faltante->Estado }}</td>
                    

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
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
