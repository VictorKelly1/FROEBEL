<x-director.layout>


        <div class=" flex items-center posiciontablas">


            <form class="formulario" action="{{ route('RegistrarConceptos') }}" method="POST"
                enctype="multipart/form-data">
                @csrf

                <!-- Datos de Persona -->

                <div class="form-group">
                    <label for="Nombre">Nombre:</label>
                    <input type="text" name="Nombre" id="Nombre" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="Descripcion">Descripcion:</label>
                    <input type="text" name="Descripcion" id="Descripcion" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="Para">Tipo de transacción para el que está dedicado este concepto</label>
                    <select name="Para" id="Para" class="form-control" required>
                        <option value="">Seleccione</option>
                        <option value="Ventas">Ventas </option>
                        <option value="Compras">Compras</option>
                        <option value="Pagos">Pagos/Ingresos</option>
                    </select>
                </div>


                <!-- Botón de envío -->
                <button type="submit" class="btn btn-primary">Registrar Concepto</button>
            </form>
        </div>
        <div
            class="posiciontablasbaja flex items-center justify-center bg-gray-900 p-6 mt-6 rounded-md border border-blue-500 shadow-md w-3/4 sm:w-2/3 lg:w-1/2 overflow-x-auto">
            <table class="w-full text-lg text-white border-collapse border border-blue-500 rounded-md">
                <thead class="bg-blue-700 text-center">
                    <tr>
                        <th class="px-4 py-2 border-b border-blue-500">Nombre</th>
                        <th class="px-4 py-2 border-b border-blue-500">Descripcion</th>
                        <th class="px-4 py-2 border-b border-blue-500">Para</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    @foreach ($Conceptos as $Concepto)
                        <tr class="hover:bg-gray-800 text-center">
                            <td class="px-4 py-2 border-t border-blue-500">
                                {{ $Concepto->Nombre }}
                            </td>
                            <td class="px-4 py-2 border-t border-blue-500">
                                {{ $Concepto->Descripcion }}
                            </td>
                            <td class="px-4 py-2 border-t border-blue-500">
                                {{ $Concepto->Para }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </x-director.layout>
