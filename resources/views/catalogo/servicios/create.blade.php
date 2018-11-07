@extends('layouts.head')
@section('content')
    <section class="section">
        <h1>Agregar Servicio</h1>
        <br>
        <form action="{{ route('servicios.store') }}" method="post" enctype="multipart/form-data" class="form">
            {{ method_field('POST') }}
            {{ csrf_field() }}
            @component('catalogo.servicios.fragments.form', [
                'nombre' => '',
                'descripcion' => '',
                'tipo' => '',
                'descuento' => 0,
                'hora_i' => '00:00',
                'hora_c' => '00:00',
                'btnTitle' => 'Agregar Servicio'
            ])
            @endcomponent
        </form>
        <img src="{{ asset('storage/catalogos_img/defaultProduct.jpg') }}" alt="" id="preview-img">
    </section>
@endsection
@section('scripts')
    <script type="text/javascript">
        let btnUpload = document.getElementById('imagen-upload');
        btnUpload.addEventListener('change', e => {
            if(btnUpload.files && btnUpload.files[0]) {
                console.log(btnUpload.files[0].name);
                let reader = new FileReader();
                reader.onload = function(el) {
                    document.getElementById('preview-img').src = el.target.result;
                };
                reader.readAsDataURL(btnUpload.files[0]);
            }
        });
    </script>
@endsection
