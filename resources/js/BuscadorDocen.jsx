import React from "react";
import { createRoot } from "react-dom/client";

export default function BuscadorDocen() {
  return (
    <div>
      <label htmlFor="search">Docente:</label>
      <input type="text" id="search" placeholder="Docente" />
    </div>
  );
}

if (document.getElementById("BuscadorDocen")) {
  createRoot(document.getElementById("BuscadorDocen")).render(<BuscadorDocen />);
}
