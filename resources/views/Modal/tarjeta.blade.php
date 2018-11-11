
<div id="Modelotarjeta" class="modal" role="dialog">
    <div class="contact-area">
        <div class="contact">
            <main>
                <section>
                    <div class="content">
                        <span class="close" id="cls">&times;</span>
                        <div class="logo"><img src="{{ $perfilE->logo_empresa }}" width="100" height="100" id="image"/></div>
                        <aside>
                            <h1>{{ $perfilE->nombre_empresa }}</h1>
                            <p>Hola, soy <b>{{ auth()->user()->name}}</b> </p>
                        </aside>
                        @if($perfil->privacidad==0)
                            <button id="conectar">
                                <span>Contactame</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48"> <g class="nc-icon-wrapper" fill="#444444"> <path d="M14.83 30.83L24 21.66l9.17 9.17L36 28 24 16 12 28z"></path> </g> </svg>
                            </button>
                        @endif
                    </div>
                    <div class="title"><p>Contactame</p></div>
                </section>
            </main>
            @if($perfil->privacidad==0)
                <nav>
                    <a href="#" class="gmail">
                        <div class="icon"> <div class="icon"><img src="/storage/img/300.jpg" width="55" height="55" id="image"/></div>
                        </div>
                        <div class="content">
                            <h1>Telefono Movil</h1>
                            <span>{{ $perfil->telefono_movil }}</span>
                        </div>
                    </a>
                    <a href="#" class="facebook">
                        <div class="icon"><img src="/storage/img/302.jpg" width="53" height="53" id="image"/></div>
                        <div class="content">
                            <h1>Correo Electronico</h1>
                            <span>{{ $perfil->correo_electronico }}</span>
                        </div>
                    </a>
                    <a href="#" class="twitter">
                        <div class="icon"> <div class="icon"><img src="/storage/img/303.jpg" width="55" height="55" id="image"/></div>
                        </div>
                        <div class="content">
                            <h1>Red Social</h1>
                            <span>{{$perfil->red_social}}</span>
                        </div>
                    </a>
                </nav>
            @endif
        </div>
    </div>
</div>
