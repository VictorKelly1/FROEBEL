import React from "react";
import { createRoot } from "react-dom/client";

export default function RegisAlum(){
    return(
   
    
        <form>
   
        <label for="nombre">NOMBRE(S):</label>
        <input type="text" id="nombre" name="nombre" /><br />
    
        <label for="apellido_paterno">APELLIDO PATERNO:</label>
        <input type="text" id="apellido_paterno" name="apellido_paterno" /><br />
    
        <label for="apellido_materno">APELLIDO MATERNO:</label>
        <input type="text" id="apellido_materno" name="apellido_materno" /><br />
    
        <label for="curp">CURP:</label>
        <input type="text" id="curp" name="curp" /><br />
    
        <label for="fecha_nacimiento">FECHA DE NACIMIENTO:</label>
        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" /><br />
    
        <label for="genero">GENERO:</label>
        <input type="text" id="genero" name="genero" /><br />
    
        <label for="ciudad">CIUDAD:</label>
        <input type="text" id="ciudad" name="ciudad" /><br />
    
        <label for="municipio">MUNICIPIO:</label>
        <input type="text" id="municipio" name="municipio" /><br />
    
        <label for="codigo_postal">CODIGO POSTAL:</label>
        <input type="text" id="codigo_postal" name="codigo_postal" /><br />
    
        <label for="colonia">COLONIA/FRACCIONAMIENTO:</label>
        <input type="text" id="colonia" name="colonia" /><br />
    
     
        <label for="calle">CALLE:</label>
        <input type="text" id="calle" name="calle" /><br />
    
        <label for="numero_exterior">NUMERO EXTERIOR:</label>
        <input type="text" id="numero_exterior" name="numero_exterior" /><br />
    
        <label for="nacionalidad">NACIONALIDAD:</label>
        <input type="text" id="nacionalidad" name="nacionalidad" /><br />
    
        <label for="escuela_procede">ESCUELA PROCEDENTE:</label>
        <input type="text" id="escuela_procede" name="escuela_procede" /><br />
    
        <label for="matricula">MATRICULA:</label>
        <input type="text" id="matricula" name="matricula" /><br />
    
        <div id="ListaGrupos"></div>
    
        <label for="foto">FOTO:</label>
        <input type="file" id="foto" name="foto" /><br />
    
        
        
        
      </form>



    );
    
} 
    
    


if(document.getElementById('RegisAlum')){
createRoot(document.getElementById('RegisAlum')).render(<RegisAlum/>)
} 