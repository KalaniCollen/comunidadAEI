<?php

namespace ComunidadAEI\Policies;

use ComunidadAEI\User;
use ComunidadAEI\Perfil_Empresa;
use Illuminate\Auth\Access\HandlesAuthorization;

class PerfilEmpresaPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the perfilEmpresa.
     *
     * @param  \ComunidadAEI\User  $user
     * @param  \ComunidadAEI\Perfil_Empresa  $perfilEmpresa
     * @return mixed
     */
    public function view(User $user, Perfil_Empresa $perfilEmpresa)
    {
        return $user->id_usuario === $perfilEmpresa->id_usuario;
    }

    /**
     * Determine whether the user can create perfilEmpresas.
     *
     * @param  \ComunidadAEI\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the perfilEmpresa.
     *
     * @param  \ComunidadAEI\User  $user
     * @param  \ComunidadAEI\Perfil_Empresa  $perfilEmpresa
     * @return mixed
     */
    public function update(User $user, Perfil_Empresa $perfilEmpresa)
    {
        return $user->id_usuario === $perfilEmpresa->id_usuario;
    }

    /**
     * Determine whether the user can delete the perfilEmpresa.
     *
     * @param  \ComunidadAEI\User  $user
     * @param  \ComunidadAEI\Perfil_Empresa  $perfilEmpresa
     * @return mixed
     */
    public function delete(User $user, Perfil_Empresa $perfilEmpresa)
    {
        return $user->id_usuario === $perfilEmpresa->id_usuario;
    }
}
