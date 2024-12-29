<x-director.layout>
    <div class="flex items-center justify-center bg-gray-900 p-2 posiciontablas borderAnimation">
        <div class="overflow-x-auto">

        <div class="overflow-x-auto w-full max-w-full z-30">
            <table class="text-sm text-left text-white w-full table-auto z-30">
                <thead>
                <div class="relative tamañobuscadorsidebar">
    <div class="buscador-contenedor">
        <input type="search" id="searchInput" 
            placeholder="Buscar Alumno..." class="buscador-input">
    </div>

            <table class=" text-xs text-left text-white">
                <thead>
                    <tr class="bg-transparent">
                        <th class="px-2 py-1 border-b border-purple-500 animate-border">Fecha</th>
                        <th class="px-2 py-1 border-b border-purple-500 animate-border">Motivo</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($Vestimentas as $Vestimenta)
                        <tr class="hover:bg-gray-800 bg-transparent">
                            <td class="px-2 py-1 border-t border-purple-500 animate-border">{{ $Vestimenta->Fecha }}
                            </td>
                            <td class="px-2 py-1 border-t border-purple-500 animate-border">{{ $Vestimenta->Motivo }}
                            </td>
                            </form>
                            </td>

                        </tr>
                    @endforeach
                    {{ $Vestimentas->links() }}
                </tbody>
            </table>
        </div>







        <script>
        document.getElementById("searchInput").addEventListener("input", function() {
            var filter = this.value.toLowerCase();
            var rows = document.getElementById("tableBody").getElementsByTagName("tr");

            Array.from(rows).forEach(function(row) {
                var text = row.textContent.toLowerCase();
                if (text.includes(filter)) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
        });
    </script>







</x-director.layout>
