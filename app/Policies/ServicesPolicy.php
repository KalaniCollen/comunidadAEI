<?php

namespace ComunidadAEI\Policies;

use ComunidadAEI\User;
use ComunidadAEI\Servicios;
use Illuminate\Auth\Access\HandlesAuthorization;

class ServicesPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the servicios.
     *
     * @param  \ComunidadAEI\User  $user
     * @param  \ComunidadAEI\Servicios  $servicios
     * @return mixed
     */
    public function view(User $user, Servicios $servicios)
    {
        return $user->id_usuario === $servicios->empresa->id_usuario;
    }

    /**
     * Determine whether the user can create servicios.
     *
     * @param  \ComunidadAEI\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the servicios.
     *
     * @param  \ComunidadAEI\User  $user
     * @param  \ComunidadAEI\Servicios  $servicios
     * @return mixed
     */
    public function update(User $user, Servicios $servicios)
    {
        return $user->id_usuario === $servicios->empresa->id_usuario;
    }

    /**
     * Determine whether the user can delete the servicios.
     *
     * @param  \ComunidadAEI\User  $user
     * @param  \ComunidadAEI\Servicios  $servicios
     * @return mixed
     */
    public function delete(User $user, Servicios $servicios)
    {
        return $user->id_usuario === $servicios->empresa->id_usuario;
    }
}
