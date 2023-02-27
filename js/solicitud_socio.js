$(inicio);
		tratamiento='Sr';
		function inicio(){
			//$("#boton").mouseover(mensaje)
			$("#legal1").click(aceptar);
			$("#enviar").click(enviarFormulario);
			$("input[name=diri]").change(function(){tratamiento=($(this).val());})
		}
		function enviarFormulario(){

			//DATOS PERSONALES
			apellidos=$("#apellidos").val();
			nombre=$("#nombre").val();
			fecha=$("#fecha").val();
			nacionalidad=$("#nacionalidad").val();
			tipoDocumento=$("#documento").val();
			numeroDoc=$("#doc").val();

			empresa=$("#empresa").val();

			//DIRECCION
			domicilio=$("#domicilio").val();
			ciudad=$("#ciudad").val();
			cp=$("#cp").val();
			pais=$("#pais").val();

			//DATOS DE CONTACTO
			email=$("#email").val();
			emailConfirm=$("#emailconfirm").val();
			telefono=$("#telefono").val();

			telOpcional=$("#telopcional").val();

			//DATOS DE ACCESO
			usuario=$("#introUser").val();
			password=$("#introPass").val();

			//RECOMENDADO
			recomendado=$("#recomendado").val();

			datosNuevoSocio=[apellidos,nombre,fecha,nacionalidad,tipoDocumento,numeroDoc,domicilio,ciudad,cp,pais,email,emailConfirm,telefono,usuario,password,recomendado];
			camposVacios=0;

			for (var i = 0; i < datosNuevoSocio.length; i++) {
				if (datosNuevoSocio[i]=='') {
					camposVacios++;
				};
			}
			if (email!=emailConfirm) {
				alert("el email debe ser el mismo")
				return false;
			};
			if (camposVacios<1) {
				$.ajax({
					url: "php/enviarSolicitudSocio.php",
					type: "post", // o “get”
					data: {'tratamiento':tratamiento,'apellidos':apellidos,'nombre':nombre,'fecha':fecha,'nacionalidad':nacionalidad,'tipoDocumento':tipoDocumento,'numeroDoc':numeroDoc,'empresa':empresa,'domicilio':domicilio,'ciudad':ciudad,'cp':cp,'pais':pais,'email':email,'telefono':telefono,'telOpcional':telOpcional,'usuario':usuario,'password':password,'recomendado':recomendado},
					success: function(data) {
						procesarRespuesta(data);
						document.getElementById("formulario").reset();
					},
					error: function(data) {
						alert('ERROR FATAL')
				 			console.log(data)
					},
				})
			}else{
				alert("Complete todos los campos")
			}	
		}

		function procesarRespuesta(respuesta){
			if (respuesta.substr(0,2)=='00') {
				alert("Su solicitud de socio se ha tramitado correctamente.");
				$("#enviar").prop("disabled",true);
			}else{
				//alert("Lo sentimos ha ocurrido un error");
				alert(respuesta)
				aceptar();
			}
			//alert(respuesta);
		}

		function aceptar(){
			if ($("#legal1").prop('checked')) {
				$("#enviar").prop("disabled",false);
				$("#formulario input[type='button']").css("cursor","pointer");
			}else{
				$("#enviar").prop("disabled",true);
				$("#formulario input[type='button']").css("cursor","default");
			}
		}
		function mensaje(){
			alert("hola")
		}
		