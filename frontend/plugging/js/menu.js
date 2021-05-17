var urlBaseAsset = "http://127.0.0.1/blogApi/";

// Consultar descuento
$.ajax({
    url: serverAPi + 'peticiones.php',
    method: "GET",
    data:{'method':"menus"},
    dataType: "json",
    success: function(menu) {
      if(menu.code == 200 && menu.status == "success"){
        var data = menu.data;
        var menuLI = "";

        data.forEach((item, i) => {
          if(item.type == 'nav-item dropdown'){
            menuLI += "<li class='" + item.type   + "' id='submenu'>";
            menuLI += "<a class='nav-link dropdown-toggle' href='" + item.url + "'  id='navbarDropdown2' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>" + item.nombre + "</a>";
            submenubuilt(4).done(function(respuesta){
              var data = JSON.parse(respuesta);
                // Respuesta
                if(data.code == 200 && data.status == "success"){
                  var data = data.data;
                  var submenufull = "";
                  var menulisubmenu = "";

                  data.forEach((item, i) => {
                    menulisubmenu += "<a class='dropdown-item dropdow-events' href='#'>" + item.nombre + "</a>";
                  });
                  submenufull += "<div class='dropdown-menu' aria-labelledby='navbarDropdown' id='header'>";
                  submenufull += menulisubmenu;
                  submenufull += "</div>";
                  $("#navbarDropdown2").append(submenufull);
                }
            });

            menuLI += "</li>";
          } else{
            menuLI += "<li class='" + item.type   + "'>";
            menuLI += "<a class='nav-link' href='" + item.url + "'>" + item.nombre + "</a>";
            menuLI += "</li>";
          }
        });



        $("#menu-all").append(menuLI);
      }
    },
    error: function(e) {
        console.log("El error en el descuento es: ");
        console.log(e);
    }
});


function submenubuilt(id){
  var datamenu;
   return $.ajax({
    url: serverAPi + 'peticiones.php',
    method: "GET",
    data:{'method':"submenu","id":id},
  //  dataType: "json",
    error:function(e){
      console.log("El error en el descuento es: ");
      console.log(e);
    }
  });



}
