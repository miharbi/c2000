<?php
// Para mostrar la ventana de bienvenida
$result= mysql_query("SELECT contenido FROM contenidos WHERE tipo=3")or die(mysql_error());
if ((mysql_num_rows($result) != 0) and (!isset($_SESSION['primeraVez']))){
   $row = mysql_fetch_assoc($result); ?>
   <a class='example8' href="#" ></a>
   <div style='display:none'>
	  <div id='ventana' style="color:#000" align="center">
         <table border="0"><tr><td>
	     <?=$row['contenido']?>
         </td></tr></table>
	  </div>
   </div>  
<?php } 
$_SESSION['primeraVez'] = 1;  // para que la venta de bienvenida se muestre una sola vez
//unset($_SESSION['primeraVez']);
?>