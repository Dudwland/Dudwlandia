<?php
error_reporting(E_ALL); 
ini_set('display_errors','On');

	session_start();
	
	if(!isset($_SESSION["usuario"])){
		
		header("location:login.php");	
		
	}
	$usuario = $_SESSION["usuario"];
	

	
	require("conexionMiSitioWebPrueba.php");

	$nombre_imagen = $_FILES['imagenPerfil']['name'];
	$tipo_imagen = $_FILES['imagenPerfil']['type'];
	$tamagno_imagen = $_FILES['imagenPerfil']['size'];
	
	if($tamagno_imagen <= 5000000){

		if($tipo_imagen == "image/jpeg" || $tipo_imagen == "image/jpg" || $tipo_imagen == "image/png" || $tipo_imagen == "image/gif"){

			$carpetaDestino = $_SERVER['DOCUMENT_ROOT'].'/ImagenesPerfil/';
			
			move_uploaded_file($_FILES['imagenPerfil']['tmp_name'], $carpetaDestino.$nombre_imagen);

			$insertarSQL = "INSERT INTO imagenes_perfil (nombre_imagen, tipo_imagen, tamagno_imagen, contenido_bin_img, nom_usuario) VALUES (:nombre_imagen, :tipo_imagen, :tamagno_imagen, Null, :usuario)";

			$resultadoInsert = $DbMiSitioWebP->prepare($insertarSQL);
			
			$resultadoInsert->execute(array(":nombre_imagen"=>$nombre_imagen, ":tipo_imagen"=>$tipo_imagen, ":tamagno_imagen"=>$tamagno_imagen, ":usuario"=>$usuario));

			/*$resultadoInsert->execute(array(":nombre_imagen"=>$nombre_imagen));
			$resultadoInsert->execute(array(":tipo_imagen"=>$tipo_imagen));
			$resultadoInsert->execute(array(":tamagno_imagen"=>$tamagno_imagen));
			$resultadoInsert->execute(array(":usuario"=>$usuario));*/

			$resultadoInsert->CloseCursor();

			header("location:../index.php");

		}else{

			echo "Solo puede subir imágenes con el formato jpeg, jpg, png o gif.";

		}
	}else{

	?>
		 <script>
		 	alert("La imagen debe ser menor de 5mbs para ser enviada.");
		 </script>
	<?php
		header("location:../index.php");
	}
?>