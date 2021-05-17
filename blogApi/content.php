<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-slider" role="tab" aria-controls="nav-slider" aria-selected="true">Slider</a>
    <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-video" role="tab" aria-controls="nav-video" aria-selected="false">Videos</a>
    <a class="nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-preroduct" role="tab" aria-controls="nav-preroduct" aria-selected="false">Reproductor</a>
    <a class="nav-link" id="nav-descuento-tab" data-toggle="tab" href="#nav-descuento" role="tab" aria-controls="nav-descuento" aria-selected="false">Descuento del mes</a>
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-slider" role="tabpanel" aria-labelledby="nav-slider-tab">
     <div class="container">
       <br>
       <span class="fas fa-bars"></span>
       <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalNewSliderimg">
        Agregar imagen
      </button>
      <br>
      <br>
         <table id="sliderprincipal" class="display" style="width: 100%;">
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
  <div class="tab-pane fade" id="nav-video" role="tabpanel" aria-labelledby="nav-video-tab">
    <div class="container">
      <br>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalnewvideo">
        Nuevo video
      </button>
      <br>
      <br>
      <table id="tableVideos" class="display" style="width: 100%;">
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
  <div class="tab-pane fade" id="nav-preroduct" role="tabpanel" aria-labelledby="nav-preroduct-tab">
      <div class="container">
        <br>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalNewSong">
          Agregar cancion
        </button>
        <br>
        <br>
        <table id="tableReproductor" class="display" style="width: 100%;">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Cancion</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
      </div>
  </div>

  <div class="tab-pane fade" id="nav-descuento" role="tabpanel" aria-labelledby="nav-descuento-tab" style="text-align:center;">

      <div id="promo-oferta-regalo">
      </div>
      <br>
      <button type="button" name="button" class="btn btn-primary" data-toggle="modal" data-target="#modalDescuento">Modificar promocion</button>
  </div>
</div>
