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
  
  
  
  export default function TablaDesc(){
    return(
    
    
      
      
      
      
        <Table>
        <TableCaption>TABLA DESCUENTOS</TableCaption>
        <TableHeader>
          <TableRow>
          <TableHead>Nombre:</TableHead>
            <TableHead>Tipo:</TableHead>
            <TableHead>Monto:</TableHead>
           
             
          </TableRow>
        </TableHeader>
        <TableBody>
          <TableRow>
            <TableCell>datos1</TableCell>
            <TableCell>datos2</TableCell>
            <TableCell>datos3</TableCell>
        
        
          </TableRow>
        </TableBody>
      </Table>
    );
    
    
    
    }
    
    if(document.getElementById('TablaDesc')){
    createRoot(document.getElementById('TablaDesc')).render(<TablaDesc/>)
    } 