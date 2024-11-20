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
  
  
  
  export default function TablaConcep(){
    return(
    
    
      
      
      
      
        <Table>
        <TableCaption>TABLA CONCEPTOS</TableCaption>
        <TableHeader>
          <TableRow>
          <TableHead>Concepto:</TableHead>
          <TableHead>Descripcion:</TableHead>
            
           
             
          </TableRow>
        </TableHeader>
        <TableBody>
          <TableRow>
            <TableCell>datos1</TableCell>
            <TableCell>datos2</TableCell>
          
        
        
          </TableRow>
        </TableBody>
      </Table>
    );
    
    }
    
    if(document.getElementById('TablaConcep')){
    createRoot(document.getElementById('TablaConcep')).render(<TablaConcep/>)
    } 