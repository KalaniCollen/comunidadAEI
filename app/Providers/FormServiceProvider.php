<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class FormServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

        // # Registrar componentes para Laravel Collective
        \Form::component('check', 'components.form.checkbox', ['name', 'value' => null, 'checked' => true, 'label' => 'Checkbox', 'attributes' => []]);

        \Form::component('radiobtn', 'components.form.radio', ['name', 'value' => null, 'checked' => false, 'label' => 'Radio', 'attributes' => []]);

        \Form::component('switchbtn', 'components.form.switch', ['name', 'checked' => false, 'label' => 'Switch', 'attributes' => []]);

        \Form::component('tel', 'components.form.tel', ['name', 'value' => null, 'label' => 'Phone', 'attributes' => []]);

        \Form::component('inText', 'components.form.text', ['name', 'value' => null, 'label' => 'Texto', 'material' => false]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
