@extends('layouts.head')
@section('content')

    <section class="section">
        <h1 class="section__title">Albums</h1>

        <section class="section section--cards">

        </section>
    </section>

  {{-- <div class="container">
      <div class="row">
            <div class="col-md-12">
              <div class="panel panel-default">
                  <div class="panel-heading">Album</div>
                  <div class="panel-body">
                    @if(!empty ($Album))
                    <br>
                    @include('multimedia.album.Albums')
                      @include('Modal.modal')
                    @else
                      No hay nada

                      @include('Modal.Album')
                    @endif
                  </div>
              </div>
          </div>
      </div>
  </div> --}}
@endsection

@section('scripts')
<script src="{{ asset('/js/Album.js')}}" ></script>
{{-- <script src="{{ asset('/js/jquery.alertable.js')}}" ></script> --}}
@endsection
