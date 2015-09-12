<?php

if (!isset($_GET['id']) && !isset($_GET['photoid']) && !isset($_GET['idNew'])) {
    $index = mysql_query('SELECT id, fijo,contenido 
	  						  FROM contenidos 
	  						  WHERE home=1') or die(mysql_error());

    $index = mysql_fetch_assoc($index);

    if ($index['fijo'] == 'v') {
        $homeCentro = $index['contenido'];
    } else {
        $_GET['id'] = $index['id'];
    }
}

     if (isset($_GET['id']) && is_numeric($_GET['id'])) {  // Si es un contenido modificable por el administrador

         $resul = mysql_query('SELECT contenido,titulo, padre,home  
         					  FROM contenidos 
         					  WHERE id='.$_GET['id'].' AND status=1 and tipo=1	') or die(mysql_error());

         $ro = mysql_fetch_assoc($resul);
         if ($ro['padre'] != 0 || is_null($ro['padre'])) {
             $contenido = '';

             if ($ro['home'] != 1) {
                 $contenido .= '<h2>'.$ro['titulo'].'</h2>';
             }

             $contenido .= '<div>'.sustituirCodigo($ro['contenido']).'</div>';
         } else {
             $hijos = 'SELECT id,titulo,tipo
								FROM `contenidos`
								WHERE `padre` ='.$_GET['id'].'  AND status=1 
								ORDER BY orden';

             $hijos = mysql_query($hijos) or die(mysql_error());
             $salidaHijos = '<div class="list-group">';
             $cont = 0;
             while ($hijo = mysql_fetch_assoc($hijos)) {
                 $enlace = 'href="?id='.$hijo['id'].'"';

                 if ($hijo['tipo'] == 5 ) {
                    if (!is_null($hijo['titulo'])) {
                        $salidaHijos .= '<h4>'.($cont == 0 ? '' : '<hr>').$hijo['titulo'].'</h4>';
                    }
                     
                 } else {
                     $salidaHijos .= '<a class="list-group-item" '.$enlace.' >'.$hijo['titulo'].'</a>';
                 }
                 $cont++;
             }
             $salidaHijos .= '</div>';

             $contenido = '<h2>'.$ro['titulo'].'</h2>
							<div class="panel" >'.$salidaHijos.'</div>';
         }

         $titulo = $ro['titulo'];
     } elseif (isset($_GET['id']) && $_GET['id'] != '') { // Si es un contenido fijo

         $homeCentro = $_GET['id'];
     }
      if (!isset($contenido)) {
          include $homeCentro;
      } else {
          echo $contenido;
      }
