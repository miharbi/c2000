<?php	
$res = mysql_query('SELECT id,direccion, telefono, email, contrasena, extra FROM `contacto` ') or die(mysql_error());
$row = mysql_fetch_assoc($res);
?>

			
<div align="center">
<h1></h1>
<form id='contacto' name='contacto' method='post' action='controladores/updateContacto.php'>
                            
 <table border="0" width="70%"><tr><td align="center">
 <fieldset><legend> Contacto </legend>                           
				<table border="0" >
<tr><td class='etiquetas' ><b>Direccion:</b> </td><td   ><textarea name='direccion' cols='50' id='primero' rows='6' onKeyPress='return val_caracter(event)' 0><?=$row['direccion']?></textarea></td></tr>
 
<tr><td class='etiquetas' ><b>Telefono:</b> </td><td   ><textarea name='telefono' cols='50' id='telefono' rows='2' onKeyPress='return val_caracter(event)' 0><?=$row['telefono']?></textarea></td></tr>
 
<tr><td class='etiquetas' ><b>Email:</b> </td><td   ><textarea name='email' cols='50' id='email' rows='6' onKeyPress='return val_caracter(event)' 0><?=$row['email']?></textarea></td></tr>
 

<tr><td class='etiquetas' ><b>Contrase&ntilde;a:</b> </td><td   ><textarea name='contrasena' cols='50' id='contrasena' rows='3' onKeyPress='return val_caracter(event)' 0><?=$row['contrasena']?></textarea></td></tr>
 
<tr><td class='etiquetas' ><b>Extra:</b> </td><td   ><textarea name='extra' cols='50' id='extra' rows='6' onKeyPress='return val_caracter(event)' 0><?=$row['extra']?></textarea></td></tr>
 
<tr><td>&nbsp;</td>
					<td align="center"> <input type='button' class='boton' name='atras' id='atras' value='Atras' onclick='history.back();' />&nbsp;&nbsp;<input type='submit' class='boton' name='Modificar' id='modificar' value='modificar'/></td>
				</tr>
				</table> 
                </fieldset></td></tr></table>
                </form>
</div>    <br />            