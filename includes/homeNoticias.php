<?php 

     if (isset($_GET['idNew'])) {
         include 'includes/mostrarNoticia.php';
     } else {
         $titulo = 'Noticias';
         ?>
<!--<div id="popul" ></div>-->
<table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td class="subNoticias2">Noticias</td>
  </tr>
  <tr>
    <td height="10"></td>
  </tr>
  <tr>
    <td>

    <?php
    $_pagi_cuantos = 5;  // Maxima cantidad de noticias por pagina
  $limite = isset($limite) ? $limite : '';
         $_pagi_sql = "SELECT id,titulo,contenido,DATE_FORMAT(fecha,'%w %e %m %Y') AS fech 
              FROM `contenidos` WHERE tipo=2 ORDER BY fecha DESC $limite";
         include 'includes/paginator.inc.php';

         $dias = ['Domingo','Lunes','Martes','Mi&eacute;rcoles','Jueves','Viernes','S&aacute;bado'];
         while ($row = mysql_fetch_assoc($_pagi_result)) {
             $f = explode(' ', $row['fech']);  // dar formato a la fecha (Lunes, 1 Febrero 2011)
         $m = mes($f[2]);
             $d = $f[0];
             $d = $dias[$d];
             $ff = $d.', '.$f[1].' '.$m.' '.$f[3];
             $titulo = renombrar($row['titulo']); // Por los acentos

         $contenido = $row['contenido'];

             preg_match_all('/<img[^>]+>/i', $contenido, $result3); // Se obtienen todas las imagenes en una matriz

$cant = count($result3, COUNT_RECURSIVE); // Cantidad de imagenes+1

  $src = '';

             $imagen_1 = isset($result3[0][0]) ? $result3[0][0] : '';
             preg_match_all('/(alt|title|src)=("[^"]*")/i', $imagen_1, $r); // Se obtiene el valor del src de la imagen= $r[2][0]

    foreach ($r[0] as $val) {
        if (strpos(' '.strtolower($val), 'src')) {
            $src = str_replace(['"',"'",'src','='], '', $val);
        }
    }

             $contenido = strip_tags($contenido); // Elimitar etiquetas HTML
    ?>
     
    <table width="100%" border="0" style="border-bottom:1px dashed #051826; padding-bottom:20px; padding-top:20px">
      <tr>
        <td width="19%" rowspan="4" valign="top">
  <?php if ($src != '') {
    ?>
        <a  href="?id=includes/homeNoticias.php&idNew=<?=$row['id']?>"><img src="includes/imagen.php?tipo=3&img=../<?=$src?>&ancho=120" width="120px" style="cursor: pointer; border: 1px solid rgb(5, 24, 38);" title="Leer m&aacute;s" border="0" onclick="verNoticia();"/></a>
  <?php 
} else {
    ?>
         <a  href="?id=includes/homeNoticias.php&idNew=<?=$row['id']?>"><img src="img/new.png" width="80px" style="cursor: pointer; border: 1px solid rgb(5, 24, 38);" title="Ver m&aacute;s" border="0" onclick="verNoticia();" /></a>
  <?php

}
             ?>
        
        </td>
        <td width="81%" class="subNoticias" ><a   href="?id=includes/homeNoticias.php&idNew=<?=$row['id']?>"  ><?=$titulo?></a></td>
      </tr>
      <tr>
        <td style="font-size:11px; color:#666; text-align: left;"><?=$ff?><!--Lunes, 24 Enero 2011--></td>
      </tr>
      <tr>
        <td style=   >
		 <div style=" width:100%;text-align:justify;">
		     <?=corta_cadena($contenido, 350)?>
         </div>
        </td>
      </tr>
      <tr>
        <td style="font-size:12px; color:#FFF; text-align: right;"><a href="?id=includes/homeNoticias.php&idNew=<?=$row['id']?>" title="" onclick="verNoticia();" ><small style="color:#3B5998; cursor:pointer"><b>Leer M&aacute;s</b></small></a></td>
      </tr>
    </table>
    <?php 
         }
         ?>
    
    </td>
  </tr>
  <tr><td >
          <?=$_pagi_navegacion?>  <br />&nbsp;
   
      
  </td>
  </tr>
</table>
<?php 
     }
$titulo = 'Noticias';
?>