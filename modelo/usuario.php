<?php 

/**
 * Verificar usuario
 */

class Usuario {

	private $nombre;
	private $usuario;
	private $_db;
	private $_ignoreCase;

	function __construct($db){
		$this->_db = $db;
		$this->_ignoreCase = false;
	}

	public function session_actual(){
		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
			return true;
		}
	}

	public function validarUsuario($usuario){
		if (strlen($usuario) < 8) {
			return false;
		}

		if (strlen($usuario) > 50) {
			return false;
		}

		if (! ctype_alnum($usuario)) {
			return false;
		}

		return true;
	}
	
	#RECIBIMOS LOS CAMPOS DEL FORMULARIO
	public function verificar($user, $pass, $cod, $recordar){
		#Encriptamos la contraseña
		$md5pass = md5($pass);
		#Realizamos la cosulta sql por medio de PDO con el método prepare
		$query = $this->_db->prepare('select * from usuario where email=:user and contraseña=:pass and cod_empresa=:cod');
		#Ejecutamos la consulta con los calores de las variables temporales puestas en la consulta
		$query->execute(['user'=>$user, 'pass'=>$md5pass, 'cod'=>$cod]);

		#Verificamos si la consulta nos devuelve un valor
		if($query == true){

			#Si es un true, recorremos los campos de la consulta $query como $attrs
			foreach ($query as $attrs) {
				#Almacenamos el id
				$id = $attrs["id"];

				#Verificamos si el checkbox recordar contraseña fue activado
				if($recordar == true){
					#Inicilizamos el reloj
			    	mt_srand(time());
			    	#Almacenamos un número random
			    	$rand = mt_rand(1000000,9999999);
			    	#Insertamos el número random en la cookie del usuario
			    	$query2 = $this->conectar()->prepare('UPDATE usuario SET cookie=:rand WHERE id=:id');
			    	#Ejecutamos a consulta
					$query2->execute(['rand'=>$rand, 'id'=>$id]);
					#Almacenamos el id y el timepo en la cookie del usuario
					setcookie("id", $id, time()+(60*60*24*365));
					#Almacenamos la marca, el número rando de cookie y el timepo en la cookie del usuario
					setcookie("marca", $rand, time()+(60*60*24*365));
					#Retornamos true
					return true;
				}else{
					$_SESSION['nombre'] = $attrs['nombres'];
					$_SESSION['apellidos'] = $attrs['apellidos'];

					#Si el checkbox no fue activado solo enviamos true
					return true;
				}
			}
			$_SESSION['loggedin'] = true;
		}
	}
	#Iniciar sesión
	public function setUser($user){
		$query = $this->_db->prepare('select * from usuario where email = :user');
		$query->execute(['user' => $user]);
		#Recorrer las consulta para obtener nombre y usuario
		foreach ($query as $currentUser) {
			$this->nombre = $currentUser['nombres'];
			$this->usuario = $currentUser['usuario'];
		}
	}
	public function listaUsuarios(){
		$query = $this->_db->prepare('select * from usuario');
		$usuario = $query->fetchAll(PDO::FETCH_OBJ);
		return $query;
	}

	#Obtener nombre
	public function getNombre(){
		return $this->nombre;
	}
	public function logout()
	{
		session_destroy();
	}
}

?>