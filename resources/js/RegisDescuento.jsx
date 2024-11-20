import React from "react";
import { createRoot } from "react-dom/client";

export default function RegisDescuento(){
    return(
   
    
        <form>
        <div class="form-container">
        
          <div class="form-group">
            <label for="nombre">NOMBRE:</label>
            <input type="text" id="clave" name="nombre" />
          </div>
          <div class="form-group">
            <label for="tipo">TIPO:</label>
            <input type="text" id="tipo" name="tipo" />
          </div>
          <div class="form-group">
          <label for="monto">MONTO:</label>
        <input type="number" id="monto" name="monto" step="0.01" /><br />
    
        </div>
        </div>
       

      </form>


    );
    
} 
    if(document.getElementById('RegisDescuento')){
createRoot(document.getElementById('RegisDescuento')).render(<RegisDescuento/>)
} 