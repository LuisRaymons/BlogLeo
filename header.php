<!--Menu principal -->
<?php include_once("frontend/config.php"); ?>

      <header  id="header" class="fixed-top">
          <div class="container d-flex align-items-center">
              <h1 class="logo mr-auto"><img src="frontend/img/logo.ico" style="margin-right: 15px; background-color: transparent;"/><a href="./">Saxofonista Leo Sax Loves</a></h1>

             <nav class="navbar navbar-expand-md navbar-dark">
              <div class="container-fluid">

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav ml-auto" id="menu-all">

                  </ul>
                </div>
              </div>
            </nav>
           </div>
      </header>

      <script>
         var serverAPi = "<?php echo __SERVER_API__; ?>";
      </script>
      <script src="frontend/plugging/jquery/jquery.min.js"></script>
      <script src="frontend/plugging/js/menu.js"></script>
