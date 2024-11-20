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
  
  
  
  export default function TablaHorarioGrupo(){
    return(
    
    
      
      
      
      
        <Table>
        <TableCaption>TABLA ASIGNACION</TableCaption>
        <TableHeader>
          <TableRow>
          <TableHead>Materias</TableHead>
            <TableHead>Lunes</TableHead>
            <TableHead>Martes</TableHead>
            <TableHead>Miercoles</TableHead>
            <TableHead>Jueves</TableHead>
            <TableHead>Viernes</TableHead>      
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
    
    if(document.getElementById('TablaHorarioGrupo')){
    createRoot(document.getElementById('TablaHorarioGrupo')).render(<TablaHorarioGrupo/>)
    } 