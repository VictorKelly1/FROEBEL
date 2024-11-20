import React from "react";
import { createRoot } from "react-dom/client";

export default function BtnGuardar(){
return(


    <button>Guardar</button>

);


}

if(document.getElementById('BtnGuardar')){
createRoot(document.getElementById('BtnGuardar')).render(<BtnGuardar/>)
} 