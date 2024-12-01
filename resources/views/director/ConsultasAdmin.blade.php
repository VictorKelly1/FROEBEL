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
                @foreach($Administradores as $Administrador)
                    <tr>
                        <td>{{ $Administrador->Nombre }}</td>
                        <td>{{ $Administrador->ApellidoPaterno }}</td>
                        <td>{{ $Administrador->ApellidoMaterno }}</td>
                        <td>{{ $Administrador->CURP }}</td>
                        <td>{{ $Administrador->FechaNacimiento }}</td>
                        <td>{{ $Administrador->Genero }}</td>
                        <td>{{ $Administrador->Ciudad }}</td>
                        <td>{{ $Administrador->Municipio }}</td>
                        <td>{{ $Administrador->CodigoPostal }}</td>
                        <td>{{ $Administrador->ColFrac }}</td>
                        <td>{{ $Administrador->Calle }}</td>
                        <td>{{ $Administrador->NumeroExterior }}</td>
                        <td>{{ $Administrador->EstadoCivil }}</td>
                        <td>{{ $Administrador->Nacionalidad }}</td>
                        <td>{{ $Administrador->Foto }}</td>
                        <td>{{ $Administrador->Estado }}</td>
                        <td>{{ $Administrador->RFC }}</td>
                        <td>{{ $Administrador->NoINE }}</td>
                        <td>{{ $Administrador->Sueldo }}</td>
                        <td>                      
                            <form action="/VistaEditarAdmin/{{ $Administrador->$idAdministrador }}" method="GET">
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
