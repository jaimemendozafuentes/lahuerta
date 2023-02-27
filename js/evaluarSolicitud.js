$(inicio);

 		function inicio(){
 			$("#solicitudes").click(gestionarSolicitud);
 			$("#acepta").click(aceptarSolicitud);
 			$("#deniega").click(eliminar);
 			$("#socios").click(pantallas);
 		}
 		function eliminar(){
 			id=$("#oculto").val();
 			$.ajax({
				url: "php/rechazarSocio.php",
				type: "post", // o “get”
				data: {'id':id},
				success: function(data) {
					//alert(data)
					procesarRespuestaEliminar(data);
					gestionarSolicitud();
				},
				error: function(data) {
					alert('ERROR FATAL')
			 			console.log(data)
				},
			})
 		}

 		function procesarRespuestaEliminar(respuesta){
 			alert(respuesta)
 		}

 		function pantallas(){
 			$("#menu-socios").css("display","block");
 		}

 		function aceptarSolicitud(){
 			id=$("#oculto").val();
 			tratamiento=$("#tratamiento").val();
 			apellidos=$("#apellidos").val();
 			nombre=$("#nombre").val();
 			fecha=$("#fecha").val();
 			nacionalidad=$("#nacionalidad").val();
 			tipodocumento=$("#tipodocumento").val();
 			numerodocumento=$("#numerodocumento").val();
 			empresa=$("#empresa").val();
 			domicilio=$("#domicilio").val();
 			ciudad=$("#ciudad").val();
 			cp=$("#cp").val();
 			pais=$("#pais").val();
 			email=$("#correo").val();
 			tel1=$("#tel1").val();
 			tel2=$("#tel2").val();
 			user=$("#user").val();
 			password=$("#password").val();
 			rec=$("#rec").val();

 			$.ajax({
				url: "php/aceptacionSocio.php",
				type: "post", // o “get”
				data: {'id':id,'tratamiento':tratamiento,'apellidos':apellidos,'nombre':nombre,'fecha':fecha,'nacionalidad':nacionalidad,'tipodocumento':tipodocumento,'numerodocumento':numerodocumento,'empresa':empresa,'domicilio':domicilio,'ciudad':ciudad,'cp':cp,'pais':pais,'email':email,'tel1':tel1,'tel2':tel2,'user':user,'password':password,'rec':rec},//enviamos la pagina y lo recogemos en el otro fichero
				success: function(data) {
					//alert(data)
					procesarRespuestaAceptar(data);
					gestionarSolicitud(1);
				},
				error: function(data) {
					alert('ERROR FATAL')
			 			console.log(data)
				},
			})
 		}

 		function procesarRespuestaAceptar(respuesta){
 			if (respuesta.substr(0,2)=='00') {
 				alert("Alta efectuada correctamente");
 			}else{
 				alert(respuesta)
 			}
 		}

 		function gestionarSolicitud(){
 			$("#veo").css("display","block");
 			$("#productos-huerta").css("display","none");
 			$("#gestor-content").css("display","none");
 			$("#menu-socios").css("display","none");
 			$("#menu-huerta").css("display","none");
 			rellenarCampos(1);
 		}
 		function rellenarCampos(pagina){
 			if (pagina<1) {
 				$("#peticiones").css("display","none");
 			}else{
 				$("#peticiones").css("display","block");
 			}
 			$.ajax({
				url: "php/evaluacionSolicitud.php",
				type: "post", // o “get”
				data: {'pagina':pagina},//enviamos la pagina y lo recogemos en el otro fichero
				success: function(data) {
					//alert(data)
					procesarRespuestaConsulta(data);

				},
				error: function(data) {
					alert('ERROR FATAL')
			 			console.log(data)
				},
			})
 		}

 		function procesarRespuestaConsulta(data){
 			//alert(data);
			arrayRespuesta= JSON.parse(data);

			//el primer array es la consulta de libros
			arrayDatos=arrayRespuesta[0];
			if (arrayDatos.length<1) {
				$("#veo").css("display","none");
				alert("No hay peticiones");
			}else{
				$("#veo").css("display","block");
			}
			
			//el segundo array es el número de páginas
			paginas=arrayRespuesta[1];//Aquí está el número de páginas
			for(x in arrayDatos){
				$("#oculto").val(arrayDatos[x]['idsolicitud']);
				$("#tratamiento").prop("disabled",true).val(arrayDatos[x]['tratamiento']);
				$("#apellidos").prop("disabled",true).val(arrayDatos[x]['apellidos']);
				$("#nombre").prop("disabled",true).val(arrayDatos[x]['nombre']);
				$("#fecha").prop("disabled",true).val(arrayDatos[x]['fechanacimiento']);
				$("#nacionalidad").prop("disabled",true).val(arrayDatos[x]['nacionalidad']);
				$("#tipodocumento").prop("disabled",true).val(arrayDatos[x]['documento']);
				$("#numerodocumento").prop("disabled",true).val(arrayDatos[x]['numero']);
				$("#empresa").prop("disabled",true).val(arrayDatos[x]['nombreempresa']);
				$("#domicilio").prop("disabled",true).val(arrayDatos[x]['domicilio']);
				$("#ciudad").prop("disabled",true).val(arrayDatos[x]['ciudad']);
				$("#cp").prop("disabled",true).val(arrayDatos[x]['codigopostal']);
				$("#pais").prop("disabled",true).val(arrayDatos[x]['pais']);
				$("#correo").prop("disabled",true).val(arrayDatos[x]['email']);
				$("#tel1").prop("disabled",true).val(arrayDatos[x]['telefono1']);
				$("#tel2").prop("disabled",true).val(arrayDatos[x]['telefono2']);
				$("#user").prop("disabled",true).val(arrayDatos[x]['usuario']);
				$("#password").prop("disabled",true).val(arrayDatos[x]['password']);
				$("#rec").prop("disabled",true).val(arrayDatos[x]['recomendado']);
				$("#fechasolicitud").prop("disabled",true).val(arrayDatos[x]['fechasolicitud']);
			}

			//montamos los enlaces de paginacion
			enlaces='';
			for(p=1;p<=paginas;p++){//montamos tantos enlaces como numero de paginas que nos entrega el servidor
				enlaces+="<a href='#'>"+p+"</a>&nbsp&nbsp";
			}
			$("#numeroPeticiones").text(paginas);
			$(".paginas").html(enlaces);

			//desactivamos y activamos los listener de los enlaces
			$(".paginas a").on('click',function(){
				pagina=$(this).text();//Recuperamos el elemnto del enlace y nos devuelve el interior de la etiqueta
				//cuando pulsamos sobre el enlace de paginacion se vuelve a lanzar
				//La consulta para la pagina especificada
				rellenarCampos(pagina);//Le pasamos como parámetro el número de pagina pulsada por el usuario
			})
		}