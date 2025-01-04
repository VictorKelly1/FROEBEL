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
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Apellido
                            Paterno</th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Apellido
                            Materno</th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">CURP</th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Fecha de
                            Nacimiento</th>

                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Editar</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    @foreach ($Administradores as $Administrador)
                        <tr>
                        <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">{{ $Administrador->Nombre }}
                            </td>
                            <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">
                                {{ $Administrador->ApellidoPaterno }}</td>
                                <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">
                                {{ $Administrador->ApellidoMaterno }}</td>
                                <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">{{ $Administrador->CURP }}
                            </td>
                            <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">
                                {{ $Administrador->FechaNacimiento }}</td>

                                <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">
                                <form action="/VistaEditarAdmin/{{ $Administrador->$idAdministrador }}" method="GET">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Edición</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    {{ $Administradores->links() }}
                </tbody>
            </table>
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

















</x-director.layout>
