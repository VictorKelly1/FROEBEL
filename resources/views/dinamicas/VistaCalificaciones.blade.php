

<x-director.layout>

<div posicion1 id="app">
    <!-- Input para buscar al alumno -->
    <label for="search">Alumno:</label>
    <input
        type="text"
        id="search"
        placeholder="Buscar alumno..."
        oninput="filterTable(event)"
    />

    <!-- Botón para imprimir la tabla -->
    <button posicion2 id="btn-imprimir" onclick="printTable()">🖨️ IMPRIMIR</button>

    <div class="flex items-center justify-center bg-gray-900 p-2 posiciontablas borderAnimation ">                          
                <div class="overflow-x-auto">
                    <table class=" text-xs text-left text-white">
                        <thead>
                        <tr class="bg-transparent">
                           
                            <th class="px-2 py-1 border-b border-purple-500 animate-border">Materias</th>
                            <th class="px-2 py-1 border-b border-purple-500 animate-border">Parcial 1</th>
                            <th class="px-2 py-1 border-b border-purple-500 animate-border">Parcial 2</th>
                            <th class="px-2 py-1 border-b border-purple-500 animate-border">Parcial 3</th>
                            <th class="px-2 py-1 border-b border-purple-500 animate-border">Parcial 4</th>
                            <th class="px-2 py-1 border-b border-purple-500 animate-border">Parcial 5</th>
                            </tr>
                        </thead>
                     <tbody id="tableBody">
                        @foreach($VistaCalif as $VistaCalificaciones)
                        <tr class="hover:bg-gray-800 bg-transparent">

                        
                        <td class="px-2 py-1 border-t border-purple-500 animate-border">{{ $VistaCalificaciones->idMateria }}</td>
                        <td class="px-2 py-1 border-t border-purple-500 animate-border">{{ $VistaCalificaciones->Parcial1 }}</td>
                        <td class="px-2 py-1 border-t border-purple-500 animate-border">{{ $VistaCalificaciones->Parcial2 }}</td>
                        <td class="px-2 py-1 border-t border-purple-500 animate-border">{{ $VistaCalificaciones->Parcial3 }}</td>
                        <td class="px-2 py-1 border-t border-purple-500 animate-border">{{ $VistaCalificaciones->Parcial4 }}</td>
                        <td class="px-2 py-1 border-t border-purple-500 animate-border">{{ $VistaCalificaciones->Parcial5 }}</td>



                        <td class="px-2 py-1 border-t border-purple-500 animate-border text-center">
                                <form action="/VistaCalificaciones/{{ $VistaCalif->idVistaCalif }}" method="GET">
                                    <button class="bg-purple-600 text-white px-2 py-1 rounded hover:bg-purple-700">Eliminar</button>
                                </form>

                        </tr>
                        @endforeach
                    
                     </tbody>
                  </table>
               </div>
            </div>

            </x-director.layout>





