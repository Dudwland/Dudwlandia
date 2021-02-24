<?php
error_reporting(E_ALL); 
ini_set('display_errors','On');

	session_start();
	
	if(!isset($_SESSION["usuario"])){
		
		header("location:login.php");	
		
	}
	$usuario = $_SESSION["usuario"];
	
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="CSS/barraNavegacion.css"/>
        <link rel="stylesheet" type="text/css" href="CSS/fonts.css"/>
        <link rel="stylesheet" type="text/css" href="CSS/estadosEstiloParticular.css"/>
		<script src="Jquery/jquery-1.6.3.min.js"></script>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<style>
			
			div.fixed {
			  position: fixed;
			  bottom: 0;
			  right: 0;
			  width: 300px;
			  border: 3px solid #73AD21;
			  background-color: pink;
			}

			.containerInsertEst{
				padding: 2px;
				margin-top: 40px;
			}
		
		</style>
    </head>
    <body style="background-color:gold;">
    	<?php
			require("Archivos_BBDD/conexionMiSitioWebPrueba.php");		
		?>     
        <div>            
            <?php
				require("Archivos_BBDD/mostrarEstados.php");
			?>            
        </div>

        <script src="http://code.jquery.com/jquery-latest.js"></script>
	    <script src="JS/menuBarraNav.js"></script>
        
    </body>
</html>