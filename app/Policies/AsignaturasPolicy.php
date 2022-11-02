<?php

namespace App\Policies;

use App\Models\Modulo_Horario\Asignaturas;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class AsignaturasPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modulo_Horario\Asignaturas  $asignaturas
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Asignaturas $asignaturas)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modulo_Horario\Asignaturas  $asignaturas
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Asignaturas $asignaturas)
    {
        return $user->id === $asignaturas->user_id
            ? Response::allow()
            : Response::denyWithStatus(404);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modulo_Horario\Asignaturas  $asignaturas
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Asignaturas $asignaturas)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modulo_Horario\Asignaturas  $asignaturas
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Asignaturas $asignaturas)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modulo_Horario\Asignaturas  $asignaturas
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Asignaturas $asignaturas)
    {
        //
    }
}
