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
                <th class="px-4 py-2 text-lg border-b border-purple-500 animate-border text-center">Género</th>
                <th class="px-4 py-2 text-lg border-b border-purple-500 animate-border text-center">Ciudad</th>
                <th class="px-4 py-2 text-lg border-b border-purple-500 animate-border text-center">Municipio</th>
                <th class="px-4 py-2 text-lg border-b border-purple-500 animate-border text-center">Código Postal</th>
                <th class="px-4 py-2 text-lg border-b border-purple-500 animate-border text-center">Colonia/Fraccionamiento</th>
                <th class="px-4 py-2 text-lg border-b border-purple-500 animate-border text-center">Calle</th>
                <th class="px-4 py-2 text-lg border-b border-purple-500 animate-border text-center">Número Exterior</th>
                <th class="px-4 py-2 text-lg border-b border-purple-500 animate-border text-center">Estado Civil</th>
                <th class="px-4 py-2 text-lg border-b border-purple-500 animate-border text-center">Nacionalidad</th>
                <th class="px-4 py-2 text-lg border-b border-purple-500 animate-border text-center">Foto</th>
                <th class="px-4 py-2 text-lg border-b border-purple-500 animate-border text-center">NoINE</th>
                <th class="px-4 py-2 text-lg border-b border-purple-500 animate-border text-center">RFC</th>
                <th class="px-4 py-2 text-lg border-b border-purple-500 animate-border text-center">Lugar de Trabajo</th>
                    
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody id="tableBody">
                @foreach($Tutores as $idTutor)
                    <td>
                    <td class="px-4 py-2 border-t border-purple-500 animate-border">{{ $Tutor->Nombre }}</td>
                    <td class="px-4 py-2 border-t border-purple-500 animate-border">{{ $Tutor->ApellidoPaterno }}</td>
                    <td class="px-4 py-2 border-t border-purple-500 animate-border">{{ $Tutor->ApellidoMaterno }}</td>
                    <td class="px-4 py-2 border-t border-purple-500 animate-border">{{ $Tutor->CURP }}</td>
                    <td class="px-4 py-2 border-t border-purple-500 animate-border">{{ $Tutor->FechaNacimiento }}</td>
                    <td class="px-4 py-2 border-t border-purple-500 animate-border">{{ $Tutor->Genero }}</td>
                    <td class="px-4 py-2 border-t border-purple-500 animate-border">{{ $Tutor->Ciudad }}</td>
                    <td class="px-4 py-2 border-t border-purple-500 animate-border">{{ $Tutor->Municipio }}</td>
                    <td class="px-4 py-2 border-t border-purple-500 animate-border">{{ $Tutor->CodigoPostal }}</td>
                    <td class="px-4 py-2 border-t border-purple-500 animate-border">{{ $Tutor->ColFrac }}</td>
                    <td class="px-4 py-2 border-t border-purple-500 animate-border">{{ $Tutor->Calle }}</td>
                    <td class="px-4 py-2 border-t border-purple-500 animate-border">{{ $Tutor->NumeroExterior }}</td>
                    <td class="px-4 py-2 border-t border-purple-500 animate-border">{{ $Tutor->EstadoCivil }}</td>
                    <td class="px-4 py-2 border-t border-purple-500 animate-border">{{ $Tutor->Nacionalidad }}</td>
                    <td class="px-4 py-2 border-t border-purple-500 animate-border">{{ $Tutor->Foto }}</td>
                    <td class="px-4 py-2 border-t border-purple-500 animate-border">{{ $Tutor->NoINE }}</td>
                    <td class="px-4 py-2 border-t border-purple-500 animate-border">{{ $Tutor->RFC }}</td>
                    <td class="px-4 py-2 border-t border-purple-500 animate-border">{{ $Tutor->LugarTrabajo }}</td>                     
                    <td class="px-4 py-2 border-t border-purple-500 animate-border">                    
                            <form action="/VistaEditarTutor/{{ $Tutor->$idTutor }}" method="GET">
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
