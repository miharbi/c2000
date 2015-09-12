<?php 

     if (isset($_GET['idNew'])) {
         include 'includes/mostrarNoticia.php';
     } else {
         $titulo = 'Noticias';
         ?>

<h2>Noticias</h2>
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
     
    <table class="table table-striped">
      <tr>
        <td width="19%"  >
        <?php if ($src != '') { ?>
        <a  href="?id=includes/homeNoticias.php&idNew=<?=$row['id']?>"><img src="includes/imagen.php?tipo=3&img=../<?=$src?>&ancho=120" width="120px" class="thumbnail" title="Leer m&aacute;s" border="0" /></a>
        <?php } else { ?>
         <a  href="?id=includes/homeNoticias.php&idNew=<?=$row['id']?>"><img src="img/new.png" width="120px" class="thumbnail" title="Ver m&aacute;s" border="0"  /></a>
        <?php } ?>
        </td>
        <td width="81%"  >
          <h3>
            <a href="?id=includes/homeNoticias.php&idNew=<?=$row['id']?>"  > <?= ucfirst($titulo) ?> </a>
          </h3> 
          <h4>
            <small><?=$ff?></small>
          </h4>
          <blockquote>
            <p><small><?=corta_cadena($contenido, 350)?>...</small></p>
          </blockquote>  
          <a href="?id=includes/homeNoticias.php&idNew=<?=$row['id']?>" class="pull-right" >
            <small >Leer M&aacute;s</small>
          </a>
        </td>
      </tr>  
    </table>
    <?php  } ?>
    <?=$_pagi_navegacion?> 
   
<?php 
     }
$titulo = 'Noticias';
?>