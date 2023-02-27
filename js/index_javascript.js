$(comienzo);
acumF=0;
    var espera=5000;
    var velocidad=1000;

function comienzo(){
	altura=$(window).height();
	$("#slider").height(altura-50);
	$("#imagen1").on('load',actualizar1);
	$("#imagen2").on('load',actualizar2);
		cargar_img1();
		alturaFotos();
		$(window).resize(alturaFotos);
	}

function cargar_img1(){
		$("#imagen1").attr("src","img/terraza"+acumF+".jpg");
}

function actualizar1(){
		cargar_img2();
	}
function cargar_img2(){
		saber_siguiente();
		$("#imagen2").attr("src","img/terraza"+acumF+".jpg");
		crono=setTimeout(sacar_imagenes,espera);
	}

function saber_siguiente(){
		acumF++;
		if (acumF>3) {
			acumF=0;
		}
	}


function actualizar2(){
		$("#imagen2").css("left","0px");
	}


function sacar_imagenes(){
		$("#imagen1").animate({"opacity":"0"},velocidad);
		$("#imagen2").animate({"opacity":"1"},velocidad,cambio_imagen);
	}


function cambio_imagen(){
		$("#imagen1").css("opacity","1").attr("src","img/terraza"+acumF+".jpg");
		//saber_siguiente();
		$("#imagen2").css("opacity","0").attr("src","img/terraza"+acumF+".jpg");
	}

	//Altura para el slider
function alturaFotos(){
		h=$(window).height()-50;
		$("#slider").css("height",h+"px");
	}
