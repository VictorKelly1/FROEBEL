import React from "react";
import { createRoot } from "react-dom/client";

export default function BtnAgregar(){
return(


    <button>Agregar</button>

);


}

if(document.getElementById('BtnAgregar')){
createRoot(document.getElementById('BtnAgregar')).render(<BtnAgregar/>)
} 