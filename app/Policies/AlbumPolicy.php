<?php

namespace ComunidadAEI\Policies;

use ComunidadAEI\User;
use ComunidadAEI\Album;
use Illuminate\Auth\Access\HandlesAuthorization;

class AlbumPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the album.
     *
     * @param  \ComunidadAEI\User  $user
     * @param  \ComunidadAEI\Album  $album
     * @return mixed
     */
    public function view(User $user, Album $album)
    {
        return $user->id_usuario == $album->id_usuario;
    }

    /**
     * Determine whether the user can create albums.
     *
     * @param  \ComunidadAEI\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the album.
     *
     * @param  \ComunidadAEI\User  $user
     * @param  \ComunidadAEI\Album  $album
     * @return mixed
     */
    public function update(User $user, Album $album)
    {
        return $user->id_usuario === $album->id_usuario;
    }

    /**
     * Determine whether the user can delete the album.
     *
     * @param  \ComunidadAEI\User  $user
     * @param  \ComunidadAEI\Album  $album
     * @return mixed
     */
    public function delete(User $user, Album $album)
    {
        return $user->id_usuario === $album->id_usuario;
    }
}
