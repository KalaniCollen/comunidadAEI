<label for="{{ $name }}" class="label label--center">
    @php
        $checked = Form::getValueAttribute($name);
    @endphp
    {!! Form::checkbox($name, null, $checked, array_merge(['class' => 'checkbox', 'id' => $name], $attributes)) !!}
    <span class="checkmark checkmark--checkbox"></span>
    <span>{{ $label }}</span>
</label>
