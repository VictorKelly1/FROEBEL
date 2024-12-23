<x-director.layout>

    


        <form class="posiciontablas" action="{{ route('AsignarContacto') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Datos de Persona -->
            <h3>Datos Personales</h3>

            <div class="form-group ">
                <label for="Persona">Persona:</label>
                <select name="idPersona" id="Persona" class="form-control" required>
                    <option value="">Seleccione</option>
                    @foreach ($Personas as $Persona)
                        <option value="{{ $Persona->idPersona }}">{{ $Persona->CURP }} {{ $Persona->Nombre }}
                            {{ $Persona->ApellidoPaterno }} {{ $Persona->ApellidoMaterno }}</option>
                    @endforeach

                </select>
            </div>

            <div class="form-group ">
                <label for="TipoContacto">Tipo de Contacto:</label>
                <select name="TipoContacto" id="TipoContacto" class="form-control" required>
                    <option value="">Seleccione</option>
                    <option value="Email">Email</option>
                    <option value="Celular">Celular</option>
                </select>
            </div>

            <div class="form-group">
                <label for="ValorContacto">ValorContacto:</label>
                <input type="text" name="ValorContacto" id="ValorContacto" class="form-control" required>
            </div>

            <!-- Botón de envío -->
            <button type="submit" class="btn btn-primary">Asignar Contacto </button>
        </form>
  

    <div class="flex items-center justify-center bg-gray-900 p-2 posiciontablasasig borderAnimation">
        <div class="overflow-x-auto">
            <table class=" text-xs text-left text-white">
                <thead>
                    <tr class="bg-transparent">
                        <th class="px-2 py-1 border-b border-purple-500 animate-border">Persona</th>
                        <th class="px-2 py-1 border-b border-purple-500 animate-border">Tipo</th>
                        <th class="px-2 py-1 border-b border-purple-500 animate-border">Contacto</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Contactos as $Contacto)
                        <tr class="hover:bg-gray-800 bg-transparent">
                            <td class="px-2 py-1 border-t border-purple-500 animate-border">
                                {{ $Contacto->Nombre }}
                                {{ $Contacto->ApellidoPaterno }}
                                {{ $Contacto->ApellidoMaterno }}
                            </td>
                            <td class="px-2 py-1 border-t border-purple-500 animate-border">
                                {{ $Contacto->TipoContacto }}
                            </td>
                            <td class="px-2 py-1 border-t border-purple-500 animate-border">
                                {{ $Contacto->ValorContacto }}</td>

                        </tr>
                    @endforeach
                    {{ $Contactos->links() }}
                </tbody>
            </table>
        </div>
    </div>

</x-director.layout>
