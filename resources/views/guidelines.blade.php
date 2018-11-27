@extends('layouts.html')
@section('content')
    <section class="section">
        <div class="section__header">
            <h1 class="section__title">Título de la sección</h1>
        </div>
        <div class="section__body">
            <div class="row">
                <div class="col-md-6 col-lg-5">
                    <div class="card">
                        <a href="#" class="card__owner">
                            <img src="https://i.kinja-img.com/gawker-media/image/upload/s--_DBGLHVf--/c_scale,f_auto,fl_progressive,q_80,w_800/eibgv7kctah62iddzywm.jpg" alt="" class="card__owner-picture">
                            <p class="card__owner-name">BICod#</p>
                        </a>
                        <div class="card__image" style="background-image: url('https://images.pexels.com/photos/1436289/pexels-photo-1436289.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940');"></div>
                        <div class="card__body">
                            <p class="card__title">Pantalones de mezclilla modelo x89</p>
                            <p class="card__date">10 Octubre 2018</p>
                            <p class="card__description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod error nulla iusto rerum debitis qui necessitatibus aut doloremque eligendi optio quo impedit corrupti voluptatum, dolorum eveniet doloribus commodi possimus? Earum!</p>
                        </div>
                        <div class="card__footer">
                            <button class="btn btn--accent">hello</button>
                            <a href="#" class="btn btn--ghost btn--ghost-transparent">Contactar</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-lg-5">
                    <div class="card card--mini">
                        <div class="card__body">
                            <p class="card__title">Mi super asombroso producto mamalón extra cool.</p>
                            <p class="card__time">10:00 - 12:00 hrs.</p>
                            <p class="card__date">10 Octubre 2018</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-5">
                    <div class="card card--mini card--mini-left">
                        <p class="card__date">10 <span class="card__date-month">Oct</span> </p>
                        <div class="card__body">
                            <p class="card__title">Mi super asombroso evento chidori mamalón extra cool.</p>
                            <p class="card__time">10:00 - 12:00 hrs.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-5">
                    <a href="#" class="card card--mini card--mini-image">
                        <img src="https://www.elpais.com.co/files/article_main/uploads/2018/04/22/5add1a2c70082.jpeg" alt="" class="card__image">
                        <div class="card__body">
                            <p class="card__title">Servicio de luces y sonido.</p>
                            <p class="card__date">10 Octubre 2018</p>
                        </div>
                    </a>
                </div>
            </div>

            <div class="row">
            </div>

        </div>
    </section>
    <section class="section">
        <div class="section__header">
            <h1 class="section__title">Botones</h1>
        </div>
        <div class="section__body">
            <button class="btn">Botón default</button>
            <button class="btn">
                <i class="btn__icon ion-md-create"></i>
                Botón default con icono
            </button>
            <button class="btn btn--accent">Botón accent</button>
            <button class="btn btn--ghost">Botón ghost</button>
            <button class="btn btn--ghost">
                <i class="btn__icon ion-md-camera"></i>
                Botón ghost
            </button>
        </div>
    </section>
    <section class="section">
        <div class="section__header">
            <h1 class="section__title">Texto</h1>
        </div>
        <div class="section__body">
            <h1>H1 Montserrat</h1>
            <h2>H2 Montserrat</h2>
            <h3>H3 Montserrat</h3>
            <h4>H4 Montserrat</h4>
            <h5>H5 Montserrat</h5>
            <h6>H6 Montserrat</h6>

            <a href="#" class="link">Mi link</a>
        </div>
    </section>
    <section class="section">


        {!! Form::open(['route' => ['fake'], 'class' => 'form']) !!}
        <div class="form__header">
            <img class="form__image" src="/img/logoAEI-azul.png" alt="">
            <p class="form__title">Login</p>
            <p class="form__subititle">¡Welcome come back!</p>
        </div>

        <div class="form__body">
            {!! Form::inText('nombre', null, 'Hola', null) !!}
            {!! Form::inTel('numero', null, 'Teléfono', null) !!}
            <input type="submit" value="Enviar" class="btn btn--ghost">
        </div>

        <div class="form__footer">
            <p>Asociación de Empresarios de Iztapala A.C. {{ Date::now()->year }}</p>
        </div>
        {!! Form::close() !!}

    </section>
@endsection
