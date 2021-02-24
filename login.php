<?php
error_reporting(E_ALL); 
ini_set('display_errors','On');

require("Archivos_BBDD/conexionMiSitioWebPrueba.php");
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="Bootstrap-3.4.1/css/bootstrap.css">
        <!-- <link rel="stylesheet" type="text/css" href="CSS/formularioLoginRegistro.css"> -->
        <link rel="stylesheet" type="text/css" href="CSS/loginRegistro.css">
        <link rel="stylesheet" type="text/css" href="Iconos/Fontello/fontello-iconos_de_x/css/fontello.css">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <script type="text/javascript" src="Jquery/jquery.validate.min.js"></script>
		<script type="text/javascript" src="JS/registroUsuario.js"></script>
        <script>
        	$(function(){
        		$('#login').click(function(){
        			$(this).next('#login-content').slideToggle();
        			$(this).ToggleClass('active');
        		});

        	});
        </script>

        <style>
			
			body{
				background-color:aliceblue;
			}
		
			h1, h2{
				text-align:center;
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
			
			#formularioRegistro label.error{
				font-size: 0.8em;
				color:#F00;
				font-weight: bold;
				display: block;
			}
			
			#formularioLogin label.error{
				font-size: 0.8em;
				color:white;
				font-weight: bold;
				display: block;
			}
			
		
		</style>
		
		<script>
		
			$(document).ready(function(){
				
				document.getElementById("submitLogin").style.width = "95px";
					
				////////////Lo siguiente es para la validación del formulario para el login.////////////
				//El código no está funcionando. La validación se está ejecutando directamente desde las etiquetas input.
				$("#formularioLogin").validate({
					
			
					rules:{
						passwordLogin:{
							required:true,
							rangelength:[3,16]
						}
					},
					messages:{
						passwordLogin:{
							required:"Debe introducir su contraseña.",
							rangelength:"Su contraseña tiene entre 3 y 16 caracteres."
						}
					},
					errorPlacement: function(error, element){
						
						if(element.is(":radio") || element.is(":checkbox")){
							
							error.appendTo(element.parent());
							
						}else{
							
							error.insertAfter(element);
							
						}
						
					}
					
				});
				
				////////////Lo siguiente es para la validación del formulario de registro.////////////
				$("#formularioRegistro").validate({
								
					rules:{
						usuario:{
							required:true,
							rangelength:[3,12]
						},
						clave:{
							required:true,
							rangelength:[3,16]
						},
						confir_clave:{
							equalTo:"#clave"
						},
					},
					messages:{
						usuario:{
							required:"Debe introducir un nombre de usuario.",
							rangelength:"El nombre de usuario debe tener entre 3 y 12 caracteres."
						},
						clave:{
							required:"Debe introducir una contraseña.",
							rangelength:"Su contraseña debe tener entre 3 y 16 caracteres."
						},
						confir_clave:{
							equalTo:"Las contraseñas no coinciden."
						},
					},
					errorPlacement: function(error, element){
						
						if(element.is(":radio") || element.is(":checkbox")){
							
							error.appendTo(element.parent());
							
						}else{
							
							error.insertAfter(element);
							
						}
						
					}
					
				});
		
			});
		</script>
    </head>
    <body>
		<h1>Dudwlandia</h1>
        <h2>Introduce tus credenciales</h2>
        
		<div id="login">
        	
			<form action="Archivos_BBDD/comprueba_login.php" method="post" id="formularioLogin">
        			
        			<table>
        				<tr>
        				<td class="izq">
        				<b>Usuario</b></b></td><td class="der"><input type="text" name="usuarioLogin" class="required" title=" Debe introducir su nombre de usuario, éste debe ser en letras minúsculas."></td></tr>
        				<tr><td class="izq"><b>Contraseña</b></td><td class="der"><input type="password" name="clave" id="passwordLogin" class="required" title="Debe introducir su contraseña."></td></tr>
        				<tr><td colspan="2"><input type="checkbox" id="checkCredenciales" checked="checked"><label for="checkCredenciales">Recordar credenciales</label></td></tr>
        				<tr><td colspan="2"><input type="submit" class="submitLogin" id="submitLogin" name="enviar" value="Loguearse"></td></tr>
        			</table>
        		
        	</form>
	
		</div>

		<button id="activarRegistro">Registrarme</button>

        <div class="obscurecer" id="obscurecer"></div>

        <div id="registro">

            <div class="icon-cancel-1" id="cerrarRegistro"></div>

            <form action="Archivos_BBDD/registroUsuario.php" id="formularioRegistro" method="post" autocomplete="off">
                Nombre: <input type="text" id="primerNombre" name="primerNombre" size="24" class="required" title="Debe introducir su nombre."><br />
                Apellido: <input type="text" id="primerApellido" name="primerApellido" size="24" class="required" title="Debe introducir su apellido."><br />
				Género: <br />
				<label for="femenino">Femenino</label>
				<span>
				<input type="radio" id="femenino" name="genero" value="femenino" class="required" title="Debe elegir un género.">
				<label for="masculino">Masculino</label>
				<input type="radio" id="masculino" name="genero" value="masculino">
				</span><br />
                Usuario: <input type="text" id="usuario" name="usuario" size="24"><br />
                Contraseña: <br /><input type="password" id="clave" name="clave" ><br />
				Confirme contraseña: <br /><input type="password" id="confir_pass" name="confir_clave" ><br /><br />
                <input type="submit" id="submitRegis" value="Registrar">
            </form>
        </div>

        <!-- <nav class="acceder" align="center">
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

        					// <table>
        					//	<tr>
        					//	<td class="izq">
        						login:</td><td class="der"><input type="text" //name="usuarioLogin"></td></tr>
        					//	<tr><td class="izq">Contraseña:</td><td //class="der"><input type="password" name="clave"></td></tr>
        					//	<tr><td colspan="2"><input type="submit" name="enviar" //value="Loguearse"></td></tr>
        					//</table>
        
        				</form>
        			</div>
        		</li>
        	</ul>
        </nav> -->

			           
    </body>
</html>