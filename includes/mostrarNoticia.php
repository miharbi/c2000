<?php  
	$id=$_GET['idNew'];

	$result=mysql_query("SELECT contenido,titulo,DATE_FORMAT(fecha,'%w %e %m %Y') AS fech FROM `contenidos` WHERE id='$id' ")or die(mysql_error());
	//$resultados=mysql_num_rows($result2);
    $row=mysql_fetch_assoc($result);
	$dias = array("Domingo","Lunes","Martes","Mi&eacute;rcoles","Jueves","Viernes","S&aacute;bado");
	 
	$f=explode(" ",$row['fech']);  // dar formato a la fecha (Lunes, 1 Febrero 2011)
	$m=mes($f[2]);
	$d=$f[0];
	$d=$dias[$d];
	$ff=$d.', '.$f[1].' '.$m.' '.$f[3];
	$titulo=renombrar($row['titulo']); // Por los acentos
	
	$contenido=$row['contenido'];
?>
    <div >
	<table width="100%" border="0" >   

    <tr><td style="font-family:Verdana, Arial, Helvetica, sans-serif; font-weight: bold; padding-top:10px"> 	 
    <?=ucfirst($titulo);?>
    </td></tr>
    <tr><td align="left" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px; color:#666"><?=$ff?></td></tr>
    <tr><td style="font-family:Verdana, Arial, Helvetica, sans-serif;">
    <?=$contenido;?>
    </td></tr></table>
    </div>

   