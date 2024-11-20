import React from "react";
import { createRoot } from "react-dom/client";

export default function ListaGrupos(){
    return(
   
    
    <div>
    <label for="group">Seleccionar Grupo:</label>
    <select id="group">
      <option value="1A">1A</option>
      <option value="2B">2B</option>
      <option value="3C">3C</option>
    </select>
  </div>

    );
    
} 
    
    


if(document.getElementById('ListaGrupos')){
createRoot(document.getElementById('ListaGrupos')).render(<ListaGrupos/>)
} 