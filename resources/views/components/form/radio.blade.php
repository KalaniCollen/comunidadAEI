<label for="{{ $value }}" class="label--center">
    {!! Form::radio($name, $value, $checked, ['class' => 'radio', 'id' => $value]) !!}
    <span class="checkmark checkmark--radio"></span>
    <span class="label">{{ $label }}</span>
</label>
