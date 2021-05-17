$(document).ready(function(){
  var dataid = sessionStorage.getItem('sessionID');
  var dataname = sessionStorage.getItem('sessionName');
  var dataemail = sessionStorage.getItem('sessionEmail');

	if(dataid === null && dataname === null && dataemail === null){
    $("#regresarhome").css("display", "none");
    $("#formregisterNew").css("display", "block");
    $("#loginPanel").css("display", "block");
	} else{
    $("#regresarhome").css("display", "block");
    $("#formregisterNew").css("display", "none");
    $("#loginPanel").css("display", "none");
  }
});

// mostrar contraseñas
$("#faiconshow").click(function(e){
  pass = document.getElementById("password");

  if(pass.type == "password"){
    pass.type = "text";
    $("#faiconshow").removeClass("fa fa-eye-slash");
    $("#faiconshow").addClass("fa fa-eye");
  } else if(pass.type == "text"){
    pass.type = "password";
    $("#faiconshow").removeClass("fa fa-eye");
    $("#faiconshow").addClass("fa fa-eye-slash");
  }

});
$("#faiconshowconfirm").click(function(e){
  confirmpass = document.getElementById("confirmpassword");

  if(confirmpass.type == "password"){
    confirmpass.type = "text";
    $("#faiconshowconfirm").removeClass("fa fa-eye-slash");
    $("#faiconshowconfirm").addClass("fa fa-eye");
  } else if(confirmpass.type == "text"){
    confirmpass.type = "password";
    $("#faiconshowconfirm").removeClass("fa fa-eye");
    $("#faiconshowconfirm").addClass("fa fa-eye-slash");
  }
});
// crear un nuevo usuario
$("#GardarUser").click(function(e){
  name = $("#name").val();
  email = $("#emails").val();
  password = $("#password").val();
  confirpassword = $("#confirmpassword").val();


  if(name != '' && email != '' && password != '' && confirpassword != ''){
    if(email.indexOf('@', 0) == -1 || email.indexOf('.', 0) == -1) {
            Swal.fire({
              position: 'top-end',
              icon: 'warning',
              title: 'El correo electrónico introducido no es correcto',
              showConfirmButton: false,
              timer: 2000
            });
            return false;
    }
    if(password.length < 8 || confirpassword.length < 8){
          Swal.fire({
              position: 'top-end',
              icon: 'warning',
              title: 'La contraseña debe contener minimo 8 caracteres como minimo',
              showConfirmButton: false,
              timer: 2000
          });
      return false;
    }

    if(password == confirpassword){
      Swal.fire({
        title: '¿Quieres agregar este usuario?',
        text: "Este usuario sera agregado a las cuentas de administracion de la pagina",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Aceptar'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
              url:"api/user.php?method=newUser",
              type: "POST",
              data: $('#form-register-user').serialize(), // {'name':name,'emails':email,'password':password,'confirmpassword':confirpassword} ,
              dataType : 'json',
              beforend:function(e){
                $("#ModalLogading").modal("show");
              },
              success:function(e){

                if(e.code == 200 && e.status == "success"){
                  $('#form-register-user')[0].reset();
                  Swal.fire({
                   position: 'top-end',
                   icon: e.status,
                   title: e.msm,
                   showConfirmButton: false,
                   timer: 1500
                 });

                 var urlbase = window.location.origin + namePagina;
                 window.location.href = urlbase + "home.php";

                } else{
                  Swal.fire({
                   position: 'top-end',
                   icon: e.status,
                   title: e.msm,
                   showConfirmButton: false,
                   timer: 1500
                  })
                }
              }, error:function(e){
                Swal.fire({
                 position: 'top-end',
                 icon: e.status,
                 title: e.msm,
                 showConfirmButton: false,
                 timer: 1500
                })
              },
              complete:function(e){
                $("#ModalLogading").modal("hide");
              }
            });
        }
      });
    } else{
      Swal.fire({
        position: 'top-end',
        icon: 'warning',
        title: 'Las contraseñas no coinciden',
        showConfirmButton: false,
        timer: 2000
      });
    }
  } else{
    Swal.fire({
      position: 'top-end',
      icon: 'warning',
      title: 'Deves llenar todo los campos',
      showConfirmButton: false,
      timer: 2000
    });
  }


});
// loguearse
$("#LoginId").click(function(e){
  $email = $("#emailverif").val();
  $pass = $("#passwordverif").val();

  if($email != '' && $pass != ''){
    $.ajax({
      url:"api/user.php",
      type: "GET",
      data: $('#login-leo').serialize(), // {'name':name,'emails':email,'password':password,'confirmpassword':confirpassword} ,
      dataType : 'json',
      beforend:function(e){
        $("#ModalLogading").modal("show");
      },
      success:function(e){

        if(e.code == 200 && e.status == "success"){
          sessionStorage.setItem('sessionID', e.id);
          sessionStorage.setItem('sessionName', e.nombre);
          sessionStorage.setItem('sessionEmail', e.email);

          window.location.href = "home.php";
        } else{
          Swal.fire({
           position: 'top-end',
           icon: e.status,
           title: e.msm,
           showConfirmButton: false,
           timer: 1500
          })
        }
      }, error:function(e){
        Swal.fire({
         position: 'top-end',
         icon: e.status,
         title: e.msm,
         showConfirmButton: false,
         timer: 1500
        })
      },
      complete:function(e){
        $("#ModalLogading").modal("hide");
      }
    });
  } else{
    Swal.fire({
     position: 'top-end',
     icon: 'warning',
     title: 'Complete todo los campos',
     showConfirmButton: false,
     timer: 1500
    })
  }
});
