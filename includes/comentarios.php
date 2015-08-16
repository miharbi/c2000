<?php 
error_reporting( E_ALL );
require_once('recaptchalib.php');

// Get a key from https://www.google.com/recaptcha/admin/create
$publickey = "6LfCJvYSAAAAAFgp99HyznxUwhBYwnNRzk0Glm3p";
$privatekey = "6LfCJvYSAAAAAH4tfDcbYW4IOUShTqFNaXHtFE1z";

# the response from reCAPTCHA
$resp = null;
# the error code from reCAPTCHA, if any
$error = null;

# was there a reCAPTCHA response?
if (isset($_POST["recaptcha_response_field"])) {
        $resp = recaptcha_check_answer ($privatekey,
                                        $_SERVER["REMOTE_ADDR"],
                                        $_POST["recaptcha_challenge_field"],
                                        $_POST["recaptcha_response_field"]);

}





if(isset($_GET[deleteComent])){
	
	//include ('config.php');
	//include ('conexion.php');	 
	//include ('funciones.php');
	
	quitar_inyect();
	
	mysql_query("DELETE FROM `comentarios` WHERE `id` = $_GET[deleteComent];")or die(mysql_error());
				
	
}
function isEmail($email)
	{
		$pattern = "/^([a-zA-Z0-9])+([\.a-zA-Z0-9_-])*@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-]+)+/";

		if (preg_match($pattern, $email))
		{
			return true;
		} else {
			return false;
		}
	}
	
	
if(isset($resp->is_valid)&&!$resp->is_valid)@header("Location:".$_SERVER['HTTP_REFERER']."&captchaError=1");	

