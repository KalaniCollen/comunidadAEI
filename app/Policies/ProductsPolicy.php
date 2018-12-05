<?php

namespace ComunidadAEI\Policies;

use ComunidadAEI\User;
use ComunidadAEI\Productos;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductsPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the productos.
     *
     * @param  \ComunidadAEI\User  $user
     * @param  \ComunidadAEI\Productos  $productos
     * @return mixed
     */
    public function view(User $user, Productos $productos)
    {
        return $user->id_usuario === $productos->empresa->id_usuario;
    }

    /**
     * Determine whether the user can create productos.
     *
     * @param  \ComunidadAEI\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the productos.
     *
     * @param  \ComunidadAEI\User  $user
     * @param  \ComunidadAEI\Productos  $productos
     * @return mixed
     */
    public function update(User $user, Productos $productos)
    {
        return $user->id_usuario === $productos->empresa->id_usuario;
    }

    /**
     * Determine whether the user can delete the productos.
     *
     * @param  \ComunidadAEI\User  $user
     * @param  \ComunidadAEI\Productos  $productos
     * @return mixed
     */
    public function delete(User $user, Productos $productos)
    {
        return $user->id_usuario === $productos->empresa->id_usuario;
    }
}
