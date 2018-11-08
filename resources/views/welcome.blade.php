@extends('layouts.head')
@section('content')
    <header class="header">
        <div class="header__container">
            <div class="header__logo"></div>
            <h1 class="header__title">Asociación de Empresarios de Iztapalapa A.C.</h1>
            <span class="header__date">1968 - 2018</span>
        </div>
        <div class="scroll">
            <span class="icon__mouse"></span>
            <i class="icon__arrow ion-ios-arrow-down"></i>
        </div>
    </header>
    <a name="socios"></a>
    <main>
        <a name="quienes-somos"></a>
        <section class="section section-socios">
            <h2 class="section__title">Empresas Asociadas</h2>
            <div class="slider">
                <div class="glide">
                    <div class="glide__track" data-glide-el="track">
                        <ul class="glide__slides">
                            @component('components.item-slider',[
                                "link" => "http://www.iztapalapa.tecnm.mx/",
                                "img"  => "escudo_ITIZ_original.png"])
                            @endcomponent
                            @component('components.item-slider',[
                                "link" => "https://calentadoresdelta.com/",
                                "img"  => "delta.png"])
                            @endcomponent
                            @component('components.item-slider',[
                                "link" => "http://www.corev.com.mx/",
                                "img"  => "corev.png"])
                            @endcomponent
                            @component('components.item-slider',[
                                "link" => "http://www.austromex.com.mx/",
                                "img"  => "austromex.jpg"])
                            @endcomponent
                            @component('components.item-slider',[
                                "link" => "https://www.esperanza.mx/",
                                "img"  => "esperanza.png"])
                            @endcomponent
                            @component('components.item-slider',[
                                "link" => "http://www.galasjanel.com.mx/",
                                "img"  => "janel.png"])
                            @endcomponent
                            @component('components.item-slider',[
                                "link" => "https://heinekenmexico.com/",
                                "img"  => "cuamoc_logoB.png"])
                            @endcomponent
                            @component('components.item-slider',[
                                "link" => "http://www.fabpsa.com.mx/",
                                "img"  => "fabpsa.jpg"])
                            @endcomponent
                            @component('components.item-slider',[
                                "link" => "http://www.potenciaindustrial.com.mx/",
                                "img"  => "logo-dark.png"])
                            @endcomponent
                            @component('components.item-slider',[
                                "link" => "https://www.4dioses.com/",
                                "img"  => "FROoWSjo_400x400.jpg"])
                            @endcomponent
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <section class="section section-quienes-somos">
            <div class="section-quienes-somos__content">
                <h2 class="section__title">¿Quiénes Somos?</h2>
                <p>Somos una Organización No Gubernamental (ONG) <span class="text--accent">Fundada el 04 de abril de 1968</span>.</p><br>
                <p>En los 50 años de haberse formado esta Asociación al día de hoy nos hemos fortalecido y <span class="text--accent">contamos con más de 180 empresas asociadas de 6 diferentes delegaciones</span>, siendo en su mayoría pertenecientes a esta demarcación, <span class="text--accent">nuestros agremiados generan más de 50,000 puestos de trabajo alrededor de la República Mexicana.</span></p><br>
                <p>Siendo la delegación Iztapalapa el 2º municipio más poblado del país, teniendo el mayor presupuesto de la Ciudad, viviendo diversas problemáticas, con un mayor número de empresas en comparación con 10 entidades de la República Mexicana, es un honor para nosotros trabajar día a día para generar impulso en la economía e incentivar a las empresas para que apoyen la labor de gobierno y sociedad, de ésta forma crear mayores y mejores oportunidades.</p>
            </div>
        </section>

        <a name="afiliate"></a>
        <section class="section section-afiliate">
            <div class="section-afiliate__decoration">
                <img src="/img/logoAEI-blanco.png" alt="" class="section-afiliate__decoration-img">
                <h3 class="section-afiliate__decoration-title">Contactanos</h3>
                <p class="section-afiliate__decoration-text">Forma parte de esta gran asociación y aprende a ser un buen lider para tu negocio.</p>
            </div>
            @if ($errors->any())
                @foreach ($error as $errors)
                    <p>{{ $error }}</p>
                @endforeach

            @endif
            <form action="{{ route('afiliate') }}" method="post" class="section-afiliate__form">
                {{ csrf_field() }}
                <h2>Afiliate</h2>
                <div class="form__input form__input--column">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" class="form__input-input" required="required">
                </div>
                <div class="form__input form__input--column">
                    <label for="empresa" class="form__input-label">Empresa</label>
                    <input type="text" name="empresa" class="form__input-input" required="required">
                </div>
                <div class="form__input form__input--column">
                    <label for="telefono">Teléfono</label>
                    <input type="tel" maxlength="10" name="telefono" class="form__input-input" required="required">
                </div>
                <div class="form__input form__input--column">
                    <label for="correo">Correo Electrónico</label>
                    <input type="email" name="correo" class="form__input-input" required="required" value="{{ old('correo') }}">
                </div>
                <div class="form__input form__input--column">
                    <label for="mensaje">Mensaje</label>
                    <textarea name="mensaje" class="form__text-input" required="required"></textarea>
                </div>
                <input type="submit" value="Enviar" class="btn btn--big btn--accent">
            </form>
        </section>
    </main>
@endsection
@section('scripts')
    <script src="/js/glide.min.js" charset="utf-8"></script>
    <script type="text/javascript">
        let scrollIcon = document.getElementsByClassName('scroll');
        scrollIcon[0].addEventListener('click', e => {
            let header = document.getElementsByClassName('header')[0];
            window.scroll(0, header.offsetHeight);
        });

        new Glide('.glide', {
            type: 'carousel',
            autoplay: 1500,
            startAt: 0,
            perView: 8
        }).mount()
    </script>
@endsection
