<?php require('../controlador/db.php'); 

//Si no existe una sesión redirigir a login.php
if (! $usuario->session_actual()){
	header('Location: login.php'); 
	exit(); 
}
$query = $pdo->prepare('select * from usuario');
$usuario = $query->fetchAll(PDO::FETCH_OBJ);

$title = 'Lista de Usuarios';

require('header.php'); 
require('navbar.php'); 
?>
<h1>Lista de Usuarios</h1>
<table>
	<thead>
		<tr>
			<th>CUI</th>
			<th>Nombre</th>
			<th>Usuario</th>
			<th>Departamento</th>
			<th>Telefono</th>
			<th>Empresa</th>
			<th>Rol</th>
			<th>Correo</th>
			<th>Editar</th>
			<th>Eliminar</th>
		</tr>
	</thead>
	<tbody>
		<?php
			foreach ($usuario as $dato){
		?>
		<tr>
			<td><?php echo $dato->id; ?></td>
			<td><?php echo $dato->nombres; ?></td>
			<td><?php echo $dato->apellidos; ?></td>
			<td><?php echo $dato->usuario; ?></td>
			<td><?php echo $dato->telefono; ?></td>
			<td><?php echo $dato->cod_empresa; ?></td>
			<td><?php echo $dato->is_active; ?></td>
			<td><?php echo $dato->email; ?></td>
			<td><a href="editar.php?id=<?php echo $dato->cui; ?>">Editar</a></td>
			<td><a href="eliminar.php?id=<?php echo $dato->cui; ?>">Eliminar</a></td>
		</tr>
		<?php
			}
		?>
	</tbody>
</table>

<?php 
require('footer.php'); 
?>