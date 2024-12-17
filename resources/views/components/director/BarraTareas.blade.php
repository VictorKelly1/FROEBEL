<div class="">
    <!-- Sidebar -->
    <div id="sidebar"
        class="led led2 posicionsidebar w-64 bg-gray-900 text-white flex flex-col transition-all duration-300 ease-in-out
        border-4 border-transparent rounded-lg p-2
        bg-gradient-to-r  to-indigo-800 led2 ">

        <!-- Lista de opciones -->
        <ul class="flex-1 space-y-2 p-4 ">
            <!-- Elemento de menú: Registros -->
            <li class="flex flex-col items-start gap-2 p-3 transition-all duration-200 relative">
                <!-- Elemento principal -->
               

 <!-- BARRA DE TAREAS FINAL RUTAS -->
    <!-- Seccion REGISTRO FINANCIERO -->
   <li class="flex flex-col items-start gap-2 p-3 transition-all duration-200 relative">
                <!-- Elemento principal -->
                <div class="flex items-center gap-4 cursor-pointer" onclick="toggleSubmenu('submenu-RegistrosFinancieros')">
                    <img src="https://via.placeholder.com/24" alt="RegistrosFinancieros" class="w-6 h-6">
                    <span class="text-sm font-medium">Registros Financieros</span>
                    <!-- Flecha de expansión -->
                    <span id="arrow-RegistrosFinancieros" class="ml-auto transform rotate-0 transition-transform">
                        &#x25BC; <!-- Flecha hacia abajo -->
                    </span>
                </div>

       <!-- Submenú -->
          <ul id="submenu-RegistrosFinancieros" class="hidden bg-gray-700 text-white rounded-lg mt-2 ml-8 p-2 w-48 shadow-lg transition-all duration-300">
                    <li class="hover:bg-gray-600 rounded p-2">
                        <a href="{{ route('RegistrarPago') }}" class="flex items-center gap-2">
                            <span class="text-sm">Registrar Pagos</span>
                        </a>
                    </li>

                    <li class="hover:bg-gray-600 rounded p-2">
                        <a href="{{ route('RegistrarDescuento') }}" class="flex items-center gap-2">
                            <span class="text-sm">Registrar Descuentos</span>
                        </a>
                    </li>

                    <li class="hover:bg-gray-600 rounded p-2">
                        <a href="{{ route('RegistrarConceptos') }}" class="flex items-center gap-2">
                            <span class="text-sm">Registrar Concepto</span>
                        </a>
                    </li>

                    <li class="hover:bg-gray-600 rounded p-2">
                        <a href="{{ route('RegistrarCompra') }}" class="flex items-center gap-2">
                            <span class="text-sm">Registrar Compras</span>
                        </a>
                    </li> 
          </ul>
       </li>





 <!-- Seccion REGISTRO ACADEMICO -->
       <li class="flex flex-col items-start gap-2 p-3 transition-all duration-200 relative">
                <!-- Elemento principal -->
                <div class="flex items-center gap-4 cursor-pointer" onclick="toggleSubmenu('submenu-RegistrosAcademico')">
                    <img src="https://via.placeholder.com/24" alt="RegistrosAcademico" class="w-6 h-6">
                    <span class="text-sm font-medium">Registros Academico</span>
                    <!-- Flecha de expansión -->
                    <span id="arrow-RegistrosAcademico" class="ml-auto transform rotate-0 transition-transform">
                        &#x25BC; <!-- Flecha hacia abajo -->
                    </span>
                </div>

       <!-- Submenú -->
          <ul id="submenu-RegistrosAcademico" class="hidden bg-gray-700 text-white rounded-lg mt-2 ml-8 p-2 w-48 shadow-lg transition-all duration-300">




                     <li class="hover:bg-gray-600 rounded p-2">
                        <a href="{{ route('VistaRegistrarAlumno') }}" class="flex items-center gap-2">
                            <span class="text-sm"> Alumno</span>
                        </a>
                    </li> 
                    <li class="hover:bg-gray-600 rounded p-2">
                        <a href="{{ route('VistaRegistrarTutor') }}" class="flex items-center gap-2">
                            <span class="text-sm"> Tutor</span>
                        </a>
                    </li>

                    <li class="hover:bg-gray-600 rounded p-2">
                        <a href="{{ route('VistaRegistrarMateria') }}" class="flex items-center gap-2">
                            <span class="text-sm"> Materia</span>
                        </a>
                    </li>

                    <li class="hover:bg-gray-600 rounded p-2">
                        <a href="{{ route('VistaRegistrarGrupo') }}" class="flex items-center gap-2">
                            <span class="text-sm"> Grupo</span>
                        </a>
                    </li>

                    <li class="hover:bg-gray-600 rounded p-2">
                        <a href="{{ route('VistaRegistrarDocente') }}" class="flex items-center gap-2">
                            <span class="text-sm"> Docente</span>
                        </a>
                    </li> 

                    <li class="hover:bg-gray-600 rounded p-2">
                        <a href="{{ route('VistaRegistrarCoordi') }}" class="flex items-center gap-2">
                            <span class="text-sm"> Coordinador</span>
                        </a>
                    </li> 

                    <li class="hover:bg-gray-600 rounded p-2">
                        <a href="{{ route('VistaRegistrarAula') }}" class="flex items-center gap-2">
                            <span class="text-sm"> Aula</span>
                        </a>
                    </li> 

                    <li class="hover:bg-gray-600 rounded p-2">
                        <a href="{{ route('VistaRegistrarAdmin') }}" class="flex items-center gap-2">
                            <span class="text-sm"> Administrador</span>
                        </a>
                    </li> 
          </ul>
       </li>



 <!-- Seccion REGISTRO INVENTARIO -->
   <li class="flex flex-col items-start gap-2 p-3 transition-all duration-200 relative">
                <!-- Elemento principal -->
                <div class="flex items-center gap-4 cursor-pointer" onclick="toggleSubmenu('submenu-RegistrosInventario')">
                    <img src="https://via.placeholder.com/24" alt="RegistrosInventario" class="w-6 h-6">
                    <span class="text-sm font-medium">Registros Inventario</span>
                    <!-- Flecha de expansión -->
                    <span id="arrow-RegistrosInventario" class="ml-auto transform rotate-0 transition-transform">
                        &#x25BC; <!-- Flecha hacia abajo -->
                    </span>
                </div>

   
      </li>








 <!-- Seccion CONSULTAS ACADEMICAS -->
 <li class="flex flex-col items-start gap-2 p-3 transition-all duration-200 relative">
                <!-- Elemento principal -->
                <div class="flex items-center gap-4 cursor-pointer" onclick="toggleSubmenu('submenu-ConsultasAcademicas')">
                    <img src="https://via.placeholder.com/24" alt="ConsultasAcademicas" class="w-6 h-6">
                    <span class="text-sm font-medium">Consultas Academicas</span>
                    <!-- Flecha de expansión -->
                    <span id="arrow-ConsultasAcademicas" class="ml-auto transform rotate-0 transition-transform">
                        &#x25BC; <!-- Flecha hacia abajo -->
                    </span>
                </div>

       <!-- Submenú -->
          <ul id="submenu-ConsultasAcademicas" class="hidden bg-gray-700 text-white rounded-lg mt-2 ml-8 p-2 w-48 shadow-lg transition-all duration-300">
                    <li class="hover:bg-gray-600 rounded p-2">
                        <a href="{{ route('ListaVestimentas') }}" class="flex items-center gap-2">
                            <span class="text-sm">Uniforme</span>
                        </a>
                    </li>

                    <li class="hover:bg-gray-600 rounded p-2">
                        <a href="{{ route('ListaAlumnos') }}" class="flex items-center gap-2">
                            <span class="text-sm">Alumnos</span>
                        </a>
                    </li> 

                    <li class="hover:bg-gray-600 rounded p-2">
                        <a href="{{ route('ListaTutores') }}" class="flex items-center gap-2">
                            <span class="text-sm">Tutores</span>
                        </a>
                    </li>

                    <li class="hover:bg-gray-600 rounded p-2">
                        <a href="{{ route('ListaGrupos') }}" class="flex items-center gap-2">
                            <span class="text-sm">Grupos</span>
                        </a>
                    </li>

                    <li class="hover:bg-gray-600 rounded p-2">
                        <a href="{{ route('ListaDocentes') }}" class="flex items-center gap-2">
                            <span class="text-sm">Docentes</span>
                        </a>
                    </li> 

                    <li class="hover:bg-gray-600 rounded p-2">
                        <a href="{{ route('ListaCoordinadores') }}" class="flex items-center gap-2">
                            <span class="text-sm">Coordinadores</span>
                        </a>
                    </li> 

                    <li class="hover:bg-gray-600 rounded p-2">
                        <a href="{{ route('ListaAdmin') }}" class="flex items-center gap-2">
                            <span class="text-sm">Administradores</span>
                        </a>
                    </li> 
          </ul>
       </li>



