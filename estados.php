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
        <title>Estados</title>
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
        <header>
		    <div class="menu_bar">
			    <a href="#" class="bt-menu"><span class="icon-menu3"></span>Menu</a>
		    </div>

		    <nav>
			    <ul>
                    <li><a href="#"><?php echo $usuario; ?></a></li>
                    <li><a href="index.php">Perfil</a></li>
                    <li><a href="informacion.php">Información</a></li>
                    <li><a href="amistades.php">Amistades</a></li>
				    <li><a href="fotos.php">Imágenes</a></li>
				    <li><a href="videos.php">Vídeos</a></li>
				    <li><a href="Archivos_BBDD/cierre_sesion.php">Cerrar Sesión</a></li>		    
			    </ul>
		    </nav>
        </header>

        <h1 align="center" style="text-shadow: 2px 2px;">Estados</h1>

        <div class="containerInsertEst" style="text-align: center">
            <form action="Archivos_BBDD/insercionEstado.php" method="post">
                <textarea name="estado" rows="4" cols="35" placeholder="¿Qué estás pensando?"></textarea>
                <br />
                <input type='image' src='Iconos/enviar-button.png' alt='Enviar' value='enviar' width='70' height='28' style='margin-top:3px'>
            </form>
        </div>

        <div>            
            <?php
				require("Archivos_BBDD/mostrarEstados.php");
			?>            
        </div>
		
		<div class="fixed">
			Recordar poner algo para este elemento fijo. <br />
			También debo organizar los estados dentro de una tabla HTML. <br />
			This div element has position: fixed;
		</div>
        


        <script src="http://code.jquery.com/jquery-latest.js"></script>
	    <script src="JS/menuBarraNav.js"></script>
        
    </body>
</html>