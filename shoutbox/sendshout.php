<?php

function getIP(){
    if( isset( $_SERVER['HTTP_X_FORWARDED_FOR'] )) $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if( isset( $_SERVER ['HTTP_VIA'] ))  $ip = $_SERVER['HTTP_VIA'];
    else if( isset( $_SERVER ['REMOTE_ADDR'] ))  $ip = $_SERVER['REMOTE_ADDR'];
    else $ip = null ;
    return $ip;
}
function sendshout() {

$name = substr(htmlspecialchars(strip_tags($_GET['name'])),0,15);
$m = substr(htmlspecialchars(strip_tags($_GET['message'])),0,500);
$m =str_replace(array("\n","\r","\n\r"), ' ', $m);


	if($name=='' or $m=='' or $name=='Nombre' or $m=='Introduzca Mensaje')
		{
			$message = "<span class='chatboxError'>Nombre y Mensaje son requeridos *</span>";
			return $message;
			die;
		}

$file = "shouts.txt";
/*
function cutline($filename,$line_no=-1) {

	$strip_return=FALSE;
	
	$data=file($filename);
	$pipe=fopen($filename,'w');
	$size=count($data);
	
	if($line_no==-1) $skip=$size-1;
	else $skip=$line_no-1;
	
	for($line=0;$line<$size;$line++)
	if($line!=$skip)
	fputs($pipe,$data[$line]);
	else
	$strip_return=TRUE;
	
	return $strip_return;
}

$i = 1;
while($i<5)
	{
		//cutline($file,1);
		$i++;
	}
*/	

//write the new shout
$fh = fopen($file, 'a') or die("Could not write to file.");
$info=date("d/m/Y H:i ")."IP:".getIP();
$shout = '
<tr>
	<td><span class="chatboxNombre">'.$name.': </span><span class="chatboxMensaje">'.$m.'</span><br><span class="chatboxInfo">'.$info.'</span></td>
</tr>';
fwrite($fh, $shout);
fclose($fh);

//message on success
$message = "";
return $message;
}

//perform the function =)
echo sendshout();
?>