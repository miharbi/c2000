<?php

session_start();
     include '../../includes/funciones.php';
     include '../../includes/config.php';
     include '../../includes/conexion.php';

    $tipo = 1; // Secciones

if ($_POST['enlace'] == 'hijo') { //************ Enlace Secundario  *************************************
    $titulo = ucfirst($_POST['nombreEnlace']); // Pasa a mayuscula el primer caracter de l cadena
    $contenido = $_POST['contenido'];
    $idPadre = $_POST['padreId'];

    $res = mysql_query("SELECT id FROM `contenidos` WHERE padre='$idPadre' ") or die(mysql_error());
    $resultados = mysql_num_rows($res);
    $resultados = $resultados + 1;

    $sqlDatos = '`id`,`titulo`,`contenido`,`tipo`,`padre`,fijo,orden, comentarios';
    $sqlValores = "NULL,'$titulo','$contenido','$tipo','$idPadre','f','$resultados', '$_POST[comentarios]'";

//*********** Enlace Principal  ********************************
} elseif ($_POST['enlace'] == 'padre') {
    $res2 = mysql_query("SELECT id FROM `contenidos` WHERE padre=0 and tipo='$tipo' ") or die(mysql_error());
    $resultados2 = mysql_num_rows($res2);
    $resultados2 += 1;

    if ($_POST['enlaceSecun'] == 1) { // *******  Si tiene enlaces Secundarios    ************
    $titulo = ucfirst($_POST['nombreEnlace']); // Pasa a mayuscula el primer caracter de l cadena
    $sqlDatos = '`id`,`titulo`,`tipo`,`padre`,fijo,orden,comentarios';
        $sqlValores = "NULL,'$titulo','$tipo',0,'f','$resultados2', '$_POST[comentarios]'";
    } elseif ($_POST['enlaceSecun'] == 2) { //***********  No tiene Enlaces Secundarios  ************************************

    $titulo = ucfirst($_POST['nombreEnlace']); // Pasa a mayuscula el primer caracter de l cadena
    $contenido = $_POST['contenido'];
    //$idPadre  = $_POST['enlaceSecun'];
    $sqlDatos = '`id`,`titulo`,`contenido`,`tipo`,`padre`,fijo,orden,comentarios';
        $sqlValores = "NULL,'$titulo','$contenido','$tipo',55,'f','$resultados2', '$_POST[comentarios]'";
    }
} elseif ($_POST['enlace'] == 'libre') {
    $res2 = mysql_query("SELECT id FROM `contenidos` WHERE padre=0 and tipo='$tipo' ") or die(mysql_error());
    $resultados2 = mysql_num_rows($res2);
    $resultados2 += 1;

    $titulo = ucfirst($_POST['nombreEnlace']); // Pasa a mayuscula el primer caracter de l cadena
    $contenido = $_POST['contenido'];
    $sqlDatos = '`id`,`titulo`,`contenido`,`tipo`,`padre`,fijo,orden, comentarios';
    $sqlValores = "NULL,'$titulo','$contenido','$tipo',NULL,'f','$resultados2', '$_POST[comentarios]'";
} elseif ($_GET['enlace'] == 'divisor') {
    $res2 = mysql_query("SELECT id FROM `contenidos` WHERE padre='$_GET[idpadre]'  ") or die(mysql_error());
    $resultados2 = mysql_num_rows($res2);
    $resultados2 += 1;

    $titulo = ucfirst($_GET['nombre']);
    $sqlDatos = '`id`,`titulo`,`tipo`,`padre`,fijo,orden, comentarios';
    $sqlValores = "NULL,'$titulo','5','$_GET[idpadre]','f','$resultados2', '$_POST[comentarios]'";
}

mysql_query("INSERT INTO `contenidos` ($sqlDatos) VALUES ($sqlValores)") or die(mysql_error());

@header('Location:../index.php?url=vistas/modificarSecciones.php&msj=1&tipo=1');
