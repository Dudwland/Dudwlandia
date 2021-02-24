<?php
	error_reporting(E_ALL); 
	ini_set('display_errors','On');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>¡Ya estás en Dudwlandia!</title>
<link rel="stylesheet" href="CSS/registroBienvenida.css">

</head>

<body>
	<?php
				
		if($genero == "masculino"){
		
			BienvenidaM($primerNombre, $primerApellido, $nomUsuario);
		
		}else{
			
			BienvenidaF($primerNombre, $primerApellido, $nomUsuario);
			
		}
	?>
	
	<p id="volverInicio">
		<a href="../login.php" id="enlaceLogin"><span>Regresar a el área de login</span></a>
	</p>
</body>
</html>