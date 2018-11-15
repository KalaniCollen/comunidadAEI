<label for="{{ $name }}" class="label label--center">
    {!! Form::checkbox($name, null, $checked, array_merge(['class' => 'switch', 'id' => $name], $attributes)) !!}
    <span class="checkmark checkmark--switch"></span>
    <span>{{ $label }}</span>
</label>
