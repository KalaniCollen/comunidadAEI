{!! Form::inTel('telefono_movil', $perfil_usuario->telefono_movil, 'Teléfono móvil') !!}

<div class="group">
    <label for="sexo" class="label">Sexo</label>
    {!! Form::inRadio('sexo', 'H', false,'Hombre') !!}
    {!! Form::inRadio('sexo', 'M', false,'Mujer') !!}
</div>

<div class="group">
    <label for="privacidad" class="label">Estado del perfil: </label>
    @php
        $privacidadText = Form::getValueAttribute('privacidad');
    @endphp
    {!! Form::inSwitch('privacidad', 0, $perfil_usuario->privacidad, ($privacidadText == 1) ? 'público' : 'privado') !!}
</div>
