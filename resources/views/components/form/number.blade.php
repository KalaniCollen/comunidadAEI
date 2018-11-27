<div class="group {{ ($material == true) ? 'group--material': '' }}">
    {!! Form::label($name, $label, ['class' => 'label']) !!}
    {!! Form::number($name, $value, ['class' => 'input', 'min' => '0']) !!}
    @if ($material)
        <span class="input__decoration {{ ($errors->has($name) == 1) ? 'input__decoration--error' : '' }}"></span>
    @endif
    @if ($errors->has($name))
        @foreach ($errors->get($name) as $error)
            <p class="error">{{ $error }}</p>
        @endforeach
    @endif
</div>
