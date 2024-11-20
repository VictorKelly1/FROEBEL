import React from "react";
import { createRoot } from "react-dom/client";

export default function ListaCantidad(){
    return(
   
    
    <div>
    <label for="group">Cantidad:</label>
    <select id="group">
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
    </select>
  </div>

    );
    
} 
    
    


if(document.getElementById('ListaCantidad')){
createRoot(document.getElementById('ListaCantidad')).render(<ListaCantidad/>)
} 