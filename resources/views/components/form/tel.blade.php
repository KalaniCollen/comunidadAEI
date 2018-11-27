<div class="group {{ $classesIn }} {{ ($errors->has($name) == 1) ? 'group--error' : '' }}">
    @php
        $value = Form::getValueAttribute($name);
    @endphp
    {!! Form::label($name, $label, ['class' => 'label']) !!}
    <input type="tel" name="{{ $name }}" id="{{ $name }}" value="{{ $value }}" class="input" maxlength="10" {{ $options }}>
    @if ($errors->has($name))
        @foreach ($errors->get($name) as $error)
            <p class="error">{{ $error }}</p>
        @endforeach
    @endif
</div>
