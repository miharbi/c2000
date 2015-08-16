<?php
  session_start();
  if ($_SESSION['wspanel_user']['nombre']==''){ 
	echo "<META HTTP-EQUIV=\"refresh\" content=\"0; URL=form_login.php\">";
	die();
  }
?>
