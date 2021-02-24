<?php
error_reporting(E_ALL); 
ini_set('display_errors','On');
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="Bootstrap-3.4.1/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="CSS/formularioLoginRegistro.css">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <script>
        	$(function(){
        		$('#login').click(function(){
        			$(this).next('#login-content').slideToggle();
        			$(this).ToggleClass('active');
        		});

        	});
        </script>

        <style>
		
			h1{
				text-align:center;
			}
			
			table{
				width:25%;
				background-color:#FFC;
				border:2px dotted #F00;
				margin:auto;
			}
				.izq{
					text-align:right;
				}
				.der{
					text-align:left;
				}
				td{
					text-align:center;
					padding:10px;
				}
		
		</style>
    </head>
    <body>
        <h1>Introduce tus credenciales</h1>
        
        <form action="Archivos_BBDD/comprueba_login.php" method="post">
        
        	<table>
        		<tr>
        		<td class="izq">
        		<b>login:</b></b></td><td class="der"><input type="text" name="usuarioLogin"></td></tr>
        		<tr><td class="izq"><b>Contraseña:</b></td><td class="der"><input type="password" name="clave"></td></tr>
        		<tr><td colspan="2"><label><input type="checkbox" checked="checked">Recordar credenciales</label></td></tr>
        		<tr><td colspan="2"><input type="submit" name="enviar" value="Loguearse"></td></tr>
        	</table>
        
        </form>

        <nav class="acceder" align="center">
        	<ul>
        		<li>
        			<a href="#" id="login">Registrarse</a>
        			<div id="login-content">
        				<form action="Archivos_BBDD/registroUsuario.php" method="post" autocomplete="off">
                        	<input type="text" id="user" name="primerNombre" placeholder="Nombre" required>
                            <input type="text" id="user" name="primerApellido" placeholder="Apellido" required>
        					<input type="text" id="user" name="usuario" placeholder="Usuario" required>         
        					<input type="password" id="pass" name="clave" placeholder="Contraseña" required>
        					<input type="submit" id="submit" value="Registrar">

        					<!-- <table>
        						<tr>
        						<td class="izq">
        						login:</td><td class="der"><input type="text" name="usuarioLogin"></td></tr>
        						<tr><td class="izq">Contraseña:</td><td class="der"><input type="password" name="clave"></td></tr>
        						<tr><td colspan="2"><input type="submit" name="enviar" value="Loguearse"></td></tr>
        					</table> -->
        
        				</form>
        			</div>
        		</li>
        	</ul>
        </nav>

			           
    </body>
</html>