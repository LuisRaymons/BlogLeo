<?php header('Access-Control-Allow-Origin: *'); ?>
<?php include_once("frontend/config.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="description">
    <meta content="" name="keywords">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Misas</title>
		<link rel="stylesheet" type="text/css" href="frontend/plugging/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
		<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/glider-js@1.7.3/glider.min.css">
		<link rel="shortcut icon" href="frontend/img/logo.ico">
		<link rel="stylesheet" type="text/css" href="frontend/plugging/css/styleheademenu.css">
</head>
<body>
	 <?php include_once("header.php"); ?>

	 	<section  id="backgroudcontactpricipal" class="d-flex align-items-center">
			<div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">

				<!--slider de misa -->

	      <div class="container" id="slider-img">
					<h3>Música para eventos religiosos</h3>
	        <p>imagenes de eventos religiosos</p>
	         <div class="caroucel__contenedor_misa">
	            <button aria-label="Anterior" class="caroucel_previus_misa"><i class="fas fa-chevron-left"></i></button>
	            <div class="carroucel_list_misa" id="carroucelcontainer_misa">
	               <!--slider de items -->
	            </div>
	            <button aria-label="Siguiente" class="caroucel_next_misa"><i class="fas fa-chevron-right"></i></button>
	         </div>
	         <div role="tablist" class="caroucel_indicadores_misa"></div>
	      </div>
				<br>
				<p>Video en evento religiosos</p>
				<div class="container">
						<div class="row">
                <div class="col-md-12">
                    <div class="card-group"  id="contentVideosMisa">
                    </div>
                </div>
            </div>
				</div>
		</section>

		<div class="container">
		</div>

		<?php include_once("footer.php"); ?>
    <script>
       var serverAPi = "<?php echo __SERVER_API__; ?>";
    </script>
    <script src="frontend/plugging/jquery/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/glider-js@1.7.3/glider.min.js"></script>
    <script src="frontend/plugging/bootstrap/js/bootstrap.min.js"></script>
    <script src="frontend/plugging/js/misa.js"></script>

</body>
</html>
