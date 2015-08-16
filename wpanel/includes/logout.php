<?php
       session_start();
	   $_SESSION['wspanel_user']=""; 
	   unset($_SESSION['wspanel_user']);
	   
	   if ($_GET['home']==1 && isset($_GET['home'])){
	       echo "<META HTTP-EQUIV=\"refresh\" content=\"0; URL=../../index.php\">";
	   }	
	   
	   if ($_GET['home']=='' && empty($_GET['home'])){
	       echo "<META HTTP-EQUIV=\"refresh\" content=\"0; URL=../index.php\">";
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