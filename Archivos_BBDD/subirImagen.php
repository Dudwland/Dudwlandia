<?php
error_reporting(E_ALL); 
ini_set('display_errors','On');

	session_start();
	
	if(!isset($_SESSION["usuario"])){
		
		header("location:login.php");	
		
	}
	$usuario = $_SESSION["usuario"];


	$nombre_imagen = $_FILES['imagen']['name'];

	$tipo_imagen = $_FILES['imagen']['type'];

	$tamagno_imagen = $_FILES['imagen']['size'];

	


	if($tamagno_imagen <= 4000000){

		if($tipo_imagen == "image/jpeg" || $tipo_imagen == "image/jpg" || $tipo_imagen == "image/png" || $tipo_imagen == "image/gif"){	


			//Ruta de la carpeta destino en el servidor.
			$carpeta_destino = $_SERVER['DOCUMENT_ROOT'] . '/Dudwlandia/Imagenes/';

			//Aquí con la función move_uploaded_file está moviendo la imagen del directorio temporal al directorio escogido.
			move_uploaded_file($_FILES['imagen']['tmp_name'], $carpeta_destino.$nombre_imagen);

			require("conexionMiSitioWebPrueba.php");

        		$sqlInsert = "INSERT INTO Imagenes (nombre_imagen, tipo_imagen, tamagno_imagen, nom_usuario) VALUES (:nom_imagen, :tipo_imagen, :tamagno_imagen, :nom_usuario)";

        		$resultado = $DbMiSitioWebP->prepare($sqlInsert);

        		$resultado->execute(array(":nom_imagen"=>$nombre_imagen, ":tipo_imagen"=>$tipo_imagen, ":tamagno_imagen"=>$tamagno_imagen, ":nom_usuario"=>$usuario));

        		header("location:../fotos.php");

		}else{

			echo "Solo es posible subir imágenes del tipo jpg/jpeg/png/gif.";

		}

	}else{

		echo "El tamaño de la imagen no puede ser mayor a 4mb para subirla.";

	}

?>