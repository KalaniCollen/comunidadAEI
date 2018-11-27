{!! Form::inTel('telefono_movil', null, 'Teléfono móvil') !!}



<div class="group">
    <label for="sexo" class="label">Sexo</label>
    {!! Form::inRadio('sexo', 'H', 'Hombre') !!}
    {!! Form::inRadio('sexo', 'M', 'Mujer') !!}
</div>

<div class="group">
    <label for="privacidad" class="label">Perfil privado</label>
    {!! Form::inSwitch('privacidad', 0, null) !!}
</div>
