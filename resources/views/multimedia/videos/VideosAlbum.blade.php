@extends('layouts.head')
@section('styles')
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}" /> --}}

  <link rel="stylesheet" type="text/css" href="{{ asset ('css/reset.css')}}"/>
  <link rel="stylesheet" type="text/css" href="{{ asset ('css/styles.css')}}"/>
  <link rel="stylesheet" type="text/css" href="{{ asset ('css/jquery.alertable.css')}}"/>
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset ('css/album.css')}}"/> --}}

@endsection
@section('content')

  <div class="container">
      <div class="row">
            <div class="col-md-12">
              <div class="panel panel-default">
                  <div class="panel-heading">Videos</div>
                    <div class="panel-body">
                        <main>
                            <section class="cards" id="cartas">
                              <article >
                                <a href="{{ route('videos.show', Auth::user()->id_usuario) }}">
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
  </div>
@endsection

@section('scripts')

<script src="{{ asset('js/Album.js')}}" ></script>
<script src="{{ asset('js/jquery.alertable.js')}}" ></script>

<script>
var servidor ="{{asset ('') }}";

</script>
  @endsection
