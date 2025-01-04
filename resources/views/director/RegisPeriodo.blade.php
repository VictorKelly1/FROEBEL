<x-director.layout>


    <div class=" flex items-center posicionregisdesc">


        <form class="formulario1x1" action="{{ route('RegistrarDescuento') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Datos de Persona -->

            <div class="form-group">
                <label for="Clave">Clave:</label>
                <input type="text" name="Clave" id="Clave" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="FechaInicio">Fecha de Inicio:</label>
                <input type="date" name="FechaInicio" id="FechaInicio" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="FechaFin">Fecha de Fin:</label>
                <input type="date" name="FechaFin" id="FechaFin" class="form-control" required>
            </div>

            <div class="form-group">

                <select name="Tipo" id="Tipo" class="form-control" required>
                    <option value="">Seleccione</option>
                    <option value="Colegiatura">Colegiatura </option>
                    <option value="Inscripcion">Inscripcion</option>
                    <option value="Extraescolar">Extraescolar</option>
                    <option value="Verano">Verano</option>
                </select>
            </div>


            <!-- Botón de envío -->
            <button type="submit" class="btn btn-primary">Registrar Periodo</button>
        </form>
    </div>
    <div
        class="posiciontablaregisdesc flex items-center justify-center bg-gray-900 p-6 mt-6 rounded-md border border-blue-500 shadow-md w-3/4 sm:w-2/3 lg:w-1/2 overflow-x-auto">
        <table class="w-full table-auto text-lg text-white border-collapse border border-blue-500 rounded-md">
            <thead class="bg-blue-700 text-center">
                <tr>
                    <th class="px-4 py-2 border-b border-blue-500">Clave</th>
                    <th class="px-4 py-2 border-b border-blue-500">Fecha de Inicio</th>
                    <th class="px-4 py-2 border-b border-blue-500">Fecha de Fin</th>
                    <th class="px-4 py-2 border-b border-blue-500">Tipo</th>
                </tr>
            </thead>
            <tbody id="tableBody">
                @foreach ($Periodos as $Periodo)
                    <tr class="hover:bg-gray-800 text-center">
                        <td class="px-4 py-2 border-t border-blue-500">
                            {{ $Periodo->Clave }}
                        </td>
                        <td class="px-4 py-2 border-t border-blue-500">
                            {{ $Periodo->FechaInicio }}
                        </td>
                        <td class="px-4 py-2 border-t border-blue-500">
                            {{ $Periodo->FechaFin }}
                        </td>
                        <td class="px-4 py-2 border-t border-blue-500">
                            {{ $Periodo->Tipo }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</x-director.layout>
