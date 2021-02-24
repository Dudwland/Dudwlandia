<?php
error_reporting(E_ALL); 
ini_set('display_errors','On');

	/*session_start();
	
	if(!isset($_SESSION["usuario"])){
		
		header("location:login.php");	
		
	}
	$usuario = $_SESSION["usuario"];*/


	
			
			//Ruta de la carpeta destino en el servidor.
			//$carpeta_destino = $_SERVER['DOCUMENT_ROOT'] . '/Dudwlandia/Imagenes/';

			//Aquí con la función move_uploaded_file está moviendo la imagen del directorio temporal al directorio escogido.
			//move_uploaded_file($_FILES['imagen']['tmp_name'], $carpeta_destino.$nombre_imagen);

	function mostrarImagenes($usuarioImagen){
		
		require("conexionMiSitioWebPrueba.php");

   		$sqlSelect = "SELECT nombre_imagen, nom_usuario FROM Imagenes WHERE nom_usuario = :nom_usuario ORDER BY agregado_fecha";

   		$resultado = $DbMiSitioWebP->prepare($sqlSelect);

   		$resultado->execute(array(":nom_usuario"=>$usuarioImagen));

   		while($registros = $resultado->fetch(PDO::FETCH_ASSOC)){

   			$ruta_img = $registros["nombre_imagen"];

   			
				echo "<img src='/Dudwlandia/Imagenes/$ruta_img' alt='Imagen no escontrada' width='90px' height='90px'>";
			

   		}

   		

	}
		
?>

