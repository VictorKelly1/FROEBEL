

document.addEventListener("DOMContentLoaded", () => {
    const sidebar = document.getElementById("sidebar");
    const toggleButton = document.getElementById("toggleSidebar");
    const icons = document.querySelectorAll(".icon");
    const labels = document.querySelectorAll("ul span");

  
    toggleButton.addEventListener("click", () => {
        // Alternar clases de la sidebar
        if (sidebar.classList.contains("w-64")) {
            sidebar.classList.remove("w-64");
            sidebar.classList.add("w-24");

            // Cambiar el tamaño de los íconos
            icons.forEach(icon => {
                icon.classList.remove("w-6", "h-6");
                icon.classList.add("w-8", "h-8");
            });

            // Ocultar los textos
            labels.forEach(label => {
                label.classList.add("opacity-0");
                label.classList.remove("opacity-100");
            });

         } else {
            sidebar.classList.remove("w-24");
            sidebar.classList.add("w-64");

            // Restaurar el tamaño de los íconos
            icons.forEach(icon => {
                icon.classList.remove("w-8", "h-8");
                icon.classList.add("w-6", "h-6");
            });

            // Mostrar los textos
            labels.forEach(label => {
                label.classList.remove("opacity-0");
                label.classList.add("opacity-100");
            });

        
        }

       
    });
});






// Función para filtrar la tabla en tiempo real
function filterTable(event) {
    const searchValue = event.target.value.toLowerCase();
    const tableRows = document.querySelectorAll("#tabla-alumnos tbody tr");

    tableRows.forEach((row) => {
        const cellText = row.querySelector("td").textContent.toLowerCase();
        if (cellText.includes(searchValue)) {
            row.style.display = ""; // Muestra la fila
        } else {
            row.style.display = "none"; // Oculta la fila
        }
    });
}

// Función para imprimir la tabla
function printTable() {
    const printContent = document.getElementById("tabla-alumnos").outerHTML;
    const originalContent = document.body.innerHTML;

    document.body.innerHTML = printContent;
    window.print();
    document.body.innerHTML = originalContent;
}
