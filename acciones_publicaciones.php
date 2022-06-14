<?php
require_once('ClasePublicaciones.php');
$Publicaciones= new Publicaciones();
	$datos=$_REQUEST;
	$user=$datos['user'];
	$desc=$datos['desc'];
	$est=$datos['est'];
	$img=null;

	$Publicaciones->store($user,$desc,$est,$img);
	
	$last=$Publicaciones->last_id();
 	
 	$registro=$Publicaciones->show($last[0]['pub_id']);

 	echo json_encode($registro);
?>