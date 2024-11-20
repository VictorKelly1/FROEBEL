import React from "react";
import { createRoot } from "react-dom/client";

export default function Asighoramat(){
return(


    <form>
 
    <label for="lunes">Lunes:</label>
    <input type="text" id="lunes" name="lunes" /><br />

    <label for="martes">Martes</label>
    <input type="text" id="martes" name="martes" /><br />

    <label for="miercoles">Miercoles</label>
    <input type="text" id="miercoles" name="miercoles" /><br />

    <label for="jueves">Jueves</label>
    <input type="text" id="jueves" name="jueves" /><br />

    <label for="viernes">Viernes</label>
    <input type="text" id="viernes" name="viernes" /><br />

   
  </form>


);


}

if(document.getElementById('Asighoramat')){
createRoot(document.getElementById('Asighoramat')).render(<Asighoramat/>)
} 