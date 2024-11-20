import React from "react";
import { createRoot } from "react-dom/client";

export default function ListaMaterial(){
    return(
   
    
    <div>
    <label for="group">Material:</label>
    <select id="group">
      <option value="Escoba">Escoba</option>
      <option value="Cloro">Cloro</option>
      <option value="Pinol">Pinol</option>
    </select>
  </div>

    );
    
} 
    
    


if(document.getElementById('ListaMaterial')){
createRoot(document.getElementById('ListaMaterial')).render(<ListaMaterial/>)
} 