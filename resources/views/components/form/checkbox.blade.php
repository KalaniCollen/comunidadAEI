<label for="{{ $name }}" class="label label--center">
    {!! Form::checkbox($name, $value, $checked, array_merge(['class' => 'checkbox', 'id' => $name], $attributes)) !!}
    <span class="checkmark checkmark--checkbox"></span>
    <span>{{ $label }}</span>
</label>
