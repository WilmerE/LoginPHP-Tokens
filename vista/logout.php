<?php
require('../controlador/db.php');

$usuario->logout(); 

header('Location: ../index.php');
exit;
?>