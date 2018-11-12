<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Registro</title>
</head>
<body>
	<form action="" method="post">
		<label for="email">Email</label>
		<input type="email" name="email" id="email"><br><br>
		<label for="username">Nombre de Usuario</label>
		<input type="text" name="username" id="username"><br><br>
		<label for="password">Contraseña</label>
		<input type="password" name="password" id="password"><br><br>
		<label for="nombre">Nombre</label>
		<input type="text" name="nombre" id="nombre"><br><br>
		<label for="apellidos">Apellidos</label>
		<input type="text" name="apellidos" id="apellidos"><br><br>
		<input type="submit" value="Enviar">
	</form>
</body>
</html>