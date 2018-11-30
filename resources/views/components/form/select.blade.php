<div class="group {{ $classesIn }} {{ ($errors->has($name) == 1) ? 'group--error' : '' }}">
    {!! Form::label($name, $label, ['class' => 'label']) !!}

    @php
        $selected = (Form::getValueAttribute($name) == null) ? $selected:Form::getValueAttribute($name);
    @endphp

    {!! Form::select($name, $list, $selected, array_merge(['class' => 'input', 'style' => 'background-color: #fff'], $options)) !!}

    @if ($errors->has($name))
        @foreach ($errors->get($name) as $error)
            <p class="error">{{ $error }}</p>
        @endforeach
    @endif
</div>
