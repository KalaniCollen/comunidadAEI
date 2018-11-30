<label for="{{ $name }}" class="label--center">
    @php
        $checked = (Form::getValueAttribute($name) == null) ? $checked : Form::getValueAttribute($name);
    @endphp
    {!! Form::checkbox($name, $checked, $checked, array_merge(['class' => 'switch', 'id' => $name], $attributes)) !!}
    <span class="checkmark checkmark--switch"></span>
    <span class="label">{{ $label }}</span>
</label>
