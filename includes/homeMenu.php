  <?php
      $res = mysql_query('SELECT id,titulo,fijo,contenido, home 
                          FROM `contenidos` 
                          WHERE tipo=1 AND (padre=0 OR padre=55) AND status=1 
                          ORDER BY home DESC, orden ASC') or die(mysql_error());
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
          if (isset($top_nav)) {
            $menu .= '<li>';
          }

          $menu .= '<a class="'.(!isset($top_nav)? 'list-group-item' : 'visible-xs').'  " style="font-size: initial;" role="button" href="?id='.$enlace.'">'.($row['home'] == 1 ? 'Inicio' : $row['titulo']).'</a>';

          if (isset($top_nav)) {
            $menu .= '</li>';
          }
      }
      if (!isset($top_nav)) {
        print '<div class="list-group '.(!isset($top_nav)? 'hidden-xs':'').'"  >';
      }
   
      print $menu;

      if (!isset($top_nav)) {
        print '</div>';
      }else{
        unset($top_nav);
      }
?>  
