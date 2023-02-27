
$(inicializar);
idcat=1;
noselec='';

function inicializar(){
	consultarCategorias();
	$("#productos").click(abrirProductos);
	$("#boton-insert").click(insertarCategoria);
	$("#foto").click(function(){
		$("#fotograf").click();
		$("#fotograf").change(subirFotografia);
	});
	$("#insertar-producto").click(insertarProducto);
	$("#catePro").change(saberCategoria);

}

function insertarProducto(){
	nombreProducto=$("#nombreProducto").val();
	descripcion=$("#descripcion").val();
	precioProducto=$("#precio-producto").val();
	rutaImagen=$("#nombre-archivo").text();

	if (nombreProducto=='' || nombreProducto==noselec || descripcion=='' || precioProducto=='' || rutaImagen=='') {
		alert("Todos los campos son obligatorios")
	}else{
		$.ajax({
			url: "php/pantallaProductos.php",
			type: "post", // o “get”
			data: {'opcion':"IP",'nombreProducto':nombreProducto,'descripcion':descripcion,'precioProducto':precioProducto,'rutaImagen':rutaImagen,'idcategoria':idcat},
			success: function(data) {
				procesarRespuestaInsertarProducto(data);
				$("#nombreProducto").val("");
				$("#descripcion").val("");
				$("#precio-producto").val("");
				$("#nombre-archivo").text("");
			},
			error: function(data) {
				alert('ERROR FATAL')
		 			console.log(data)
			},
		})
	}
}

function procesarRespuestaInsertarProducto(respuesta){
	alert(respuesta.substr(2));
}

function saberCategoria(){
	idcat=$("#catePro").val();
}

function subirFotografia(){
	//recuperar imagen del input type='file'
			var archivoImagen = document.getElementById('fotograf');

			//recuperar los datos del fichero 
			
			if (!(file =archivoImagen.files[0])) {
				noselec="No ha seleccionado ningún archivo";
				$("#nombre-archivo").text(noselec);
				return false;
			}
			//isntanciar un objeto formData
			var formData = new FormData();

			//añadir los datos a enviar al servidor en el objeto formData
			formData.append('archivo',file);

	        //var formData = new FormData(document.getElementById("formuploadajax"));

        	//llamada ajax al servidor

				$.ajax({
				url: "php/subirFotografia.php",
				type: "post", // o “get”
				data: formData,
				cache: false,
				contentType: false,
				processData: false,

				success: function(data) {
					procesarRespuestaModificarFoto(data);
					$("#fotograf").unbind();
					$("#nombre-archivo").text(data);
					
				},
				error: function(data) {
					alert('ERROR FATAL')
			 			console.log(data)
				},
			})
		}

		function procesarRespuestaModificarFoto(respuesta){
			//alert(respuesta);

		}

function abrirProductos(){
	$("#productos-huerta").css("display","block");
	$("#gestor-content").css("display","none");
	$("input").prop("disabled",false);
	$("#menu-socios").css("display","none");
	$("#veo").css("display","none");
	$("#menu-huerta").css("display","none");
	consultarCategorias();

}
function insertarCategoria(){
	nueva=$("#nombreCategoria").val();
	if (nueva=='') {
		alert("El nombre no puede estar vacío")
	}else{
		$.ajax({
			url: "php/pantallaProductos.php",
			type: "post", // o “get”
			data: {'opcion':"IC",'nombre':nueva},
			success: function(data) {
				procesarRespuestaInsertarCate(data);
				consultarCategorias();
				$("#nombreCategoria").val("");
			},
			error: function(data) {
				alert('ERROR FATAL')
		 			console.log(data)
			},
		})
	}
}

function procesarRespuestaInsertarCate(respuesta){
	res=respuesta.substr(2);
	alert(res);
}
function consultarCategorias(){
	$.ajax({
			url: "php/pantallaProductos.php",
			type: "post", // o “get”
			data: {'opcion':"C"},
			success: function(data) {
				procesarRespuestaConsultaCategorias(data);
			},
			error: function(data) {
				alert('ERROR FATAL')
		 			console.log(data)
			},
		})
}
function procesarRespuestaConsultaCategorias(respuesta){
	//alert(respuesta)
	arrayCategorias=JSON.parse(respuesta);
	options='';
	for(x in arrayCategorias){
		options+="<option value='"+arrayCategorias[x]['idcategoria']+"'>"+arrayCategorias[x]['nombrecategoria']+"</option>"
	}
	$("#categorias").html(options);
	$("#catePro").html(options);

}
