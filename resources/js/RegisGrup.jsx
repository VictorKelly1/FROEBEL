import React from "react";
import { createRoot } from "react-dom/client";

export default function RegisGrup(){
    return(
   
    
        <form>
        <div class="form-container">
        
          <div class="form-group">
            <label for="clave">CLAVE:</label>
            <input type="text" id="clave" name="clave" />
          </div>
          <div class="form-group">
            <label for="tipo">TIPO:</label>
            <input type="text" id="tipo" name="tipo" />
          </div>
          <div class="form-group">
            <label for="fecha_inicio">FECHA INICIO:</label>
            <input type="date" id="fecha_inicio" name="fecha_inicio" />
          </div>
          <div class="form-group">
            <label for="nivel_academico">NIVEL ACADÉMICO:</label>
            <input type="text" id="nivel_academico" name="nivel_academico" />
          </div>
          <div class="form-group">
            <label for="fecha_fin">FECHA FIN:</label>
            <input type="date" id="fecha_fin" name="fecha_fin" />
          </div>
          <div class="form-group">
            <label for="grado">GRADO:</label>
            <input type="text" id="grado" name="grado" />
          </div>
        </div>
       

      </form>


    );
    
} 
    if(document.getElementById('RegisGrup')){
createRoot(document.getElementById('RegisGrup')).render(<RegisGrup/>)
} 