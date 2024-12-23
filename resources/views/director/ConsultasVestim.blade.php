<x-director.layout>
    <div class="flex items-center justify-center bg-gray-900 p-2 posiciontablas borderAnimation">
        <div class="overflow-x-auto">
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
</x-director.layout>
