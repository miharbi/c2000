<?php
include ('../../includes/config.php');
include ('../../includes/conexion.php');
mysql_query("UPDATE `contacto` SET `direccion`='$_REQUEST[direccion]',
	 									  `telefono`='$_REQUEST[telefono]',
										  `email`='$_REQUEST[email]',
										  `extra`='$_REQUEST[extra]',
										  `contrasena`='$_REQUEST[contrasena]'
										  ") or die (mysql_error());
	 
@header("Location:../index.php?url=vistas/contacto.php&msj=1&tipo=1"); 
?>