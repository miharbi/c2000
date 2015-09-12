<?php 
$dato = $_POST['dato'];
?>

<h3>Busqueda: Resultados encontrados</h3>
<ul class="list-group">
    <?php
    $_pagi_cuantos = 10;  // Maxima cantidad de noticias por pagina
    $_pagi_sql = "SELECT id,titulo,contenido, tipo FROM `contenidos` WHERE fijo='f' AND ((titulo like '%$dato%') OR (contenido like '%$dato%')) ORDER BY id DESC ";
    include 'includes/paginator.inc.php';

if (mysql_num_rows($_pagi_result) != 0) {
    while ($row = mysql_fetch_assoc($_pagi_result)) {
        $contenido = $row['contenido'];

        preg_match_all('/<img[^>]+>/i', $contenido, $result3); // Se obtienen todas las imagenes en una matriz

      $cant = count($result3, COUNT_RECURSIVE); // Cantidad de imagenes+1

      $i = 1;
      $src = '';
      while ($cant > $i) {
          $imagen_1 = $result3[0][$i - 1];
          $contenido = str_replace($imagen_1, ' ', $contenido); // Elimina todas las imagenes
          $i++;
      }
        if ($src != '') {
            $src = trim($src, '"');//Eliminar comillas al inicio y final
            $s = explode('/', $src);
            $c = count($s);
            $src = $s[$c - 2].'/'.$s[$c - 1]; // Tomo los dos ultimos elementos del array
        }
        $contenido = strip_tags($contenido); // Elimitar etiquetas HTML
    ?>
    <li class="list-group-item">
      <h4>
        <a href="?id=<?=($row['tipo'] == 2 ? 'includes/homeNoticias.php&idNew=' : '').$row['id']?>" >
         <?=$row['titulo']?>
        </a>
      </h4>   
      <p><?=corta_cadena($contenido, 350)?></p>

    </li>  
<?php } ?>
</ul>
<?php  } else {
    ?>
	<div align="center">No hay resultados para su b&uacute;squeda</div>
<?php	} ?>     
<?=$_pagi_navegacion?>
