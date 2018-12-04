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

        @component('components.subcontent-footer', [
            'title' => 'Redes Sociales',
            'links' => [
                ['link' => '/', 'name' => 'Facebook', 'icon' => 'ion-logo-facebook'],
                ['link' => '/', 'name' => 'Twitter', 'icon' => 'ion-logo-twitter'],
                ['link' => '/', 'name' => 'Instagram', 'icon' => 'ion-logo-instagram'],
            ]
        ])
        @endcomponent

        @component('components.subcontent-footer', [
            'title' => 'Datos Técnicos',
            'links' => [
                ['link' => 'developers.index', 'name' => 'Desarrolladores', 'icon' => 'ion-md-code-working'],
                ['link' => 'api.index', 'name' => 'API\'S Comunidad AEI', 'icon' => 'ion-md-code'],
                ['link' => '/', 'name' => 'Soporte', 'icon' => 'ion-md-help-buoy'],
            ]
        ])
        @endcomponent
    </div>
</footer>
