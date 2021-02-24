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
        <title>Información</title>
        <link rel="stylesheet" type="text/css" href="CSS/barraNavegacion.css">
        <link rel="stylesheet" type="text/css" href="CSS/fonts.css">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    </head>
    <body>
        <header>
		    <div class="menu_bar">
			    <a href="#" class="bt-menu"><span class="icon-menu3"></span>Menu</a>
		    </div>

		    <nav>
			    <ul>
                    <li><a href="#"><?php echo $usuario; ?></a></li>
                    <li><a href="index.php">Perfil</a></li>
                    <li><a href="estados.php">Estados</a></li>
                    <li><a href="amistades.php">Amistades</a></li>
				    <li><a href="fotos.php">Imágenes</a></li>
				    <li><a href="videos.php">Vídeos</a></li>
				    <li><a href="Archivos_BBDD/cierre_sesion.php">Cerrar Sesión</a></li>		    
			    </ul>
		    </nav>
        </header>

        <h1 align="center" style="text-shadow: 2px 2px;">Información</h1>
        


        <script src="http://code.jquery.com/jquery-latest.js"></script>
	    <script src="JS/menuBarraNav.js"></script>
        
    </body>
</html>