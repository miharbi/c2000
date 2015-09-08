<?php session_start();
     include 'includes/funciones.php';
     include 'includes/conexion.php';
     include 'includes/config.php';
     include 'class/class.formularios.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="shortcut icon" href="img/favicon.ico">
<title><?=titulo?></title>
<meta http-equiv="title" content="<?=titulo?>">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta name="robots" content="<?=robots?>"/><!--Indexla la portada nada mas lo de mas no -->
<meta name="author" content="<?=author?>" />
<meta name="distribution" content="<?=distribution?>" /><!--Indica que es de uso interno -->
<meta name="language" content="<?=lenguaje?>"/>
<meta name="copyright" content="<?=description?>"/>
<meta name="description" content="<?=copyright?>"/>
<meta name="publisher" content="<?=publisher?>"/>
<meta http-equiv="keywords" content="<?=publisher?>">
<meta name="city" content="<?=city?>"/>
<meta name="country" content="<?=country?>"/>
<meta name="geography" content="<?=geography?>"/>
<meta name="revisit-after" content="<?=revisitAfter?>" />
<meta http-equiv="Pragma" content="cache">
<meta http-equiv="Content-Language" content="<?=contentLanguage?>">

<style type="text/css">
@import url("css/estilo.css");
@import url("js/AlertBox/alert_box.css");
@import url("js/sortabletable/sortableTable.css");
*,img, div  { behavior: url(img/iepngfix.htc) }


.Estilo1 {color: #000000}
</style>
<script type="text/javascript" src="jwplayer.js" ></script>
<script>jwplayer.key="NYTv9OWxXweJjOICkv5jfz7aQk/gs/DxMYeHrw=="</script>

<!--<script type="text/javascript" src="../js/mootools.js"></script>-->

<!--<script type="text/javascript" src="../js/AlertBox/alert_box.js"></script>-->
<!--<script type="text/javascript" src="../js/calendar.js"></script>-->
<script type="text/javascript" src="../js/funciones.js"></script>
<script type="text/javascript" src="../js/ajax.js"></script>
<script type="text/javascript" src="../js/suggest.js"></script>
<script src="js/DD_roundies.js"></script>
<script>
    DD_roundies.addRule('.contenido', '0px 0px 15px 15px');
	DD_roundies.addRule('.tituloContenido', '15px 15px 0px 0px');   
	DD_roundies.addRule('.tablaEventos', '0px 0px 15px 15px');
	DD_roundies.addRule('.mooECal', '15px 15px 0px 0px');
	DD_roundies.addRule('.thControls', '15px 15px 0px 0px');
	DD_roundies.addRule('.ulControls', '15px 15px 0px 0px');
	
</script>

<!--[if lt IE 7]>
<script defer type="text/javascript" src="js/pngfix.js"></script>
<![endif]-->
</head>
<body onLoad="Cargado();" onFocus="Cargado();" onUnload="Cargando();" onBeforeUnload="Cargando();"  >

<div id="loader_" style="position:absolute; z-index:1000; width: 441px;">
<table width="443" height="200" border="2" cellpadding="5" cellspacing="0" bordercolor="#F97C2A" bgcolor="#FFFFFF" rules="all">
<tr><td align="center" valign="middle" nowrap>
<p>

<img src="img/loader.gif" alt="" align="absmiddle"/><br />

<strong><span class="Estilo1">Espere por favor mientras se carga la p&aacute;gina </span><br>
</strong></p>
</td></tr>
</table>
</div>