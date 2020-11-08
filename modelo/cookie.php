<?php
$host = 'localhost';
$user = 'root';
$password = '';
$db = 'cookie';

$conection = @mysqli_connect($host,$user,$password,$db);
if(!$conection){
  echo "Error en la conexion";
}
 
if(isset($_COOKIE['id_user']) && isset($_COOKIE['marca'])){
  if($_COOKIE['id_user']!="" || $_COOKIE['marca']!=""){
    $sql_c = $conection->query("SELECT * FROM users WHERE id='".$_COOKIE["id_user"]."' 
          AND cookie='".$_COOKIE["marca"]."' AND cookie<>'';");
  }
  if(mysqli_num_rows($sql_c)){
    $row_c = mysqli_fetch_array($sql_c);
    echo "El usuario ".$row_c['username']." se ha identificado correctamente.";
    $user_cookie = mysqli_fetch_array($sql_c);
  }
}
else{
  include_once '../vista/login.php';
}
?>