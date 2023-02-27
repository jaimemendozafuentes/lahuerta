<?php 
	
	//Recuperar fichero
	

		$fichero = $_FILES['archivo'];
			$tmpNombre=$fichero['tmp_name'];
			$nombreFichero=$fichero['name'];
			$longFichero=$fichero['size'];
			$tipoArchivo=$fichero['type'];


			if((!strpos($nombreFichero, "GIF") || !strpos($nombreFichero, "JPG") ||
				!strpos($nombreFichero, "PNG")) && ($longFichero > 300000)) {
				echo"00Tipo de archivo no permitido";
				}else{
					move_uploaded_file($tmpNombre, "../img/$nombreFichero");
					echo "$nombreFichero";
				}
			
			

 ?>