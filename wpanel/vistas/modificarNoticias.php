<?php @include '../fckeditor/fckeditor.php'; ?>
   <link href="../fckeditor/estilos.css" rel="stylesheet" type="text/css"/>
<div align="center">
<h1 align="center"></h1>


<table border="0" width="70%"><tr><td align="center">
 <fieldset><legend> Modificar Noticias </legend>
 <br />
<table border="0">
   <tr align="center" style="background:#FFF; color:#006"><td width="80%"><b>Titulo</b></td><td 10%><b>Modificar</b></td><td><b>Eliminar</b></td></tr>
  
<?php
  $res = mysql_query('SELECT id,titulo FROM `contenidos` WHERE tipo=2 ORDER BY id ASC') or die(mysql_error());
  while ($row = mysql_fetch_assoc($res)) {
      ?>
		<tr bordercolorlight="#0066CC">
           <td><b><?=$row['titulo']?></b></td>
           <td align="center"><a href="index.php?url=vistas/modificarNoticias2.php&id=<?=$row['id']?>"><img src="../img/edit.png" alt="Modificar" title="Modificar" border="none" width="16px" height="16px" /></a> 
           </td>
           <td align="center"> <a href="vistas/eliminarSeccion.php?id=<?=$row['id']?>&noti=1" onclick='if(!confirm("Esta seguro de eliminar esta Noticia ?")){return false;}'><img src="../img/drop.png" alt="Eliminar" title="Eliminar" border="none" width="16px" height="16px" /></a>
           </td>
		</tr>	
<?php 
  } ?>
   
</table>
</fieldset></td></tr></table>
</div>