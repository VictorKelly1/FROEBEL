<x-director.layout>
<div class=" flex items-center justify-center bg-gray-900 p-2 posiciontablas borderAnimation overflow-x-hidden z-20">
        <div class="overflow-x-auto w-full max-w-full z-20">
            <table class="text-sm text-left text-white w-full table-auto z-20">
            <thead>
            <tr class="bg-transparent">
            <th class="px-4 py-2 text-lg border-b border-purple-500 animate-border text-center">Nombre</th>
            <th class="px-4 py-2 text-lg border-b border-purple-500 animate-border text-center">Apellido Paterno</th>
            <th class="px-4 py-2 text-lg border-b border-purple-500 animate-border text-center">Apellido Materno</th>
            <th class="px-4 py-2 text-lg border-b border-purple-500 animate-border text-center">CURP</th>
            <th class="px-4 py-2 text-lg border-b border-purple-500 animate-border text-center">Fecha de Nacimiento</th>

            <th class="px-4 py-2 text-lg border-b border-purple-500 animate-border text-center">Editar</th>
                </tr>
            </thead>
            <tbody id="tableBody">
                @foreach($Administradores as $Administrador)
                <tr class="hover:bg-gray-800 bg-transparent">
                <td class="px-4 py-2 border-t border-purple-500 animate-border">{{ $Administrador->Nombre }}</td>
                <td class="px-4 py-2 border-t border-purple-500 animate-border">{{ $Administrador->ApellidoPaterno }}</td>
                <td class="px-4 py-2 border-t border-purple-500 animate-border">{{ $Administrador->ApellidoMaterno }}</td>
                <td class="px-4 py-2 border-t border-purple-500 animate-border">{{ $Administrador->CURP }}</td>
                <td class="px-4 py-2 border-t border-purple-500 animate-border">{{ $Administrador->FechaNacimiento }}</td>
   
                <td class="px-4 py-2 border-t border-purple-500 animate-border">                      
                            <form action="/VistaEditarAdmin/{{ $Administrador->$idAdministrador }}" method="GET">
                              @csrf
                            <button type="submit" class="btn btn-primary">Edición</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
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