<!-- Seccion CONSULTAS FINANCIERAS -->
<li class="flex flex-col items-start gap-2 p-3 transition-all duration-200 relative">
                <!-- Elemento principal -->
                <div class="flex items-center gap-4 cursor-pointer" onclick="toggleSubmenu('submenu-ConsultasFinancieras')">
                    <img src="https://via.placeholder.com/24" alt="ConsultasFinancieras" class="w-6 h-6">
                    <span class="text-sm font-medium">Consultas Financieras</span>
                    <!-- Flecha de expansión -->
                    <span id="arrow-ConsultasFinancieras" class="ml-auto transform rotate-0 transition-transform">
                        &#x25BC; <!-- Flecha hacia abajo -->
                    </span>
                </div>

       <!-- Submenú -->
          <ul id="submenu-ConsultasFinancieras" class="hidden bg-gray-700 text-white rounded-lg mt-2 ml-8 p-2 w-48 shadow-lg transition-all duration-300">
                  
                     <li class="hover:bg-gray-600 rounded p-2">
                        <a href="{{ route('ListaColegiaturas') }}" class="flex items-center gap-2">
                            <span class="text-sm">Colegiaturas</span>
                        </a>
                    </li>



                    <li class="hover:bg-gray-600 rounded p-2">
                        <a href="{{ route('ListaPagos') }}" class="flex items-center gap-2">
                            <span class="text-sm">Pagos</span>
                        </a>
                    </li>

                    <li class="hover:bg-gray-600 rounded p-2">
                        <a href="#" class="flex items-center gap-2">
                            <span class="text-sm">Compras</span>
                        </a>
                    </li>
                    
                    <li class="hover:bg-gray-600 rounded p-2">
                        <a href="{{ route('ListaVentas') }}" class="flex items-center gap-2">
                            <span class="text-sm">Ventas</span>
                        </a>
                    </li>
          </ul>
       </li>



       <!-- Seccion CONSULTAS INVENTARIOS -->
