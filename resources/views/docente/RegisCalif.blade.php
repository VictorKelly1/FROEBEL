<x-docente.layout>

    <!-- ✅ Mensaje de Éxito -->
    @if (session('success'))
    <div class="alert alert-success">
        <p>{{ session('success') }}</p>
    </div>
@endif
<form class="posiciontablas" action="{{ route('filtrar') }}" method="GET">
    <select id="grupo" name="grupo_id">
        @foreach($grupos as $grupo)
            <option value="{{ $grupo->id }}">{{ $grupo->nombre }}</option>
        @endforeach
    </select>

    <button type="button" onclick="filtrarAlumnos()">Buscar</button>

    <select id="alumno" name="alumno_id">
        <!-- Aquí se cargarán los alumnos mediante AJAX -->
    </select>
</form>


<script>
    function filtrarAlumnos() {
        var grupo_id = document.getElementById('grupo').value;
        fetch(`/filtrar-alumnos?grupo_id=${grupo_id}`)
            .then(response => response.json())
            .then(data => {
                var alumnoSelect = document.getElementById('alumno');
                alumnoSelect.innerHTML = '';  // Limpiar la lista actual
                data.forEach(function(alumno) {
                    var option = document.createElement('option');
                    option.value = alumno.id;
                    option.textContent = alumno.nombre;
                    alumnoSelect.appendChild(option);
                });
            });
    }
</script>

    <button type="submit">Filtrar</button>
</form>

@if (isset($resultado))
    <h3>Resultados:</h3>
    <ul>
        @foreach ($resultado as $alumno)
            <li>{{ $alumno->nombre }}</li>
        @endforeach
    </ul>
@endif




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







</x-docente.layout>