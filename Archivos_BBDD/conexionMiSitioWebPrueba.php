<?php  

	$DbMiSitioWebP = new PDO('mysql:host=localhost; dbname=mi_sitio_web_prueba', 'root', 'alan');
	
	$DbMiSitioWebP->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	$DbMiSitioWebP->exec("SET CHARACTER SET utf8");

?>