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
                    <th>Correo Electrónico</th>
                    <th>Matrícula</th>
                    <th>Escuela de Procedencia</th>
                    <th>Calificaciones</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($Alumnos as $alumno)
                    <tr>
                        <td>{{ $alumno->Nombre }}</td>
                        <td>{{ $alumno->ApellidoPaterno }}</td>
                        <td>{{ $alumno->ApellidoMaterno }}</td>
                        <td>{{ $alumno->CURP }}</td>
                        <td>{{ $alumno->FechaNacimiento }}</td>
                        <td>{{ $alumno->Genero }}</td>
                        <td>{{ $alumno->Ciudad }}</td>
                        <td>{{ $alumno->Municipio }}</td>
                        <td>{{ $alumno->CodigoPostal }}</td>
                        <td>{{ $alumno->ColFrac }}</td>
                        <td>{{ $alumno->Calle }}</td>
                        <td>{{ $alumno->NumeroExterior }}</td>
                        <td>{{ $alumno->EstadoCivil }}</td>
                        <td>{{ $alumno->Nacionalidad }}</td>
                        <td>{{ $alumno->Correo }}</td>
                        <td>{{ $alumno->Matricula }}</td>
                        <td>{{ $alumno->EscuelaProcede }}</td>
                        <td><button type="submit" class="btn btn-primary">Calificaciones</button></td>
                        <td>
                            <form action="/VistaEditarAlumno/{{ $alumno->idAlumno }}" method="GET">
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
