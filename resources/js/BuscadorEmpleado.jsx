import React from "react";
import { createRoot } from "react-dom/client";

export default function BuscadorEmpleado() {
  return (
    <div>
      <label htmlFor="search">Empleado:</label>
      <input type="text" id="search" placeholder="Empleado" />
    </div>
  );
}

if (document.getElementById("BuscadorEmpleado")) {
  createRoot(document.getElementById("BuscadorEmpleado")).render(<BuscadorEmpleado />);
}
