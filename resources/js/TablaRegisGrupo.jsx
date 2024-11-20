import React from "react";
import { createRoot } from "react-dom/client";
import {
    Table,
    TableBody,
    TableCaption,
    TableCell,
    TableHead,
    TableHeader,
    TableRow,
    
  } from "@/components/ui/table"
  
  
  
  export default function TablaRegisGrupo(){
    return(
    
    
      
      
      
      
        <Table>
        <TableCaption>TABLA REGISTRO</TableCaption>
        <TableHeader>
          <TableRow>
            <TableHead>Clave</TableHead>
            <TableHead>Inicio</TableHead>
            <TableHead>Fin</TableHead>
            <TableHead>Tipo</TableHead>
            <TableHead>Nivel Academico</TableHead>
            <TableHead>Grado</TableHead>
          </TableRow>
        </TableHeader>
        <TableBody>
          <TableRow>
            <TableCell>datos1</TableCell>
            <TableCell>datos2</TableCell>
            <TableCell>datos3</TableCell>
            <TableCell>datos4</TableCell>
            <TableCell>datos5</TableCell>
            <TableCell>datos6</TableCell>
          </TableRow>
        </TableBody>
      </Table>
    );
    
    
    }
    
    if(document.getElementById('TablaRegisGrupo')){
    createRoot(document.getElementById('TablaRegisGrupo')).render(<TablaRegisGrupo/>)
    } 