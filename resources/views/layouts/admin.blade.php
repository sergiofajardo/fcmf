<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  
<meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="author" content="">
  <title> FCMF</title>

  <!-- Bootstrap core CSS-->
    <link href='{{ asset("admin/vendor/bootstrap/css/bootstrap.min.css") }}' rel="stylesheet">



  <!-- Custom fonts for this template-->
  <link href='{{ asset("admin/vendor/font-awesome/css/font-awesome.min.css")}}' rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href='{{ asset("admin/css/sb-admin.css")}}' rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
      
    <a class="navbar-brand" href="{{ url('/home') }}">FCMF</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        @if(Auth::user()->role_id ==1 || Auth::user()->role_id ==2)
        <li style="width: 30" class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">Administración</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            @if(Auth::user()->role_id ==1)
         
            <li>
              <a href="{{ route('admin.facultades.index') }}">Facultades</a>
            </li>
            <li>
              <a href="{{ route('admin.carreras.index') }}">Carreras</a>
            </li>
             <li>
              <a href="{{route('admin.docentes.index')}}">Docentes</a>
            </li>
             <li>
              <a href="{{route('admin.espacios_fisicos.index')}}">Espacio Físico</a>
            </li>
             <li>
              <a href="{{route('admin.periodo_lectivo.index')}}">Periodo Lectivo</a>
            </li>
              @endif
             <li>
              <a href="{{route('admin.horario.create')}}">Horarios por Espacio Físico</a>
            </li>
          </ul>
          @endif
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-file"></i>
            <span class="nav-link-text">Consultas</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseExamplePages">
            <li>
              <a href="login.html">Consulta Horarios Docentes</a>
            </li>
            
            
          </ul>
        </li>
       
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">   
         <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                                            <?php
                    header("Status: 301 Moved Permanently");
                    header("Location: login");
                    exit;
                    ?>
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Salir
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
        </li>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid"  style="width: 100%;">
      <!-- Breadcrumbs-->
      
      <div class="row" >
        <div class="col-12" >
       @yield('content')
         </div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Your Website 2017</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src='{{ asset("admin/vendor/jquery/jquery.min.js")}}'></script>
    <script src='{{ asset("admin/vendor/bootstrap/js/bootstrap.bundle.min.js")}}'></script>
    <!-- Core plugin JavaScript-->
    <script src='{{ asset("admin/vendor/jquery-easing/jquery.easing.min.js")}}'></script>
    <!-- Custom scripts for all pages-->
    <script src='{{ asset("admin/js/sb-admin.min.js")}}'></script>
  </div>
</body>

</html>
