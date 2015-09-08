<?php session_start();
     include '../includes/funciones.php';
     include '../includes/config.php';
     include '../includes/conexion.php';
     include 'includes/config.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="shortcut icon" href="img/favicon.ico">
<title><?=titulo_admin?></title>
<meta http-equiv="title" content="<?=titulo_admin?>">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="robots" content="<?=robots_admin?>"/><!--Indexla la portada nada mas lo de mas no -->
<meta name="author" content="<?=author?>" />
<meta name="distribution" content="<?=distribution_admin?>global" /><!--Indica que es de uso interno -->
<meta name="language" content="<?=lenguaje?>Spanish"/>
<meta name="copyright" content="<?=copyright?>"/>
<meta name="publisher" content="<?=publisher?>"/>
<meta http-equiv="keywords" content="<?=publisher?>">
<meta name="city" content="<?=city?>"/>
<meta name="country" content="<?=country?>Venezuela"/>
<meta name="geography" content="<?=geography?>Guacara - Edo. Carabobo VENEZUELA"/>
<meta name="revisit-after" content="<?=revisitAfter?>7 days" />
<meta http-equiv="Pragma" content="cache">
<meta http-equiv="Content-Language" content="<?=contentLanguage?>es">

<style type="text/css">
@import url("../css/admin.css");
@import url("../css/datePicker.css");
@import url("css/estilo.css");

</style>


<script type="text/javascript" src="../js/jquery-1.4.3.min.js"></script>
<script type="text/javascript" src="../js/date.js"></script>
<script type="text/javascript" src="../js/jquery.datePicker.js"></script>


<script type="text/javascript" src="../js/funcionesAdmin.js"></script>
<script type="text/javascript" src="../js/ajax.js"></script>
<script type="text/javascript" src="../js/suggest.js"></script>
</head>
<body >