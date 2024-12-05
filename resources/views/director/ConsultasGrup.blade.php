<x-director.layout>
<div class="flex items-center justify-center bg-gray-900 p-2 posiciontablas borderAnimation">
        <div class="overflow-x-auto">
            <table class=" text-xs text-left text-white">
                <thead>
            <tr class="bg-transparent">
            <th class="px-2 py-1 border-b border-purple-500 animate-border">Clave</th>  
            <th class="px-2 py-1 border-b border-purple-500 animate-border">Grado</th> 
            <th class="px-2 py-1 border-b border-purple-500 animate-border">Paquete</th>   
            <th class="px-2 py-1 border-b border-purple-500 animate-border">Nivel Academico</th>       
            <th class="px-2 py-1 border-b border-purple-500 animate-border">Fecha de Inicio</th>
            <th class="px-2 py-1 border-b border-purple-500 animate-border">Fecha de Fin</th>
            <th class="px-2 py-1 border-b border-purple-500 animate-border">Tipo</th>
            <th class="px-2 py-1 border-b border-purple-500 animate-border">Cantidad de Alumnos</th>

            <th class="px-2 py-1 border-b border-purple-500 animate-border">Editar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($Grupos as $Grupo)
                <tr class="hover:bg-gray-800 bg-transparent">
                <td class="px-2 py-1 border-t border-purple-500 animate-border">{{ $Grupo->Clave }}</td>     
                <td class="px-2 py-1 border-t border-purple-500 animate-border">{{ $Grupo->NombreGrado }}</td>
                <td class="px-2 py-1 border-t border-purple-500 animate-border">{{ $Grupo->Paquete }}</td>
                <td class="px-2 py-1 border-t border-purple-500 animate-border">{{ $Grupo->NivelAcademico }}</td>
                <td class="px-2 py-1 border-t border-purple-500 animate-border">{{ $Grupo->FechaInicio }}</td>
                <td class="px-2 py-1 border-t border-purple-500 animate-border">{{ $Grupo->FechaFin }}</td>
                <td class="px-2 py-1 border-t border-purple-500 animate-border">{{ $Grupo->Tipo }}</td>            
                <td class="px-2 py-1 border-t border-purple-500 animate-border">{{ $Grupo->CantidadAlumnos }}</td>
                <td class="px-2 py-1 border-t border-purple-500 animate-border">
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
