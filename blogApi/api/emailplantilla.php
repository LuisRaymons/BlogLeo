<?php
  $nombre = "Luis Ramon Valencia";;
  $correo = "elmonjo19@live.com.mx";
  $phone = "3319640683";
  $day = "2021-05-23";
  $adress = "Lomas del sur 345";
  $comentario = "Este es un comentario";

?>
<div id="container-email">
  <div class="container">
    <div class="row">
      <img src="../src/asset/plantillacorreo_01.jpg" alt="" id="imglogo">
    </div>
    <br>
    <p class="tittle-principal">Hola mi nombre es <a href="#"> <?php echo $nombre ?></a> te mando este mensaje por que quiero recibir informacion a mi correo <a href="mailto:"><?php echo $correo; ?></a> </p>
    <p class="tittle-principal">o a mi celular <a href="tel:+52<?php echo $phone; ?>"><?php echo $phone; ?></a>  acerca de los paquetes que tienes para eventos familiares de musica de sansofonista.</p>
    <p class="tittle-principal">Me gustaria que fuera el dia <a href="#"><?php echo $day; ?></a> en la direccion <a href="#"><?php echo $adress; ?></a> de antemano gracias por su apoyo.</p>
    <br><br>
    <p class="tittle-principal">
      <?php
          echo($comentario);
       ?>
    </p>
  </div>
</div>
<style>
  #container-email{
    background-color: black;
    height: 100vh;
    background-size:cover;
    position: relative;
    padding: 0;
  }
  #imglogo{
    width: 50vh;
    height: 50vh;
    margin-left: 40%;
  }

  .tittle-principal{
    color: white;
  }

</style>
