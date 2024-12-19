<div class="sidebar w-64 bg-gray-800 h-screen p-4 fixed top-0 left-0 z-70">
<p>"   "</p>
<p>"   "</p>
<p>"   "</p>
  <a class="block text-white font-bold py-2 px-4 rounded hover:bg-gray-300 active:bg-gray-300" href="#">Home</a>

  <!-- Submenu for Registros Financieros -->
      <div x-data="{ open: false }">
         <div 
                class="flex justify-between items-center text-white font-bold py-2 px-4 rounded hover:bg-gray-300 cursor-pointer"
                @click="open = !open"
              >
                <span>Registros Financieros</span>
                <svg
                  :class="{'rotate-180': open}"
                  class="w-5 h-5 transition-transform duration-300"
                  fill="none"
                  stroke="currentColor"
                  viewBox="0 0 24 24"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
              </div>
              <div x-show="open" class="pl-6">
                <a class="block text-black py-1 px-2 rounded hover:bg-gray-200" href="{{ route('VistaRegistrarPago') }}">Pagos</a>
                <a class="block text-black py-1 px-2 rounded hover:bg-gray-200" href="{{ route('VistaRegistrarDescuento') }}">Descuento</a>
                <a class="block text-black py-1 px-2 rounded hover:bg-gray-200" href="{{ route('VistaRegistrarConcepto') }}">Concepto</a>
                <a class="block text-black py-1 px-2 rounded hover:bg-gray-200" href="{{ route('VistaRegistrarCompra') }}">Compra</a>


          </div>
       </div>


<!-- Submenu for Registros Academicos -->
    <div x-data="{ open: false }">
         <div 
                class="flex justify-between items-center text-white font-bold py-2 px-4 rounded hover:bg-gray-200 cursor-pointer"
                @click="open = !open"
              >
                <span>Registros Academicos</span>
                <svg
                  :class="{'rotate-180': open}"
                  class="w-5 h-5 transition-transform duration-300"
                  fill="none"
                  stroke="currentColor"
                  viewBox="0 0 24 24"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
              </div>
              <div x-show="open" class="pl-6">
                <a class="block text-black py-1 px-2 rounded hover:bg-gray-200" href="{{ route('VistaRegistrarAlumno') }}">Alumno</a>
                <a class="block text-black py-1 px-2 rounded hover:bg-gray-200" href="{{ route('VistaRegistrarTutor') }}">Tutor</a>
                <a class="block text-black py-1 px-2 rounded hover:bg-gray-200" href="{{ route('VistaRegistrarMateria') }}">Materia</a>
                <a class="block text-black py-1 px-2 rounded hover:bg-gray-200" href="{{ route('VistaRegistrarGrupo') }}">Grupo</a>
                <a class="block text-black py-1 px-2 rounded hover:bg-gray-200" href="{{ route('VistaRegistrarDocente') }}">Docente</a>
                <a class="block text-black py-1 px-2 rounded hover:bg-gray-200" href="{{ route('VistaRegistrarCoordi') }}">Coordinador</a>
                <a class="block text-black py-1 px-2 rounded hover:bg-gray-200" href="{{ route('VistaRegistrarAula') }}">Aula</a>
                <a class="block text-black py-1 px-2 rounded hover:bg-gray-200" href="{{ route('VistaRegistrarAdmin') }}">Administrador</a>

          </div>
       </div>


<!-- Submenu for Registros Inventario -->
        <div x-data="{ open: false }">
         <div 
                class="flex justify-between items-center text-white font-bold py-2 px-4 rounded hover:bg-gray-200 cursor-pointer"
                @click="open = !open"
              >
                <span>Registros Inventario</span>
                <svg
                  :class="{'rotate-180': open}"
                  class="w-5 h-5 transition-transform duration-300"
                  fill="none"
                  stroke="currentColor"
                  viewBox="0 0 24 24"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
              </div>
              <div x-show="open" class="pl-6">
                <a class="block text-black py-1 px-2 rounded hover:bg-gray-200" href="">#</a>
                <a class="block text-black py-1 px-2 rounded hover:bg-gray-200" href="">#</a>
          


          </div>
       </div>



