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
                    <th>Carrera</th>
                    <th>FechaIngreso</th>
                    <th>Estado</th>
                    <th>RFC</th>
                    <th>NoINE</th>
                    <th>Sueldo</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($Docentes as $Docente)
                    <tr>
                        <td>{{ $Docente->Nombre }}</td>
                        <td>{{ $Docente->ApellidoPaterno }}</td>
                        <td>{{ $Docente->ApellidoMaterno }}</td>
                        <td>{{ $Docente->CURP }}</td>
                        <td>{{ $Docente->FechaNacimiento }}</td>
                        <td>{{ $Docente->Genero }}</td>
                        <td>{{ $Docente->Ciudad }}</td>
                        <td>{{ $Docente->Municipio }}</td>
                        <td>{{ $Docente->CodigoPostal }}</td>
                        <td>{{ $Docente->ColFrac }}</td>
                        <td>{{ $Docente->Calle }}</td>
                        <td>{{ $Docente->NumeroExterior }}</td>
                        <td>{{ $Docente->EstadoCivil }}</td>
                        <td>{{ $Docente->Nacionalidad }}</td>
                        <td>{{ $Docente->Foto }}</td>
                        <td>{{ $Docente->Carrera }}</td>
                        <td>{{ $Docente->FechaIngreso }}</td>
                        <td>{{ $Docente->Estado }}</td>
                        <td>{{ $Docente->RFC }}</td>
                        <td>{{ $Docente->NoINE }}</td>
                        <td>{{ $Docente->Sueldo }}</td>
                        <td>
                            <form action="/VistaEditarDocente/{{ $Docente->idDocente }}" method="GET">
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
