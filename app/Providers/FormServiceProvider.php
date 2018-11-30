<?php

namespace ComunidadAEI\Providers;

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

        # Registrar componentes para Laravel Collective
        \Form::component('inRadio', 'components.form.radio', ['name', 'value', 'checked' => false, 'label' => 'Radio', 'attributes' => []]);

        \Form::component('inCheck', 'components.form.checkbox', ['name', 'value', 'checked' => false, 'label' => 'Checkbox', 'attributes' => []]);

        \Form::component('inSwitch', 'components.form.switch', ['name', 'value', 'checked' => false, 'label' => 'Switch', 'attributes' => []]);

        \Form::component('inTel', 'components.form.tel', ['name', 'value', 'label' => 'Phone', 'classesIn' => '', 'options' => '']);

        \Form::component('inTime', 'components.form.time', ['name', 'value', 'label' => 'Time', 'classesIn' => '', 'options' => '']);

        \Form::component('inDateTime', 'components.form.datetime', ['name', 'value', 'label' => 'Time', 'classesIn' => '', 'options' => '']);

        \Form::component('inText', 'components.form.text', ['name', 'value', 'label' => 'Texto', 'classesIn' => '', 'options' => []]);

        \Form::component('inNumber', 'components.form.number', ['name', 'value', 'label' => 'Texto', 'classesIn' => '', 'options' => []]);

        \Form::component('inEmail', 'components.form.email', ['name', 'value', 'label' => 'Email', 'classesIn' => '', 'options' => [] , 'icon' => null]);

        \Form::component('inTextArea', 'components.form.textarea', ['name', 'value', 'label' => 'TextArea', 'classesIn' => '', 'icon' => null, 'options' => [] ] );

        \Form::component('inSelect', 'components.form.select', ['name', 'selected', 'label' => 'TextArea', 'list' => [], 'classesIn' => '', 'options' => []] );

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
