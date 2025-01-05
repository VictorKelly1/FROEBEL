<x-director.layout>


    <!-- ✅ Mensaje de Éxito -->
    @if (session('success'))
    <div class="alert alert-success">
        <p>{{ session('success') }}</p>
    </div>
@endif


<div class=" ">
    <!-- Selector de columna -->
    <select id="columnSelect" class="posiciontablas p-1 bg-gray-800 text-white rounded-md text-sm w-1/3">
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
        class="buscador-input posiciontablas2" 
        style="width: 550px; height: 40px; padding: 8px; background-color: #2d2d2d; color: white; border-radius: 5px;">
</div>


<div class=" ">
    <!-- Selector de columna -->
    <select id="columnSelect" class="posiciontablasmedia p-1 bg-gray-800 text-white rounded-md text-sm w-1/3">
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
        class="buscador-input posiciontablas2media" 
        style="width: 550px; height: 40px; padding: 8px; background-color: #2d2d2d; color: white; border-radius: 5px;">
</div>

<div class=" ">
    <!-- Selector de columna -->
    <select id="columnSelect" class="posiciontablas33media p-1 bg-gray-800 text-white rounded-md text-sm w-1/3">
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
        class="buscador-input posiciontablas3media" 
        style="width: 550px; height: 40px; padding: 8px; background-color: #2d2d2d; color: white; border-radius: 5px;">
</div>






<div class="posiciontablasmediabaja flex items-center justify-center bg-gray-900 p-4 mt-4 rounded-md border border-blue-500 shadow-md md:w-3/4 lg:w-2/3 overflow-x-auto">
        <table class="text-sm text-white border-collapse border border-blue-500 rounded-md">
            <thead class="bg-blue-700 text-center">
                <tr>
                <th class="px-3 py-2 border-b border-blue-500">Nombre</th>
                <th class="px-3 py-2 border-b border-blue-500">Clave</th>
                <th class="px-3 py-2 border-b border-blue-500">Inicio de Periodo</th>
                <th class="px-3 py-2 border-b border-blue-500">Fin de Periodo</th>
                <th class="px-3 py-2 border-b border-blue-500">Metodo de Pago</th>
                <th class="px-3 py-2 border-b border-blue-500">Cuenta Recibido</th>
                <th class="px-3 py-2 border-b border-blue-500">Monto Total</th>
                <th class="px-3 py-2 border-b border-blue-500">Dia que se realizo</th>
                <th class="px-3 py-2 border-b border-blue-500">Ver mas</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Colegiaturas as $Colegiatura)
                    <tr class="hover:bg-gray-800 text-center">
                            <td class="px-3 py-2 border-t border-blue-500 nombre">
                                {{ $Colegiatura->Nombre }}
                                {{ $Colegiatura->ApellidoPaterno }}
                                {{ $Colegiatura->ApellidoMaterno }}
                            </td>
                           <td class="px-3 py-2 border-t border-blue-500 clave">
                                {{ $Colegiatura->Clave }}
                            </td>
                           <td class="px-3 py-2 border-t border-blue-500 fechainicio">
                                {{ $Colegiatura->FechaInicio }}</td>
                            <td class="px-3 py-2 border-t border-blue-500 fechafin">{{ $Colegiatura->FechaFin }}
                            </td>
                           <td class="px-3 py-2 border-t border-blue-500 metodopago">
                                {{ $Colegiatura->MetodoPago }}
                            </td>
                           <td class="px-3 py-2 border-t border-blue-500 cuentarecibido">
                                {{ $Colegiatura->CuentaRecibido }}</td>
                           <td class="px-3 py-2 border-t border-blue-500 monto">{{ $Colegiatura->Monto }}
                            </td>
                            <td class="px-3 py-2 border-t border-blue-500 created_at">
                                {{ $Colegiatura->created_at }}
                            </td>
                           <td class="px-3 py-2 border-t border-blue-500 text-center">
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

<script>
        // Mostrar alerta
        document.querySelector('.alert').classList.add('show');

        // Después de 5 segundos, aplicar la clase de desvanecimiento y eliminarla
        setTimeout(() => {
            let alertElement = document.querySelector('.alert');
            alertElement.classList.add('fade-out');

            // Esperar el final de la animación para eliminar el elemento del DOM
            setTimeout(() => {
                alertElement.remove();
            }, 1000); // Aseguramos que la animación de desvanecimiento termine antes de eliminarla
        }, 5000); // 5 segundos de espera
    </script>































</x-director.layout>
