<div class="footer__subcontent">
    <div class="footer__title">
        <h4 class="footer__title-text text--white">{{ $title }}</h4>
        <i class="footer__plus ion-md-add text--white"></i>
    </div>
    <ul class="footer__list">
        @foreach ($links as $link)
            <li class="footer__item">
                <a href="{{ route($link['link']) }}" class="footer__link">
                    <i class="footer__icon {{ $link['icon'] }}"></i>
                    {{ $link['name'] }}
                </a>
            </li>
        @endforeach
    </ul>
</div>
