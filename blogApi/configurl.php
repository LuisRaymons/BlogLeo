<?php session_start();?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="src/asset/iconlogo.ico">
    <link rel="shortcut icon" href="src/asset/iconlogo.ico">
    <link rel="stylesheet" type='text/css' href="src/plugging/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type='text/css' href="src/plugging/bootstrap/toggle/bootstrap4-toggle.min.css">
    <link rel="stylesheet" type='text/css' href="src/plugging/datatable/css/datatables.min.css">
    <link rel="stylesheet" type='text/css' href="src/plugging/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" type='text/css' href="src/plugging/jquery-ui/jquery-ui.css">
    <link rel="stylesheet" type='text/css' type="text/css" href="src/css/stylesMprincipal.css">
    <title>Configuracion de links</title>
  </head>
  <body>
      <div id="app">
          <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
                <a class="navbar-brand" href="{{ url('/home') }}">Panel Administrativo</a>
                <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
                <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                </form>
                <ul class="navbar-nav ml-auto ml-md-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="configuration.php">Configuraciones</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{url('/logout')}}">Cerrar session</a>
                        </div>
                    </li>
                </ul>
            </nav>
          <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
              <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                          <div class="sb-sidenav-menu">
                              <div class="nav">
                                  <div class="sb-sidenav-menu-heading">Interface</div>
                                  <a class="nav-link collapsed" href="home.php">Vista Principal</a>
                                  <a class="nav-link collapsed" href="misas.php">Misas</a>
                                  <a class="nav-link collapsed" href="configurl.php">URL</a>
                              </div>
                          </div>

                          <div class="sb-sidenav-footer">
                            <div class="small">Bienvenido:</div>
                            <p id="namesession"></p>
                          </div>
                      </nav>
            </div>
            <div id="layoutSidenav_content">
              <main>
                  <div class="container">
                     <table id="table-link" class="display" style="width: 100%;">
                       <thead>
                       </thead>
                       <tbody>
                       </tbody>
                     </table>
                     <br><br>
                  </div>


              </main>
            </div>
      </div>

      <!-- Modal cargando -->
      <div class="modal fade" id="ModalLogading" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalNewSongLabel" aria-hidden="true">
          <div class="modal-dialog">
              <img src="src/asset/loading2-unscreen.gif" alt="cargando" id="imgModalLoading">
          </div>
      </div>

      <script type="text/javascript" src="src/plugging/jquery/jquery.min.js"></script>
      <script type="text/javascript" src="src/plugging/popper/popper.min.js"></script>
      <script type="text/javascript" src="src/plugging/bootstrap/js/bootstrap.min.js"></script>
      <script type="text/javascript" src="src/plugging/bootstrap/toggle/bootstrap4-toggle.min.js"></script>
      <script type="text/javascript" src="src/plugging/datatable/js/datatables.min.js"></script>
      <script type="text/javascript" src="src/plugging/fontawesome/js/fontawesome.min.js"></script>
      <script type="text/javascript" src="src/plugging/sweetalert2/sweetalert2@10.js"></script>
      <script src="src/js/homejs.js"></script>
  </body>
</html>
