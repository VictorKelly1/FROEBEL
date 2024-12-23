<x-director.layout>
    <div class=" flex items-center justify-center bg-gray-900 p-2 posiciontablas borderAnimation overflow-x-hidden z-20">
        <div class="overflow-x-auto w-full max-w-full z-20">
            <table class="text-sm text-left text-white w-full table-auto z-20">
                <thead>
                    <tr class="bg-transparent">
                        <th class="px-4 py-2 text-lg border-b border-purple-500 animate-border text-center">Nombre</th>
                        <th class="px-4 py-2 text-lg border-b border-purple-500 animate-border text-center">Apellido
                            Paterno</th>
                        <th class="px-4 py-2 text-lg border-b border-purple-500 animate-border text-center">Apellido
                            Materno</th>
                        <th class="px-4 py-2 text-lg border-b border-purple-500 animate-border text-center">CURP</th>
                        <th class="px-4 py-2 text-lg border-b border-purple-500 animate-border text-center">Fecha de
                            Nacimiento</th>
                        <th class="px-4 py-2 text-lg border-b border-purple-500 animate-border text-center">Género</th>
                        <th class="px-4 py-2 text-lg border-b border-purple-500 animate-border text-center">Ciudad</th>
                        <th class="px-4 py-2 text-lg border-b border-purple-500 animate-border text-center">Municipio
                        </th>
                        <th class="px-4 py-2 text-lg border-b border-purple-500 animate-border text-center">Código
                            Postal</th>
                        <th class="px-4 py-2 text-lg border-b border-purple-500 animate-border text-center">
                            Colonia/Fraccionamiento</th>
                        <th class="px-4 py-2 text-lg border-b border-purple-500 animate-border text-center">Calle</th>
                        <th class="px-4 py-2 text-lg border-b border-purple-500 animate-border text-center">Número
                            Exterior</th>
                        <th class="px-4 py-2 text-lg border-b border-purple-500 animate-border text-center">Estado Civil
                        </th>
                        <th class="px-4 py-2 text-lg border-b border-purple-500 animate-border text-center">Nacionalidad
                        </th>
                        <th class="px-4 py-2 text-lg border-b border-purple-500 animate-border text-center">Foto</th>
                        <th class="px-4 py-2 text-lg border-b border-purple-500 animate-border text-center">Carrera</th>
                        <th class="px-4 py-2 text-lg border-b border-purple-500 animate-border text-center">FechaIngreso
                        </th>
                        <th class="px-4 py-2 text-lg border-b border-purple-500 animate-border text-center">Estado</th>
                        <th class="px-4 py-2 text-lg border-b border-purple-500 animate-border text-center">RFC</th>
                        <th class="px-4 py-2 text-lg border-b border-purple-500 animate-border text-center">NoINE</th>
                        <th class="px-4 py-2 text-lg border-b border-purple-500 animate-border text-center">Sueldo</th>
                        <th class="px-4 py-2 text-lg border-b border-purple-500 animate-border text-center">Editar</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    @foreach ($Docentes as $Docente)
                        <tr class="hover:bg-gray-800 bg-transparent">
                            <td class="px-6 py-4 border-t border-purple-500 animate-border text-center">
                                {{ $Docente->Nombre }}</td>
                            <td class="px-6 py-4 border-t border-purple-500 animate-border text-center">
                                {{ $Docente->ApellidoPaterno }}</td>
                            <td class="px-6 py-4 border-t border-purple-500 animate-border text-center">
                                {{ $Docente->ApellidoMaterno }}</td>
                            <td class="px-6 py-4 border-t border-purple-500 animate-border text-center">
                                {{ $Docente->CURP }}</td>
                            <td class="px-6 py-4 border-t border-purple-500 animate-border text-center">
                                {{ $Docente->FechaNacimiento }}</td>
                            <td class="px-6 py-4 border-t border-purple-500 animate-border text-center">
                                {{ $Docente->Genero }}</td>
                            <td class="px-6 py-4 border-t border-purple-500 animate-border text-center">
                                {{ $Docente->Ciudad }}</td>
                            <td class="px-6 py-4 border-t border-purple-500 animate-border text-center">
                                {{ $Docente->Municipio }}</td>
                            <td class="px-6 py-4 border-t border-purple-500 animate-border text-center">
                                {{ $Docente->CodigoPostal }}</td>
                            <td class="px-6 py-4 border-t border-purple-500 animate-border text-center">
                                {{ $Docente->ColFrac }}</td>
                            <td class="px-6 py-4 border-t border-purple-500 animate-border text-center">
                                {{ $Docente->Calle }}</td>
                            <td class="px-6 py-4 border-t border-purple-500 animate-border text-center">
                                {{ $Docente->NumeroExterior }}</td>
                            <td class="px-6 py-4 border-t border-purple-500 animate-border text-center">
                                {{ $Docente->EstadoCivil }}</td>
                            <td class="px-6 py-4 border-t border-purple-500 animate-border text-center">
                                {{ $Docente->Nacionalidad }}</td>
                            <td class="px-6 py-4 border-t border-purple-500 animate-border text-center">
                                {{ $Docente->Foto }}</td>
                            <td class="px-6 py-4 border-t border-purple-500 animate-border text-center">
                                {{ $Docente->Carrera }}</td>
                            <td class="px-6 py-4 border-t border-purple-500 animate-border text-center">
                                {{ $Docente->FechaIngreso }}</td>
                            <td class="px-6 py-4 border-t border-purple-500 animate-border text-center">
                                {{ $Docente->Estado }}</td>
                            <td class="px-6 py-4 border-t border-purple-500 animate-border text-center">
                                {{ $Docente->RFC }}</td>
                            <td class="px-6 py-4 border-t border-purple-500 animate-border text-center">
                                {{ $Docente->NoINE }}</td>
                            <td class="px-6 py-4 border-t border-purple-500 animate-border text-center">
                                {{ $Docente->Sueldo }}</td>
                            <td class="px-6 py-4 border-t border-purple-500 animate-border text-center">
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
