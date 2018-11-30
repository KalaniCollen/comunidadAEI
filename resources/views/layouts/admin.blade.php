<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Comunidad AEI | Panel Control</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
 <link rel="shortcut icon" href="img/aei.png" />
     {!! Html::style('css/bootstrap.min.css') !!}<!-- Bootstrap 3.3.5 -->
     {!! Html::style('https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css') !!}<!-- Font Awesome -->
     {!! Html::style('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css') !!}<!-- Ionicons -->
     {!! Html::style('css/admin/AdminLTE.min.css') !!}<!-- Theme style -->
     {!! Html::style('css/admin/skins/_all-skins.min.css') !!}
     {!! Html::style('css/admin/academicManage.css') !!}<!-- Personalizados-->
@yield('styles')
       <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->



  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="/Admin" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini">Administrador</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg">Administrador Sistema</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->

              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                  <?php if(auth()->user()->avatarurl==""){ auth()->user()->avatarurl="img/DefaultEmpresa.png"; }  ?>
                  <img src={{ auth()->user()->avatarurl }}  class="user-image" alt="User Image">
                  <span class="hidden-xs">{{ auth()->user()->name }} {{ auth()->user()->last_name }}</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <?php if(auth()->user()->avatarurl==""){ auth()->user()->avatarurl="images/avatar.jpg"; }  ?>
                    <img src={{ auth()->user()->avatarurl }}  class="img-circle" alt="User Image">
                    <p>
                     {{ auth()->user()->name }} {{ auth()->user()->last_name }}
                      <small>Miembro desde {{ auth()->user()->created_at }}</small>
                    </p>
                  </li>

                  <li class="user-footer">
                    {{-- <div class="pull-left">
                      <a onclick="mostrarperfil({{auth()->user()->id_usuario }});" class="btn btn-default btn-flat">Perfil</a>
                    </div> --}}

                    <div class="pull-right">

                      <a href="{{ route('logout') }}" class="btn btn-default btn-flat" onclick="event.preventDefault();document.getElementById('form-logout').submit();">Salir</a>
                      <form action="{{ route('logout') }}" method="post" style="display: none;" id="form-logout">
                          {{ csrf_field() }}
                      </form>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <?php if(auth()->user()->avatarurl==""){ auth()->user()->avatarurl="images/avatar.jpg"; }  ?>
              <img src={{ auth()->user()->avatarurl }}  class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>{{ auth()->user()->name }} {{ auth()->user()->last_name }}</p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MENÚ</li>

              <li class="treeview">
                <a href="{{ url('') }}">
                  <i class="fa fa-university"></i> <span >Pagina Principal</span>
                </a>
              </li>

              <li class="treeview">
                    <a href="#">
                      <i class="fa fa-users"></i> <span>Usuarios</span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class="active"><a href="form_nuevo_usuario"><i class="fa fa-user-plus"></i>Crear</a></li>
                        <li class="active"><a href="javascript:void(0);" onclick="cargarlistado(1,1);" ><i class="fa fa-list-alt"></i>Listar y editar</a></li>
                    </ul>
                  </li>
                  <li class="treeview">
                        <a href="#">
                          <i class="fa fa-users"></i> <span>Asociados</span> <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li class="active"><a href="javascript:void(0);" onclick="cargarlistadoaso(1,1);" ><i class="fa fa-list-alt"></i>Listar y editar</a></li>
                        </ul>
                      </li>
                      <li class="treeview">
                            <a href="#">
                              <i class="fa fa-users"></i> <span>No Asociados</span> <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li class="active"><a href="javascript:void(0);" onclick="cargarlistadonoa(1,1);" ><i class="fa fa-list-alt"></i>Listar y editar</a></li>
                            </ul>
                          </li>
                          <li class="treeview">
                                <a href="#">
                                  <i class="fa fa-building"></i> <span>Empresas</span> <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li class="active"><a href="javascript:void(0);" onclick="cargarempresas(1,1);" ><i class="fa fa-list-alt"></i>Listar</a></li>
                                </ul>
                              </li>




              <li class="treeview">
                <a href="#">
                  <i class="fa fa-calendar"></i> <span>Eventos</span><i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li class="active"><a  href="{{ url('nuevo_evento') }}"> <i class="fa fa-calendar-plus-o"></i>Crear evento</a></li>
                  <li class="active"><a href="{{url('lista_evento')}}"><i class="fa fa-calendar-check-o"></i>Lista de eventos</a></li>
                </ul>
              </li>






          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" style="min-height:2000px !important;">
        <!-- contenido capas modales -->
        <section>
          <div id="capa_modal" class="div_modal" ></div>
          <div id="capa_para_edicion" class="div_contenido" ></div>
        </section>

        <!-- contenido principal -->
        <section class="content"  id="contenido_principal">
          <div class="container">
            @if (Session::has('message'))
              <div class="input-group col-md-10">
                <div id="alert-success" class="alert alert-success fade in">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Perfecto!</strong>{{ Session::get('message') }}
                </div>
              </div>
            @endif
            @if (Session::has('messageAlert'))
              <div class="input-group col-md-10">
                <div class="alert alert-warning fade in">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Atencion!</strong>{{ Session::get('messageAlert') }}
                </div>
              </div>
            @endif
          </div>
          @yield('content')
        </section>

      <!-- cargador empresa -->
        <div style="display: none;" id="cargador_empresa" align="center">
            <br>

         <label style="color:#FFF; background-color:#ABB6BA; text-align:center">&nbsp;&nbsp;&nbsp;Espere... &nbsp;&nbsp;&nbsp;</label>

         <img src="img/cargando.gif" align="middle" alt="cargador"> &nbsp;<label style="color:#ABB6BA">Realizando tarea solicitada ...</label>

          <br>
         <hr style="color:#003" width="50%">
         <br>
       </div>
      </div><!-- /.content-wrapper -->
    </div><!-- ./wrapper -->
    <!-- jQuery 2.1.4 -->
<!-- fullCalendar 2.2.5 -->
<script src="js/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
{{-- <script src="plugins/fullcalendar/fullcalendar.min.js"></script> --}}


    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>  $("#content-wrapper").css("min-height","2000px"); </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="js/bootstrap.min.js"></script>

    <script src="js/admin/app.min.js"></script> <!-- AdminLTE App -->
    <script src="js/admin/academicManage.js"></script><!-- javascript del sistema -->

<!-- Page specific script -->
@yield('scripts')

  </body>
</html>
