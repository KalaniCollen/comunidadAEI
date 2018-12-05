<footer class="footer">
    <div class="footer__foot">
        <img src="/img/logoAEI-blanco.png" alt="" class="footer__foot-img">
        <p class="footer__foot-text">Asociación de Empresarios de Iztapalapa A.C. 1968 - 2018</p>
    </div>
    <div class="footer__content">
        @component('components.subcontent-footer', [
            'title' => 'Mapa del sitio',
            'links' => [
                ['link' => 'noticias.index', 'name' => 'Noticias', 'icon' => 'ion-md-paper'],
                ['link' => 'bolsa-trabajo.index', 'name' => 'Bolsa de Trabajo', 'icon' => 'ion-md-briefcase'],
                ['link' => 'politicas', 'name' => 'Terminos de uso ', 'icon' => 'ion ion-ios-document'],

            ]
        ])
        @endcomponent


        <div class="footer__subcontent">
            <div class="footer__title">
                <h4 class="footer__title-text text--white">Redes Sociales</h4>
                <i class="footer__plus ion-md-add text--white"></i>
            </div>
            <ul class="footer__list">
                @php
                    $social = [
                        ['link' => 'https://www.instagram.com/explore/locations/109753279100730/asociacion-de-empresarios-de-iztapalapa-ac/', 'icon' => 'ion-logo-instagram', 'name' => 'Instagram'],
                        ['link' => 'https://www.facebook.com/Asociaci%C3%B3n-de-Empresarios-de-Iztapalapa-AC-109753279100730/', 'icon' => 'ion-logo-facebook', 'name' => 'Facebook'],
                        ['link' => 'https://twitter.com/AEI_IZTAPALAPA', 'icon' => 'ion-logo-twitter', 'name' => 'Twitter']
                    ];
                @endphp
                @foreach ($social as $link)
                    <li class="footer__item">
                        <a href="{{ $link['link'] }}" target="_blank" class="footer__link">
                            <i class="footer__icon {{ $link['icon'] }}"></i>
                            {{ $link['name'] }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>


        @component('components.subcontent-footer', [
            'title' => 'Datos Técnicos',
            'links' => [
                ['link' => 'developers.index', 'name' => 'Desarrolladores', 'icon' => 'ion-md-code-working'],
            ]
        ])
        @endcomponent
    </div>
</footer>
