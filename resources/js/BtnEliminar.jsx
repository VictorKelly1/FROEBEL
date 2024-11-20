import React from "react";
import { createRoot } from "react-dom/client";

export default function BtnEliminar(){
return(


    <button>Eliminar</button>

);


}

if(document.getElementById('BtnEliminar')){
createRoot(document.getElementById('BtnEliminar')).render(<BtnEliminar/>)
} 