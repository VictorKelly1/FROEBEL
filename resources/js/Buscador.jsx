
import React from "react";
import { createRoot } from "react-dom/client";

export default function Buscador() {
  return (
    <div>
      <label htmlFor="search">Buscar Alumno:</label>
      <input type="text" id="search" placeholder="Ingrese el nombre del alumno" />
    </div>
  );
}

if (document.getElementById("Buscador")) {
  createRoot(document.getElementById("Buscador")).render(<Buscador />);
}