<!-- Submenu for Consultas Academicos -->
        <div x-data="{ open: false }">
         <div 
                class="flex justify-between items-center text-white font-bold py-2 px-4 rounded hover:bg-gray-200 cursor-pointer"
                @click="open = !open"
              >
                <span>Consultas Academicas</span>
                <svg
                  :class="{'rotate-180': open}"
                  class="w-5 h-5 transition-transform duration-300"
                  fill="none"
                  stroke="currentColor"
                  viewBox="0 0 24 24"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
              </div>
              <div x-show="open" class="pl-6">
                <a class="block text-black py-1 px-2 rounded hover:bg-gray-200" href="{{ route('ListaVestimentas') }}">Uniforme</a>
                <a class="block text-black py-1 px-2 rounded hover:bg-gray-200" href="{{ route('ListaAlumnos') }}">Alumnos</a>
                <a class="block text-black py-1 px-2 rounded hover:bg-gray-200" href="{{ route('ListaTutores') }}">Tutores</a>
                <a class="block text-black py-1 px-2 rounded hover:bg-gray-200" href="{{ route('ListaGrupos') }}">Grupos</a>
                <a class="block text-black py-1 px-2 rounded hover:bg-gray-200" href="{{ route('ListaDocentes') }}">Docentes</a>
                <a class="block text-black py-1 px-2 rounded hover:bg-gray-200" href="{{ route('ListaCoordinadores') }}">Coordinadores</a>
                <a class="block text-black py-1 px-2 rounded hover:bg-gray-200" href="{{ route('ListaAdmin') }}">Administradores</a>

          </div>
       </div>






<!-- Submenu for Consultas Financieras -->
    <div x-data="{ open: false }">
         <div 
                class="flex justify-between items-center text-white font-bold py-2 px-4 rounded hover:bg-gray-200 cursor-pointer"
                @click="open = !open"
              >
                <span>Consultas Financieras</span>
                <svg
                  :class="{'rotate-180': open}"
                  class="w-5 h-5 transition-transform duration-300"
                  fill="none"
                  stroke="currentColor"
                  viewBox="0 0 24 24"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
              </div>
              <div x-show="open" class="pl-6">
                <a class="block text-black py-1 px-2 rounded hover:bg-gray-200" href="{{ route('ListaColegiaturas') }}">Colegiaturas</a>
                <a class="block text-black py-1 px-2 rounded hover:bg-gray-200" href="{{ route('ListaColegiaturasPendientes') }}">ColegiaturasPendientes</a>
                <a class="block text-black py-1 px-2 rounded hover:bg-gray-200" href="{{ route('ListaPagos') }}">Pagos</a>
                <a class="block text-black py-1 px-2 rounded hover:bg-gray-200" href="{{ route('ListaCompras') }}">Compras</a>
                <a class="block text-black py-1 px-2 rounded hover:bg-gray-200" href="{{ route('ListaVentas') }}">Ventas</a>

          </div>
       </div>



  <!-- Submenu for Consultas Inventarios -->
        <div x-data="{ open: false }">
         <div 
                class="flex justify-between items-center text-white font-bold py-2 px-4 rounded hover:bg-gray-200 cursor-pointer"
                @click="open = !open"
              >
                <span>Consultas Inventarios</span>
                <svg
                  :class="{'rotate-180': open}"
                  class="w-5 h-5 transition-transform duration-300"
                  fill="none"
                  stroke="currentColor"
                  viewBox="0 0 24 24"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
              </div>
              <div x-show="open" class="pl-6">
                <a class="block text-black py-1 px-2 rounded hover:bg-gray-200" href="">#</a>
                <a class="block text-black py-1 px-2 rounded hover:bg-gray-200" href="">#</a>

          </div>
       </div>



      <!-- Submenu for Asignaciones Academicas -->
        <div x-data="{ open: false }">
         <div 
                class="flex justify-between items-center text-white font-bold py-2 px-4 rounded hover:bg-gray-200 cursor-pointer"
                @click="open = !open"
              >
                <span>Asignaciones Academicas</span>
                <svg
                  :class="{'rotate-180': open}"
                  class="w-5 h-5 transition-transform duration-300"
                  fill="none"
                  stroke="currentColor"
                  viewBox="0 0 24 24"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
              </div>
              <div x-show="open" class="pl-6">
                <a class="block text-black py-1 px-2 rounded hover:bg-gray-200" href="{{ route('ListaTutoresAlumnos') }}">Tutores-Alumnos</a>
                <a class="block text-black py-1 px-2 rounded hover:bg-gray-200" href="">Contactos</a>
                <a class="block text-black py-1 px-2 rounded hover:bg-gray-200" href="{{ route('ListaGruposAlumnos') }}">Grupo-Alumnos</a>
                <a class="block text-black py-1 px-2 rounded hover:bg-gray-200" href="{{ route('ListaGruposDocentes') }}">Grupo-Docente</a>
                <a class="block text-black py-1 px-2 rounded hover:bg-gray-200" href="{{ route('ListaGruposMaterias') }}">Grupo-Materia</a>

          </div>
       </div>








  <!-- Other links go here -->
</div>
