<?php

namespace App\Observers;

use App\Models\Grupo;
use App\Models\GruposAlumno;

class GruposAlumnoObserver
{
    /**
     * Handle the GruposAlumno "created" event.
     */
    public function created(GruposAlumno $gruposAlumno): void
    {
        $this->actualizarCantidadAlumnos($gruposAlumno->idGrupo);
    }

    /**
     * Handle the GruposAlumno "updated" event.
     */
    public function updated(GruposAlumno $gruposAlumno): void
    {
        //
    }

    /**
     * Handle the GruposAlumno "deleted" event.
     */
    public function deleted(GruposAlumno $gruposAlumno): void
    {
        $this->actualizarCantidadAlumnos($gruposAlumno->idGrupo);
    }

    /**
     * Handle the GruposAlumno "restored" event.
     */
    public function restored(GruposAlumno $gruposAlumno): void
    {
        //
    }

    /**
     * Handle the GruposAlumno "force deleted" event.
     */
    public function forceDeleted(GruposAlumno $gruposAlumno): void
    {
        //
    }

    /**
     * Actualizar la cantidad de alumnos en el grupo.
     *
     * @param int $idGrupo
     * @return void
     */
    public function actualizarCantidadAlumnos($idGrupo): void
    {
        $grupo = Grupo::find($idGrupo);
        if ($grupo) {
            $grupo->CantidadAlum = GruposAlumno::where('idGrupo', $idGrupo)->count();
            $grupo->save();
        }
    }
}
