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
  
  
  
  export default function TablaAsigGrupAlum(){
    return(
    
    
      
      
      
      
      <Table>
      <TableCaption>TABLA ASIGNACIONES GRUPO DOCENTES</TableCaption>
      <TableHeader>
        <TableRow>
        <TableHead>Matricula:</TableHead>
        <TableHead>Nombre:</TableHead>
        <TableHead>Apellido Paterno:</TableHead>
        <TableHead>Apellido Materno:</TableHead>
        <TableHead>Grupo:</TableHead> 
           
        </TableRow>
      </TableHeader>
      <TableBody>
        <TableRow>
          <TableCell>datos1</TableCell>
          <TableCell>datos2</TableCell>
          <TableCell>datos3</TableCell>
          <TableCell>datos4</TableCell>
          <TableCell>datos5</TableCell>
      
        </TableRow>
      </TableBody>
    </Table>
  );
    
    }
    
    if(document.getElementById('TablaAsigGrupAlum')){
    createRoot(document.getElementById('TablaAsigGrupAlum')).render(<TablaAsigGrupAlum/>)
    } 