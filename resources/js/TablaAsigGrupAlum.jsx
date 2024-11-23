import React, { useState, useEffect } from 'react';
import axios from 'axios';
import { createRoot } from "react-dom/client";

// Verifica que este módulo exista y esté bien configurado
import {
   Table,
   TableBody,
   TableCaption,
   TableCell,
   TableHead,
   TableHeader,
   TableRow,
} from "@/components/ui/table";

//const endpoint = process.env.REACT_APP_API_URL;
const endpoint = 'http://localhost:8000';

const ShowGA = () => {
  const [GA, setGA] = useState([]); 

  useEffect(() => {
    getAllGA();
  }, []);

  const getAllGA = async () => {
    try {
      const response = await axios.get(`${endpoint}/GA`)
      console.log(response.data)
      setGA(response.data)
      
    } catch (error) {
      console.error("Error al obtener los datos:", error);
    }
  };

  return (
    <Table>
      <TableCaption>Tabla Grupos</TableCaption>
      <TableHeader>
        <TableRow>
          <TableHead>Matricula</TableHead>
          <TableHead>Nombre</TableHead>
          <TableHead>Apellido Paterno</TableHead>
          <TableHead>Apellido Materno</TableHead>
          <TableHead>Grado</TableHead>
          <TableHead>Paquete</TableHead>
          <TableHead>Nivel Académico</TableHead>
        </TableRow>
      </TableHeader>
      <TableBody>
        {GA.map((item, index) => (
          <TableRow key={index}>
            <TableCell>{item.Matricula}</TableCell>
            <TableCell>{item.Nombre}</TableCell>
            <TableCell>{item.ApellidoPaterno}</TableCell>
            <TableCell>{item.ApellidoMaterno}</TableCell>
            <TableCell>{item.NombreGrado}</TableCell>
            <TableCell>{item.Paquete}</TableCell>
            <TableCell>{item.NivelAcademico}</TableCell>
          </TableRow>
        ))}
      </TableBody>
    </Table>
  );
};

export default ShowGA;

// Renderizar el componente en el DOM
if (document.getElementById('TablaAsigGrupAlum')) {
   createRoot(document.getElementById('TablaAsigGrupAlum')).render(<ShowGA />);
}

