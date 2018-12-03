@extends('layouts.app')
@section('styles')
    <link rel="stylesheet"  href="{{asset('css/publicaciones.css')  }}" >
@endsection
@section('content')
    <main>
        <section class="section">
            <h1 class="section__title">Publicaciones</h1>
            <div class="comments-container">

        		<ul id="comments-list" class="comments-list">
        			<li>
        				<div class="comment-main-level">
        					<!-- Avatar -->
        					<div class="comment-avatar"><img src="/img/empresa.png" alt=""></div>
        					<!-- Contenedor del Comentario -->
        					<div class="comment-box">
        						<div class="comment-head">
        							<h6 class="comment-name by-author"><a href="#">AEI</a></h6>
        							<span>hace 20 minutos</span>
        							<i class="fa fa-reply"></i>
        							<i class="fa fa-heart"></i>
        						</div>
        						<div class="comment-content">
                                    Bienvenidos!!
        						</div>
        					</div>
        				</div>
        				<!-- Respuestas de los comentarios -->

        			</li>

        			<li>
        				<div class="comment-main-level">
        					<!-- Avatar -->
        					<div class="comment-avatar"><img src="/img/em.png" alt=""></div>
        					<!-- Contenedor del Comentario -->
        					<div class="comment-box">
        						<div class="comment-head">
        							<h6 class="comment-name"><a href="#">Company</a></h6>
        							<span>hace 10 minutos</span>
        							<i class="fa fa-reply"></i>
        							<i class="fa fa-heart"></i>
        						</div>
        						<div class="comment-content">
        						                  Nuevo catalogo de invierno visita mi pagina!
                                                  </div>
        					</div>
        				</div>
        			</li>
                    <li>
        				<div class="comment-main-level">
        					<!-- Avatar -->
        					<div class="comment-avatar"><img src="/img/empresa.png" alt=""></div>
        					<!-- Contenedor del Comentario -->
        					<div class="comment-box">
        						<div class="comment-head">
        							<h6 class="comment-name"><a href="#">AEI</a></h6>
        							<span>hace 1 Hr</span>
        							<i class="fa fa-reply"></i>
        							<i class="fa fa-heart"></i>
        						</div>
        						<div class="comment-content">
        						  Nueva reunion terminada con exito con el instituto tecnologico de Iztapalapa
                                                  </div>
        					</div>
        				</div>
        			</li>
        		</ul>
        	</div>
        </section>
    </main>
@endsection
