<div class="card">
    <div class="card__owner">
        <img src="{{ $userimg }}" alt="" class="user__picture card-user--picture">
        <p class="user__username card-user--username">{{ $username }}</p>
    </div>
    <div class="card__image">
        <div style="background-image: url('storage/catalogos_img/{{ $img }}');" class="card__image-img"></div>
    </div>
    <div class="card__wrap">
        <div class="card__body">
            <h5 class="card__title">{{ $title }}</h5>
            <p class="card__date"> {{ Carbon\Carbon::parse($date)->format('d M Y') }}</p>
            <p class="card__content">
                {{ $description }} <br>
                {{ $data }}
            </p>
        </div>
        <div class="card__actions card__actions--space">
            {{ $slot }}
        </div>
    </div>
</div>
