<?php


  include '../../includes/config.php';
  include '../../includes/conexion.php';

$id = $_REQUEST['id'];
if ($_REQUEST['noti'] != 1) {
    mysql_query("DELETE FROM contenidos WHERE  padre='$id'") or die(mysql_error());  // Elimina los hijos
}

mysql_query("DELETE FROM contenidos WHERE id='$id'") or die(mysql_error());

@header('Location:../index.php?url=vistas/modificar'.($_REQUEST['noti'] != 1 ? 'Secciones' : 'Noticias').'php&msj=1&tipo=2');
