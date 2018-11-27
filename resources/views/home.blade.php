@extends('layouts.app')
@section('content')
    <div class="row no-gutters">
        <div class="section__header col-9">
            <h1 class="section__title">Publicaciones</h1>
        </div>
        <div class="col-md-8 col-lg-9">
            <card-servicios></card-servicios>
            <card-productos></card-productos>
        </div>
        <div class="col-md-4 col-lg-3" style="background: #eee;">
            <h2>ASIDE</h2>
        </div>
    </div>
@endsection
