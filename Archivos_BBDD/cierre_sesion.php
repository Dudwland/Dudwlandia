<?php
error_reporting(E_ALL); 
ini_set('display_errors','On');

	session_start();
	
	session_destroy();
	
	header("location:../login.php");
?>