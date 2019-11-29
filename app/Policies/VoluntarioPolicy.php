<?php

namespace App\Policies;

use App\User;
use App\Voluntarios;
use Illuminate\Auth\Access\HandlesAuthorization;

class VoluntarioPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any voluntarios.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the voluntarios.
     *
     * @param  \App\User  $user
     * @param  \App\Voluntarios  $voluntarios
     * @return mixed
     */
    public function view(User $user, Voluntarios $voluntarios)
    {
        //
    }

    /**
     * Determine whether the user can create voluntarios.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the voluntarios.
     *
     * @param  \App\User  $user
     * @param  \App\Voluntarios  $voluntarios
     * @return mixed
     */
    public function update(User $user, Voluntarios $voluntarios)
    {
        //
    }

    /**
     * Determine whether the user can delete the voluntarios.
     *
     * @param  \App\User  $user
     * @param  \App\Voluntarios  $voluntarios
     * @return mixed
     */
    public function delete(User $user, Voluntarios $voluntarios)
    {
        //
    }

    /**
     * Determine whether the user can restore the voluntarios.
     *
     * @param  \App\User  $user
     * @param  \App\Voluntarios  $voluntarios
     * @return mixed
     */
    public function restore(User $user, Voluntarios $voluntarios)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the voluntarios.
     *
     * @param  \App\User  $user
     * @param  \App\Voluntarios  $voluntarios
     * @return mixed
     */
    public function forceDelete(User $user, Voluntarios $voluntarios)
    {
        //
    }
}
