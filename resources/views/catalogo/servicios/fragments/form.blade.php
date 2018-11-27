<div class="group">
    <p class="w-100 label">Imagen del servicio</p>
    <label for="imagen-servicio" class="file">
        <i class="file__icon ion-md-cloud-upload"></i>
        <input type="file" class="input" name="imagen" id="imagen-servicio" accept="image/*" onchange="previewImage(this, 'js-img-preview', 'js-file-text');">
    </label>
    <span class="file__text" id="js-file-text"></span>
</div>
{!! Form::inText('nombre', null, 'Nombre del servicio') !!}
{!! Form::inTextArea('descripcion', null, 'Descripción del servicio') !!}

<div class="group">
    {!! Form::label('descuento', 'Descuento a socios', ['class' => 'label']) !!}
    {!! Form::number('descuento', null, ['class' => 'input', 'min' => 0, 'max' => '100']) !!}
</div>

{!! Form::inText('tipo', null, 'Tipo de servicio') !!}

{!! Form::inTime('horario_inicio', null, 'Horario de servicio') !!}
{!! Form::inTime('horario_cierre', null, 'a') !!}
