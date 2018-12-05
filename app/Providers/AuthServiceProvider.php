<?php

namespace ComunidadAEI\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'ComunidadAEI\Perfil_Usuario' => 'ComunidadAEI\Policies\PerfilUsuarioPolicy',
        'ComunidadAEI\Perfil_Empresa' => 'ComunidadAEI\Policies\PerfilEmpresaPolicy',
        'ComunidadAEI\Album' => 'ComunidadAEI\Policies\AlbumPolicy',
        'ComunidadAEI\Servicios' => 'ComunidadAEI\Policies\ServicesPolicy',
        'ComunidadAEI\Productos' => 'ComunidadAEI\Policies\ProductsPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('owner', function($user, $perfil) {
            return $user->id_usuario == $perfil->id_usuario;
        });
    }
}
