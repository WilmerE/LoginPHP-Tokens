<?php require('../controlador/db.php'); 

//Si no existe una sesión redirigir a login.php
if (! $usuario->session_actual()){
  header('Location: login.php'); 
  exit(); 
}

if(isset($_POST['submit'])){

  if (! isset($_POST['nombres'])) {
    $error[] = "Please fill out all fields";
  }

  if (isset($_POST['contrasena']) != isset($_POST['contrasena2'])) {
    $error[] = "Las contraseñas no coinciden";
  }
}

$title = 'Registrar Usuario';

require('header.php'); 
require('navbar.php'); 
?>
<form role="form" name="formulario" id="formulario" method="POST">
  <div class="card">
    <div class="card-header">
      <h3>Registro de Usuarios</h3>
      <?php
      if (isset($error)){
        foreach ($error as $error){
          echo '<p class="bg-danger" style="color: #fff;">'.$error.'</p>';
        }
      }
      ?> 
    </div>
    <div class="card-body">
      <input  type="hidden" name="id" id="id">
      <div class="form-izq">
        <label for="nombres">Nombres</label>
        <input type="text" name="nombres" id="nombres" placeholder="Nombres" value="<?php if(isset($error)){ echo htmlspecialchars($_POST['nombres'], ENT_QUOTES); } ?>">
      </div>
      <div class="form-der">
        <label for="apellidos">Apellidos</label>
        <input type="text" name="apellidos" id="apellidos" placeholder="Apellidos" value="<?php if(isset($error)){ echo htmlspecialchars($_POST['apellidos'], ENT_QUOTES); } ?>">
      </div>
      <div class="form-izq">
        <label for="nombres">CUI</label>
        <input type="text" name="cui" id="cui" placeholder="CUI" value="<?php if(isset($error)){ echo htmlspecialchars($_POST['cui'], ENT_QUOTES); } ?>">
      </div>
      <div class="form-der">
        <label for="apellidos">Teléfono</label>
        <input type="text" name="telefono" id="telefono" placeholder="Teléfono" value="<?php if(isset($error)){ echo htmlspecialchars($_POST['telefono'], ENT_QUOTES); } ?>">
      </div>
      <div class="form-izq">
        <label for="usuario">Usuario</label>
        <input type="text" name="usuario" id="usuario" placeholder="Usuario" value="<?php if(isset($error)){ echo htmlspecialchars($_POST['usuario'], ENT_QUOTES); } ?>">
      </div>
      <div class="form-der">
        <label for="codigo-emp">Código de Empresa</label>
        <input  type="number" name="codigo-emp" id="codigo-emp" placeholder="Código de la empresa" value="<?php if(isset($error)){ echo htmlspecialchars($_POST['codigo-emp'], ENT_QUOTES); } ?>">
      </div>
      <div class="form-izq">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Correo Electrónico" value="<?php if(isset($error)){ echo htmlspecialchars($_POST['email'], ENT_QUOTES); } ?>">
      </div>
      <div class="permisos">
        <input type="radio" id="superusuario" name="superusuario" value="1">
        <label for="superusuario">Superusuario</label>
        <input type="radio" id="administrador" name="administrador" value="1">
        <label for="administrador">Administrador</label>
        <input type="radio" id="activo" name="activo" value="1">
        <label for="activo">Activo</label>
      </div>
      <div class="form-izq">
        <label for="">Contraseña(*):</label>
        <input  type="password" name="contrasena" id="contrasena" placeholder="Contraseña">
      </div>
      <div class="form-der">
        <label for="">Confirmar Contraseña(*):</label>
        <input  type="password" name="contrasena2" id="contrasena2" placeholder="Confirmación">
      </div>
    </div>
    <div class="card-footer text-muted botones">
      <button type="button" class="btn btn-link">Cancelar</button>
      <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Registrar Usuario">
    </div>
  </div>
</form>
<?php 
require('footer.php'); 
?>