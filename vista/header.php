<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" media="screen and (device-height: 600px)" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sistema | <?=isset($title) ? $title : null;?></title>
    <link rel='stylesheet' href='../lib/bootstrap-4.5.2-dist/css/bootstrap.min.css'>
    <link rel="icon" href="../img/Logo.png" type="image/png"/>
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
    <header>
        <img class="logo" src="../img/logo.png">
        <h3>Bienvenido </h3>
        <nav>
            <ul>
                <li><a href="#">Inicio</a></li>
                <li id="logout" class="cerrar-sesion"><a href="logout.php">Cerrar sesión</a></li>
            </ul>
        </nav>
    </header>