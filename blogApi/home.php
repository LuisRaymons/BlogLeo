<?php session_start();?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="src/asset/iconlogo.ico">
    <link rel="stylesheet" href="src/plugging/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="src/plugging/bootstrap/toggle/bootstrap4-toggle.min.css">
    <link rel="stylesheet" href="src/plugging/datatable/css/datatables.min.css">
    <link rel="stylesheet" href="src/plugging/jquery-ui/jquery-ui.css">
    <link rel="stylesheet" href="src/plugging/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="src/css/stylesMprincipal.css">
    <title>Configuracion de pagina principal</title>
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
                        <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-bars"></i></a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                            <!-- <a class="dropdown-item" href="configuration.php">Configuraciones</a> -->
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="logout.php">Cerrar session</a>
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
                  <?php include_once("content.php") ?>
              </main>
            </div>
      </div>

      <!-- Modal nuevo imagen de slider-->
      <div class="modal fade" id="modalNewSliderimg" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalNewSliderimgLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalNewSliderimgLabel">Nueva imagen para slider</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form enctype="multipart/form-data" method="post" id="postsliderimg">
                <div class="form-group">
                 <label for="exampleFormControlFile1">Imagen: </label>
                 <input type="file" class="form-control-file" id="imgsliderselect" name="sliderimg" value=""  accept="image/*" required >
               </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              <button type="button" class="btn btn-primary" id="addsliderimg">Agregar</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal nuevo video -->
      <div class="modal fade" id="modalnewvideo" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalnewvideoLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalnewvideoLabel">Nuevo video</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form enctype="multipart/form-data" method="post" id="postsvideo" >
                  <div class="form-group">
                    <div class="form-group">
                       <label for="exampleInputEmail1">Titulo</label>
                       <input type="text" class="form-control" id="tituloid"  name="titulo" required>
                       <small id="emailHelp" class="form-text text-muted">Escribe el titulo del video</small>
                     </div>
                     <div class="form-group">
                       <label for="exampleFormControlFile1">Selecciona un video</label>
                       <input type="file" class="form-control-file" name="videoadd" id="filevideo" accept="video/*"/>
                       <input type="hidden" name="typeInsertvideo" id="typeInsertvideo" value="pricipal">
                     </div>
                   </div>
                </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              <button type="button" class="btn btn-primary" id="addvideoss">Agregar</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal Nueva cancion-->
      <div class="modal fade" id="modalNewSong" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalNewSongLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalNewSongLabel">Agregar nueva cancion</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="songformadd">
                  <div class="form-group">
                    <label>Nombre de la cancion</label>
                    <input type="text" class="form-control" id= "namesong" name="namesong" value="">
                  </div>
                  <div class="form-group">
                      <label>Seleccione cancion</label>
                      <input type="file" class="form-control-file" name="filesong" value="" accept="audio/*"/>
                  </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              <button type="button" class="btn btn-primary" id="addsong">Agregar</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal cargar descuento -->
      <div class="modal fade" id="modalDescuento" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Cambiar el porcentaje de descuento</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form method="post" id="form-descuento">
              <!--  -->
              <div class="form-group">
                <label>Tipo de promocion:</label>
                <select class="form-control" id="select-promo" name="selct-promo">
                  <option value="">Tipo de promocion</option>
                  <option value="regalo">Regalo</option>
                  <option value="oferta">Oferta</option>
                </select>
              </div>

              <div id="oferta-div" style="display:none;">
                  <div class="form-group">
                      <label>Porcentaje: </label> <input type="number" name="porcentajeUpdate" id="porcentajeUpdate" class="form-control" value=""  min="0"  max="100" onchange="modificaPorcentaje(this)">
                      <label>Precio base: </label> <input type="number" name="baseporcentaje" id="baseporcentaje" class="form-control" value="" min="1"  max="10000">
                  </div>
              </div>

              <div id="regalo-div" style="display:none;">
                <div class="form-group">
                  <label>Descripcion de la promocion</label>
                  <input type="file" name="promocion-img" id="promocion-img">
                  <label>Descripcion de la promocion</label>
                  <textarea name="promodesc" rows="8" cols="50" id="promodesc"></textarea>
                </div>
              </div>

              <div class="form-group">
                <label>De los dias</label><input type="date" name="from" id="from" value=""> al <input type="date" name="to" id="to" value="">
                <input type="hidden" name="iddescuento" id="iddescuento" value="">
              </div>
              <div class="form-group">
                <!-- <label>Desactivar</label><input type="checkbox" name="activaDesc" id= "activaDesc" value=""> -->
                <input type="checkbox" checked data-toggle="toggle"  name="activaDesc" id= "activaDesc" data-width="100">
              </div>
            </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              <button type="button" class="btn btn-primary" id="savedescuento">Guardar</button>
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

      <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->
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
