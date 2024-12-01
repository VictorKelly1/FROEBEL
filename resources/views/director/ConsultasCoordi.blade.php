<x-director.layout>
    <div class="flex items-center led2 posicionsregisalum">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>CURP</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Género</th>
                    <th>Ciudad</th>
                    <th>Municipio</th>
                    <th>Código Postal</th>
                    <th>Colonia/Fraccionamiento</th>
                    <th>Calle</th>
                    <th>Número Exterior</th>
                    <th>Estado Civil</th>
                    <th>Nacionalidad</th>
                    <th>Foto</th>
                    <th>Estado</th>
                    <th>RFC</th>
                    <th>NoINE</th>
                    <th>Sueldo</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($Coordinadores as $Coordinador)
                    <tr>
                        <td>{{ $Coordinador->Nombre }}</td>
                        <td>{{ $Coordinador->ApellidoPaterno }}</td>
                        <td>{{ $Coordinador->ApellidoMaterno }}</td>
                        <td>{{ $Coordinador->CURP }}</td>
                        <td>{{ $Coordinador->FechaNacimiento }}</td>
                        <td>{{ $Coordinador->Genero }}</td>
                        <td>{{ $Coordinador->Ciudad }}</td>
                        <td>{{ $Coordinador->Municipio }}</td>
                        <td>{{ $Coordinador->CodigoPostal }}</td>
                        <td>{{ $Coordinador->ColFrac }}</td>
                        <td>{{ $Coordinador->Calle }}</td>
                        <td>{{ $Coordinador->NumeroExterior }}</td>
                        <td>{{ $Coordinador->EstadoCivil }}</td>
                        <td>{{ $Coordinador->Nacionalidad }}</td>
                        <td>{{ $Coordinador->Foto }}</td>
                        <td>{{ $Coordinador->Estado }}</td>
                        <td>{{ $Coordinador->RFC }}</td>
                        <td>{{ $Coordinador->NoINE }}</td>
                        <td>{{ $Coordinador->Sueldo }}</td>
                        <td>                      
                            <form action="/VistaEditarCoordi/{{ $Coordinador->$idCoordinador }}" method="GET">
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
