$(ini);
activado=0;
function ini(){
	if (activado!=0) {
		seleccionarCategoria(null);
	};
	cargarProductosRecomendados();
	cargarCategoriaProductos();
	rellenarOcho();
}

function cargarProductosRecomendados(){
	$.ajax({
				url: "php/productosParaComprar.php",
				type: "post", // o “get”
				data: {'opcion':"CD"},
				success: function(data) {
					procesarRespuestaProductosParaComprar(data);
				},
				error: function(data) {
					alert('ERROR FATAL')
			 			console.log(data)
				},
			})
}

function procesarRespuestaProductosParaComprar(respuesta){
	//alert(respuesta)
	arrayDestacados=JSON.parse(respuesta);

	destacados="";
	for(x in arrayDestacados){
		destacados+="<div class='desta'>";
		destacados+="<div class='imagen-desta'>";
		destacados+="<img src='img/"+arrayDestacados[x]['rutaimagen']+"'>";
		destacados+="</div>";
		destacados+="<div class='nombreProduct'>";
		destacados+="<p class='parNombre'>"+arrayDestacados[x]['nombreproducto']+"</p>";
		destacados+="<p class='parPrecio'>"+arrayDestacados[x]['precio']+" €</p>";
		destacados+="</div>"
		destacados+="<div class='uni'>";
		destacados+="<img class='substract' src='img/resta.png'>";
		destacados+="<input type='text' class='unidades' value='1'>";
		destacados+="<img class='adicion' src='img/suma.png'>";
		destacados+="</div>"
		destacados+="<input type='button' class='anadeCarrito' value='Añadir al carrito' id='producto_"+arrayDestacados[x]['idproducto']+"'>"
		destacados+="</div>";	
					
	}
	$("#productos-destacados").html(destacados);
	$("img.adicion").click(sumar);
	$("img.substract").click(restar);
	$(".anadeCarrito").click(productoCesta)
}

function sumar(){
	//alert("suma")
	valor=$(this).closest(".uni").find(".unidades").val();
	valor++;
	$(this).closest(".uni").find(".unidades").val(valor);
	
}
function restar(){
	//alert("resta")
	valor=$(this).closest(".uni").find(".unidades").val();
	valor--;
	if (valor<1) {
		valor=1;
	};
	$(this).closest(".uni").find(".unidades").val(valor);
	
}
function productoCesta(){
	idproducto=$(this).attr("id");
	encuentra=idproducto.search("_");
	idproducto=idproducto.substr(encuentra+1)
	//alert(idproducto)
}
function cargarCategoriaProductos(){
	$.ajax({
				url: "php/productosParaComprar.php",
				type: "post", // o “get”
				data: {'opcion':"CC"},
				success: function(data) {
					procesarRespuestaCategoriaProductos(data);
				},
				error: function(data) {
					alert('ERROR FATAL')
			 			console.log(data)
				},
			})
}

function procesarRespuestaCategoriaProductos(respuesta){
	//alert(respuesta)
	arrayCategorias=JSON.parse(respuesta);
	categoriasPro='';
	for(x in arrayCategorias){
		categoriasPro+="<div class='catPro' id='"+arrayCategorias[x]['idcategoria']+"'>"+arrayCategorias[x]['nombrecategoria']+"</div>";
	}
	$("#todos-productos").html(categoriasPro);
	$(".catPro").click(pruebaSelec);
	
}

function rellenarOcho(){
	$.ajax({
				url: "php/productosParaComprar.php",
				type: "post", // o “get”
				data: {'opcion':"PR"},
				success: function(data) {
					procesarRespuestaRellenarOcho(data);
				},
				error: function(data) {
					alert('ERROR FATAL')
			 			console.log(data)
				},
			})
}

function procesarRespuestaRellenarOcho(respuesta2){
	//alert(respuesta)
	arrayDestacados2=JSON.parse(respuesta2);

	destacados2="";
	for(x in arrayDestacados2){
		destacados2+="<div class='desta2'>";
		destacados2+="<div class='imagen-desta2'>";
		destacados2+="<img src='img/"+arrayDestacados2[x]['rutaimagen']+"'>";
		destacados2+="</div>";
		destacados2+="<div class='nombreProduct2'>";
		destacados2+="<p class='parNombre2'>"+arrayDestacados2[x]['nombreproducto']+"</p>";
		destacados2+="<p class='parPrecio2'>"+arrayDestacados2[x]['precio']+" €</p>";
		destacados2+="</div>"
		destacados2+="<div class='uni2'>";
		destacados2+="<img class='substract2' src='img/resta.png'>";
		destacados2+="<input type='text' class='unidades2' value='1'>";
		destacados2+="<img class='adicion2' src='img/suma.png'>";
		destacados2+="</div>"
		destacados2+="<input type='button' class='anadeCarrito2' value='Añadir al carrito' id='producto_"+arrayDestacados2[x]['idproducto']+"'>"
		destacados2+="</div>";

		$("#mostrar-todos").html(destacados2);
		$(".adicion2").click(sumar2);
		$(".substract2").click(restar2);
		$(".anadeCarrito2").click(productoCesta2)
	}
}

