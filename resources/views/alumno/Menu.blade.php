<x-alumno.layout>

<!-- Botón Redondo de Buzón -->
<div class="boton-buzon">
    <a href="#" class="boton-icono">
        <i class="fas fa-envelope"></i>
    </a>
</div>

<!-- Contenedor de Calendario y Fecha/Hora -->
<div class="contenedor-calendario">
    <div class="reloj">
        <span id="hora"></span>
        <span id="fecha"></span>
    </div>
    <div class="calendario">
        <div class="encabezado-calendario">CALENDARIO</div>
        <table>
            <thead>
                <tr>
                    <th>Su</th><th>Mo</th><th>Tu</th><th>We</th><th>Th</th><th>Fr</th><th>Sa</th>
                </tr>
            </thead>
            <tbody id="dias-calendario"></tbody>
        </table>
    </div>
</div>

<script>
// Reloj en tiempo real
function actualizarReloj() {
    const ahora = new Date();
    const hora = ahora.toLocaleTimeString();
    const fecha = ahora.toLocaleDateString('es-ES', {
        weekday: 'long',
        day: 'numeric',
        month: 'long',
        year: 'numeric'
    });

    document.getElementById('hora').textContent = hora;
    document.getElementById('fecha').textContent = fecha;
}

// Generar calendario
function generarCalendario() {
    const ahora = new Date();
    const año = ahora.getFullYear();
    const mes = ahora.getMonth();
    const diaHoy = ahora.getDate();

    const primerDia = new Date(año, mes, 1).getDay();
    const ultimoDia = new Date(año, mes + 1, 0).getDate();

    let dias = '';
    let diaActual = 1;

    for (let i = 0; i < 6; i++) {
        dias += '<tr>';
        for (let j = 0; j < 7; j++) {
            if ((i === 0 && j < primerDia) || diaActual > ultimoDia) {
                dias += '<td></td>';
            } else {
                if (diaActual === diaHoy) {
                    dias += `<td class="hoy">${diaActual}</td>`;
                } else {
                    dias += `<td>${diaActual}</td>`;
                }
                diaActual++;
            }
        }
        dias += '</tr>';
    }

    document.getElementById('dias-calendario').innerHTML = dias;
}

// Actualizar calendario automáticamente cada día
let ultimaFecha = new Date().getDate();

function verificarCambioDeDia() {
    const ahora = new Date();
    if (ahora.getDate() !== ultimaFecha) {
        ultimaFecha = ahora.getDate();
        generarCalendario();
    }
}

// Inicializar
document.addEventListener('DOMContentLoaded', () => {
    setInterval(actualizarReloj, 1000); // Actualizar reloj cada segundo
    setInterval(verificarCambioDeDia, 60000); // Comprobar cambio de día cada minuto
    generarCalendario(); // Generar el calendario al inicio
});
</script>

<style>
    .hoy {
        background-color: yellow;
        font-weight: bold;
    }
</style>

</x-alumno.layout>
