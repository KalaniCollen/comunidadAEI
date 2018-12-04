<?php

namespace ComunidadAEI\Policies;

use ComunidadAEI\User;
use ComunidadAEI\Perfil_Usuario;
use Illuminate\Auth\Access\HandlesAuthorization;

class PerfilUsuarioPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the perfilUsuario.
     *
     * @param  \ComunidadAEI\User  $user
     * @param  \ComunidadAEI\Perfil_Usuario  $perfilUsuario
     * @return mixed
     */
    public function view(User $user, Perfil_Usuario $perfilUsuario)
    {
        return $user->id_usuario === $perfilUsuario->id_usuario;
    }

    /**
     * Determine whether the user can create perfilUsuarios.
     *
     * @param  \ComunidadAEI\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->id_usuario;
    }

    /**
     * Determine whether the user can update the perfilUsuario.
     *
     * @param  \ComunidadAEI\User  $user
     * @param  \ComunidadAEI\Perfil_Usuario  $perfilUsuario
     * @return mixed
     */
    public function update(User $user, Perfil_Usuario $perfilUsuario)
    {
        return $user->id_usuario === $perfilUsuario->id_usuario;
    }

    /**
     * Determine whether the user can delete the perfilUsuario.
     *
     * @param  \ComunidadAEI\User  $user
     * @param  \ComunidadAEI\Perfil_Usuario  $perfilUsuario
     * @return mixed
     */
    public function delete(User $user, Perfil_Usuario $perfilUsuario)
    {
        return $user->id_usuario === $perfilUsuario->id_usuario;
    }
}
