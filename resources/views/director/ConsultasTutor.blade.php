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
                    <th>NoINE</th>
                    <th>RFC</th>
                    <th>Lugar de Trabajo</th>
                    
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($Tutores as $idTutor)
                    <tr>
                        <td>{{ $Tutor->Nombre }}</td>
                        <td>{{ $Tutor->ApellidoPaterno }}</td>
                        <td>{{ $Tutor->ApellidoMaterno }}</td>
                        <td>{{ $Tutor->CURP }}</td>
                        <td>{{ $Tutor->FechaNacimiento }}</td>
                        <td>{{ $Tutor->Genero }}</td>
                        <td>{{ $Tutor->Ciudad }}</td>
                        <td>{{ $Tutor->Municipio }}</td>
                        <td>{{ $Tutor->CodigoPostal }}</td>
                        <td>{{ $Tutor->ColFrac }}</td>
                        <td>{{ $Tutor->Calle }}</td>
                        <td>{{ $Tutor->NumeroExterior }}</td>
                        <td>{{ $Tutor->EstadoCivil }}</td>
                        <td>{{ $Tutor->Nacionalidad }}</td>
                        <td>{{ $Tutor->Foto }}</td>
                        <td>{{ $Tutor->NoINE }}</td>
                        <td>{{ $Tutor->RFC }}</td>
                        <td>{{ $Tutor->LugarTrabajo }}</td>                     
                        <td>                      
                            <form action="/VistaEditarTutor/{{ $Tutor->$idTutor }}" method="GET">
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
