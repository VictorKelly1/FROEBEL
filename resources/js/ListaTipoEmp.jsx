import React from "react";
import { createRoot } from "react-dom/client";

export default function ListaTipoEmp(){
    return(
   
    
    <div>
    <label for="group">Tipo:</label>
    <select id="group">
      <option value="Maestro">Maestro</option>
      <option value="Conserje">Conserje</option>
      <option value="Cocinero">Cocinero</option>
    </select>
  </div>

    );
    
} 
    
    


if(document.getElementById('ListaTipoEmp')){
createRoot(document.getElementById('ListaTipoEmp')).render(<ListaTipoEmp/>)
} 