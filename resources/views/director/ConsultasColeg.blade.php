<x-director.layout>





<div class="posiciontablas relative mb-4 flex items-center gap-2">
    <!-- Selector de columna -->
    <select id="columnSelect" class="p-2 bg-gray-800 text-white rounded-md">
        <option value="Nombre">Nombre</option>
        <option value="Clave">Clave</option>
        <option value="FechaInicio">Inicio de Periodo</option>
        <option value="FechaFin">Fin de Periodo</option>
        <option value="MetodoPago">Metodo de Pago</option>
        <option value="CuentaRecibido">Cuenta Recibido</option>
        <option value="Monto">Monto Total</option>
        <option value="created_at">Día que se realizó</option>
    </select>

    <!-- Input de búsqueda -->
    <input type="search" id="searchInput" placeholder="Buscar..." 
        class="buscador-input posiciontablas" 
        style="width: 550px; height: 50px; padding: 8px; background-color: #2d2d2d; color: white; border-radius: 5px;">
</div>







        <div class="overflow-x-auto posiciontablas">
            <table class=" text-xs text-left text-white">
                <thead>
                    <tr class="bg-transparent">
                        <th class="px-2 py-1 border-b border-purple-500 animate-border ">Nombre</th>
                        <th class="px-2 py-1 border-b border-purple-500 animate-border ">Clave</th>
                        <th class="px-2 py-1 border-b border-purple-500 animate-border ">Inicio de Periodo</th>
                        <th class="px-2 py-1 border-b border-purple-500 animate-border ">Fin de Periodo</th>
                        <th class="px-2 py-1 border-b border-purple-500 animate-border ">Metodo de Pago</th>
                        <th class="px-2 py-1 border-b border-purple-500 animate-border ">Cuenta Recibido</th>
                        <th class="px-2 py-1 border-b border-purple-500 animate-border ">Monto Total</th>
                        <th class="px-2 py-1 border-b border-purple-500 animate-border ">Dia que se realizo</th>
                        <th class="px-2 py-1 border-b border-purple-500 animate-border">Ver mas</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Colegiaturas as $Colegiatura)
                        <tr class="hover:bg-gray-800 bg-transparent">
                            <td class="px-2 py-1 border-t border-purple-500 animate-border nombre">
                                {{ $Colegiatura->Nombre }}
                                {{ $Colegiatura->ApellidoPaterno }}
                                {{ $Colegiatura->ApellidoMaterno }}
                            </td>
                            <td class="px-2 py-1 border-t border-purple-500 animate-border clave">
                                {{ $Colegiatura->Clave }}
                            </td>
                            <td class="px-2 py-1 border-t border-purple-500 animate-border fechainicio">
                                {{ $Colegiatura->FechaInicio }}</td>
                            <td class="px-2 py-1 border-t border-purple-500 animate-border fechafin">{{ $Colegiatura->FechaFin }}
                            </td>
                            <td class="px-2 py-1 border-t border-purple-500 animate-border metodopago">
                                {{ $Colegiatura->MetodoPago }}
                            </td>
                            <td class="px-2 py-1 border-t border-purple-500 animate-border cuentarecibido">
                                {{ $Colegiatura->CuentaRecibido }}</td>
                            <td class="px-2 py-1 border-t border-purple-500 animate-border monto">{{ $Colegiatura->Monto }}
                            </td>
                            <td class="px-2 py-1 border-t border-purple-500 animate-border created_at">
                                {{ $Colegiatura->created_at }}
                            </td>
                            <td class="px-4 py-2 border-t border-purple-500 animate-border text-center">
                                <form action="" method="GET">
                                    @csrf
                                    <button
                                        class="bg-orange-600 text-white px-4 py-3 rounded-lg transition-all duration-500 hover:bg-purple-600 hover:-translate-y-2 hover:shadow-2xl">Imprimir</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    {{ $Colegiaturas->links() }}
                </tbody>
            </table>
        </div>
    </div>








<script>
    document.getElementById("searchInput").addEventListener("input", function() {
        let filter = this.value.toLowerCase();
        let selectedColumn = document.getElementById("columnSelect").value.toLowerCase();
        let rows = document.querySelectorAll("tbody tr");

        rows.forEach(function(row) {
            let cell = row.querySelector(`.${selectedColumn}`);
            if (cell) {
                let cellText = cell.textContent.toLowerCase();
                if (cellText.includes(filter)) {
                    row.style.display = ""; // Mostrar fila si coincide
                } else {
                    row.style.display = "none"; // Ocultar fila si no coincide
                }
            }
        });
    });
</script>

































</x-director.layout>
