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
                @foreach ($Coordinadores as $Coordinador)
                <tr class="hover:bg-gray-800 bg-transparent">
                <td class="px-6 py-4 border-t border-purple-500 animate-border text-center">{{ $Coordinador->Nombre }}</td>
                <td class="px-6 py-4 border-t border-purple-500 animate-border text-center">{{ $Coordinador->ApellidoPaterno }}</td>
                <td class="px-6 py-4 border-t border-purple-500 animate-border text-center">{{ $Coordinador->ApellidoMaterno }}</td>
                <td class="px-6 py-4 border-t border-purple-500 animate-border text-center">{{ $Coordinador->CURP }}</td>
                <td class="px-6 py-4 border-t border-purple-500 animate-border text-center">{{ $Coordinador->FechaNacimiento }}</td>

                <td class="px-6 py-4 border-t border-purple-500 animate-border text-center">
                            <form action="/VistaEditarCoordi/{{ $Coordinador->idCoordinador }}" method="GET">
                                @csrf
                                <button type="submit" class="btn btn-primary">Edición</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-director.layout>
