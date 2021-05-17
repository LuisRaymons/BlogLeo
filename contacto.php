<?php include_once("frontend/config.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="description">
    <meta content="" name="keywords">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Contacto</title>
		<link rel="stylesheet" type="text/css" href="frontend/plugging/bootstrap/css/bootstrap.min.css">
		<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.css" rel="stylesheet"/> -->
		<link rel="stylesheet" href="frontend/plugging/jquery/datepiker/jquery.datetimepicker.css">
	  <!-- <link rel="stylesheet" href="frontend/plugging/jquery-ui/jquery-ui.min.css"> -->

    <link rel="stylesheet" type="text/css" href="frontend/plugging/css/styleheademenu.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
		<link rel="shortcut icon" href="frontend/img/logo.ico">
</head>
<body>
	 <?php include_once("header.php"); ?>


     <!-- <section id="hero" class="d-flex align-items-center"> -->
    <section  id="backgroudcontactpricipal" class="d-flex align-items-center">
			 <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
        	<div class="container" id="form-contact">
            <h3>¿Te parece si cerramos un contrato?</h3>

            <form method="post" id="form-send-email">
                <div class="form-group">
                    <input type="text" name="namefull" class="form-control" id="namefull" placeholder="Nombre Completo*">

                </div>
                <div class="form-group">
                    <input type="email" name="emailcontract" class="form-control" id="emailcontract" aria-describedby="emailHelp" placeholder="Correo Electronico*">
                </div>
                <div class="form-group">
                    <input type="tel" name="phonecontact" class="form-control" id="phonecontact" placeholder="Telefono*">
                </div>
                <div class="form-group">
                    <!-- <input type="date" name="dateevento" class="form-control" id="dateevento" placeholder="Fecha del evento*"> -->
										<input type="text" name="dateevento" class="form-control" id="dateevento" placeholder="Fecha del evento*" readonly/>

                </div>
								<div class="form-group">
                		<select name="typeevent" id="typeevent" class="form-control">
                			<option value="">Tipo de evento</option>
                			<option value="Bodas">Bodas</option>
                			<option value="XV AÑOS">XV AÑOS</option>
                			<option value="Bodas al Civil">Bodas al Civil</option>
                			<option value="Aniversarios de Bodas">Aniversarios de Bodas</option>
                			<option value="Recepciones">Recepciones</option>
                			<option value="Eventos empresariales">Eventos empresariales</option>
                			<option value="Cena Romanticas">Cena Romanticas</option>
                			<option value="Pedidas de mano">Pedidas de mano</option>
                			<option value="Entrega de anillo">Entrega de anillo</option>
                			<option value="Bautizos">Bautizos</option>
                			<option value="Confirmaciones">Confirmaciones</option>
                			<option value="Graduaciones">Graduaciones</option>
                			<option value="Inaguraciones">Inaguraciones</option>
                			<option value="Exposiciones">Exposiciones</option>
                			<option value="Pasarelas">Pasarelas</option>
                			<option value="Cumpleaños">Cumpleaños</option>
                			<option value="Bodas y eventos Guadalajara">Bodas y eventos Guadalajara</option>
                		</select>
                	</div>
									
                <div class="form-group">
                    <input type="text" name="address" id="adress" class="form-control" placeholder="Domicilio del evento* ">
                </div>
                <div class="form-group">
                    <label>Escribe algun comentario</label>
                    <textarea name="comentariocontact" class="form-control" id="comentariocontact" placeholder="Escribe algun comentario*" rows=5 cols=1 >

                    </textarea>
                    <small id="emailHelp" class="form-text text-muted">Su información no sera compartida con nadie</small>
                </div>

								<button type="button" name="button" id="sendmsmemails" class="btn btn-primary">Enviar</button>

            </form>
        </div>
			 </div>
		 </section>



		 <!-- Modal cargando -->
		 <div class="modal fade" id="ModalLogading" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalNewSongLabel" aria-hidden="true">
				 <div class="modal-dialog">
						 <img src="frontend/img/loading.gif" alt="cargando" id="imgModalLoading">
				 </div>
		 </div>


	  <script src="frontend/plugging/jquery/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
		<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js"></script> -->
		<script src="frontend/plugging/jquery/datepiker/jquery.datetimepicker.full.min.js"></script>

    <script src="frontend/plugging/bootstrap/js/bootstrap.min.js"></script>
		<script src="frontend/plugging/jquery-validation/jquery.validate.js"></script>
		<script src="frontend/plugging/sweetalert2/sweetalert2@10.js"></script>
		<!-- <script language="javascript" src="frontend/plugging/jquery-ui/jquery-ui.min.js"></script>
		<script language="javascript" src="frontend/plugging/jquery-ui/jquery-ui-timepicker-addon.min.js"></script> -->




    <script src="frontend/plugging/js/contacto.js"></script>


</body>
</html>
