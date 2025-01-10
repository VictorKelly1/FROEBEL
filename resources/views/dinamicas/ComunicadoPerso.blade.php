<x-director.layout>
    @if (!empty($Alumno))
        <div class="flex items-center justify-center py-10">
            <div class="w-full max-w-lg bg-white shadow-lg rounded-lg p-6">
                <form action="{{ route('ComunicadoPersonal') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Encabezado -->
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">
                        Enviar correo a:
                        <span class="text-blue-600">
                            {{ $Alumno->first()->Nombre }}
                            {{ $Alumno->first()->ApellidoPaterno }}
                            {{ $Alumno->first()->ApellidoMaterno }}
                        </span>
                    </h2>

                    <!-- Campo de Título -->
                    <div class="mb-4">
                        <label for="Titulo" class="block text-gray-700 font-medium mb-2">Título:</label>
                        <input type="text" name="Titulo" id="Titulo"
                            class="w-full border border-gray-300 rounded-lg p-2 focus:ring focus:ring-blue-300"
                            required>
                    </div>

                    <!-- Campo oculto de Destinatario -->
                    <input type="hidden" name="Destinatario" value="{{ $Alumno->first()->Matricula }}">

                    <!-- Campo de Mensaje -->
                    <div class="mb-4">
                        <label for="ComunicadoPersonal" class="block text-gray-700 font-medium mb-2">Mensaje:</label>
                        <textarea name="ComunicadoPersonal" id="ComunicadoPersonal" rows="7"
                            class="w-full border border-gray-300 rounded-lg p-2 focus:ring focus:ring-blue-300" required></textarea>
                    </div>

                    <!-- Botón de Envío -->
                    <button type="submit"
                        class="w-full bg-blue-600 text-white font-medium py-2 rounded-lg hover:bg-blue-700 transition">
                        Enviar Correo
                    </button>
                </form>
            </div>
        </div>
    @else
        <div class="flex items-center justify-center py-10">
            <div class="text-center text-gray-700">
                <p class="text-lg font-medium">⚠️ No se encontraron datos para mostrar.</p>
            </div>
        </div>
    @endif
</x-director.layout>
