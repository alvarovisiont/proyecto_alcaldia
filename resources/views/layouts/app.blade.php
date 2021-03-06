<?
  $ruta = explode('/',$_SERVER['REQUEST_URI']);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title',config('app.name'))</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/datatables/dataTables.bootstrap.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('css/_all-skins.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-datepicker3.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <!--<link rel="shortcut icon" href="{{asset('img/unnamed.png')}}">-->
  </head>

  <style type="text/css">
    .view-subtitle{
      color: #d22a2a;
      font-weight: 600;
      font-size: 17px;
    }
    .perfil{
      position: relative;
      background: #fff;
      border: 1px solid #f4f4f4;
      padding: 20px;
      margin: 10px 25px;
    }
    .separador{ 
      border: 0.3px solid #dd4b39; 
      border-radius: 200px /8px; 
      height: 0px; 
      text-align: center; 
    }
    
  </style>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">

        <!-- Logo -->
        <a href="{{ url('escritorio') }}" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>Sis</b>t</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Sistema</b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <span class="hidden-xs">{{Auth::user()->nombres.' '.Auth::user()->apellidos}}</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    
                    <p>
                      <strong>Cedula:</strong>{{Auth::user()->nac.'-'.Auth::user()->cedula}}<br>
                      <strong>Telefono:</strong>{{Auth::user()->telefono}}<br>
                      <strong>Rol:</strong>{{Auth::user()->roles->nombre}}<br>
                      <strong>Departamento:</strong>{{Auth::user()->departamentos->nombre}}

                      
                    </p>
                  </li>
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">
                  	<div class="pull-left">
                  		<a href="{{ route('perfil') }}" class="btn btn-flat btn-default"><i class="fa fa-user" aria-hidden="true"></i> Perfil</a>
                  	</div>
                    
                    <div class="pull-right">
                      <a href="{{ url('/logout')}}" class="btn btn-default btn-flat"><i class="fa fa-sign-out" aria-hidden="true"></i> Cerrar</a>
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
                    
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"></li>

            <li>
              <a href="{{ route('escritorio') }}"><i class="fa fa-home" aria-hidden="true"></i> Inicio</a>
            </li>
            @if(Auth::user()->rol_id == 1 || Auth::user()->rol_id == 3)
            <li><a href="{{ route('usuario.index') }}"><i class="fa fa-users"></i> Administrar Usuarios</a></li>
            @endif

            @php
              echo  session('menu');
            @endphp
            
            @if(Auth::user()->rol_id == 3)
              <li class="treeview"> 
                <a href="#">
                  <i class="fa fa-cogs"></i>
                  <span>Developers</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="{{ route('roles.index') }}"><i class="fa fa-circle-o"></i> Roles</a></li>
                  <li><a href="{{ route('departamentos.index') }}"><i class="fa fa-circle-o"></i> Departamentos</a></li>
                  <li><a href="{{ route('areas.index') }}"><i class="fa fa-circle-o"></i> Areas</a></li>
                  <li><a href="{{ route('sub_area.index') }}"><i class="fa fa-circle-o"></i> Sub-areas</a></li>
                  <li><a href="{{ route('usuario.index') }}"><i class="fa fa-circle-o"></i> Administrar Usuarios</a></li>
                </ul>
              </li>                      
            @endif  
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>





       <!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        
        <!-- Main content -->
        <section class="content">
          
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">@yield('view_descrip')</h3>
                
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                      <div class="col-md-12">
                              <!--Contenido-->
                                @yield('content')
                              <!--Fin Contenido-->                        
                      </div>
                    </div><!-- /.row -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <!--Fin-Contenido-->
      <footer class="main-footer">
        <strong>Copyright &copy; 2016-2017 <a href="#">Gobernación del Estado Sucre</a>.</strong> Todos los derechos reservados.
      </footer>

      
    <!-- jQuery 2.1.4 -->
    <script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('js/app.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('plugins/datatables/dataTables.bootstrap.js')}}"></script>
     <script type="text/javascript" src="{{asset('js/bootstrap-datepicker.min.js')}}"></script>
     <script type="text/javascript" src="{{asset('js/bootstrap-datepicker.es.min.js')}}"></script>
    
    <script type="text/javascript">
      $(document).ready(function(){
        $('div.alert').not('.alert-important').delay(2000).slideUp(300);

        $('.table').dataTable({
          'language' : {"url" : "json/esp.json"}
        });

         $('.fecha').datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true,
            language: 'es'
         });
      });
    </script>

    @yield('script')
  </body>
</html>