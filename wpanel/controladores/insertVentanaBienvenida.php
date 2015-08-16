<?php session_start(); 
   
include ('../../includes/config.php');
include ('../../includes/conexion.php');

$contenido= $_REQUEST['contenido'];
$id=$_REQUEST['id'];
if($id != ''){ 
  
   $result= mysql_query("UPDATE contenidos SET  contenido='$contenido' WHERE id = '$id'")or die(mysql_error());
}else{
	
   mysql_query("INSERT INTO `contenidos` (`id`,`contenido`,`tipo`) VALUES (NULL,'$contenido',3)") or die (mysql_error());
}	

@header("Location:../index.php?url=vistas/ventanaBienvenida.php&msj=1&tipo=1"); 
?>