import React from "react";
import { createRoot } from "react-dom/client";

export default function ListaMaterias(){
    return(
   
    
    <div>
    <label for="group">Materias:</label>
    <select id="group">
      <option value="Español">Español</option>
      <option value="Ingles">Ingles</option>
      <option value="Matematicas">Matematicas</option>
    </select>
  </div>

    );
    
} 
    
    


if(document.getElementById('ListaMaterias')){
createRoot(document.getElementById('ListaMaterias')).render(<ListaMaterias/>)
} 