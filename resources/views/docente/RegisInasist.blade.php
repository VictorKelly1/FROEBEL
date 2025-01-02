<x-docente.layout>

    <div class="alert alert-success">
        {{ session('success') }}
    </div>

    <form action="" method="POST">
        @csrf
        <div class="flex items-center justify-center bg-gray-900 p-2 posiciontablas borderAnimation overflow-x-hidden z-30">
            <div class="overflow-x-auto w-full max-w-full z-30">
                <table class="text-sm text-left text-white w-full table-auto z-30">
                    <thead>
                        <tr class="bg-transparent">
                            <th class="px-4 py-2 text-lg border-b border-purple-500 animate-border text-center">Asistencia</th>
                            <th class="px-4 py-2 text-lg border-b border-purple-500 animate-border text-center">Persona</th>
                            <th class="px-4 py-2 text-lg border-b border-purple-500 animate-border text-center">Nombre</th>
                            <th class="px-4 py-2 text-lg border-b border-purple-500 animate-border text-center">Grupo</th>
                            <th class="custom-cell px-4 py-2 text-lg border-b border-purple-500 animate-border text-center">Fecha</th>
                            <th class="px-4 py-2 text-lg border-b border-purple-500 animate-border text-center">Motivo</th>

                        </tr>
                    </thead>
                    <tbody id="tableBody">
                        @foreach ($Inasistencias as $Inasistencia)
                            <tr class="hover:bg-gray-800 bg-transparent">
                                <!-- Checkbox -->
                                <td class="px-4 py-2 border-t border-purple-500 animate-border text-center">
                                    <input type="checkbox" name="asistencia[]" value="{{ $Inasistencia->id }}" class="form-checkbox h-5 w-5 text-blue-600">
                                </td>
                                <!-- Foto -->
                                <td class="px-6 py-4 border-t border-purple-500 animate-border text-center">
                                    @if ($Inasistencia->Foto)
                                        <img src="{{ asset('fotos/' . $Inasistencia->Foto) }}" alt="Usuario"
                                            class="w-28 h-28 rounded-full">
                                    @else
                                        <span class="text-gray-500">Sin foto</span>
                                    @endif
                                </td>
                                <!-- Nombre Completo -->
                                <td class="custom-cell px-4 py-2 border-t border-purple-500 animate-border text-center">
                                    {{ $Inasistencia->Nombre }} {{ $Inasistencia->ApellidoPaterno }} {{ $Inasistencia->ApellidoMaterno }}
                                </td>
                                <!-- Grupo -->
                                <td class="px-4 py-2 border-t border-purple-500 animate-border text-center">
                                    {{ $Inasistencia->Grupo }}
                                </td>
                                <!-- Fecha -->
                                <td class="px-4 py-2 border-t border-purple-500 animate-border text-center">
                                    {{ $Inasistencia->Fecha }}
                                </td>
                        
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="flex justify-center mt-4">
            <button type="submit"
                class="bg-green-500 text-white px-6 py-3 rounded-lg transition-all duration-500 hover:bg-green-700 hover:-translate-y-1 hover:shadow-lg">
                Enviar Lista de Asistencia
            </button>
        </div>
    </form>

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

        /* Estilo Checkbox */
        .form-checkbox {
            cursor: pointer;
        }
    </style>

</x-docente.layout>
