$(inici);

lista='';
movi=0;
mod=0;
ac=0;
borra=0;
function inici(){
	$("#menu-socios").click(ocultar);
	$("#buscador").keyup(buscar);
	$("#socios").click(pantallas);
	$("#busqueda").click(limpiar);
	$("#modificar").click(modificar);
	$("#accept").click(aceptar);
	$("#eliminar").click(eliminarBD);
	$("#menus").click(pantallaMenu);
	$("#introducirPlatos").click(nuevoPlato);
	$("#gestor").click(gestion);

	$("#menu-huerta").css("display","none");
}

function gestion(){
	$("#productos-huerta").css("display","none");
	$("#gestor-content").css("display","block");
	$("input").prop("disabled",false);
	$("#menu-socios").css("display","none");
	$("#veo").css("display","none");
	$("#menu-huerta").css("display","none");



}

function nuevoPlato(){
	if ($("#nombrePlato").val()=='' || $("#precioPlato").val()=='') {
		alert("Nombre y precio del plato obligatorios")
	}else{
		nombrePlato=$("#nombrePlato").val();
		precioPlato=$("#precioPlato").val();

		$.ajax({
			url: "php/pantallaSocio.php",
			type: "post", // o “get”
			data: {'opcion':"N",'nombreplato':nombrePlato,'precioplato':precioPlato},
			success: function(data) {
				procesarRespuestaNuevoPlato(data);
				nombrePlato=$("#nombrePlato").val('');
				precioPlato=$("#precioPlato").val('');
			},
			error: function(data) {
				alert('ERROR FATAL')
		 			console.log(data)
			},
		})
	}
}

function procesarRespuestaNuevoPlato(respuesta){
	//alert(respuesta)
	if (respuesta.substr(0,2)=='00') {
		alert("Plato insertado correctamente");
	}else if(respuesta.substr(0,2)=='20'){
		alert(respuesta.substr(2));
	}
}

function pantallaMenu(){
	$("input").prop("disabled",false);
	$("#productos-huerta").css("display","none");
	$("#menu-socios").css("display","none");
	$("#veo").css("display","none");
	$("#menu-huerta").css("display","block");
	$("#gestor-content").css("display","none");
}

function ocultar(){
	if ($("#buscador").focus()==true) {
	};
	
}

function eliminarBD(){
	if (borra==1) {
		idsocio=$("#ocultos").val();
		//alert(idsocio);
		$.ajax({
			url: "php/pantallaSocio.php",
			type: "post", // o “get”
			data: {'opcion':"E",'idsocio':idsocio},
			success: function(data) {
				procesarRespuestaEliminarBD(data);
				pantallas();

			},
			error: function(data) {
				alert('ERROR FATAL')
		 			console.log(data)
			},
		})
	}
}

function procesarRespuestaEliminarBD(respuesta){
	//alert(respuesta)
	if (respuesta.substr(0,2)=='00') {
		alert("Socio Eliminado/a");
	};
}

function aceptar(){
	if (ac==1) {
			ide=$("#ocultos").val();	
			trat=$("#tratamientos").val();
			ape=$("#apellidoss").val();
			nom=$("#nombres").val();
			fe=$("#fechas").val();
			na=$("#nacionalidads").val();
			ti=$("#tipodocumentos").val();
			nu=$("#numerodocumentos").val();
			em=$("#empresas").val();
			domi=$("#domicilios").val();
			ciu=$("#ciudads").val();
			cp=$("#cps").val();
			pa=$("#paiss").val();
			co=$("#correos").val();
			te1=$("#tel1s").val();
			te2=$("#tel2s").val();
			//us=$("#users").val();
			//pas=$("#passwords").val();
			rec=$("#recs").val();

			$.ajax({
			url: "php/pantallaSocio.php",
			type: "post", // o “get”
			data: {'opcion':"M",'ide':ide,'trat':trat,'ape':ape,'nom':nom,'fe':fe,'na':na,'ti':ti,'nu':nu,'em':em,'domi':domi,'ciu':ciu,'cp':cp,'pa':pa,'co':co,'te1':te1,'te2':te2,'rec':rec},
			success: function(data) {
				procesarRespuestaAceptarModificacion(data);
				ac=0;
				$("input").prop("disabled",true);
				$("#buscador").val(ape+", "+nom);

			},
			error: function(data) {
				alert('ERROR FATAL')
		 			console.log(data)
			},
		})


	}else{
		return false;
	}
}

function procesarRespuestaAceptarModificacion(respuesta){
	alert(respuesta);
}

