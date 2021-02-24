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
        <title>Perfil</title>
        <link rel="stylesheet" type="text/css" href="CSS/barraNavegacion.css">
        <link rel="stylesheet" type="text/css" href="CSS/fonts.css">
        <link rel="stylesheet" href="CSS/perfilestiloparticular.css">
		<link rel="stylesheet" type="text/css" href="CSS/estadosEstiloParticular.css"/>
		<link rel="stylesheet" type="text/css" href="Bootstrap-3.4.1/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="Iconos/Fontello/css/fontello.css">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<script src="Jquery/jquery-3.5.1.min.js"></script>
		<script src="JS/perfilParticular.js"></script>
		
    </head>
    <body>
    	
        <header>
		    <div class="menu_bar">
			    <a href="#" class="bt-menu"><span class="icon-menu"></span>Menu</a>
		    </div>
		    <nav>
           	  <ul>
                    <li><a href="#"><?php echo $usuario; ?></a></li>
                    <li><a href="informacion.php">Información</a></li>
                    <li><a href="estados.php">Estados</a></li>
                    <li><a href="amistades.php">Amistades</a></li>                    
				    <li><a href="fotos.php">Imágenes</a></li>
				    <li><a href="videos.php">Vídeos</a></li>
				    <li><a href="Archivos_BBDD/cierre_sesion.php">Cerrar Sesión</a></li>   
			    </ul>
		    </nav>
        </header>
		
		<h1 align="center" style="text-shadow: 2px 2px; color: floralwhite;">Perfil</h1>
		
		<?php
				require("Archivos_BBDD/conexionMiSitioWebPrueba.php");
				
				$SqlSelect = "SELECT nombre_imagen, nom_usuario FROM imagenes_perfil WHERE nom_usuario=? ORDER BY agregado_fecha DESC LIMIT 1";
			
				$resultado = $DbMiSitioWebP->prepare($SqlSelect);
			
				$resultado->execute(array($usuario));
			
				while($registro = $resultado->fetch(PDO::FETCH_ASSOC)){
					
					$imagen = $registro['nombre_imagen'];
					
				}
				
		?>
		
		<div align="center">
				<img src="ImagenesPerfil/<?php echo $imagen ?>" alt="Imagen de perfil" width="260" class="img">
		</div>		
		
		<div align="center">		   	
    		<form action="Archivos_BBDD/insercionImagenPerfil.php" method="post" enctype="multipart/form-data">
    			<div id="div_file">
					<p id="texto">Cambiar Imagen</p>
    				<input type="file" name="imagenPerfil" size="20" id="btn_enviar">		
    			</div>
				<div id="div_file2">
					<p id="texto2">¡Súbela!</p>
					<input type="submit" value="Cambiar imagen" id="btn_submit">
				</div>
    		</form>
    	</div>
		
		
        <!--<div>
            <figure>
                <img src="Imagenes/cumpleaniosPablito.jpg" class="img-responsive" width="250" height="250" />
            </figure>
        </div>-->
		<!--<div id="btnEstados">
			<button id="btn1"><img src="Iconos/arrow_down.png" alt="Desplegar estados"></button>
			<button id="btn2"><img src="Iconos/arrow_up.png" alt="Ocultar estados" width="80px" height="35px"></button>
		</div>-->
		<!--Botones para desplegar los estados y ocultarlos.-->
		<div id="btnEstados">
			<button id="btn1"><i class="icon-down-big"></i></button>
			<button id="btn2"><i class="icon-up-big"></i></button>
		</div>

        <div class="containerInsertEst" style="text-align: center">
            <form action="Archivos_BBDD/insercionEstado.php" method="post">
                <textarea name="estado" rows="4" cols="35" placeholder="¿Qué estás pensando?"></textarea>
                <br />
                <input type='image' src='Iconos/enviar-button.png' alt='Enviar' value='enviar' width='70' height='28' style='margin-top:3px'>"
            </form>
        </div>
		
		<div id="estados">            
            <?php
				require("Archivos_BBDD/mostrarEstados.php");
			?>            
        </div>
		
		<div id="fotosDesplegadas">
			<ul>
				<li><a href="#" id="enlaceFotos2">Imagen 5</a></li>
				<li><a href="#" id="enlaceFotos2">Imagen 4</a></li>
				<li><a href="#" id="enlaceFotos2">Imagen 3</a></li>
				<li><a href="#" id="enlaceFotos2">Imagen 2</a></li>
				<li><a href="#" id="enlaceFotos2">Imagen 1</a></li>
			</ul>
		</div>
		<div id="desplegarfotos">
			<ul>
				<li><a href="#" id="enlaceFotos">Imágenes Anteriores</a></li>
			</ul>			
		</div>

        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>-->
	    <script src="JS/menuBarraNav.js"></script>		
		
    </body>
</html>