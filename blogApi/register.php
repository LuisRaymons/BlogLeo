<?php include_once("api/config/config.php"); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="src/plugging/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="src/css/styleLogin.css">
    <title>Registrandote</title>
    </head>
  <body>


    <div class="container" id="formregisterNew" style="display:block;">
      <div class="d-flex justify-content-center h-100">
        <div class="card-register">
            <h3 id="titleregister">Registrar usuario nuevo</h3>
            <div class="container">
              <form method="post" action=""  id="form-register-user">
                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupPrepend3"> <i class="fa fa-user"></i> </span>
                  </div>
                  <input type="text" name="name" class="form-control" id="name" placeholder="Nombre *" required/>
                </div>
                <div class="form-group input-group mb-2">
                  <div class="input-group-prepend">

                    <span class="input-group-text" id="inputGroupPrepend3"><i class="fa fa-at"></i></span>
                  </div>

                  <input type="email" name="emails" class="form-control" id="emails" placeholder="Correo *">
                </div>
                <div class="form-group input-group mb-2">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="showmpassword"><i  class="fa fa-key"></i></span>
                  </div>

                  <input type="password" name="password" id="password" class="form-control" placeholder="Contraseña *">

                  <div class="iconCheck">
                    <i class="fa fa-eye-slash" id="faiconshow"></i>
                  </div>

                </div>

                <div class="form-group input-group mb-2">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupPrepend3"><i id="showconfirmpassword" class="fa fa-key"></i></span>
                  </div>
                  <input type="password" name="confirmpassword" id="confirmpassword" class="form-control" placeholder="Confirmar Contraseña *">

                  <div class="iconCheck">
                    <i class="fa fa-eye-slash" id="faiconshowconfirm"></i>
                  </div>
                </div>
                <br>
                  <button type="button" name="button" class="btn btn-primary btn-lg btn-block" id="GardarUser">Registrarme</button>
              </form>
              <br>
              <br>
              <a href="index.php" style="text-align:center;">Regresar al login</a>
            </div>

        </div>
      </div>
    </div>

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
    <!-- Modal cargando -->
      <div class="modal fade" id="ModalLogading" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalNewSongLabel" aria-hidden="true">
          <div class="modal-dialog">
              <img src="src/asset/loading2-unscreen.gif" alt="cargando" id="imgModalLoading">
          </div>
      </div>
      <script>
         var namePagina = "<?php echo __RUTA_LOCAL__; ?>"
      </script>

    <script src="src/plugging/jquery/jquery-3.6.0.min.js"></script>
    <script src="src/plugging/popperjs/popper.min.js"></script>
    <script src="src/plugging/bootstrap/js/bootstrap.min.js"></script>
    <script src="src/plugging/sweetalert2/sweetalert2@10.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
    <script src="src/js/login.js"></script>
  </body>
</html>
