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
  
  
  
  export default function TablaAsigGrupDocen(){
    return(
    
    
      
      
      
      
        <Table>
        <TableCaption>TABLA ASIGNACIONES GRUPO DOCENTES</TableCaption>
        <TableHeader>
          <TableRow>
          <TableHead>Paquete:</TableHead>
          <TableHead>Grado:</TableHead>
          <TableHead>Nivel Academico:</TableHead>
          <TableHead>Periodo:</TableHead>
           
             
          </TableRow>
        </TableHeader>
        <TableBody>
          <TableRow>
            <TableCell>datos1</TableCell>
            <TableCell>datos2</TableCell>
            <TableCell>datos3</TableCell>
            <TableCell>datos4</TableCell>
        
        
          </TableRow>
        </TableBody>
      </Table>
    );
    
    
    
    }
    
    if(document.getElementById('TablaAsigGrupDocen')){
    createRoot(document.getElementById('TablaAsigGrupDocen')).render(<TablaAsigGrupDocen/>)
    } 