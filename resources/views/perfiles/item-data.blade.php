@isset($obj['data'])
    <div class="{{ $obj['size'] }} profile__data">
        <h2>{{ $obj['title'] }}</h2>
        <p class="h4"><i class="{{ $obj['icon'] }}"></i> {{ $obj['data'] }}</p>
    </div>
@endisset
