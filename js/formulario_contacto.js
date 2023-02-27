$(inicio);

function inicio(){
	$("#enviarComentario").click(enviar);
}
function enviar(){
	nombreCompleto=$("#nombreCompleto").val();
	email=$("#email").val();
	asunto=$("#asunto").val();
	mensaje=$("#cuerpoMensaje").val();
	if (nombreCompleto=='' || email=='' || asunto=='' || mensaje=='') {
		alert("Todos los campos son obligatorios");
	}else{
		$.ajax({
				url: "php/enviarFormulario.php",
				type: "post", // o “get”
				data: {'nombreCompleto':nombreCompleto,'email':email,'asunto':asunto,'mensaje':mensaje},
				success: function(data) {
					procesarRespuesta(data);
				},
				error: function(data) {
					alert('ERROR FATAL')
			 			console.log(data)
				},
			})
	}
}

function procesarRespuesta(respuesta){
	alert(respuesta.substr(2));
	if (respuesta.substr(0,2)=='00') {
		document.getElementById("contacto").reset();
	};
}