<li class="flex flex-col items-start gap-2 p-3 transition-all duration-200 relative">
                <!-- Elemento principal -->
                <div class="flex items-center gap-4 cursor-pointer" onclick="toggleSubmenu('submenu-ConsultasInventarios')">
                    <img src="https://via.placeholder.com/24" alt="ConsultasInventarios" class="w-6 h-6">
                    <span class="text-sm font-medium">Consultas Inventarios</span>
                    <!-- Flecha de expansión -->
                    <span id="arrow-ConsultasInventarios" class="ml-auto transform rotate-0 transition-transform">
                        &#x25BC; <!-- Flecha hacia abajo -->
                    </span>
                </div>

    
         
       </li>






<!-- Seccion Asignaciones Academicas  -->
<li class="flex flex-col items-start gap-2 p-3 transition-all duration-200 relative">
                <!-- Elemento principal -->
                <div class="flex items-center gap-4 cursor-pointer" onclick="toggleSubmenu('submenu-AsignacionesAcademicas')">
                    <img src="https://via.placeholder.com/24" alt="AsignacionesAcademicas" class="w-6 h-6">
                    <span class="text-sm font-medium">Asignaciones Academicas</span>
                    <!-- Flecha de expansión -->
                    <span id="arrow-AsignacionesAcademicas" class="ml-auto transform rotate-0 transition-transform">
                        &#x25BC; <!-- Flecha hacia abajo -->
                    </span>
                </div>

       <!-- Submenú -->
          <ul id="submenu-AsignacionesAcademicas" class="hidden bg-gray-700 text-white rounded-lg mt-2 ml-8 p-2 w-48 shadow-lg transition-all duration-300">
                  
                     <li class="hover:bg-gray-600 rounded p-2">
                        <a href="{{ route('AsignarTutoresAlum') }}" class="flex items-center gap-2">
                            <span class="text-sm">Tutores-Alumnos</span>
                        </a>
                    </li>



                    <li class="hover:bg-gray-600 rounded p-2">
                        <a href="" class="flex items-center gap-2">
                            <span class="text-sm">Contactos</span>
                        </a>
                    </li>

                    
                    <li class="hover:bg-gray-600 rounded p-2">
                        <a href="{{ route('AsignarGrupAlum') }}" class="flex items-center gap-2">
                            <span class="text-sm">Grupo-Alumnos</span>
                        </a>
                    </li>

                    <li class="hover:bg-gray-600 rounded p-2">
                        <a href="{{ route('AsignarGrupDocente') }}" class="flex items-center gap-2">
                            <span class="text-sm">Grupo-Docente</span>
                        </a>
                    </li>

                    <li class="hover:bg-gray-600 rounded p-2">
                        <a href="{{ route('AsignarGrupMateria') }}" class="flex items-center gap-2">
                            <span class="text-sm">Grupo-Materia</span>
                        </a>
                    </li>


          </ul>
       </li>



















            
            <li class="flex items-center gap-4 hover:bg-gray-800 rounded-lg p-3 transition-all duration-200">
                <img src="https://via.placeholder.com/24" alt="Cerrar Sesión" class="w-6 h-6">
                <span class="text-sm font-medium">Cerrar Sesión</span>
            </li>
        </ul>

        <!-- Botón de colapsar -->
        <button id="toggleSidebar"
            class="p-3 bg-purple-700 hover:bg-purple-600 text-white flex justify-center items-center rounded-md mt-12 transition-all duration-200">
            <span class="transform rotate-180 transition-transform" id="toggleIcon">←</span>
        </button>
    </div>
</div>

<script>
    // Función para alternar la visibilidad de los submenús
    function toggleSubmenu(submenuId) {
        var submenu = document.getElementById(submenuId);
        var arrow = document.getElementById('arrow-' + submenuId.split('-')[1]);
        
        submenu.classList.toggle('hidden');
        
        // Cambiar la dirección de la flecha
        if (submenu.classList.contains('hidden')) {
            arrow.classList.remove('rotate-180'); // Flecha hacia arriba
        } else {
            arrow.classList.add('rotate-180'); // Flecha hacia abajo
        }
    }
</script>
