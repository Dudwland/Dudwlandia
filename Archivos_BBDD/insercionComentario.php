<?php
	error_reporting(E_ALL); 
	ini_set('display_errors','Off');
	
	session_start();
	
	if(!isset($_SESSION["usuario"])){
		
		header("location:login.php");	
		
	}
	$usuario = $_SESSION["usuario"];


	
	$comentario = $_POST['comentario'];
	$idEstadoEst = $_POST['id_estado'];
	
	require("conexionMiSitioWebPrueba.php");
	
	$sqlInsert = "INSERT INTO comentarios (comentario, nom_usuario, id_estado) VALUES (?, '$usuario', $idEstadoEst)";
	
	$resultado = $DbMiSitioWebP->prepare($sqlInsert);
	
	$resultado->execute(array($comentario));
	
	$resultado->closeCursor();
	
	header("location:../estados.php");
	
	
?>

