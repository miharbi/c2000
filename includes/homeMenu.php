<table width="100%" border="0" cellpadding="0" cellspacing="0" > 
 <tr><td  width="210" class="menu_izq2" ><form action="?id=includes/busqueda.php" method="post" style="margin:0; padding:0;"><input placeholder="Buscar..." name="dato" style="width:90%; height:18px; border:0; background-position:2px; background-image:url(img/search.png); background-repeat:no-repeat; padding-left:17px;" type="text" /></form></td></tr>      
<?php

    $res = mysql_query('SELECT id,titulo,fijo,contenido, home FROM `contenidos` WHERE tipo=1 AND (padre=0 OR padre=55) AND status=1 ORDER BY home DESC, orden ASC') or die(mysql_error());
      $contador = 0;
      $_PADRE = false;
      $menu = '';
      while ($row = mysql_fetch_assoc($res)) {
          if ($row['fijo'] == 'v') {
              $enlace = $row['contenido'];
          } else {
              $enlace = $row['id'];
          }  // Si es un enlace fijo o no
         if (isset($_GET['id']) && $row['id'] == $_GET['id']) {
             $_PADRE = true;
         }

          $menu .= '<tr>
	     			<td  width="210" class="menu_izq2" >&nbsp;<img src="img/flecha.png" height="10" width="7">
	     				&nbsp;&nbsp;<a href="?id='.$enlace.'">'.($row['home'] == 1 ? 'Inicio' : $row['titulo']).'</a>
	     			</td>
	     		</tr>';
      }

   print $menu;
   ?>  
</table>
