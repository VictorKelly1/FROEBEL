import React from "react";
import { createRoot } from "react-dom/client";

export default function Codea(){
return(
<button>ESTAMOS EN CODEA.APP</button>

);


}

if(document.getElementById('codeareact')){
createRoot(document.getElementById('codeareact')).render(<Codea/>)
} 