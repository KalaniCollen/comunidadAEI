@extends('layouts.app')
@section('content')
    <main>
        <section class="section">
            <h1 class="section__title">Noticias</h1>
            <div class="card card--noticia">
                <h2 class="card__title">Nuevo presidente de AEI</h2>
                <div class="card__image" style="width: 100%%;">
                    <img src="/img/a1.jpg" alt="" style="width: 30%;height: inherit;">
                    <div class="card__body" style="float:left;">
                         <p>

                         Nuevos representantes en la Asociacion de Empresarios de Iztapalapa</p>
                         <p>

                         Este lunes se firmo el el cambio de presidente de la asociacion</p>
                    </div>
                </div>
                <div class="card__body">
                        AEI
                </div>
            </div>
            <div class="card card--noticia">
                <h2 class="card__title">Incrementa!!</h2>
                <div class="card__image" style="width: 100%;">
                    <img src="/img/a2.jpg" alt="" style="width: 30%;height: inherit;">
                    <div class="card__body" style="float:left;">
                         <p style="margin-right: 30px;"> La asociacion inicia su plataforma en Iztapalapa Ciudad de Mexico</p>
                    </div>
                </div>
                <div class="card__body">
                        AEI
                </div>
            </div>


        </section>
    </main>
@endsection
