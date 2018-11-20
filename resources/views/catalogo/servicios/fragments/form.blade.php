{!! Form::inText('nombre', isset($servicio->nombre) ? $servicio->nombre : '' , 'Nombre del servicio', false) !!}

{{-- <label for="imagen-servicio">
    <input type="file" name="imagen" id="imagen-servicio" accept="image/*" onchange="previewImage(this, 'js-img-preview');">
</label> --}}

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
