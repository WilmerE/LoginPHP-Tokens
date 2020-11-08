<?php
ob_start();

if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

define('HOST','localhost');
define('USER','root');
define('PASS','');
define('DDBB','login');
define('CHARSET','utf8mb4');

try {
	$connection = "mysql:host=" . HOST . ";charset=". CHARSET .";dbname=" . DDBB;
    $options = [
    	PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    $pdo = new PDO($connection, USER, PASS);

} catch(PDOException $e){
	print_r('Error de Conexión: ' . $e->getMessage());
	exit;
}
//Clase Usuario, para hacer validaciones
include('../modelo/usuario.php');
$usuario = new Usuario($pdo);
?>