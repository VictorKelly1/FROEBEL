<x-director.layout>

    <!-- ✅ Formulario Compacto de Asignación de Contacto -->
    <div class="posiciontablasmedia flex items-center justify-center bg-gray-900 p-2 mt-2 rounded-md border border-blue-500 shadow-md w-3/4 md:w-1/2 lg:w-1/3">
        <form class="w-full text-white text-xs" action="{{ route('AsignarContacto') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- 📋 Encabezado -->
            <h3 class="text-sm font-bold mb-2 text-center">Datos Personales</h3>

            <!-- 🧑 Persona -->
            <div class="mb-2">
                <label for="Persona" class="block mb-1">Persona:</label>
                <select name="idPersona" id="Persona" class="w-full px-2 py-1 rounded-md bg-gray-800 border border-blue-500 text-white" required>
                    <option value="">Seleccione</option>
                    @foreach ($Personas as $Persona)
                        <option value="{{ $Persona->idPersona }}">
                            {{ $Persona->CURP }} - {{ $Persona->Nombre }} {{ $Persona->ApellidoPaterno }} {{ $Persona->ApellidoMaterno }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- 📞 Tipo de Contacto -->
            <div class="mb-2">
                <label for="TipoContacto" class="block mb-1">Tipo de Contacto:</label>
                <select name="TipoContacto" id="TipoContacto" class="w-full px-2 py-1 rounded-md bg-gray-800 border border-blue-500 text-white" required>
                    <option value="">Seleccione</option>
                    <option value="Email">Email</option>
                    <option value="Celular">Celular</option>
                </select>
            </div>

            <!-- 📲 Valor de Contacto -->
            <div class="mb-2">
                <label for="ValorContacto" class="block mb-1">Valor de Contacto:</label>
                <input type="text" name="ValorContacto" id="ValorContacto"
                    class="w-full px-2 py-1 rounded-md bg-gray-800 border border-blue-500 text-white" required>
            </div>

            <!-- ✅ Botón de Envío -->
            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-1 rounded-md">
                Asignar Contacto
            </button>
        </form>
    </div>

    <!-- ✅ Tabla Compacta de Contactos -->
    <div class="posiciontablasbaja flex items-center justify-center bg-gray-900 p-2 mt-2 rounded-md border border-blue-500 shadow-md w-3/4 md:w-1/2 lg:w-1/3 overflow-x-auto">
        <table class="w-full text-xs text-white border-collapse border border-blue-500 rounded-md">
            <thead class="bg-blue-700 text-center">
                <tr>
                    <th class="px-1 py-1 border-b border-blue-500">Persona</th>
                    <th class="px-1 py-1 border-b border-purple-500">Tipo</th>
                    <th class="px-1 py-1 border-b border-purple-500">Contacto</th>
                </tr>
            </thead>
            <tbody id="tableBody">
                @foreach ($Contactos as $Contacto)
                    <tr class="hover:bg-gray-800 text-center">
                        <td class="px-1 py-1 border-t border-purple-500">
                            {{ $Contacto->Nombre }} {{ $Contacto->ApellidoPaterno }} {{ $Contacto->ApellidoMaterno }}
                        </td>
                        <td class="px-1 py-1 border-t border-purple-500">
                            {{ $Contacto->TipoContacto }}
                        </td>
                        <td class="px-1 py-1 border-t border-purple-500">
                            {{ $Contacto->ValorContacto }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- ✅ Paginación -->
    <div class="mt-1 text-xs text-center text-white">
        {{ $Contactos->links() }}
    </div>

</x-director.layout>
