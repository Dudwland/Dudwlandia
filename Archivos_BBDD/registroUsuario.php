<?php
	error_reporting(E_ALL); 
	ini_set('display_errors','On');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>¡Bienvenido a Dudwlandia</title>
<link href="../CSS/registroBienvenida.css" rel="stylesheet" type="text/css">
	
</head>

<body>
	<?php
		require("conexionMiSitioWebPrueba.php");
		
		$primerNombre = $_POST['primerNombre'];
		$primerApellido = $_POST['primerApellido'];
		$nomUsuario = $_POST['usuario'];
		$clave = $_POST['clave'];
		$genero = $_POST['genero'];
		
		//El tercer argumento es opcional y el para aumentar el coste, es al relacionado con el tiempo para la seguridad de la contraseña.
		$claveCifrada = password_hash($clave, PASSWORD_DEFAULT, array('cost'=>12));
		
		try{
			
			//La función ucwords convierte el primer caracter alfanumerico de cada palabra en mayúscula si éste está en minúscula.
			$primerNombre = ucwords($primerNombre);
			$primerApellido = ucwords($primerApellido);
			
			//Esta función strtolower convierte los caracteres del alfabeto a minusculas.
			$nomUsuario = strtolower($nomUsuario);
			
			$sqlSelect = "SELECT nom_usuario FROM usuarios WHERE nom_usuario = :nom_usuario";
			
			$selectResult = $DbMiSitioWebP->prepare($sqlSelect);
			
			$selectResult->execute(array(":nom_usuario"=>$nomUsuario));
			
			if($entrada = $selectResult->fetch(PDO::FETCH_ASSOC)){
				
				echo "<div><h1>El nombre de usuario <i>" . $nomUsuario . "</i> ya ha sido escogido. Debe elegir otro nombre de usuario.</h1></div>";
				
				echo "<h3 align='center'><a href='../login.php'>Pulse aquí para regresar al área de login.</a></h3>";
				
				die();
				
				$selectResult->closeCursor();
				
			}else{
			
			$sqlInsert = "INSERT INTO usuarios (Nombres, Apellidos, nom_usuario, pass, Genero) VALUES (:primerNombre, :primerApellido, :nomUsuario, :claveCifrada, :genero)";
			
			$resultado = $DbMiSitioWebP->prepare($sqlInsert);
			
			$resultado->execute(array(":primerNombre"=>$primerNombre, "primerApellido"=>$primerApellido, "nomUsuario"=>$nomUsuario, "claveCifrada"=>$claveCifrada, "genero"=>$genero));
			
			$resultado->closeCursor();
			
			require("../registroBienvenida.php");
			
			//header("location:../login.php");
			
			}
			
		}catch(Exception $e){
		
			die("Error: " . $e->getMessage());	
			
		}finally{
		
			$DbMiSitioWebP = null;	
			
		}
	
		function BienvenidaF($primerNombre, $primerApellido, $nomUsuario){
			
			echo "<h1 align='center'>¡Bienvenida " . $primerNombre . " a Dudwlandia!</h1>";
			
			echo "<div>Tu nombre de usuario es <b>" . $nomUsuario . "</b>. Recuerda escribirlo con minúsculas para loguearte aunque lo hayas escrito con alguna letra mayúscula para registrarte.</div>";
		}
		
		function BienvenidaM($primerNombre, $primerApellido, $nomUsuario){
			
			echo "<h1 align='center'>¡Bienvenido " . $primerNombre . " a Dudwlandia!</h1>";
			
			echo "<div>Tu nombre de usuario es <b>" . $nomUsuario . "</b>. Recuerda escribirlo con minúsculas para loguearte aunque lo hayas escrito con alguna letra mayúscula para registrarte.</div>";		
		}
	?>
</body>
</html>