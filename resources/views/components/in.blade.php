<div>
    <label for="{{ $id }}">{{ $label }}</label>
    <input class="input" type="{{ $type }}" name="{{ $name }}" value="{{ old($name) }}" id="{{ $id }}" required>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    @endif
</div>
