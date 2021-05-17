<?php include_once("frontend/config.php"); ?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8" />
      <meta content="width=device-width, initial-scale=1.0" name="viewport" />
      <meta name="csrf-token" content="{{ csrf_token() }}" />
      <!-- Meta etiquetas descritivas para su busqueda en google -->
      <meta name="application-name" content="Leo Saxofonista 1.0">
      <meta name="keywords" content="bodas, bodas al civil, eventos, guadalajara, musica, musico, saxofon, saxofonista, Misas, coro para misas, misas pop, ensamble para misas, musica para misas, aniversario de bodas" />
      <meta name="description" content="SAX EVENTOS SOCIALES | Músico Saxofonista para eventos"/>
      <meta name="author" content="Luis Valencia">
      <link rel="shortcut icon" href="frontend/img/logo.ico">
      <title>Saxofonista para bodas | Eventos | Guadalajara | Leo Sax</title>
      <link rel="stylesheet" type="text/css" href="frontend/plugging/bootstrap/css/bootstrap.min.css" />
      <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
      <link rel="stylesheet" type="text/css" href="https://rawcdn.githack.com/jerfeson/floating-whatsapp/0310b4cd88e9e55dc637d1466670da26b645ae49/floating-wpp.min.css">
      <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/glider-js@1.7.3/glider.min.css">
      <!-- <link rel="stylesheet" href="frontend/plugging/start/css/starrr.css">
      <script src="frontend/plugging/start/js/starrr.js"></script> -->
      <link rel="stylesheet" type="text/css" href="frontend/plugging/css/styleheademenu.css" />
   </head>
   <body>
      <?php include_once("header.php"); ?>
      <section  id="imgprincipal" class="d-flex align-items-center">
         <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
            <div class="welcome">
            </div>

            <div class="container promocion-mes">
            </div>
         </div>
      </section>
      <div id="fb-root"></div>
      <div class="social">
         <a href="https://web.facebook.com/Saxofonista-en-guadalajara-leo-sax-898217146966507"
            title="Saxofonista en guadalajara leo sax" class="icon-redes-sociales"
            target="_blank"><i class="fab fa-facebook-square" id="icon-facebook"></i> Reserva tu evento</a> <br>
         <a href="https://www.youtube.com/channel/UC0UbhIi3zBuewVwOoFn8uvw/featured"
            title="SAXOFONISTA EN GUADALAJARA LEO SAX" class="icon-redes-sociales"
            target="_blank"><i class="fab fa-youtube" id="icon-youtube"></i> Suscribete</a><br>
         <a href="https://www.instagram.com/saxofonista_para_bodas_eventos/"
            title="SAXOFONISTA EN GUADALAJARA LEO SAX" class="icon-redes-sociales"
            target="_blank"><i class="fab fa-instagram" id="icon-instagram"></i> Siguenos</a> <br>
      </div>
      <!--slider de trabajos -->
      <div class="container">
         <div class="caroucel__contenedor">
            <button aria-label="Anterior" class="caroucel-previus"><i class="fas fa-chevron-left"></i></button>
            <div class="carroucel__list" id="carroucelcontainer">
               <!--slider de items -->
            </div>
            <button aria-label="Siguiente" class="caroucel-next"><i class="fas fa-chevron-right"></i></button>
         </div>
         <div role="tablist" class="caroucel__indicadores"></div>
      </div>
      <!--info about-->
      <div class="container">
         <div class="row">
            <div class="col-md-6">
               <img src="frontend/img/_MG_0061-Edit.jpg" id="imgabout">
            </div>
            <div class="col-md-6">
               <h3>SAXOFONISTA PARA EVENTOS FAMILIARES Y SOCIALES PARA TODA LA REGION DE JALISCO</h3>
               <p>Disfruta con tu familia e invitados una gran variedad de musica en vivo de saxofón.</p>
               <p>Con mas de 25 años de esperiencia te garantiza que tus evento será totalmente inigualable.</p>
               <h2>Un pequeña muestra de nuestro trabajo lo puedes encontrar en este reproductor</h2>

               <!--reproductor -->
               <div id="app-cover">

                  <div id="player">
                     <div id="player-track">
                        <div id="album-name"></div>
                        <div id="track-time">
                           <div id="current-time"></div>
                           <div id="track-length"></div>
                        </div>
                        <div id="s-area">
                           <div id="ins-time"></div>
                           <div id="s-hover"></div>
                           <div id="seek-bar"></div>
                        </div>
                     </div>
                     <div id="player-content">
                        <div id="player-controls">
                           <div class="control">
                              <div class="button" id="play-previous">
                                 <i class="fas fa-backward"></i>
                              </div>
                           </div>
                           <div class="control">
                              <div class="button" id="play-pause-button">
                                 <i class="fas fa-play"></i>
                              </div>
                           </div>
                           <div class="control">
                              <div class="button" id="play-next">
                                 <i class="fas fa-forward"></i>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <div class="container">
        <div class="row">
           <!--videos -->
           <div class="col-md-12">
             <div class="card-group" id="contentVideos">
               <!--contenido de card de videos -->
             </div>
           </div>
        </div>
      </div>
      <br><br>
      <!--comentarios -->

      <br><br>
      <h3 style="text-align: center;">Por que tu opinion nos importa</h3>
        <div class="rw-ui-container"></div>
      <div class="fb-comments" data-href="https://www.facebook.com/Saxofonista-Para-Bodas-Eventos-Guadalajara-LEO-SAX-LOVES-898217146966507/" data-width="100%" data-numposts="5"></div>
      <!--mandar mensaje whatsapp -->
      <div id="WABoton"></div>
      <br><br><br>
      <!--loading imagen de inicio -->
      <div class="loading-page-leo"></div>
      <?php include_once("footer.php"); ?>
      <script>
         var serverAPi = "<?php echo __SERVER_API__; ?>";
      </script>

      <script src="frontend/plugging/jquery/jquery.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/glider-js@1.7.3/glider.min.js"></script>
      <script src="https://momentjs.com/downloads/moment.min.js"></script>
      <script src="frontend/plugging/moment/moment.min.js"></script>
      <script src="frontend/plugging/moment/moment-timezone-with-data.min.js"></script>
      <script src="frontend/plugging/moment/moment-with-locales.min.js"></script>
      <script src="frontend/plugging/bootstrap/js/bootstrap.min.js"></script>
      <!-- Enlazar JS Floating WhatsApp -->
      <script type="text/javascript" src="https://rawcdn.githack.com/jerfeson/floating-whatsapp/0310b4cd88e9e55dc637d1466670da26b645ae49/floating-wpp.min.js"></script>
      <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v10.0" nonce="ZUuoe6Hn"></script>

      <script src="frontend/plugging/js/principal.js"></script>
   </body>
</html>
