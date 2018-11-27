{{-- <div class="section__header">
    <h1 class="section__title">{{ $titleSection }}</h1>
    @if (Auth::check())
        <div class="profile__edit">
        </div>
    @endif
</div> --}}
<div class="profile__cover" style="background-image: url({{ asset('img/404.jpg') }});">
    <div class="profile__header">
        <img src="{{ $profileImage }}" alt="" class="profile__picture">
        <p class="montserrat-light h2 text--white">{{ $profileName }}</p>
        @isset($website)
            <a href="{{ $website }}" target="_blank" class="text--white"><i class="ion-md-globe"></i> {{ $website }}</a>
        @endisset
    </div>
    @if (Auth::check())
        <a href="{{ route($route, $object) }}" class="btn btn--accent">
            <i class="btn__icon ion-md-create"></i>
            Editar perfil
        </a>

        {{-- <button class="btn btn--ghost btn--ghost-white" id="js-btn-cover">
            <i class="btn__icon ion-md-camera"></i>
            Foto de portada
        </button> --}}
    @endif
</div>

{{-- <header class="profile__header">
    <img src="{{ $profileImage }}" alt="Imagen de perfil" class="profile__picture">
    <h1 class="profile__name">{{ $profileName }}</h1>
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
    @endforeach --}}
{{-- </div> --}}
