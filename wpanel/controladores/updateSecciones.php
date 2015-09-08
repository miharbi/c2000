<?php

session_start();
include '../../includes/config.php';
include '../../includes/conexion.php';

mysql_query("UPDATE `contenidos` SET `titulo`='$_REQUEST[nombreEnlace]',
	 									  `contenido`='$_REQUEST[contenido]',
										  comentarios = '$_REQUEST[comentarios]'
										   WHERE `id`='$_REQUEST[id]' ") or die(mysql_error());

@header('Location:../index.php?url=vistas/modificarSecciones.php&msj=1&tipo=1');
