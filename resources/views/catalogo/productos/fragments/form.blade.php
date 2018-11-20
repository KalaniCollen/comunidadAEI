{!! Form::inText('nombre', isset($producto->nombre) ? $producto->nombre : '' , 'Nombre del producto', false) !!}

<div class="group">
    {!! Form::label('descripcion', 'Descripción', ['class' => 'label']) !!}
    {!! Form::textarea('descripcion',isset($producto->descripcion) ? $producto->descripcion : '' , ['class' => 'input']) !!}
    @if ($errors->has('descripcion'))
        @foreach ($errors->get('descripcion') as $error)
            <p class="error">{{ $error }}</p>
        @endforeach
    @endif
</div>

<div class="group">
    {!! Form::label('costo', 'Costo del producto', ['class' => 'label']) !!}
    {!! Form::number('costo', isset($producto->descuento) ? $producto->descuento : null, ['class' => 'input', 'min' => 1]) !!}
    @if ($errors->has('costo'))
        @foreach ($errors->get('costo') as $error)
            <p class="error">{{ $error }}</p>
        @endforeach
    @endif
</div>


<div class="group">
    {!! Form::label('descuento', 'Descuento a socios', ['class' => 'label']) !!}
    {!! Form::number('descuento', isset($producto->descuento) ? $producto->descuento : null, ['class' => 'input', 'min' => 0, 'max' => '100']) !!}
    @if ($errors->has('descuento'))
        @foreach ($errors->get('descuento') as $error)
            <p class="error">{{ $error }}</p>
        @endforeach
    @endif
</div>

{!! Form::inText('tipo', isset($producto->tipo) ? $producto->tipo : '' , 'Tipo de servicio', null) !!}

<div class="group">
    <label for="imagen-producto" class="file">
        <i class="file__icon ion-md-cloud-upload"></i>
        <input type="file" class="input" name="imagen" id="imagen-producto" accept="image/*" onchange="previewImage(this, 'js-img-preview', 'js-file-text');">
    </label>
    <span class="file__text" id="js-file-text"></span>
</div>
