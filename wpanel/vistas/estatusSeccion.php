<?php  
  include ('../../includes/config.php');
  include ('../../includes/conexion.php');

$id=$_REQUEST['id'];


mysql_query("UPDATE contenidos SET status=".$_GET[status]." WHERE id='$id'")or die(mysql_error());


@header("Location:../index.php?url=vistas/modificarSecciones.php&msj=1&tipo=1");
?>
