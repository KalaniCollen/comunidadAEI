{!! Form::inText('nombre', isset($producto->nombre) ? $producto->nombre : '' , 'Nombre del producto', true) !!}

<label for="imagen-producto">
    <input type="file" name="imagen" id="imagen-producto" accept="image/*" onchange="previewImage(this, 'js-img-preview');">
</label>

<div class="group">
    {!! Form::label('descripcion', 'Descripción', ['class' => 'label']) !!}
    {!! Form::textarea('descripcion',isset($producto->descripcion) ? $producto->descripcion : '' , ['class' => 'input']) !!}
</div>

<div class="group">
    {!! Form::label('costo', 'Costo del producto', ['class' => 'label']) !!}
    {!! Form::number('costo', isset($producto->descuento) ? $producto->descuento : '1', ['class' => 'input', 'min' => 1]) !!}
</div>


<div class="group">
    {!! Form::label('descuento', 'Descuento a socios', ['class' => 'label']) !!}
    {!! Form::number('descuento', isset($producto->descuento) ? $producto->descuento : '0', ['class' => 'input', 'min' => 0, 'max' => '100']) !!}
</div>

{!! Form::inText('tipo', isset($producto->tipo) ? $producto->tipo : '' , 'Tipo de servicio', null) !!}
