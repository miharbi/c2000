<?php

include '../../includes/config.php';
include '../../includes/conexion.php';

if (isset($_REQUEST['id']) && $_REQUEST['id'] != '') {
    mysql_query("DELETE FROM contenidos WHERE id='$_REQUEST[id]'") or die(mysql_error());
    /*mensajes('Registro eliminado con exito!','../index.php');
    echo '<script type="text/javascript" >history.back(1)</script>';*/
}
@header('Location:../index.php?url=vistas/ventanaBienvenida.php&msj=1&tipo=2');
