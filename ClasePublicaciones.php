<?php
require_once("coneccion.php");

class Publicaciones extends Conexion

{
	public function store($usuario,$descripcion,$estado,$imagen)
	{
		$fecha=date('Y-m-d');
		$hora=date('H:i:s');
		$sql="INSERT INTO publicacion 
			  (pub_usuario,
			   pub_fecha,
			   pub_hora,
			   pub_descripcion,
			   pub_estado,
			   pub_imagen)
			  VALUES('$usuario',
			  	'$fecha',
			  	'$hora',
			  	'$descripcion',
			  	'$estado',
			  	'$imagen') ";

		return $this->connection->query($sql);
	}	
	public function last_id(){
		$result=$this->connection->query("SELECT LAST_INSERT_ID() AS pub_id");
		return $result->fetch_all(MYSQLI_ASSOC);
	}

	public function show($pub_id){
		$result=$this->connection->query("SELECT * FROM publicacion WHERE pub_id=$pub_id");
		return $result->fetch_all(MYSQLI_ASSOC);
	}
}
?>