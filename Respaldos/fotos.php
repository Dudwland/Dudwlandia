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
        <title>Fotos</title>
        <link rel="stylesheet" type="text/css" href="CSS/barraNavegacion.css">
        <link rel="stylesheet" type="text/css" href="CSS/fonts.css">
        <link rel="stylesheet" type="text/css" href="CSS/imagenesEstiloParticular.css">
		<link rel="stylesheet" type="text/css" href="CSS/FancyBox/jquery.fancybox-1.3.4.css">
        <!-- <script src="JS/imagenesParticular.js"></script> -->
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<script src="Jquery/jquery-1.6.3.min.js"></script>
		<script src="Jquery/jquery.easing.1.3.js"></script>
		<script src="Jquery/jquery.fancybox-1.3.4.min.js"></script>
		
        <script src="JS/fotosParticular.js"></script>

        <style type="text/css">
        	table{
        		margin: auto;
        		width: 450px;
        		border: 2px dotted #FF0000;
        	}

        	.SubirImagen{
        		margin-top: 30px;
        	}
			
			#desplegable{
				width: 80%;
				background-color: rgb(110,138,195);
				padding: 20px 20px 0 20px;
				position: absolute;
				left: -80%;
				z-index: 100;
				border-top-right-radius: 30px;
				border-bottom-right-radius: 30px;
				border: 5px groove #000000;
			}
			
			#desplegable img{
				margin-top: 5px;
				margin-left: 20px;
				margin-bottom: 18px;
				border: 3px solid rgb(0,0,0);				
			}
			
			
        </style>
    </head>
    <body>
        <header >
		    <div class="menu_bar">
			    <a href="#" class="bt-menu"><span class="icon-menu3"></span>Menu</a>
		    </div>

		    <nav>
			    <ul>
                    <li><a href="#"><?php echo $usuario; ?></a></li>
                    <li><a href="index.php">Perfil</a></li>
                    <li><a href="informacion.php">Información</a></li>
                    <li><a href="estados.php">Estados</a></li>
                    <li><a href="amistades.php">Amistades</a></li>				    
				    <li><a href="videos.php">Vídeos</a></li>
				    <li><a href="Archivos_BBDD/cierre_sesion.php">Cerrar Sesión</a></li>		    
			    </ul>
		    </nav>
        </header>
        
        <h1 align="center" style="text-shadow: 2px 2px;">Imágenes</h1>

        <!-- <div class="SubirImagen">
        	<form action="Archivos_BBDD/subirImagen.php" method="post" enctype="multipart/form-data">
        		<table>
        			<tr>
        				<td><label for="imagen">Subir imagen</label></td>
        				<td><input type="file" name="imagen" id="imagen"></td>
        			</tr>
        			<tr>
        				<td colspan="2" style="text-align: center;"><input type="submit" value="Enviar imagen"></td>
        			</tr>
        		</table>
        	</form>
        </div> -->

        <div align="center">		   	
    		<form action="Archivos_BBDD/subirImagen.php" method="post" enctype="multipart/form-data">
    			<div id="div_file">
					<p id="texto">Agregar Imagen</p>
    				<input type="file" name="imagen" size="20" id="btn_enviar">		
    			</div>
				<div id="div_file2">
					<p id="texto2">¡Súbela!</p>
					<input type="submit" value="Agregar imagen" id="btn_submit">
				</div>
    		</form>
    	</div>

        <div id="desplegable">
        	<?php
        		require("Archivos_BBDD/mostrarImagenes.php");
        		
				
        		echo mostrarImagenes($usuario);
				
        	?>
        </div>
		
			
		
	    <script src="JS/menuBarraNav.js"></script>
        
    </body>
</html>