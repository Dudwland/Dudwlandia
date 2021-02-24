<?php
error_reporting(E_ALL); 
ini_set('display_errors','Off');

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
<title>Documento sin título</title>
</head>
	
	<style>
		
		p span{
			position: relative;
			top: 13px;
			right: 105px;
			font-size: 9px;
		}
		
		
		.fechaComentario{
			position: relative;
			top: 0px;
			right: 60px;
			font-size: 9px;
		}
				
		.btnComentario {
			display: inline-block;
		  	border-radius: 4px;
		  	background-color: #f4511e;
		  	border: none;
		  	color: #FFFFFF;
		  	text-align: center;
		  	font-size: 10px;
  			padding: 9px;
  			width: 80px;
  			transition: all 0.5s;
  			cursor: pointer;
  			margin: 5px;
			}
		
		.btnComentario span {
			cursor: pointer;
			display: inline-block;
			position: relative;
			transition: 0.5s;
			}
		
		.btnComentario span: after {
		  	content: '\00bb';
		  	position: absolute;
		  	opacity: 0;
		  	top: 0;
		  	right: -20px;
		  	transition: 0.5s;
			}
		
		.btnComentario:hover span {
		  	padding-right: 25px;
		}
		.btnComentario:hover span:after {
	 			opacity: 1;
	 			right: 0;
		}
							
	
		</style>
	
	<body>
		<?php
		
		require("conexionMiSitioWebPrueba.php");
	
		try
		{
			
			$sqlSelectEstados = "SELECT id_estado, nom_estado, agregado_fecha FROM estados WHERE nom_usuario = '$usuario' ORDER BY agregado_fecha DESC";
			
			$estadosResult = $DbMiSitioWebP->prepare($sqlSelectEstados);
			
			$estadosResult->execute();
			
			
			while($registrosEstados = $estadosResult->fetch(PDO::FETCH_ASSOC)){
				
				echo "<br /><br />";
				echo "<div class='Estados'>";
				echo "<p>" . $registrosEstados['nom_estado'] . "</p>";				
				echo "<p><span>" . $registrosEstados['agregado_fecha'] . "</span></p>";
				echo "</div>";
				
				$idEstadoEst = $registrosEstados['id_estado'];
				
				$sqlSelectComent = "SELECT c.comentario, c.agregado_fecha FROM comentarios AS c INNER JOIN estados AS e ON ( c.id_estado =" . $idEstadoEst . " AND e.id_estado =" . $idEstadoEst . ")";
				
				$comentariosResult = $DbMiSitioWebP->prepare($sqlSelectComent);
				
				$comentariosResult->execute();
				
				while($registrosComent = $comentariosResult->fetch(PDO::FETCH_ASSOC)){
					
					
					echo "<div class='Comentarios'>";
					echo "<p>" . $registrosComent['comentario'] . "</p>";
					echo "<span class='fechaComentario'>" . $registrosComent['agregado_fecha'] . "</span>";
					echo "</div>";
					
				}
				
				echo "<div align='center'>";
				echo "<form action='Archivos_BBDD/insercionComentario.php' method='post'>";
				echo "<textarea name='comentario' rows='2' cols='23' placeholder='Ponle un comentario'></textarea><br />";
				echo "<input type='hidden' name='id_estado' value=" . $idEstadoEst. ">";
				echo "<button type='submit' value='Dejar comentario' class='btnComentario' style='vertical-align:middle'><span>Comentar </span></button>";
				echo "</form>";
				echo "</div>";
				echo "<br /><hr>";
			}
				
			$estadosResult->closeCursor();
				
		}catch(Exception $e){
					
			die('Error: ' . $e->GetMessage());
					
		}finally{
				
			$DbMiSitioWebP=null;	
			
		}

	?>
	
</body>
</html>