function modificar(){
	if (mod==1) {
		ac=1;
		$("input").prop("disabled",false);
		$("#buscador").prop("disabled",true);
		$("#users").prop("disabled",true);
		$("#passwords").prop("disabled",true);
		$("#fechasolicituds").prop("disabled",true);
	}else{
		return false;
	}
}
function limpiar(){
	document.getElementById("formu-socio").reset();
	$("input").prop("disabled",false);
	$("#buscador").val("");
	$("#buscador").focus();
	movi=0;
	mod=0;
	ac=0;
	borra=0;
}
function pantallas(){
	$("#productos-huerta").css("display","none");
	$("#menu-socios").css("display","block");
	$("#veo").css("display","none");
	$("#menu-huerta").css("display","none");
	$("#gestor-content").css("display","none");
	limpiar();
}

function buscar(e){
	$(".lista").css("display","block");
	tecla=e.keyCode;
	//alert(tecla)
	if (tecla==40){
		movi++;
		if (movi>=num) {
			--movi;
		};
	}else if(tecla==38){
		movi--;
		
		if (movi<0) {
			movi=0;
		};
	}
	if (tecla==27) {
		$(".lista").css("display","none");
		$("#buscador").val("");
		movi=0;
	};

	palabra=$("#buscador").val();
	$(".lista").unbind();
	$.ajax({
			url: "php/pantallaSocio.php",
			type: "post", // o “get”
			data: {'opcion':"B",'palabra':palabra},
			success: function(data) {
				procesarRespuestaBuscar(data);

			},
			error: function(data) {
				alert('ERROR FATAL')
		 			console.log(data)
			},
		})

	if (tecla==13 && palabra!='') {
		borra=1;
		s=$(this).parent("#menu-socios").find(".lista li").eq(movi).text()//attr("id");
		$("#buscador").blur().val(s);
		$(".lista").css("display","none");

		$.ajax({
			url: "php/pantallaSocio.php",
			type: "post", // o “get”
			data: {'opcion':"V",'nombre': $("#buscador").val()},
			success: function(data) {
				procesarRespuestaVerDatosSocio(data);

			},
			error: function(data) {
				alert('ERROR FATAL')
		 			console.log(data)
			},
		})

	};	
	
}

function procesarRespuestaVerDatosSocio(respuesta){
	arraySocio= JSON.parse(respuesta);

	for(x in arraySocio){
				$("#ocultos").val(arraySocio[x]['idsocio']);
				$("#tratamientos").val(arraySocio[x]['tratamiento']);
				$("#apellidoss").val(arraySocio[x]['apellidos']);
				$("#nombres").val(arraySocio[x]['nombre']);
				$("#fechas").val(arraySocio[x]['fechanacimiento']);
				$("#nacionalidads").val(arraySocio[x]['nacionalidad']);
				$("#tipodocumentos").val(arraySocio[x]['tipodocumento']);
				$("#numerodocumentos").val(arraySocio[x]['numerodocumento']);
				$("#empresas").val(arraySocio[x]['nombreempresa']);
				$("#domicilios").val(arraySocio[x]['domicilio']);
				$("#ciudads").val(arraySocio[x]['ciudad']);
				$("#cps").val(arraySocio[x]['codigopostal']);
				$("#paiss").val(arraySocio[x]['pais']);
				$("#correos").val(arraySocio[x]['email']);
				$("#tel1s").val(arraySocio[x]['telefono1']);
				$("#tel2s").val(arraySocio[x]['telefono2']);
				$("#users").val(arraySocio[x]['usuario']);
				$("#passwords").val(arraySocio[x]['password']);
				$("#recs").val(arraySocio[x]['recomendado']);
				$("#fechasolicituds").val(arraySocio[x]['fechasolicitud']);
			}
			$("input").prop("disabled",true);
			mod=1;
}
/*function seleccionar(){
	sel=$(this).attr("id");
	alert(sel)
}*/

function procesarRespuestaBuscar(respuesta){
	//alert(respuesta)
	lista='';
	$(".lista").html(lista);
	if (respuesta!='') {
		arrayRespuesta= JSON.parse(respuesta);
		for(x in arrayRespuesta){
			lista+="<li id='"+arrayRespuesta[x]['idsocio']+"'>"+arrayRespuesta[x]['apellidos']+", "+arrayRespuesta[x]['nombre']+"</li>";
		}

		$(".lista").html(lista);
		num=($("li").length)-2;
		//Comprobamos si hay algun elemento li
		if (num>0) {
			$(".lista li").eq(movi).css("color","red");

			if ((movi-1)>=num) {
				movi=num-1;
			};
		}

	}else{
		lista='';
		$(".lista").html(lista);
	}
		
		//$(".lista li").click(seleccionar);	
}
