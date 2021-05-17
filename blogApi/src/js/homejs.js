$(document).ready(function () {
	var dataid = sessionStorage.getItem('sessionID');
	var dataname = sessionStorage.getItem('sessionName');
	var dataemail = sessionStorage.getItem('sessionEmail');
	$("#namesession").text(dataname);
	if(dataid === null && dataname === null && dataemail === null){
			window.location.href = "index.php";
	}

	//loadinSlider();
	loadinngtableslider();
	loadinngtableslidermisa();
	loadinngtablvideos();
	loadinngtablvideosmisas();
	loadingtablereproducto();
	loadingprocentaje();
	loadingtableurl();
	var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
	$("#layoutSidenav_nav .sb-sidenav a.nav-link").each(function() {
					if (this.href === path) {
							$(this).addClass("active");
					}
			});
	// Toggle the side navigation
	$("#sidebarToggle").on("click", function(e) {
			e.preventDefault();
			$("body").toggleClass("sb-sidenav-toggled");
	});
	//loadingprocentaje();
});
$('#addsliderimg').on("click", function (e) {
	e.preventDefault();
	img = $("#imgsliderselect").val();

	if (img == "") {
		Swal.fire({
			position: 'top-end',
			icon: 'warning',
			title: 'Seleccione una imagen',
			showConfirmButton: false,
			timer: 1800
		})
	} else {
		Swal.fire({
			title: '¿Quieres agregar esta imagen al slider?',
			showCancelButton: true,
			confirmButtonText: `Aceptar`,
		}).then((result) => {

			if (result.isConfirmed) {
				var formData = $("#postsliderimg");
				var formD = new FormData(formData[0]);
				formD.append("method", 'pricipal');

				$.ajax({
					url: 'api/slider.php',
					type: 'POST',
					data: formD,
					cache: false,
			    contentType: false,
			    processData: false,
					dataType : 'json',
					beforeSend: function (data) {
						$("#ModalLogading").modal("show");
					},
					success: function (response) {

						if (response.status == 'success' && response.code == 200) {
							loadinSlider();
							loadinngtableslider();
							document.getElementById("postsliderimg").reset();
							Swal.fire({
								position: 'top-end',
								icon: 'success',
								title: 'Imagen agregada con exito',
								showConfirmButton: false,
								timer: 1500
							});
						} else {
							Swal.fire({
								position: 'top-end',
								icon: response.status,
								title: response.msm,
								showConfirmButton: false,
								timer: 1500
							});
						}
					},
					error: function (r) {
						console.log("-------------Respuesta error------------------");
						console.log(r);
					},
					complete:function(e){
						cerrarmodal($("#ModalLogading"));
						cerrarmodal($("#modalNewSliderimg"));
						loadinngtableslider();
					}
				});
			}
		})
	}
});
$('#addsliderimisa').on("click", function (e) {
	e.preventDefault();
	img = $("#imgsliderselect").val();

	if (img == "") {
		Swal.fire({
			position: 'top-end',
			icon: 'warning',
			title: 'Seleccione una imagen',
			showConfirmButton: false,
			timer: 1800
		})
	} else {
		Swal.fire({
			title: '¿Quieres agregar esta imagen al slider de misa?',
			showCancelButton: true,
			confirmButtonText: `Aceptar`,
		}).then((result) => {

			if (result.isConfirmed) {
				var formData = $("#postsliderimgmisa");
				var formD = new FormData(formData[0]);
				formD.append("method", 'misa');

				$.ajax({
					url: 'api/slider.php',
					type: 'POST',
					data: formD,
					cache: false,
			    contentType: false,
			    processData: false,
					dataType : 'json',
					beforeSend: function (data) {
						$("#ModalLogading").modal("show");
					},
					success: function (response) {

						if (response.status == 'success' && response.code == 200) {
							loadinSlider();
							loadinngtableslider();
							document.getElementById("postsliderimgmisa").reset();
							Swal.fire({
								position: 'top-end',
								icon: 'success',
								title: 'Imagen agregada con exito al slider de misa',
								showConfirmButton: false,
								timer: 1500
							});
						} else {
							Swal.fire({
								position: 'top-end',
								icon: response.status,
								title: response.msm,
								showConfirmButton: false,
								timer: 1500
							});
						}
					},
					error: function (r) {
						console.log("-------------Respuesta error------------------");
						console.log(r);
					},
					complete:function(e){
						cerrarmodal($("#ModalLogading"));
						cerrarmodal($("#modalNewSliderimgMisa"));
						loadinngtableslidermisa();
					}
				});
			}
		})
	}
});
$("#addvideoss").on("click", function (e){
    titulo = $("#tituloid").val();
    video = $("#filevideo").val();
    if(video != ''){
      if(titulo != ''){
        var formatos = new Array("mp4","MP4", "avi", "AVI", "mov", "MOV");
        var extension = video.split('.');
        if(formatos.includes(extension[1])){
            Swal.fire({
            title: '¿Quieres agregar este video?',
            showCancelButton: true,
            confirmButtonText: `Guardar`
            }).then((result) => {

            if (result.isConfirmed) {
              var formDatavideo = $("#postsvideo");
            	var formVD = new FormData(formDatavideo[0]);

              $.ajax({
                url:   'api/video.php',
                type:  'POST',
                data: formVD,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend:function(data){
                  $("#ModalLogading").modal("show");
                },
                success:function(response){
                  if(response.status=='success' && response.code==200){
                    document.getElementById("postsvideo").reset();
                    Swal.fire({
                      position: 'top-end',
                      icon: 'success',
                      title: 'Video subido con exito',
                      showConfirmButton: false,
                      timer: 1500
                    });

                  } else {
                    Swal.fire({
                      position: 'top-end',
                      icon: response.status,
                      title: response.msm,
                      showConfirmButton: false,
                      timer: 1500
                    });
                  }

                },
                error:function(e){
                  Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Ocurrio un error al subir tu video',
                    showConfirmButton: false,
                    timer: 1500
                  });

                },
								complete:function(e){
									cerrarmodal($("#ModalLogading"));
									cerrarmodal($("#modalnewvideo"));
									loadinngtablvideos();
								}
              });
            }
            })
        } else{
          Swal.fire({
            position: 'top-end',
            icon: 'warning',
            title: 'El video que intentas subir no es un video',
            showConfirmButton: false,
            timer: 1500
          });
        }
      }else {
        // title vacio
        Swal.fire({
          position: 'top-end',
          icon: 'warning',
          title: 'Agrega un titulo al video',
          showConfirmButton: false,
          timer: 1500
        });
      }
    } else {
      Swal.fire({
        position: 'top-end',
        icon: 'warning',
        title: 'Agrega un video',
        showConfirmButton: false,
        timer: 1500
      });
    }
});
$("#savevideomisa").on("click", function (e){

    titulo = $("#tituloid").val();
    video = $("#filevideomisa").val();
    if(video != ''){
      if(titulo != ''){
        var formatos = new Array("mp4","MP4", "avi", "AVI", "mov", "MOV");
        var extension = video.split('.');
        if(formatos.includes(extension[1])){
            Swal.fire({
            title: '¿Quieres agregar este video?',
            showCancelButton: true,
            confirmButtonText: `Guardar`
            }).then((result) => {

            if (result.isConfirmed) {
              var formDatavideo = $("#sendvideomisa");
            	var formVD = new FormData(formDatavideo[0]);

              $.ajax({
                url:   'api/video.php',
                type:  'POST',
                data: formVD,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend:function(data){
                  $("#ModalLogading").modal("show");
                },
                success:function(response){
                  if(response.status=='success' && response.code==200){
                    document.getElementById("sendvideomisa").reset();
                    Swal.fire({
                      position: 'top-end',
                      icon: 'success',
                      title: 'Video subido con exito',
                      showConfirmButton: false,
                      timer: 1500
                    });

                  } else {
                    Swal.fire({
                      position: 'top-end',
                      icon: response.status,
                      title: response.msm,
                      showConfirmButton: false,
                      timer: 1500
                    });
                  }

                },
                error:function(e){
                  Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Ocurrio un error al subir tu video',
                    showConfirmButton: false,
                    timer: 1500
                  });

                },
								complete:function(e){
									cerrarmodal($("#ModalLogading"));
									cerrarmodal($("#modalnewvideo"));
									cerrarmodal($("#addvideomisa"));
									loadinngtablvideosmisas();
								}
              });
            }
            })
        } else{
          Swal.fire({
            position: 'top-end',
            icon: 'warning',
            title: 'El video que intentas subir no es un video',
            showConfirmButton: false,
            timer: 1500
          });
        }
      }else {
        // title vacio
        Swal.fire({
          position: 'top-end',
          icon: 'warning',
          title: 'Agrega un titulo al video',
          showConfirmButton: false,
          timer: 1500
        });
      }
    } else {
      Swal.fire({
        position: 'top-end',
        icon: 'warning',
        title: 'Agrega un video',
        showConfirmButton: false,
        timer: 1500
      });
    }
});
$("#addsong").on("click", function(e){
	if($("#namesong").val() != ''){
		Swal.fire({
		  title: '¿Quieres agregar esta cancion?',
		  showCancelButton: true,
		  confirmButtonText: `Agregar`
		}).then((result) => {
		  /* Read more about isConfirmed, isDenied below */
		  if (result.isConfirmed) {
				var formdatasong = $("#songformadd");
				var formsong = new FormData(formdatasong[0]);
				$.ajax({
					url:"api/song.php",
					type:  'POST',
					data: formsong,
					cache: false,
					contentType: false,
					processData: false,
					beforeSend:function(data){
						$("#ModalLogading").modal("show");
					},
					success:function(song){
						if(song.code==200 && song.status=="success"){
								Swal.fire({
								  position: 'top-end',
								  icon: song.status,
								  title: "Cancion agregada con exito",
								  showConfirmButton: false,
								  timer: 1500
								});

						} else{
								Swal.fire({
									position: 'top-end',
									icon: song.status,
									title: song.info,
									showConfirmButton: false,
									timer: 1500
								})
						}
					},
					error:function(e){
						console.log("----------------------error----------------------");
						console.log(e);
					},
					complete:function(e){
						cerrarmodal($("#ModalLogading"));
						cerrarmodal($("#modalNewSong"));
						loadingtablereproducto();

						$("#modalNewSong").modal('hide');
						$('body').removeClass('modal-open');
						$('.modal-backdrop').remove();
						$("#songformadd")[0].reset();
					}
				});
		  }
		})
	} else{
		Swal.fire({
		  icon: 'warning',
		  title: 'Se requiere el nombre de la cancion'
		})
	}
});
$("#savedescuento").on("click",function(e){
		var selectoption = $("#select-promo").val();
		var activarPromo = $("#activaDesc").prop('checked');
		var froms = $("#from").val();
		var to = $("#to").val();
		var id = $("#iddescuento").val();
		var descuentonumer = $("#porcentajeUpdate").val();
		var preciobace  = $("#baseporcentaje").val();
		var fileimgpromo = $("#promocion-img").val();
		var descriptionpromo = $("#promodesc").val();

		if(froms == ''){
			Swal.fire({
				position: 'top-end',
				icon: 'warning',
				title: 'Seleccione una fecha de inicio',
				showConfirmButton: false,
				timer: 1500
		 });
		}
		if(to == ''){
			Swal.fire({
				position: 'top-end',
				icon: 'warning',
				title: 'Seleccione una fecha de fin',
				showConfirmButton: false,
				timer: 1500
			});
		}
		if(to  < froms){
			Swal.fire({
				position: 'top-end',
				icon: 'warning',
				title: 'La fecha final deve ser mayor a la fecha inicio',
				showConfirmButton: false,
				timer: 1800
			});
		}
		if(selectoption == '' && activarPromo == true){
				Swal.fire({
				  icon: 'warning',
				  title: '¿Tipo de promocion?',
				  text: 'Seleccione el tipo de promocion'
				});
		} else if(selectoption == 'oferta'){

			if(descuentonumer != '' && preciobace != ''){
				if(descuentonumer.toString()  < 100){
					if(froms == '' || to == '' || to  < froms){
						Swal.fire({
							position: 'top-end',
							icon: 'warning',
							title: 'Revise las fechas',
							showConfirmButton: false,
							timer: 1800
						});
					} else{
						Swal.fire({
						title: '¿Deseas cambiar el porcentaje de descuento?',
						showCancelButton: true,
						confirmButtonText: `Guardar`
						}).then((result) => {
						if (result.isConfirmed) {
								var formData = new FormData();
								formData.append("method", "oferta");
								formData.append("porcentajeUpdate", descuentonumer);
								formData.append("from",froms);
								formData.append("to",to);
								formData.append("baseporcentaje",preciobace);
								formData.append("iddescuento",id);
								$.ajax({
									url:"api/descuento.php",
									type:  'POST',
									data: formData,
									cache: false,
									contentType: false,
									processData: false,
									dataType: 'json',
									asycn:false,
									beforeSend:function(data){
										$("#ModalLogading").modal("show");

									},
									success:function(e){
											Swal.fire({
												position: 'top-end',
												icon: e.status,
												title: e.msm,
												showConfirmButton: false,
												timer: 1500
											 });
											$("#descuentoId").val(parseFloat(e.porcentajeUpdate));
											$("#basemoneyShow").val(parseFloat(e.basemoney));
											loadingprocentaje();
									 },
									error:function(e){
										console.log("Todo mal");
										console.log(e);
									 },
									complete:function(e){
										 $("#ModalLogading").modal('hide');
										 $("#modalDescuento").modal('hide');
										 $('body').removeClass('modal-open');
										 $('.modal-backdrop').remove();
										 $("#form-descuento")[0].reset();
										 $("#activaDesc").prop( "disabled", false);
									 }
								});
						}
					});
					}

				} else{
					Swal.fire({
						position: 'top-end',
						icon: 'warning',
						title: 'El porcentaje no debe superar el 99 porciento',
						showConfirmButton: false,
						timer: 1800
				  });
				}
			}else{

				Swal.fire({
					position: 'top-end',
					icon: 'warning',
					title: 'Escribe el porcentaje y el precio base para el descuento',
					showConfirmButton: false,
					timer: 1800
				});
			}
		}else if(selectoption == 'regalo'){

				if(fileimgpromo == ''){
					bandera = false;
						Swal.fire({
						  position: 'top-end',
						  icon: 'warning',
						  title: 'Seleccione una imagen para la promoción',
						  showConfirmButton: false,
						  timer: 2500
						});
				}
				if(descriptionpromo == ''){
					bandera = false;
						Swal.fire({
							position: 'top-end',
							icon: 'warning',
							title: 'En que consiste la promocion, escribe una descripción',
							showConfirmButton: false,
							timer: 2500
						});
				}

				if(froms == '' || to == '' || to  < froms){
						Swal.fire({
		          position: 'top-end',
		          icon: 'warning',
		          title: 'Revise las fechas',
		          showConfirmButton: false,
		          timer: 1800
	          });

				} else{
					var formdatapromoregalo = $("#form-descuento");
					var formdescuentoregalo = new FormData(formdatapromoregalo[0]);
							formdescuentoregalo.append("method","regalo");
						Swal.fire({
						  title: '¿Quieres modificar la promocion?',
						  showCancelButton: true,
						  confirmButtonText: `Aceptar`
						}).then((result) => {
						  if (result.isConfirmed) {
									$.ajax({
										url:"api/descuento.php",
										type:  'POST',
										data: formdescuentoregalo,
										cache: false,
										contentType: false,
										processData: false,
										dataType: 'json',
										asycn:false,
										beforeSend:function(data){
											$("#ModalLogading").modal("show");
										},
										success:function(e){
												Swal.fire({
													position: 'top-end',
													icon: e.status,
													title: e.msm,
													showConfirmButton: false,
													timer: 1500
												 });
												 loadingprocentaje();
									   },
										error:function(e){
										 	console.log("Todo mal");
											console.log(e);
										 },
										complete:function(e){
											 $("#ModalLogading").modal('hide');
											 $("#modalDescuento").modal('hide');
											 $('body').removeClass('modal-open');
				   						 $('.modal-backdrop').remove();
											 $("#form-descuento")[0].reset();
											 $("#activaDesc").prop( "disabled", false);
										 }
									});
						  }
						});
				}

		}else if(activarPromo == false){
			Swal.fire({
			  title: '¿Quieres desactivar las promociones?',
			  showCancelButton: true,
			  confirmButtonText: `Si, quiero`
			}).then((result) => {
			  /* Read more about isConfirmed, isDenied below */
			  if (result.isConfirmed) {

					var formDisablePromo = new FormData();
							formDisablePromo.append("method","disabledpromo");
							formDisablePromo.append("id",id);

					$.ajax({
						url:"api/descuento.php",
						type:  'POST',
						data: formDisablePromo,
						cache: false,
						contentType: false,
						processData: false,
						dataType: 'json',
						asycn:false,
						beforeSend:function(data){
							$("#ModalLogading").modal("show");

						},
						success:function(e){
								Swal.fire({
									position: 'top-end',
									icon: e.status,
									title: e.msm,
									showConfirmButton: false,
									timer: 1500
								 });
								 loadingprocentaje();
						 },
						error:function(e){
							console.log("Todo mal");
							console.log(e);
						 },
						complete:function(e){
							 $("#ModalLogading").modal('hide');
							 $("#modalDescuento").modal('hide');
							 $('body').removeClass('modal-open');
							 $('.modal-backdrop').remove();
							 $("#form-descuento")[0].reset();
							 $("#activaDesc").prop( "disabled", false);
						 }
					});
			  }
			})
		} else{
			Swal.fire({
			  icon: 'warning',
			  title: '¿Tipo de promocion?',
			  text: 'Seleccione el tipo de promocion'
			});
		}

});  /// promociones update
$("#select-promo").on("change", function(e){
	var selectoption = $("#select-promo").val();
	console.log(selectoption);

	if(selectoption == 'regalo'){
		$("#regalo-div").css("display","block");
		$("#oferta-div").css("display","none");
	} else if(selectoption == 'oferta'){
		$("#oferta-div").css("display","block");
		$("#regalo-div").css("display","none");
	} else{
			$("#oferta-div").css("display","none");

			$("#regalo-div").css("display","none");
	}
});
function loadinSlider() {
	$.ajax({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
		url: 'api/slider.php',
		type: 'GET',
		cache: false,
		contentType: false,
		processData: false,
		success: function (response) {

			var data = response.data;
			let sliderimg = [];
			var divslider = "";
			$(".carousel-item").removeClass("active");

			data.forEach((item, i) => {
				if (i == 0) {
					divslider = '<div class="carousel-item active item">';
					divslider += "<img class='img-responsive'" + " src= " + item.url + ">";
					divslider += '</div>';
				} else {
					divslider = '<div class="carousel-item item">';
					divslider += "<img class='img-responsive'" + " src= " + item.url + ">";
					divslider += '</div>';
				}
				$('#carrucelsliderimg').append(divslider);
			});

		},
		error: function (r) {
			console.log("-------------Respuesta slider error------------------");
			console.log(r);
		}
	});
}
function loadinngtableslider() {
	return table = $("#sliderprincipal").DataTable({
		language: {
			"decimal": "",
			"emptyTable": "No hay información",
			"info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
			"infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
			"infoFiltered": "(Filtrado de _MAX_ total entradas)",
			"infoPostFix": "",
			"thousands": ",",
			"lengthMenu": "Mostrar _MENU_ Entradas",
			"loadingRecords": "Cargando...",
			"processing": "Procesando...",
			"search": "Buscar:",
			"zeroRecords": "Sin resultados encontrados",
			"paginate": {
				"first": "Primero",
				"last": "Ultimo",
				"next": "Siguiente",
				"previous": "Anterior"
			}
		},
		destroy: true,
		processing: true,
		serverSide: true,
		ajax: {
			url: "api/slider.php?method=pricipal",
			method: "GET"
		},
		columns: [{
				"data": "id"
			},
			{
				data: "url",
				name: 'url',
				render: function (data, type, full, meta) {
					return " <img src= " + data + " id='imageIdTable' witdth='40px' height='90px'/>";
				}
			},
			{
				data: "id",
				name: "id",
				render: function (data, type, full, meta) {
					return "<i class='fa fa-prescription-bottle' id='updateProduct' onclick='deleteimgslider(" + data + ")' style='cursor: pointer'></i>"
				}
			}
		]
	});
}
function loadinngtableslidermisa() {
	return table = $("#slidermisa").DataTable({
		language: {
			"decimal": "",
			"emptyTable": "No hay información",
			"info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
			"infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
			"infoFiltered": "(Filtrado de _MAX_ total entradas)",
			"infoPostFix": "",
			"thousands": ",",
			"lengthMenu": "Mostrar _MENU_ Entradas",
			"loadingRecords": "Cargando...",
			"processing": "Procesando...",
			"search": "Buscar:",
			"zeroRecords": "Sin resultados encontrados",
			"paginate": {
				"first": "Primero",
				"last": "Ultimo",
				"next": "Siguiente",
				"previous": "Anterior"
			}
		},
		destroy: true,
		processing: true,
		serverSide: true,
		ajax: {
			url: "api/slider.php?method=misa",
			method: "GET"
		},
		columns: [{
				"data": "id"
			},
			{
				data: "url",
				name: 'url',
				render: function (data, type, full, meta) {
					return " <img src= " + data + " id='imageIdTable' witdth='40px' height='90px'/>";
				}
			},
			{
				data: "id",
				name: "id",
				render: function (data, type, full, meta) {
					return "<i class='fa fa-prescription-bottle' id='updateProduct' onclick='deleteimgslider(" + data + ")' style='cursor: pointer'></i>"
				}
			}
		]
	});
}
function loadinngtablvideos() {
	return table = $("#tableVideos").DataTable({
		language: {
			"decimal": "",
			"emptyTable": "No hay información",
			"info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
			"infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
			"infoFiltered": "(Filtrado de _MAX_ total entradas)",
			"infoPostFix": "",
			"thousands": ",",
			"lengthMenu": "Mostrar _MENU_ Entradas",
			"loadingRecords": "Cargando...",
			"processing": "Procesando...",
			"search": "Buscar:",
			"zeroRecords": "Sin resultados encontrados",
			"paginate": {
				"first": "Primero",
				"last": "Ultimo",
				"next": "Siguiente",
				"previous": "Anterior"
			}
		},
		destroy: true,
		processing: true,
		serverSide: true,
		ajax: {
			url: "api/video.php",
			method: "GET",
			data:{"typetable":"principal"}
		},
		columns: [{
				"data": "id"
			},
			{
				data: "url",
				name: 'url',
				render: function (data, type, full, meta) {
					//return " <img src= " + data + " id='imageIdTable' witdth='40px' height='90px'/>";
				return	"<video src=" + data + "  width='200' height='130' preload controls controlsList='nodownload'></video>";
				}
			},
			{
				"data":"titulo"
			},
			{
				data: "id",
				name: "id",
				render: function (data, type, full, meta) {
					return "<i class='fa fa-prescription-bottle'  onclick='deletevideopricipal(" + data + ")' style='cursor: pointer'></i>"
				}
			}
		]
	});
}
function loadinngtablvideosmisas() {
	return table = $("#tableVideosmisas").DataTable({
		language: {
			"decimal": "",
			"emptyTable": "No hay información",
			"info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
			"infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
			"infoFiltered": "(Filtrado de _MAX_ total entradas)",
			"infoPostFix": "",
			"thousands": ",",
			"lengthMenu": "Mostrar _MENU_ Entradas",
			"loadingRecords": "Cargando...",
			"processing": "Procesando...",
			"search": "Buscar:",
			"zeroRecords": "Sin resultados encontrados",
			"paginate": {
				"first": "Primero",
				"last": "Ultimo",
				"next": "Siguiente",
				"previous": "Anterior"
			}
		},
		destroy: true,
		processing: true,
		serverSide: true,
		ajax: {
			url: "api/video.php",
			method: "GET",
			data:{"typetable":"misas"}
		},
		columns: [{
				"data": "id"
			},
			{
				data: "url",
				name: 'url',
				render: function (data, type, full, meta) {
					//return " <img src= " + data + " id='imageIdTable' witdth='40px' height='90px'/>";
				return	"<video width='200' height='130' src=" + data + " preload controls controlsList='nodownload'></iframe>";
				}
			},
			{
				"data":"titulo"
			},
			{
				data: "id",
				name: "id",
				render: function (data, type, full, meta) {
					return "<i class='fa fa-prescription-bottle'  onclick='deletevideopricipal(" + data + ")' style='cursor: pointer'></i>"
				}
			}
		]
	});
}
function loadingtablereproducto(){
	return table = $("#tableReproductor").DataTable({
		language: {
			"decimal": "",
			"emptyTable": "No hay información",
			"info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
			"infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
			"infoFiltered": "(Filtrado de _MAX_ total entradas)",
			"infoPostFix": "",
			"thousands": ",",
			"lengthMenu": "Mostrar _MENU_ Entradas",
			"loadingRecords": "Cargando...",
			"processing": "Procesando...",
			"search": "Buscar:",
			"zeroRecords": "Sin resultados encontrados",
			"paginate": {
				"first": "Primero",
				"last": "Ultimo",
				"next": "Siguiente",
				"previous": "Anterior"
			}
		},
		destroy: true,
		processing: true,
		serverSide: true,
		ajax: {
			url: "api/song.php",
			method: "GET"
		},
		columns: [{
				"data": "id"
			},
			{
				"data":"nombre"
			},
			{
				data: "url",
				name: 'url',
				render: function (data, type, full, meta) {
					return	"<audio src=" + data + "  width='200' height='130' preload='none' controls loop></audio>";
				}
			},

			{
				data: "id",
				name: "id",
				render: function (data, type, full, meta) {
					return "<i class='fa fa-prescription-bottle'  onclick='deletesongpricipal(" + data + ")' style='cursor: pointer'></i>"
				}
			}
		]
	});
}
function loadingtableurl(){

	return table = $("#table-link").DataTable({
		language: {
			"decimal": "",
			"emptyTable": "No hay información",
			"info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
			"infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
			"infoFiltered": "(Filtrado de _MAX_ total entradas)",
			"infoPostFix": "",
			"thousands": ",",
			"lengthMenu": "Mostrar _MENU_ Entradas",
			"loadingRecords": "Cargando...",
			"processing": "Procesando...",
			"search": "Buscar:",
			"zeroRecords": "Sin resultados encontrados",
			"paginate": {
				"first": "Primero",
				"last": "Ultimo",
				"next": "Siguiente",
				"previous": "Anterior"
			}
		},
		destroy: true,
		processing: true,
		serverSide: true,
		responsive: true,
		ajax: {
			url: "api/menu.php?menuss=menuall",
			method: "GET"
		},
		columns: [
			{
				data: "id",
				name: "id",
				render: function (data, type, full, meta) {
					var status = full.activo;
					var rls = (status == 'true' ? 'checked' : '');
					return '<input  id="idtoggle_'+data+'" "togle-status_" name="my-checkbox" type="checkbox" '+rls+' data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="success" data-offstyle="danger" onchange="desactivarMenu('+data+', this)">';

				}
			},
			{
				"data":"nombre"
			},

		],
		"fnDrawCallback": function(e) {
    	$("[name='my-checkbox']").bootstrapToggle();
    }
	});

}
function loadingprocentaje(){
	$.ajax({
		url:"api/descuento.php",
		type:  'GET',
		success:function(porcent){
			var numercantidad = "$";
			var porvcentaje = "%";
			var promoshow = "";
			$('#promo-oferta-regalo').empty();

			if(porcent.status=='success' && porcent.code==200){

				$("#iddescuento").val(porcent.data.id);

				if(porcent.data.typeslider == "regalo" && porcent.data.activo == 'true'){
						promoshow += '<div class="form-group" width="240px">';
						promoshow += '<img src="'+ porcent.data.url +'" alt="No se encontro imagen" width="240px" height="190px">';
						promoshow += '<p>'+porcent.data.descripcion+'</p>';
						promoshow += '</div>';
				} else if(porcent.data.typeslider == "oferta"  && porcent.data.activo == 'true'){
					var descuentoid = parseFloat(porcent.data.porcentaje) + porvcentaje;
					var basemoney = numercantidad + parseFloat(porcent.data.basemoney);

					promoshow += '<div class="form-group">';
					promoshow += '<h3 style="text-align:center;">Actualmente el descuento es de</h3>';
					promoshow += '<label>Procentaje: </label> <input type="text" id = "descuentoId" name="descuentoId" value="'+ descuentoid +'" disabled> <br>';
					promoshow += '<label>Precio base: </label> <input type="text" id="basemoneyShow" name="basemoneyShow" value="'+ basemoney +'" disabled>';
					promoshow += '</div>';
				} else if(porcent.data.activo == 'false'){
					promoshow += '';
				}
				$('#promo-oferta-regalo').append(promoshow);
			}
		},
		error:function(e){
			console.log("Error en ajax");
			console.log(e);
		}
	});
}
function deleteimgslider(id) {

	if (id != 0) {
		Swal.fire({
			title: '¿Quieres eliminar la imagen?',
			showCancelButton: true,
			confirmButtonText: `Eliminar`
		}).then((result) => {
			if (result.isConfirmed) {
				console.log(id);
				$.ajax({
					url: 'api/slider.php?id=' + id,
					type: 'DELETE',
					beforeSend:function(b){
						$("#ModalLogading").modal("show");
					},
					success: function (e) {
						//loadinSlider();
						//loadinngtableslider();
						console.log(e);
						Swal.fire({
							position: 'top-end',
							icon: 'success',
							title: 'Imagen eliminada con exito',
							showConfirmButton: false,
							timer: 1500
						})
					},
					error: function (e) {
						console.log("-------------Respuesta slider error------------------");
						console.log(e);
					},
					complete:function(e){
						cerrarmodal($("#ModalLogading"));
						loadinngtableslider();
						loadinngtableslidermisa();
					}
				});
			}
		})
	}

}
function deletevideopricipal(id){
	Swal.fire({
	  title: '¿Deseas eliminar este video?',
	  showCancelButton: true,
	  confirmButtonText: `Aceptar`,
	}).then((result) => {
	  /* Read more about isConfirmed, isDenied below */
	  if (result.isConfirmed) {
	    $.ajax({
				url:'api/video.php?id=' + id,
				type: 'DELETE',
				beforeSend:function(e){
					$("#ModalLogading").modal("show");
				},
				success:function(video){
					if(video.code == 200 && video.status=="success"){
							Swal.fire({
							  position: 'top-end',
							  icon: video.status,
							  title: video.msm,
							  showConfirmButton: false,
							  timer: 1500
							});
					} else{
						Swal.fire({
							position: 'top-end',
							icon: video.status,
							title: video.msm,
							showConfirmButton: false,
							timer: 1500
						});
					}

					cerrarmodal($("#ModalLogading"));
					loadinngtablvideos();

				},
				error:function(error){
					console.log("Error en el server");
					console.log(error);
				}
			});
	  }
	});
}
function deletesongpricipal(id){
	if(id != ''){
			Swal.fire({
				title: '¿Quieres eliminar esta cancion?',
				showCancelButton: true,
				confirmButtonText: `Eliminar`,
				}).then((result) => {
				if (result.isConfirmed) {
						$.ajax({
							type:"DELETE",
							url:'api/song.php?id='  + id,
							beforeSend:function(data){
								$("#ModalLogading").modal("show");
							},
							success:function(respuesta){
								console.log("La respuesto correcta");
								console.log(respuesta);

									Swal.fire({
									  position: 'top-end',
									  icon: respuesta.status,
									  title: respuesta.msm,
									  showConfirmButton: false,
									  timer: 1500
									})
							},
							error:function(e){
								console.log("La repuesta incorrecta");
								console.log(e);
							},
							complete:function(e){
								cerrarmodal($("#ModalLogading"));
								loadingtablereproducto();
							}
						});
				}
			})
	}
}
function cerrarmodal(modal){
		modal.modal('hide');
		if ($('.modal-backdrop').is(':visible')) {
			  $('body').removeClass('modal-open');
			  $('.modal-backdrop').remove();
		}
		modal.css('display','none');
}
function modificaPorcentaje(e){
	$("#activaDesc").prop( "disabled", true );
}
$('#activaDesc').click(function() {
	 if ($("input:checkbox:checked").length == 1) {
		 $("#porcentajeUpdate").prop("disabled", true);
	 	 $("#from").prop( "disabled", true);
	 	 $("#to").prop( "disabled", true);
	 } else{
		 $("#porcentajeUpdate").prop("disabled", false);
	 	 $("#from").prop( "disabled", false);
	 	 $("#to").prop( "disabled", false);
	 }
});
function desactivarMenu(id, element){
	var status = $("[name='my-checkbox']").prop('checked');
	var sts = $("#idtoggle_" + id).prop('checked');

	$.ajax({
		url:"api/menu.php?menuss=menudisabled&id=" + id + "&statusurl=" + sts,
		type:  'GET',
		cache: false,
		contentType: false,
		processData: false,
		success:function(data){
			Swal.fire({
			  position: 'top-end',
			  icon: data.status,
			  title: data.msm,
			  showConfirmButton: false,
			  timer: 1500
			})
			loadingtableurl();
		},
		error:function(e){
			console.log("Error en la peticion");
			console.log(e);
		}
	});
}
