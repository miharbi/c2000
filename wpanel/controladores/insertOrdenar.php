<?php

session_start();

     include '../../includes/config.php';
     include '../../includes/conexion.php';

    foreach ($_POST as $indice => $valor) {
        $result = mysql_query("UPDATE contenidos SET orden=$valor WHERE id=$indice ") or die(mysql_error());
    }

@header('Location:../index.php?url=vistas/modificarSecciones.php&msj=1&tipo=1');
