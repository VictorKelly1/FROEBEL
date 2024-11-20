import React from "react";
import { createRoot } from "react-dom/client";

export default function RegisDocen(){
    return(
   
    
        <form>
 
        <label for="nombre">NOMBRE(S):</label>
        <input type="text" id="nombre" name="nombre" /><br />
    
        <label for="apellido_paterno">APELLIDO PATERNO:</label>
        <input type="text" id="apellido_paterno" name="apellido_paterno" /><br />
    
        <label for="apellido_materno">APELLIDO MATERNO:</label>
        <input type="text" id="apellido_materno" name="apellido_materno" /><br />
    
        <label for="rfc">RFC:</label>
        <input type="text" id="rfc" name="rfc" /><br />
    
        <label for="curp">CURP:</label>
        <input type="text" id="curp" name="curp" /><br />
    
        <label for="fecha_nacimiento">FECHA DE NACIMIENTO:</label>
        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" /><br />
    
        <label for="genero">GÉNERO:</label>
        <input type="text" id="genero" name="genero" /><br />
    
        <label for="ciudad">CIUDAD:</label>
        <input type="text" id="ciudad" name="ciudad" /><br />
    
        <label for="municipio">MUNICIPIO:</label>
        <input type="text" id="municipio" name="municipio" /><br />
    
        <label for="codigo_postal">CÓDIGO POSTAL:</label>
        <input type="text" id="codigo_postal" name="codigo_postal" /><br />
    
        <label for="colonia">COLONIA/FRACCIONAMIENTO:</label>
        <input type="text" id="colonia" name="colonia" /><br />
    
        <label for="calle">CALLE:</label>
        <input type="text" id="calle" name="calle" /><br />
    
        <label for="numero_exterior">NÚMERO EXTERIOR:</label>
        <input type="text" id="numero_exterior" name="numero_exterior" /><br />
    
        <label for="nacionalidad">NACIONALIDAD:</label>
        <input type="text" id="nacionalidad" name="nacionalidad" /><br />
    
        <label for="matricula">MATRÍCULA:</label>
        <input type="text" id="matricula" name="matricula" /><br />
    
        <label for="profesion">PROFESIÓN:</label>
        <input type="text" id="profesion" name="profesion" /><br />
    
        <label for="no_ine">No. INE:</label>
        <input type="text" id="no_ine" name="no_ine" /><br />
    
        <label for="sueldo">SUELDO:</label>
        <input type="number" id="sueldo" name="sueldo" step="0.01" /><br />
    
        <label for="foto">FOTO:</label>
        <input type="file" id="foto" name="foto" /><br />
    
    
      </form>



    );
    
} 
    
    


if(document.getElementById('RegisDocen')){
createRoot(document.getElementById('RegisDocen')).render(<RegisDocen/>)
} 