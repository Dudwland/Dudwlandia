<?php
error_reporting(E_ALL); 
ini_set('display_errors','On');

	session_start();
	
	if(!isset($_SESSION["usuario"])){
		
		header("location:login.php");	
		
	}
	$usuario = $_SESSION["usuario"];
	
	require("../Archivos_BBDD/conexionMiSitioWebPrueba.php");
	    
	$estado = $_POST['estado'];
	
	$sqlInsert = "INSERT INTO estados (nom_estado, nom_usuario) VALUES (?, '$usuario')";
	
	$resultado = $DbMiSitioWebP->prepare($sqlInsert);
	
	$resultado->execute(array($estado));
	
	$resultado->closeCursor();
	
	header("location:../estados.php");

?>