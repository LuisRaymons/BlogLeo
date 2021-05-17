var urlBaseAsset = "http://127.0.0.1/blogApi/";
$(document).ready(function(e){
  
    $.ajax({

      url: serverAPi + 'peticiones.php',
      method: "GET",
      data: {
          'method': "slidermisa"
      },
      dataType: "json",
      success: function(respuesta) {
          if (respuesta.code == 200 && respuesta.status == "success") {
              var data = respuesta.data;
                console.log(data);

              data.forEach(function(sliderimg, position) {
                  var img = urlBaseAsset + sliderimg.url;
                  var divslider = "";
                  var positionslider = "";
                  divslider += " <div class='caroucel__element'>";
                  divslider += "<img src= " + img + "  width='300px' height='400px'>";
                  divslider += "</div>";
                  $('#carroucelcontainer_misa').append(divslider);

              });

              new Glider(document.querySelector('.carroucel_list_misa'), {
                  slidesToShow: 4,
                  slidesToScroll: 4,
                  draggable: true,
                  dots: '.caroucel__indicadores_misa',
                  arrows: {
                      prev: '.caroucel_previus_misa',
                      next: '.caroucel_next_misa'
                  }
              });
          }
      },
      error: function() {
          console.log("No se ha podido obtener la información");
      }
  });
});

// consultar videos misas
$.ajax({
    //url: serverAPi + "api/video.php",
    url: serverAPi + 'peticiones.php',
    method: "GET",
    data: {
        'method': "videosmisa"
    },
    dataType: "json",
    success: function(e) {
        var videos = e.data;
        var videosAdd = "";
        videos.forEach(function(video, position) {
            // console.log(video);
            var urlvideo = urlBaseAsset + video.url;
            videosAdd += "<div class='col-md-4'>";
            videosAdd += "<div class='card'>";
            videosAdd += "<video src='";
            videosAdd += urlvideo;
            videosAdd += "'  preload controls controlsList='nodownload'></video>";
            videosAdd += "<div class='card-body' id='card-body-style'>";
            videosAdd += "<h5 class='card-title'>" + video.titulo + "</h5>";
            videosAdd += "<p class='card-text'><small class='text-muted07'></small></p>";
            videosAdd += "</div>";
            videosAdd += "</div>";
            videosAdd += "</div>";
        });
        $('#contentVideosMisa').append(videosAdd);
    },
    error: function(e) {
        console.log("Error al cargar el videos");
    },
    complete: function(e) {
        //console.log("Se cargaron los videoa");
    }
});
