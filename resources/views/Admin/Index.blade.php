@extends('layouts.admin')
@section('content')
    <div class="panel panel-default">
    <div class="panel-heading"> <h2>&nbsp;&nbsp;&nbsp;Información de usuarios del sistema</h2></div>
    <div class="panel-body">


      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-gray">
          <div class="inner">
            <h3><?= $numUsuarios ?></h3>

            <p>Usuarios registrados</p>
          </div>
          <div class="icon">
            <i class="ion ion-ios-people"></i>
          </div>
          <a href="javascript:void(0);" onclick="cargarlistado(1,1);" class="small-box-footer">Mas informacion<i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
          <div class="inner">
            <h3>{{$numempresa}}</h3>

            <p>Empresas</p>
          </div>
          <div class="icon">
            <i class="ion ion-ios-briefcase"></i>
          </div>
          <a href="javascript:void(0);" onclick="cargarempresas(1,1);" class="small-box-footer">Mas informacion<i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-2 col-xs-6">
     <!-- small box -->
     <div class="small-box bg-blue">
      <div class="inner">
        <h3>{!!$numasociados!!}</h3>

        <p>Asociados</p>
      </div>
      <div class="icon">
        <i class="ion ion-ios-person"></i>
      </div>
      <a href="javascript:void(0);" onclick="cargarlistadoaso(1,1);" class="small-box-footer">Mas informacion<i class="fa fa-arrow-circle-right"></i></a>

     </div>
     </div>
      <div class="col-lg-2 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner">
            <h3>{{$numnoasociado}}</h3>

            <p>No Asociados</p>
          </div>
          <div class="icon">
            <i class="ion ion-ios-person"></i>
          </div>
          <a href="javascript:void(0);" onclick="cargarlistadonoa(1,1);" class="small-box-footer">Mas informacion<i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-2 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3>{{$numeventos}}</h3>

            <p>Eventos</p>
          </div>
          <div class="icon">
            <i class="ion ion-calendar"></i>
          </div>
          <a href="{{url('lista_evento')}}" class="small-box-footer">Mas informacion<i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
    </div>
  </div>

@endsection
