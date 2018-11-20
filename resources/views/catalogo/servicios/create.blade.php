@extends('layouts.head')
@section('content')
    <section class="section">
        <h1 class="section__title">Agregar Servicio</h1>

        <div class="row">

            {!! Form::open(['route' => ['servicios.store'], 'method' => 'POST', 'enctype' => 'multipart/form-data', 'class' => 'col-md-6']) !!}

            <div class="dropzone" id="js-dropzone">

                <div class="fallback">
                    <input name="file" type="file" multiple />
                </div>
            </div>

            @include('catalogo.servicios.fragments.form')

            {!! Form::submit('Agregar servicio', ['class' => 'btn btn--accent']) !!}
            {!! Form::close() !!}

            {{-- <img src="{{ asset('storage/catalogos_img/defaultService.jpg') }}" alt="" id="js-img-preview" class="col-"> --}}
        </div>

    </section>
@endsection
@section('scripts')
    <script src="{{ asset('js/dropzone.js') }}" charset="utf-8"></script>
    <script type="text/javascript">
        Dropzone.autoDiscover = false;
        let jsDropzone = new Dropzone("div#js-dropzone", {
            url: '{{ route('servicios.store') }}'
        });
    </script>
@endsection
