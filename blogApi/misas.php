<?php session_start();?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="src/asset/iconlogo.ico">
    <link rel="stylesheet" type='text/css' href="src/plugging/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type='text/css' href="src/plugging/bootstrap/toggle/bootstrap4-toggle.min.css">
    <link rel="stylesheet" type='text/css' href="src/plugging/datatable/css/datatables.min.css">
    <link rel="stylesheet" type='text/css' href="src/plugging/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" type='text/css' href="src/plugging/jquery-ui/jquery-ui.css">
    <link rel="stylesheet" type='text/css' href="src/css/stylesMprincipal.css">
    <title>Configuracion de misas</title>
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
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Slider de misa</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Video de misa</a>
                </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                  <div class="container">
                    <br>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalNewSliderimgMisa">
                     Agregar imagen
                   </button>
                   <br><br>
                   <table id="slidermisa" class="display" style="width: 100%;">
                       <thead>
                           <tr>
                               <th>Id</th>
                               <th>Imagen</th>
                               <th>Eliminar</th>
                           </tr>
                       </thead>
                       <tbody></tbody>
                   </table>
                  </div>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                  <div class="container"><br>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addvideomisa">
                      Agregar video
                    </button>
                    <br><br>
                    <table id="tableVideosmisas" class="display" style="width: 100%;">
                          <thead>
                              <tr>
                                  <th>Id</th>
                                  <th>video</th>
                                  <th>Titulo</th>
                                  <th>Eliminar</th>
                              </tr>
                          </thead>
                          <tbody></tbody>
                      </table>
                  </div>
                </div>

                </div>
              </main>
            </div>
      </div>

      <!-- Modal new video -->
      <div class="modal fade" id="addvideomisa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Subir video</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form enctype="multipart/form-data" method="post" id="sendvideomisa">
                <div class="form-group">
                  <label>Titulo: </label>
                  <input type="text" name="titulo" id="titulo" class="form-control" value="">
                  <label>Selecciona el video a subir:</label>
                  <input type="file" class="form-control" id="filevideomisa" name="videoadd"/>
                  <input type="hidden" name="typeInsertvideo" id="typeInsertvideo" value="misas">
                   <br>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              <button type="button" class="btn btn-primary" name="button" id="savevideomisa">Agregar</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal new slider misa -->
      <div class="modal fade" id="modalNewSliderimgMisa" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalNewSliderimgLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalNewSliderimgLabel">Nueva imagen para slider</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form enctype="multipart/form-data" method="post" id="postsliderimgmisa">
                <div class="form-group">
                 <label for="exampleFormControlFile1">Imagen: </label>
                 <input type="file" class="form-control-file" id="imgsliderselectmisa" name="sliderimgmida" value=""  accept="image/*" required >
               </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              <button type="button" class="btn btn-primary" id="addsliderimisa">Agregar</button>
            </div>
          </div>
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
