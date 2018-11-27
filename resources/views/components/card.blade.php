<div class="card">
    @if (isset($url) && isset($picture) && isset($name))
        <a href="{{ $url }}" class="card__owner">
            <img src="{{ $picture }}" alt="" class="card__owner-picture">
            <p class="card__owner-name">{{ $name }}</p>
        </a>
    @endif
    <div style="background-image: url({{ $image }})" class="card__image"></div>
    @if(isset($title) && isset($date) && isset($description))
        <div class="card__body">
            <p class="card__title">{{ $title }}</p>
            <p class="card__date">{{ Date::make($date)->format('d F Y') }}</p>
            <p class="card__description">{{ $description }}</p>
        </div>
    @endif
    @isset($slot)
        <div class="card__footer">
            {{ $slot }}
        </div>
    @endisset
</div>
