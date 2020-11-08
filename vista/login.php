<?php
require_once('../controlador/db.php');

//Verificar si hay una sesión actual
if( $usuario->session_actual()){
  header('Location: inicio.php');
  exit();
}

//Validaciones del formularios
if(isset($_POST['submit'])){

  $user = $_POST['usuario'];
  $password = $_POST['contrasena'];
  $codigo = $_POST['codigo-emp'];

  if (! isset($_POST['recordarme'])) {
    $recordarme = false;
  }else{
    $recordarme = $_POST['recordarme'];
  }

  if ($usuario->verificar($user, $password, $codigo, $recordarme)){
    $_SESSION['usuario'] = $usuario;
    header('Location: inicio.php');
    exit;
  } else {
    $error[] = 'Nombre de usuario o contraseña incorrectos!';
  }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <title>Iniciar sesion</title>
  <meta charset="utf-8">
  <link rel='stylesheet' href='../lib/bootstrap-4.5.2-dist/css/bootstrap.min.css'>
  <link rel="stylesheet" href="../css/login.css">
  <link rel="stylesheet" href="../css/responsive.css">
  <link rel="icon" href="../img/Logo.png" type="image/png"/>
</head>
<body>
  <div class="main">
    <div class="logo-box">
      <div class="logo">
        <img src="../img/Logo.png" alt="logotipo"/>
      </div>
    </div>
    <div class="login">
      <form class="form-login" method="POST">

        <div class="head-form">
          <h2>Iniciar Sesión</h2>
          <span style="color: red">   
            <?php
            if (isset($error)){
              foreach ($error as $error){
                echo '<p class="bg-danger" style="color: #fff;">'.$error.'</p>';
              }
            }
            ?>  
          </span>
        </div>

        <input type="email" class="form-control" id="usuario" name="usuario" placeholder="Correo Electrónico" autofocus="" required="" value="<?php if(isset($error)){ echo htmlspecialchars($_POST['usuario'], ENT_QUOTES); } ?>" />

        <input type="text" class="form-control" id="codigo-emp" name="codigo-emp" placeholder="Código de Empresa" autofocus="" required="" value="<?php if(isset($error)){ echo htmlspecialchars($_POST['codigo-emp'], ENT_QUOTES); } ?>"/>

        <input type="password" class="form-control" id="contrasena" name="contrasena" required="" placeholder="Contraseña" />

        <label class="checkbox">
          <input type="checkbox" id="recordarme" name="recordarme">Recordar Contraseña
        </label>

        <a id="cancelar" href="vista/notificacion.php" class="cancelar btn btn-lg btn-link" role="button">Cancelar</a>  
        <button id="submit" name="submit" class="acceder btn btn-lg btn-primary" type="submit" role="button">Acceder</button>

        <a id="forgot" class="restaurar" href='reset.php'>¿Olvidó la contraseña?</a>
      </form>
    </div>
  </div>
  <footer>
    <p><b>Contactar al desarrollador: </b>
      <a type="button" href="https://wa.me/50247620050?text=Hola%20Wilmer!%20Gusto%20saludarte." target="_blank"><i class="fab fa-whatsapp"></i></a>
      <a type="button" href="mailto:wilmerpelico22@gmail.com?Subject=Hola%20Wilmer!%20Gusto%20saludarte." target="_blank"><i class="far fa-envelope"></i></a>
      <a type="button" href="tel:+50247620050" target="_blank"><i class="fas fa-mobile-alt"></i></a>
    </p>
  </footer>
  <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
</body>
</html>