if(isset($_GET[newComent])&&isset($_POST['nombre'])&&isset($_POST['correo'])&&isset($_POST['comentario'])&&isset($_POST['id'])&&$resp->is_valid){

	if(!isEmail($_POST['correo'])){
	
		
		
		echo "<script>alert('Ingrese un Email valido!');</script>";	
		echo '<meta HTTP-EQUIV="REFRESH" content="0; url='.$_SERVER['HTTP_REFERER'].'">';
		
		
		die();
	}
	
	include ('config.php');
	include ('conexion.php');	 
	include ('funciones.php');
	
	quitar_inyect();
	
	if($_POST[idNew]!=''){
		 	$_POST['id']='includes/homeNoticias.php';
			$get='&idNew='.$_POST[idNew];
			$idNew= $_POST[idNew];
	}elseif($_POST[photoid]!=''){
		 	$_POST['id']=$_POST[photoid];
		 	$get='&photoid='.$_POST['id'].'&albumid='.$_POST[albumid];
	}
	
	
	mysql_query("INSERT INTO `comentarios` (
				id_contenido,
				`nombre` ,
				`email` ,
				`comentario` ,
				`ip`
				)
				VALUES('".($idNew!=''?$idNew:$_POST['id'])."','".$_POST['nombre']."', '".$_POST['correo']."', '".$_POST['comentario']."', '".getIP()."');")or die(mysql_error());
	 
	 $idComent=mysql_insert_id();
	 $res=mysql_query("SELECT email FROM contacto LIMIT 1")or die(mysql_error());  
	 $fila=mysql_fetch_assoc($res);
	 $destino=$fila["email"];
	 	include ('../class/class.phpmailer.php');
	     $mail = new phpmailer();  // ***************************************************************
		 $mail->PluginDir = "../class/"; #ruta de la clase smtp
		 $mail->Mailer    = "smtp";
		 $mail->Host      = "localhost";
		 $mail->SMTPAuth  = false; //true
		
		 $mail->From      = $destino;   // $mail->From      = destino['email'];
		 //$mail->FromName  = "[Comentario] - ";
		 $mail->Timeout   = 30;
		 $mail->AddAddress($destino); // 
		 $mail->Subject   = "Comentario en cumbres2000.com";
		 $mail->IsHTML(true); //true
		 $id=isset($_GET[photoid])?$_GET[photoid]:$_GET[id];
		 $get='';
		 
		 if($_POST[albumid]!=''&&$_POST[photoid]!=''){
		 	$_POST['id']='includes/galeria.php';
			$get='&albumid='.$_POST[albumid].'&photoid='.$_POST[photoid];
		 }
		 
		 
		 
		 
		 $mail->Body      = "Contenido: ".DOMINIO."?id=".$_POST['id'].$get.($_POST['idNew']!=''?'&idNew='.$_POST['idNew']:'')."<br>
		 					 Nombre: ".$_POST['nombre']." <br>
							 Email: ".$_POST['correo']." <br>
							 Mensaje:".$_POST['comentario']."<br><br>
							 Eliminar Mensaje: ".DOMINIO."?id=".$_POST['id']."&deleteComent=".$idComent.$get.($_POST['idNew']!=''?'&idNew='.$_POST['idNew']:'');
							 
		 //echo "OK";
		 if ($mail->Send()){
		    //mail("$destino", "Comentario desde ".proyecto, $msgbox, "From: ".proyecto." <$destino>")
		    
		 }
	
	@header("Location:".$_SERVER['HTTP_REFERER']);
				
				
				
	
}elseif((is_numeric($_GET[id]) || isset($_GET[photoid])|| isset($_GET[idNew]))&&!$_PADRE){ 
	
	
	$id=(''!=$_GET[photoid])?$_GET[photoid]:((''!=$_GET[idNew])?$_GET[idNew]:$_GET[id]);
	
	//echo $id.' '.$_GET[photoid];
	
	$activo=true;
	
	if(!isset($_GET[photoid]) && !isset($_GET[idNew])){
		
		$sqlValida="SELECT id
					FROM `contenidos`
					WHERE `id` ='$id' AND `comentarios` =1";
								
		$activos=mysql_query($sqlValida);
		
		$_num=mysql_num_rows($activos);	
						
		if($_num==0)	$activo=false;			
							
	}
	
	if($activo){
	
?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
 <tr>
    <td valign="middle">
<table width="400" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><div class="fb-share-button" data-type="button_count"></div></td>
    <td><a href="https://twitter.com/share" class="twitter-share-button" data-lang="es">Twittear</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
</td>
    <td><div class="g-plusone" data-size="medium"></div>
<script type="text/javascript">
  window.___gcfg = {lang: 'es'};

  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/platform.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script> </td>
  </tr>
</table>


</td>


  </tr>
<tr>
    <td>
<?php
	$comentarios="SELECT nombre , comentario , fecha, ip
					FROM `comentarios`
					WHERE `id_contenido` ='$id' 
					ORDER BY fecha";
	$comentarios=mysql_query($comentarios)or die(mysql_error());
	$contComent=mysql_num_rows($comentarios);
	$comentariosMostrados=4;
	if($contComent!=0)echo "<h3>Comentarios</h3>";
	if($contComent>$comentariosMostrados)echo "<span onClick='$(\".comentario\").fadeIn();$(this).fadeOut();' style=' cursor:pointer;'><img src='img/dialog.png' style='border:0;'>Ver $contComent los comentarios</span>";
	$cont=$contComent;
	while($comentario=mysql_fetch_assoc($comentarios)){				
?>


  <div class="comentario"  style=" cursor:pointer;display:<?=($cont<=$comentariosMostrados)?'':'none'?>"><h4><?=ucwords(strtolower($comentario[nombre]))?></h4><span><?=$comentario[fecha].'<br>'.$comentario[ip]?></span><p><?=$comentario[comentario]?></p></div>

<?php
$cont--; 
	}
?>
</td>
  </tr>
</table>

 <script type="text/javascript">
 var RecaptchaOptions = {
    theme : 'clean'
 };
 <?=$_GET['captchaError']==1? "alert('Captcha Inválido, No se publicó su comentario.');":"";?>
 </script>

<form action="includes/comentarios.php?newComent=1" name="comentariosForm" id="comentariosForm" method="post" >
	<input name="id" type="hidden" value="<?=$id?>">
	<input name="albumid" type="hidden" value="<?=$_GET['albumid']?>">
	<input name="photoid" type="hidden" value="<?=$_GET['photoid']?>">
	<input name="idNew" type="hidden" value="<?=$_GET['idNew']?>" value="1">


	<table width="100%" border="0" cellspacing="2" cellpadding="0">
	  <tr>
	    <td colspan="2"><h3>Deja un comentario</h3>
	    <!--<span style="font-size:9px;">
	       Tu dirección de correo electrónico no será publicada. Los campos necesarios están marcados *
	    </span>--></td>
	  </tr>
	  <tr>
	    <td width="20%"><label for="author">Nombre</label></td>
	    <td width="80%"><input name="nombre" type="text" class="inputNormal" id="nombre" size="30" requerido="Nombre"></td>
	  </tr>
	  <tr>
	    <td><label for="email" >Correo electrónico</label></td>
	    <td><input name="correo" type="text" class="inputNormal" value="" id="correo" size="30" requerido="Email"></td>
	  </tr>
	  <tr>
	    <td><label for="comentario">Comentario</label></td>
	    <td><textarea name="comentario" class="inputNormal" id="comentario" cols="70" rows="5" requerido="Comentario"></textarea></td>
	  </tr>
	  
	  <tr>
	    <td></td>	
	    <td ><?php echo recaptcha_get_html($publickey, $error); ?></td>
	  </tr>
	  
	  
	  <tr>
	  	<td><input type="button" name="enviar" id="enviar" value="Publicar Comentario" onClick=" if(valida())$('#comentariosForm').submit(); ">	   </td>
	  </tr>
	</table>
</form>

	
<?php
	}
}
?>