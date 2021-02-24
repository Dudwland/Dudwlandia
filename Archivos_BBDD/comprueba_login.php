<?php
error_reporting(E_ALL); 
ini_set('display_errors','On');

	require("conexionMiSitioWebPrueba.php");
	
	try{
		
		$sqlSelect = "SELECT * FROM usuarios WHERE nom_usuario= :usuarioLogin";
		
		$resultado=$DbMiSitioWebP->prepare($sqlSelect);
		
		$usuarioLogin = htmlentities(addslashes($_POST["usuarioLogin"]));
		$clave = htmlentities(addslashes($_POST["clave"]));
		
		$resultado->bindValue(":usuarioLogin", $usuarioLogin);
		//$resultado->bindValue(":clave", $clave);
		
		$resultado->execute();
		
		//$cantUsuariosEncontrados = $resultado->rowCount();
		
		while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
		
			if(password_verify($clave, $registro['pass']) and $registro['nom_usuario']==$usuarioLogin){
				
				session_start();
			
				$_SESSION["usuario"] = $usuarioLogin;
			
				header("location:../index.php");			
				
			}else{
			
				header("location:../login.php");
			
			}
		}				
		
	}catch(Exception $e){
		
		die("Error: " . $e->getMessage());	
		
	}finally{
		
		$DbMiSitioWebP=null;
		
	}

?>