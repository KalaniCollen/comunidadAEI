@extends('layouts.app')
@section('styles')
  <link rel="stylesheet" type="text/css" href="{{ asset ('css/reset.css')}}"/>
  <link rel="stylesheet" type="text/css" href="{{ asset ('css/styles.css')}}"/>

@endsection
@section('content')
    <section class="section">
        <div class="section__header">
            <h1 class="section__title">Videos</h1>
        </div>
        <div class="row no-gutters">

        </div>
    </section>
  {{-- <div class="container">
      <div class="row">
            <div class="col-md-12">
              <div class="panel panel-default">
                  <div class="panel-heading">Videos</div>
                    <div class="panel-body">
                        <main>
                            <section class="cards" id="cartas">
                              <article >
                                <a href="{{ route('videos.show', auth()->user()->id_usuario) }}">
                                <img class="article-img" src="/storage/img/you.png" alt=" " />
                                <h1 class="article-title" style="bottom:-10px;">
                                Link en YouTube
                                </h1>
                              </a>
                              </article>
                              <article>
                                <a href="/VideosSubidos/{{ Auth()->user()->id_usuario  }}">
                                <img class="article-img" src="/storage/img/video.jpg" alt=" " />
                                <h1 class="article-title" style="bottom:-10px;">
                                  Videos Subidos
                                </h1>
                              </a>
                              </article>

                          </section>
                        </main>
                  </div>
              </div>
          </div>
      </div>
  </div> --}}
@endsection
@section('scripts')

@endsection
