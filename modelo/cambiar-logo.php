<?php
require_once('../controlador/db.php');

class Logo {

	private $nombre;
	private $usuario;
	private $_db;
	private $_ignoreCase;

	function __construct($db)
	{
		$this->_db = $db;
		$this->_ignoreCase = false;
	}
	
	public function subir($file){
		$query = $this->_db->prepare("INSERT INTO login_elements(id, logo) VALUES(null, '$file')");
		//Método para verificar si hay filas
		if ($query->rowCount()) {
			//Retornar Verdadero si lo hay
			return true;
		}else{
			//Falso si está vacío
			return false;
		}
	}
}
?>