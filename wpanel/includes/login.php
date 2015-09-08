<?php
      session_start();
       include '../../includes/config.php';
      include '../../includes/conexion.php';
      include '../../includes/funciones.php';

      $query = mysql_query("SELECT * FROM usuarios WHERE login = '".md5(strtolower($_REQUEST['user']))."' AND password = '".md5(strtolower($_REQUEST['clave']))."'") or die(mysql_error());
      if (mysql_num_rows($query) != 0) {
          $array = mysql_fetch_assoc($query);
          $_SESSION['wspanel_user']['nombre'] = $array['nombre'];
          echo '<META HTTP-EQUIV="refresh" content="0; URL=../index.php">';
      } else {
          if (mysql_num_rows($query) == 0) {
              echo '<META HTTP-EQUIV="refresh" content="0; URL=../form_login.php?msj=no">';
          }
      }
?>
<!-- 
      + --------------------------------------------------------------- +
	  |                                                                 |	  
	  |  Desarrollado por: Gustavo A. Ocanto C.                         |
	  |  Teléfono: 0414-4284230                                         |
	  |  Email: gustavoocanto@gmail.com - gustavo.ocanto@hotmail.com    |
	  |                                                                 |
	  + --------------------------------------------------------------- + 
-->