function sumar2(){
	//alert("suma")
	//$(".adicion2").click(sumar).unbind();
	valor=$(this).closest(".uni2").find(".unidades2").val();
	valor++;
	$(this).closest(".uni2").find(".unidades2").val(valor);
	//$(".adicion2").click(sumar).bind();
	
}
function restar2(){
	//alert("resta")
	valor=$(this).closest(".uni2").find(".unidades2").val();
	valor--;
	if (valor<1) {
		valor=1;
	};
	$(this).closest(".uni2").find(".unidades2").val(valor);
	
}
function productoCesta2(){
	idproducto=$(this).attr("id");
	encuentra=idproducto.search("_");
	idproducto=idproducto.substr(encuentra+1)
	//alert(idproducto)
}


function pruebaSelec(){
	esta=$(this).attr("id");
	if (esta==undefined) {esta=1}else{esta};
	seleccionarCategoria(1,esta);
}
function seleccionarCategoria(pagina,categoria){
	$.ajax({
			url: "php/productosParaComprar.php",
			type: "post", // o “get”
			data: {'opcion':'TP','pagina':pagina,'idcategoria':categoria},
			success: function(data) {
				//alert(data)
				procesarRespuestaSeleccionarCategoria(data);

			},
			error: function(data) {
				alert('ERROR FATAL')
		 			console.log(data)
			},
		})
}
function procesarRespuestaSeleccionarCategoria(respuesta3){
	//alert(respuesta3);
	arrayRespuesta=JSON.parse(respuesta3);
	arrayDestacados3=arrayRespuesta[0];

			//el segundo array es el número de páginas
			paginas=arrayRespuesta[1];
	destacados3="";
	for(x in arrayDestacados3){
		destacados3+="<div class='desta3'>";
		destacados3+="<div class='imagen-desta3'>";
		destacados3+="<img src='img/"+arrayDestacados3[x]['rutaimagen']+"'>";
		destacados3+="</div>";
		destacados3+="<div class='nombreProduct3'>";
		destacados3+="<p class='parNombre3'>"+arrayDestacados3[x]['nombreproducto']+"</p>";
		destacados3+="<p class='parPrecio3'>"+arrayDestacados3[x]['precio']+" €</p>";
		destacados3+="</div>"
		destacados3+="<div class='uni3'>";
		destacados3+="<img class='substract3' src='img/resta.png'>";
		destacados3+="<input type='text' class='unidades3' value='1'>";
		destacados3+="<img class='adicion3' src='img/suma.png'>";
		destacados3+="</div>"
		destacados3+="<input type='button' class='anadeCarrito3' value='Añadir al carrito' id='producto_"+arrayDestacados3[x]['idproducto']+"'>"
		destacados3+="</div>";
	}

		enlaces='';
			for(p=1;p<=paginas;p++){//montamos tantos enlaces como numero de paginas que nos entrega el servidor
				enlaces+="<a href='#'>"+p+"</a>&nbsp&nbsp";
			}
			$("#paginas").html(enlaces);

			//desactivamos y activamos los listener de los enlaces
			$("#paginas a").on('click',function(){
				pagina=$(this).text();//Recuperamos el elemnto del enlace y nos devuelve el interior de la etiqueta
				//cuando pulsamos sobre el enlace de paginacion se vuelve a lanzar
				//La consulta para la pagina especificada
				seleccionarCategoria(pagina,esta);//Le pasamos como parámetro el número de pagina pulsada por el usuario
			})

		$("#mostrar-todos").html(destacados3);
		$(".adicion3").click(sumar3);
		$(".substract3").click(restar3);
		$(".anadeCarrito3").click(productoCesta3)
}

function sumar3(){
	//alert("suma")
	//$(".adicion2").click(sumar).unbind();
	valor=$(this).closest(".uni3").find(".unidades3").val();
	valor++;
	$(this).closest(".uni3").find(".unidades3").val(valor);
	//$(".adicion2").click(sumar).bind();
	
}
function restar3(){
	//alert("resta")
	valor=$(this).closest(".uni3").find(".unidades3").val();
	valor--;
	if (valor<1) {
		valor=1;
	};
	$(this).closest(".uni3").find(".unidades3").val(valor);
	
}
function productoCesta3(){
	idproducto=$(this).attr("id");
	encuentra=idproducto.search("_");
	idproducto=idproducto.substr(encuentra+1)
	//alert(idproducto)
}
