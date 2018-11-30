<div class="group {{ $classesIn }} {{ ($errors->has($name) == 1) ? 'group--error' : '' }}">
    {!! Form::label($name, $label, ['class' => 'label']) !!}

    @php
        $value = (Form::getValueAttribute($name) == null) ? $value:Form::getValueAttribute($name);
    @endphp

    @if (str_contains($classesIn, 'group--material'))
        <i class="input__icon ion-md-{{ $icon }}"></i>
    @endif

    {!! Form::text($name, $value, array_merge(['class' => 'input'], $options)) !!}

    @if (str_contains($classesIn, 'group--material'))
        <span class="input__decoration {{ ($errors->has($name) == 1) ? 'input__decoration--error' : '' }}"></span>
    @endif

    @if ($errors->has($name))
        @foreach ($errors->get($name) as $error)
            <p class="error">{{ $error }}</p>
        @endforeach
    @endif
</div>
