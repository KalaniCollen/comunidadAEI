@extends('layouts.app')
@section('content')
    <header class="header d-flex align-items-center">
        <video autoplay loop muted class="header__video" poster="/videos/Boulevard.jpg">
            <source src="/videos/Boulevard.webm" type="video/webm">
            <source src="/videos/Boulevard.mp4" type="video/mp4">
        </video>
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
                            @php
                                $contentSlider = [
                                    [ 'link' => 'https://calentadoresdelta.com/', 'img' => 'delta.png' ],
                                    [ 'link' => 'http://www.corev.com.mx/', 'img' => 'corev.png' ],
                                    [ 'link' => 'http://www.austromex.com.mx/', 'img' => 'austromex.jpg' ],
                                    [ 'link' => 'https://www.esperanza.mx/', 'img' => 'esperanza.png' ],
                                    [ 'link' => 'http://www.iztapalapa.tecnm.mx/', 'img' => 'escudo_ITIZ_original.png' ],
                                    [ 'link' => 'http://www.galasjanel.com.mx/', 'img' => 'janel.png' ],
                                    [ 'link' => 'https://heinekenmexico.com/', 'img' => 'cuamoc_logoB.png' ],
                                    [ 'link' => 'http://www.fabpsa.com.mx/', 'img' => 'fabpsa.jpg' ],
                                    [ 'link' => 'http://www.potenciaindustrial.com.mx/', 'img' => 'logo-dark.png' ],
                                    [ 'link' => 'https://www.4dioses.com/', 'img' => 'FROoWSjo_400x400.jpg' ],
                                    [ 'link' => 'https://www.len.com.mx/', 'img' => 'len.png' ],
                                    [ 'link' => 'http://www.lastur.mx/', 'img' => 'lastur.jpg' ],
                                    [ 'link' => 'https://www.avimex.com.mx/', 'img' => 'avimex.png' ],
                                    [ 'link' => 'http://isa.com.mx/', 'img' => 'isa.jpeg' ],

                                ];
                            @endphp
                            @each('components.item-slider', $contentSlider, 'slide')
                        </ul>
                    </div>
                    {{-- <div data-glide-el="controls">
                        <button data-glide-dir="<">prev</button>
                        <button data-glide-dir="=7" class="btn"></button>
                        <button data-glide-dir="=13" class="btn"></button>
                        <button data-glide-dir=">>">Last</button>
                        <button data-glide-dir=">">next</button>
                    </div> --}}
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
            {!! Form::open(['route' => ['afiliate'], 'class' => 'section-afiliate__form']) !!}
            <h2>Afiliate</h2>
            <div class="group">
                {!! Form::label('nombre', 'Nombre', ['class' => 'label']) !!}
                {!! Form::text('nombre', null, ['class' => 'input']) !!}
            </div>

            <div class="group">
                {!! Form::label('empresa', 'Empresa', ['class' => 'label']) !!}
                {!! Form::text('empresa', null, ['class' => 'input']) !!}
            </div>

            <div class="group">
                {!! Form::label('correo', 'Correo', ['class' => 'label']) !!}
                {!! Form::email('correo', null, ['class' => 'input']) !!}
            </div>

            <div class="group">
                {!! Form::label('telefono', 'Teléfono', ['class' => 'label']) !!}
                {!! Form::text('telefono', null, ['class' => 'input']) !!}
            </div>

            <div class="group">
                {!! Form::label('mensaje', 'Mensaje', ['class' => 'label']) !!}
                {!! Form::textarea('mensaje', null, ['class' => 'input']) !!}
            </div>

            <button type="submit" class="btn btn--ghost">
                <i class="btn__icon ion-md-send"></i>
                Enviar
            </button>

            {!! Form::close() !!}
        </section>
    </main>
@endsection
@section('scripts')
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
            perView: 8,
            breakpoints: {
                1024: {
                    perView: 6
                },
                768: {
                    perView: 4
                },
                360: {
                    perView: 3
                }
            }
        }).mount()
    </script>
@endsection
