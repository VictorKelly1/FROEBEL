<x-director.layout>
    <div class="flex items-center led2 posicionsregisalum">


        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Clave</th>  
                    <th>Grado</th> 
                    <th>Paquete</th>   
                    <th>Nivel Academico</th>       
                    <th>Fecha de Inicio</th>
                    <th>Fecha de Fin</th>
                    <th>Tipo</th>
                   <th>Cantidad de Alumnos</th>

                    <th>Editar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($Grupos as $Grupo)
                    <tr>
                        <td>{{ $Grupo->Clave }}</td>     
                        <td>{{ $Grupo->NombreGrado }}</td>
                        <td>{{ $Grupo->Paquete }}</td>
                        <td>{{ $Grupo->NivelAcademico }}</td>
                        <td>{{ $Grupo->FechaInicio }}</td>
                        <td>{{ $Grupo->FechaFin }}</td>
                        <td>{{ $Grupo->Tipo }}</td>            
                        <td>{{ $Grupo->CantidadAlumnos }}</td>
                        <td>
                            <form action="/VistaEditarGrupo/{{ $Grupo->idGrupo }}" method="GET">
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
