const URLactual = window.location;
var trackNames = [];
var trackUrl = [];
var albums = [];
var datoscanciones = new Array();
let arresong = [];
playerTrack = $("#player-track");
var buffInterval = null;
var urlBaseAsset = "http://127.0.0.1/blogApi/";
//var serverAPi = "leosaxmusical.atwebpages.com";
$(document).ready(function() {
    $('#WABoton').floatingWhatsApp({
        phone: '+5213311511725', // Número WhatsApp Business  +5213311511725
        popupMessage: 'Hola 👋 ¿Cómo podemos ayudarte?', // Mensaje pop up
        message: "Hola Leo como estas...", // Mensaje por defecto
        showPopup: true, // Habilita el pop up
        headerTitle: 'WhatsApp Chat', // Título del header
        headerColor: '#25D366', // Color del header
        buttonImage: '<img src="https://rawcdn.githack.com/rafaelbotazini/floating-whatsapp/3d18b26d5c7d430a1ab0b664f8ca6b69014aed68/whatsapp.svg" />', // Icono WhatsApp
        size: '72px', // Tamaño del icono
        //backgroundColor: '#00000', // Color de fondo del botón  // ../../img-icon-whasapp.jpg
        position: "right", // Posición del icono
        //avatar: 'https://www.w3schools.com/howto/img_avatar.png', // URL imagen avatar
        avatar: 'frontend/img/img-icon-whasapp.jpg',
        avatarName: 'Leo sax', // Nombre del avatar
        avatarRole: 'Ayuda', // Rol del avatar
        //autoOpenTimeout: 3000,
        zIndex: '99999',
    });
    $.ajax({

        url: serverAPi + 'peticiones.php',
        method: "GET",
        data: {
            'method': "sliderprincipal"
        },
        dataType: "json",
        success: function(respuesta) {
            if (respuesta.code == 200 && respuesta.status == "success") {
                var data = respuesta.data;
                data.forEach(function(sliderimg, position) {
                    var img = urlBaseAsset + sliderimg.url;
                    var divslider = "";
                    var positionslider = "";
                    divslider += " <div class='caroucel__element'>";
                    divslider += "<img src= " + img + "  width='300px' height='400px'>";
                    divslider += "</div>";
                    $('#carroucelcontainer').append(divslider);
                });
                new Glider(document.querySelector('.carroucel__list'), {
                    slidesToShow: 4,
                    slidesToScroll: 4,
                    draggable: true,
                    dots: '.caroucel__indicadores',
                    arrows: {
                        prev: '.caroucel-previus',
                        next: '.caroucel-next'
                    }
                });
            }
        },
        error: function() {
            console.log("No se ha podido obtener la información");
        }
    });

    $(".loading-page-leo").fadeOut("slow");
    loadingReproductor(); //();
    //loadingsongall();
    (function(d, t, e, m) {

        window.RW_Async_Init = function() {
            RW.init({
                huid: "474483",
                uid: "1fb0ff8b13ab860ff1eddbf5082f3b63",
                source: "website",
                options: {
                    "advanced": {
                        "font": {
                            "hover": {
                                "color": "#6743B3"
                            },
                            "color": "#6743B3"
                        }
                    },
                    "size": "medium",
                    "label": {
                        "background": "#D7BEE4"
                    },
                    "lng": "es",
                    "style": "smiley",
                    "isDummy": false
                }
            });
            RW.render();
        };
        var rw, s = d.getElementsByTagName(e)[0],
            id = "rw-js",
            l = d.location,
            ck = "Y" + t.getFullYear() +
            "M" + t.getMonth() + "D" + t.getDate(),
            p = l.protocol,
            f = ((l.search.indexOf("DBG=") > -1) ? "" : ".min"),
            a = ("https:" == p ? "secure." + m + "js/" : "js." + m);
        if (d.getElementById(id)) return;
        rw = d.createElement(e);
        rw.id = id;
        rw.async = true;
        rw.type = "text/javascript";
        rw.src = p + "//" + a + "external" + f + ".js?ck=" + ck;
        s.parentNode.insertBefore(rw, s);
    }(document, new Date(), "script", "rating-widget.com/"));
});
// consultar videos principales
$.ajax({
    //url: serverAPi + "api/video.php",
    url: serverAPi + 'peticiones.php',
    method: "GET",
    data: {
        'method': "videos"
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
        $('#contentVideos').append(videosAdd);
    },
    error: function(e) {
        console.log("Error al cargar el videos");
    },
    complete: function(e) {
        //console.log("Se cargaron los videoa");
    }
});
// Consultar descuento
$.ajax({

    url: serverAPi + 'peticiones.php',
    method: "GET",
    data: {
        'method': "descuentos"
    },
    dataType: "json",
    success: function(desc) {
        //console.log("As estoooooo......");
        var descAdd = "";
        var preciodescuentofull = desc.data.basemoney * desc.data.porcentaje / 100;
        var preciofull = desc.data.basemoney - preciodescuentofull;
        if (desc.status == 'success' && desc.code == 200) {

          var fechafinPromo = new Date();
          var fechaNew = new Date(desc.data.FechaFinalPromocion);

          if(fechafinPromo <= fechaNew){
            if (desc.data.activo == 'true') {
                descAdd +=  "";
            }
            if(desc.data.typeslider == "regalo" && desc.data.activo == 'true'){

                var dateproe = moment(desc.data.FechaFinalPromocion).locale('es').format('Do MMMM YYYY');
                descAdd += '<div class="card w-10" style="width: 290px;">';
                descAdd += '<img style="height:200px;"  src="'+ urlBaseAsset + desc.data.url +'" alt="No se encontro imagen">';
                descAdd += '<div style="height:900px !importan; background-color: rgba(255, 0, 0, 0.1);" >';

                descAdd += '<h5 style="color:red; font-weight:bold;" class="card-title">La promocion es valida asta: '+  dateproe +'</h5>';
                descAdd += '<p style="color:red; font-weight:bold;" class="card-text">'+ desc.data.descripcion +'</p>';
                descAdd += '<a style="color:blue; margin-left: 30%;" href="contacto.php">Contratar promoción</a>';
                descAdd += '</div>';
                descAdd += '</div>';

            } else if(desc.data.typeslider ==  "oferta" && desc.data.activo == 'true'){
              descAdd += "<div id='promocion-full'>";
              descAdd += " <h3 margin-top:20%;'>Promocion del mes</h3>";
              descAdd += "<div class='promocion'> ";
              descAdd += parseInt(desc.data.porcentaje) + "%";
              descAdd += "</div>";
              descAdd += "</div>";
              descAdd += "<h3>Precio original</h3>";
              descAdd += "<div class='promocion'> ";
              descAdd += "$" + desc.data.basemoney;
              descAdd += "</div>";
              descAdd += "<h3>Precio con descuento</h3>";
              descAdd += "<div class='promocion'>";
              descAdd += "$" + preciofull;
              descAdd += "</div>";
            }
          } else{
            descAdd +=  "";
          }



        }
        $('.promocion-mes').append(descAdd);
    },
    error: function(e) {
        console.log("El error en el descuento es: ");
        console.log(e);
    }
});
// consultar canciones
function llamadasong(id) {
    return new Promise((res, rej) => {
        $.ajax({
            //url: "backend/public/api/song/byId",
            //url: serverAPi + 'api/song.php?id=' + id,
            url: serverAPi + 'peticiones.php',
            method: "GET",
            data: {
                'method': "songById",
                "id": id
            },
            dataType: "json",
            cache: false,
            success: function(e) {
                if (e.code == 200 && e.status == "success") {
                    if (e.data.length > 0) {
                        var allson = [urlBaseAsset + e.data[0].url, e.data[0].nombre, e.data[0].posiciones];
                        albums.push(e.nameSong);
                    }
                }
                res(allson);
            },
            error: function(e) {
                console.log("Entre al errro");
                console.log(e);
            }
        });
    });
}
//-----------Reproductor---------------
function loadingReproductor() {
    var
        bgArtwork = $('#bg-artwork'),
        bgArtworkUrl, albumName = $('#album-name'),
        trackName = $('#track-name'),
        albumArt = $('#album-art'),
        sArea = $('#s-area'),
        seekBar = $('#seek-bar'),
        trackTime = $('#track-time'),
        insTime = $('#ins-time'),
        sHover = $('#s-hover'),
        playPauseButton = $("#play-pause-button"),
        i = playPauseButton.find('i'),
        tProgress = $('#current-time'),
        tTime = $('#track-length'),
        seekT, seekLoc, seekBarPos, cM, ctMinutes, ctSeconds, curMinutes, curSeconds, durMinutes, durSeconds, playProgress, bTime, nTime = 0,

        tFlag = false,
        playPreviousTrackButton = $('#play-previous'),
        playNextTrackButton = $('#play-next'),
        currIndex = -1;

    function playPause() {

        setTimeout(function() {
            console.log(audio.paused);
            if (audio.paused) {

                  playerTrack.addClass('active');
                  checkBuffering();
                  i.attr('class', 'fas fa-pause');

                audio.play();
            } else {
                playerTrack.removeClass('active');
                clearInterval(buffInterval);
                i.attr('class', 'fas fa-play');
                audio.pause();
            }
        }, 300);
    }

    function updateCurrTime() {
        nTime = new Date();
        nTime = nTime.getTime();
        if (!tFlag) {
            tFlag = true;
            trackTime.addClass('active');
        }
        curMinutes = Math.floor(audio.currentTime / 60);
        curSeconds = Math.floor(audio.currentTime - curMinutes * 60);
        durMinutes = Math.floor(audio.duration / 60);
        durSeconds = Math.floor(audio.duration - durMinutes * 60);
        playProgress = (audio.currentTime / audio.duration) * 100;
        if (curMinutes < 10) curMinutes = '0' + curMinutes;
        if (curSeconds < 10) curSeconds = '0' + curSeconds;
        if (durMinutes < 10) durMinutes = '0' + durMinutes;
        if (durSeconds < 10) durSeconds = '0' + durSeconds;
        if (isNaN(curMinutes) || isNaN(curSeconds)) tProgress.text('00:00');
        else tProgress.text(curMinutes + ':' + curSeconds);
        if (isNaN(durMinutes) || isNaN(durSeconds)) tTime.text('00:00');
        else tTime.text(durMinutes + ':' + durSeconds);
        if (isNaN(curMinutes) || isNaN(curSeconds) || isNaN(durMinutes) || isNaN(durSeconds)) trackTime.removeClass('active');
        else trackTime.addClass('active');
        seekBar.width(playProgress + '%');
        if (playProgress == 100) {
            i.attr('class', 'fa fa-play');
            seekBar.width(0);
            tProgress.text('00:00');
            // albumArt.removeClass('buffering').removeClass('active');
            clearInterval(buffInterval);
        }
    }

    function checkBuffering() {
        clearInterval(buffInterval);
        buffInterval = setInterval(function() {
            bTime = new Date();
            bTime = bTime.getTime();
        }, 100);
    }

    function selectTrack(flag) {
        var currTrackName = "";
        var currAlbum = "";
        if (flag == 0 || flag == 1)
            ++currIndex;
        else --currIndex;
        if ((currIndex > -1)) {
            if (flag == 0) i.attr('class', 'fa fa-play');
            else {
                //albumArt.removeClass('buffering');
                i.attr('class', 'fa fa-pause');
            }
            seekBar.width(0);
            trackTime.removeClass('active');
            tProgress.text('00:00');
            tTime.text('00:00');
            // currAlbum = albums[currIndex];
            var callsongReproduct = llamadasong(currIndex);

            callsongReproduct.then((songurl) => {
                if (songurl === undefined) {
                    currIndex = -1;
                } else {
                    var urlsong = songurl[0];
                    var namesong = songurl[1];
                    currTrackName = namesong;
                    currAlbum = namesong;
                    audio.src = urlsong;
                    nTime = 0;
                    bTime = new Date();
                    bTime = bTime.getTime();

                    if (flag != 0) {
                        var a = audio.play();
                        playerTrack.addClass('active');
                        // albumArt.addClass('active');
                        clearInterval(buffInterval);
                        checkBuffering();
                    }
                    albumName.text(currAlbum);
                    trackName.text(currTrackName);
                }
            });
        } else {
            if (flag == 0 || flag == 1)
                --currIndex;
            else ++currIndex;
        }
    }

    function initPlayer() {
        audio = new Audio();
        selectTrack(0);
        audio.loop = false;
        playPauseButton.on('click', playPause);
        $(audio).on('timeupdate', updateCurrTime);
        playPreviousTrackButton.on('click', function() {
            selectTrack(-1);
        });
        playNextTrackButton.on('click', function() {
            selectTrack(1);
        });
    }
    initPlayer();
}

function loadingsongall() {
    var source = "";
    $.ajax({
        url: serverAPi + 'peticiones.php',
        method: "GET",
        data: {
            'method': "song"
        },
        dataType: "json",
        success: function(e) {
            if (e.data.length > 0) {
                datasource = e.data;
                $play = $("#play");
                $pause = $("#pause");
                $previus = $("#previous");
                $next = $("#next");

                datasource.forEach((song, i) => {
                    if (i == 0) {
                        source += "<source src='" + urlBaseAsset + song.url + "' type='audio/mp3'>";
                    } else {
                        source += "<source src='" + urlBaseAsset + song.url + "' type='audio/mp3'>";
                    }

                });
                $('#audioReproductor').append(source);
            }
        },
        error: function(e) {
            console.log("Error al obtener las canciones");
            console.llog(e);
        }
    });
}
