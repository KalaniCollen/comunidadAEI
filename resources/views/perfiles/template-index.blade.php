<div class="section__header">
    <h1 class="section__title">{{ $titleSection }}</h1>
    @if (Auth::check())
        <div class="profile__edit">
            <a href="{{ route($route, $object) }}" class="btn btn--accent">
                <i class="btn__icon ion-md-create"></i>
                Editar perfil
            </a>
        </div>
    @endif
</div>

<header class="profile__header">
    <img src="{{ $profileImage }}" alt="Imagen de perfil" class="profile__picture">
    <h1 class="profile__name">{{ $profileName }}</h1>
    @isset($profileSubtitle)
        <h2 class="profile__pin"><i class="ion-md-{{ $profileSubtitleIcon }}"></i> {{ $profileSubtitle }}</h2>
    @endisset
</header>

<div class="row profile__information">
    @foreach ($information as $i => $info)
        @isset($info['text'])
            <div class="col-sm-12 col-md-6 col-lg-4 profile__data">
                <h3>{{ $info['title'] }}</h3>
                @empty(!$info['text'])
                    <p class="h5"><i class="ion-md-{{ $info['icon'] }}"></i> {{ $info['text'] }}</p>
                @endempty
                @isset($info['link'])
                    <a class="h5" href="{{ $info['link'] }}" target="_blank"><i class="ion-md-{{ $info['icon'] }}"></i> {{ $info['link'] }}</a>
                @endisset
            </div>
        @endisset
    @endforeach
</div>
