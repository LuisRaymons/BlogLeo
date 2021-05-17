var banderafecha = false;
$(document).ready(function() {
   //$("#dateevento" ).datetimepicker();
   $('#dateevento').datetimepicker();
  $("#form-send-email").validate({
    rules: {
      namefull:{required: true},
      emailcontract:{required: true},
      phonecontact:{required: true},
      dateevento:{required: true},
      address:{required: true},
    },
    messages : {
      namefull:{required: 'Su nombre es requerido'},
      emailcontract:{required: 'Su correo es requerido'},
      phonecontact:{required: 'El telefono de contacto es reqierido'},
      dateevento:{required: 'Dia del evento es requerido'},
      address:{required: 'Direccion del evento es requerido'},
    }
  });
});
$("#sendmsmemails").click(function(e){
  if(banderafecha){
    if($("#form-send-email").valid()){
      Swal.fire({
       title: '¿Quieres mandar este correo a Leo?',
       showCancelButton: true,
       confirmButtonText: `Si, Enviar`
      }).then((result) => {
       if (result.isConfirmed) {
         var nombre =  $("#namefull").val();
         var correo =  $("#emailcontract").val();
         var telefono =  $("#phonecontact").val();
         var dateevent =  $("#dateevento").val();
         var address = $("#adress").val();
         var comment = $("#comentariocontact").val();

         $.ajax({
           url: serverAPi + 'peticiones.php?method=users&nombre=' + nombre + "&email=" + correo + "&phone=" + telefono + "&dayevent=" + dateevent + "&adress=" + address + "&comment=" + comment,
           method: "GET",
           processData: false,
           contentType: false,
           dataType: "json",
           timeout: 90000,
           beforeSend:function(e){
             $("#ModalLogading").modal("show");
           },
           success: function(e){
             console.log(e);
           }, error: function(e){
             //console.log("todo mal");
             //console.log(e);
           },
           complete:function(e){
             $("#ModalLogading").modal("hide");
             $("#form-send-email")[0].reset();
             Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'El correo fue enviado a leo en unas cuantas horas tendras notificacion',
                showConfirmButton: false,
                timer: 2700
            });
           }
         });

       }
      })
    }
  } else{

      Swal.fire({
       position: 'top-end',
       icon: 'warning',
       title: 'La fecha minima es de 15 dias',
       showConfirmButton: false,
       timer: 2500
     });
  }
});
$("#dateevento").change(function(e){
  var fechaselect = new Date($("#dateevento").val());
  var fechahoy = new Date();
  var dayInMillis=24*3600000;
  var comp = ((fechahoy.getTime()) - (fechaselect.getTime()));
  var compaday = Math.floor(comp/dayInMillis) * -1 + 1;

  if(compaday < 15){
      Swal.fire({
       position: 'top-end',
       icon: 'warning',
       title: 'La fecha minima es de 15 dias',
       showConfirmButton: false,
       timer: 2500
     });
     banderafecha = false;
  } else{
    banderafecha = true;
  }
});
