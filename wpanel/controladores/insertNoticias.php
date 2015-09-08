<?php

session_start();

     include '../../includes/config.php';
     include '../../includes/funciones.php';
     include '../../includes/conexion.php';

    $titulo = ucfirst($_REQUEST['titulo']); // Pasa a mayuscula el primer caracter de l cadena

    $contenido = $_REQUEST['contenido'];

    if (isset($_REQUEST['modificar'])) {
        $id = $_REQUEST['id'];

        $result = mysql_query("UPDATE contenidos SET titulo='$titulo', contenido='$contenido', fecha = '".formatoFecha($_REQUEST[fecha])."' WHERE id = '$id'") or die(mysql_error());
    } else {
        mysql_query("INSERT INTO `contenidos` (`id`,`titulo`,`contenido`,`tipo`,`fecha`) VALUES (NULL,'$titulo','$contenido',2,'".formatoFecha($_REQUEST[fecha])."')") or die(mysql_error());
    }
 //************ NOTICIAS  *************************************

@header('Location:../index.php?msj=1&tipo=1');
