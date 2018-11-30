<label for="{{ $name }}" class="label--center">
    @php
        $checked = (Form::getValueAttribute($name) == null) ? $checked : Form::getValueAttribute($name);
    @endphp
    {!! Form::checkbox($name, null, $checked, array_merge(['class' => 'checkbox', 'id' => $name], $attributes)) !!}
    <span class="checkmark checkmark--checkbox"></span>
    <span class="label">{{ $label }}</span>
</label>
