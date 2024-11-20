import React from "react";
import { createRoot } from "react-dom/client";

export default function RegisConcepto(){
    return(
   
    
        <form>
        <div class="form-container">
        
          <div class="form-group">
            <label for="concepto">CONCEPTO:</label>
            <input type="text" id="concepto" name="concepto" />
          </div>
          <div class="form-group">
            <label for="descripcion">DESCRIPCION:</label>
            <input type="text" id="descripcion" name="descripcion" />
          </div>
         
        </div>
       

      </form>


    );
    
} 
    if(document.getElementById('RegisConcepto')){
createRoot(document.getElementById('RegisConcepto')).render(<RegisConcepto/>)
} 