<?php session_start();?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="src/asset/iconlogo.ico">
    <link rel="stylesheet" type='text/css' href="src/plugging/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type='text/css' href="src/plugging/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" type='text/css' href="src/css/styleLogin.css">
    <title>Bienvenido Leo</title>
  </head>
  <body>

    <div class="container" id="loginPanel">
      	<div class="d-flex justify-content-center h-100">
      		<div class="card">
      			<div class="card-header">
      				<h3 style="text-align:center;">Login Leo Sanfonista</h3>
      			</div>
      			<div class="card-body">
      				<form method="GET" id="login-leo">
      					<div class="input-group form-group">
      						<div class="input-group-prepend">
      							<span class="input-group-text"><i class="fas fa-user"></i></span>
      						</div>
      						<input type="text" class="form-control" id="emailverif" name="email" placeholder="username">

      					</div>
      					<div class="input-group form-group">
      						<div class="input-group-prepend">
      							<span class="input-group-text"><i class="fas fa-key"></i></span>
      						</div>
      						<input type="password" class="form-control" id ="passwordverif" name="password" placeholder="password">
      					</div>
      					<div class="row align-items-center remember">
      						<input type="checkbox">Recordar
      					</div>
      					<div class="form-group">
                  <br>
      						<!-- <input type="button" id="loginInput" class="btn btn-primary  btn-lg btn-block"> -->
                  <button type="button" name="LoginId" id="LoginId" class="btn btn-primary btn-lg btn-block">Entrar</button>
      					</div>
      				</form>
      			</div>
      			<div class="card-footer">

      				<div class="d-flex justify-content-center">
                <div class="col-md-6">
                  <a href="register.php">Crear cuenta</a><br>
                </div>
                <!-- <div class="col-md-6">
                  <a href="#">Recordar contraseña</a>
                </div> -->

      				</div>
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

    <script src="src/plugging/jquery/jquery-3.6.0.min.js"></script>

    <div class="container" id="regresarhome" style="display:none;">
      <div class="d-flex justify-content-center h-100">
        <div class="card-register">
            <h3 id="titleregister">Usted ya esta logueado</h3>
            <div class="container">
              <a href="home.php">Regresar al home</a>
            </div>
        </div>
      </div>
     </div>

    <script src="src/plugging/popperjs/popper.min.js"></script>
    <script src="src/plugging/fontawesome/js/fontawesome.min.js"></script>
    <script src="src/plugging/bootstrap/js/bootstrap.min.js"></script>
    <script src="src/plugging/sweetalert2/sweetalert2@10.js"></script>
    <script src="src/js/login.js"></script>
  </body>
</html>
