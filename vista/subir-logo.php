<?php
require_once('../controlador/db.php'); 

//Si no existe una sesión redirigir a login.php
if (! $usuario->session_actual()){
    header('Location: login.php'); 
    exit(); 
}
$title = 'Cambiar logo';

require('header.php'); 
require('navbar.php'); 
?>
    <form action="upload-logo.php" method="POST" enctype="multipart/form-data">
        <h2>Subir archivo</h2>
        <input id="imagen" type="file" name="file"><br>
        <input id="subir" type="submit" value="Subir archivo">
    </form>
        <?php
            if(isset($correcto)){
                echo $correcto;
            }
            require('footer.php'); 
        ?>