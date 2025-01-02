<x-docente.layout>


    <div class="alert alert-success">
        {{ session('success') }}
    </div>

    <div class=" flex items-center justify-center bg-gray-900 p-2 posiciontablas borderAnimation overflow-x-hidden z-30">
        <div class="overflow-x-auto w-full max-w-full z-30">
            <table class="text-sm text-left text-white w-full table-auto z-30">
                <thead>
                <div class="relative tamañobuscadorsidebar">


</div>

                    <tr class="bg-transparent">
                        <th class="px-4 py-2 text-lg border-b border-purple-500 animate-border text-center">Persona:</th>
                        <th class="px-4 py-2 text-lg border-b border-purple-500 animate-border text-center">Nombre:</th>
                        <th class="px-4 py-2 text-lg border-b border-purple-500 animate-border text-center"> Grupo:</th>
                        <th class="custom-cell px-4 py-2 text-lg border-b border-purple-500 animate-border text-center">Fecha:</th>
                        <th class="px-4 py-2 text-lg border-b border-purple-500 animate-border text-center">Motivo</th>
                        <th class="px-4 py-2 text-lg border-b border-purple-500 animate-border text-center">Justificar</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    @foreach ($Inasistencias as $Inasistencia)
                        <tr class="hover:bg-gray-800 bg-transparent">

                            <!-- Foto -->
                            <td class="px-6 py-4 border-t border-purple-500 animate-border text-center">
                                @if ($Inasistencia->Foto)
                                    <img src="{{ asset('fotos/' . $Inasistencia->Foto) }}" alt="Usuario"
                                        class="w-28 h-28 rounded-full">
                                @else
                                    <span class="text-gray-500">Sin foto</span>
                                @endif
                            </td>
                            <td class="custom-cell px-4 py-2 border-t border-purple-500 animate-border text-center">
                                {{ $Inasistencia->Nombre }} {{ $Inasistencia->ApellidoPaterno }} {{ $Inasistencia->ApellidoMaterno }}</td>

                            <td class="px-4 py-2 border-t border-purple-500 animate-border">{{ $Inasistencia->Grupo }}</td>
                            <td class="px-4 py-2 border-t border-purple-500 animate-border">{{ $Inasistencia->Fecha }}</td>
                            <td class="px-4 py-2 border-t border-purple-500 animate-border">{{ $Inasistencia->Motivo }}</td>
                            <td class="px-4 py-2 border-t border-purple-500 animate-border text-center">
                                <form action="" method="GET">
                                    @csrf
                                    <button
                                        class="bg-blue-600 text-white px-4 py-3 rounded-lg transition-all duration-500 hover:bg-purple-600 hover:-translate-y-2 hover:shadow-2xl">
                                        Justificar
                                    </button>
                                </form>
                            </td>

                        </tr>
                    @endforeach
                   
                </tbody>
            </table>

        </div>
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

    
</x-docente.layout>
