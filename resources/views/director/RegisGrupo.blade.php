<x-director.layout>

    <div class=" flex items-center led2 posicionsregisalum">
      
        <form class="" action="{{ route('RegistrarGrupo') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Datos de Persona -->
            <h3>Datos</h3>

            <div class="form-group">
                <label for="NombreGrado">Grado:</label>
                <input type="number" name="NombreGrado" id="NombreGrado" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="NivelAcademico">Nivel Academico:</label>
                <input type="text" name="NivelAcademico" id="NivelAcademico" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="Clave">Clave:</label>
                <input type="text" name="Clave" id="Clave" class="form-control" required>
            </div>
          
            <div class="form-group">
                <label for="FechaInicio">Fecha de Inicio:</label>
                <input type="date" name="FechaInicio" id="FechaInicio" class="form-control" required>
            </div>

           
            <div class="form-group">
                <label for="FechaFin">Fecha de Fin:</label>
                <input type="date" name="FechaFin" id="FechaFin" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="Tipo">Tipo de Perido:</label>
                <select name="Tipo" id="Tipo" class="form-control" required>
                    <option value="">Seleccione</option>
                    <option value="Regular">Regular</option>
                    <option value="Extraescolar">Extraescolar</option>
                    <option value="Verano">Verano</option>
                </select>
            </div>


            <div class="form-group">
                <label for="Paquete">Paquete:</label>
                <input type="text" name="Paquete" id="Paquete" class="form-control" required>
            </div>



            <!-- Botón de envío -->
            <button type="submit" class="btn btn-primary">Registrar Grupo</button>
        </form>
    </div>

</x-director.layout>
