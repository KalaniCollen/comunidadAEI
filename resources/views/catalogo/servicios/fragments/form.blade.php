{!! Form::inText('nombre', isset($servicio->nombre) ? $servicio->nombre : '' , 'Nombre del servicio', false) !!}

<div class="group">
    {!! Form::label('descripcion', 'Descripción', ['class' => 'label']) !!}
    {!! Form::textarea('descripcion',isset($servicio->descripcion) ? $servicio->descripcion : '' , ['class' => 'input']) !!}
</div>

{!! Form::inText('tipo', isset($servicio->tipo) ? $servicio->tipo : '' , 'Tipo de servicio', false) !!}

<div class="group">
    {!! Form::label('descuento', 'Descuento a socios', ['class' => 'label']) !!}
    {!! Form::number('descuento', isset($servicio->descuento) ? $servicio->descuento : '0', ['class' => 'input', 'min' => 0, 'max' => '100']) !!}
</div>

<div class="group">
    {!! Form::label('', 'Horario de atención', ['class' => 'label']) !!}
    {!! Form::time('horario_inicio', isset($servicio->horario_inicio) ? $servicio->horario_inicio : '00:00', ['class' => 'input']) !!}
    {!! Form::time('horario_cierre', isset($servicio->horario_cierre) ? $servicio->horario_cierre : '00:00', ['class' => 'input']) !!}
</div>

<div class="group">
    <label for="imagen-servicio" class="file">
        <i class="file__icon ion-md-cloud-upload"></i>
        <input type="file" class="input" name="imagen" id="imagen-servicio" accept="image/*" onchange="previewImage(this, 'js-img-preview', 'js-file-text');">
    </label>
    <span class="file__text" id="js-file-text"></span>
</div>
