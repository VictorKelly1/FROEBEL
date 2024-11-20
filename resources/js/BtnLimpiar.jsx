import React from "react";
import { createRoot } from "react-dom/client";

export default function BtnLimpiar(){
return(


    <button>Limpiar</button>

);


}

if(document.getElementById('BtnLimpiar')){
createRoot(document.getElementById('BtnLimpiar')).render(<BtnLimpiar/>)
} 