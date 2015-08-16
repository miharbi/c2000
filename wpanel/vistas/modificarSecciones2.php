<?php @include("../fckeditor/fckeditor.php") ; 
  
if(isset($_GET['id'])){ 
  $id=$_GET['id'];
  /*echo"-- Variables GET --<br />";
  foreach($_GET as $indice => $valor){
	 echo"$indice: $valor<br />";
  }*/

  $res=mysql_query("SELECT id,titulo,orden,padre,fijo,contenido, comentarios FROM `contenidos` WHERE id='$id' ")or die(mysql_error());
  
  $res2=mysql_query("SELECT id FROM `contenidos` WHERE padre='$id' ")or die(mysql_error());

if(mysql_num_rows($res2) == 0){$hijos='0';}else{$hijos='1';}

  $row = mysql_fetch_assoc($res) 
     //$row['titulo'];
?>
   <link href="../fckeditor/estilos.css" rel="stylesheet" type="text/css"/>

<h1>Modificar Secciones</h1>
<form action="controladores/updateSecciones.php" method="post" name="nuevo" id="nuevo" enctype="multipart/form-data">
  <table border="0" width="100%"><tr><td>
  <fieldset>

<legend><strong>Configuraci&oacute;n</strong></legend>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td><label for="comentarios"><b>Permitir Comentarios :</label></td>
        <td><select name="comentarios" id="comentarios" >
              <option value="1" <?=$row['comentarios']=='1' || $row['comentarios']=='' ?'selected="selected"':''?>>SI</option>
              <option value="2" <?=$row['comentarios']=='2'?'selected="selected"':''?>>NO</option>
            </select>
        </td> 
      </tr>
      <tr>
        <td><label for="El Nombre"><b>Nombre del Enlace :</b></label></td>
        <td><input requerido="Nombre del Enlace" name="nombreEnlace" id="nombreEnlace" value="<?=$row['titulo']?>" style="width:100%"  type="text" /></td> 
      </tr>
      
    </table>
    </fieldset>
</td>

</tr>
<tr><td align="center">
<?php 
  if($row['contenido'] != ''){  ?>
<!--style="visibility:hidden"-->
<fieldset id="contenido"  ><legend><strong>Contenido</strong></legend>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  
  <tr >
    <td  class="etiquetasForm">      </td>
    <td colspan="2">
    <?php
                $oFCKeditor = new FCKeditor('contenido') ; // es el id y name del campo de texto
				$oFCKeditor->BasePath = '../fckeditor/'; // ruta al script fckeditor
				//$cuerpo= html_entity_decode($cuerpo); // Para que se muestre como elementos HTML y no como 'codigo HTML'
				$oFCKeditor->Width  = '100%' ; // ancho del formulario
				$oFCKeditor->Height = '400' ; // alto del formulario
				$oFCKeditor->Value  = $row['contenido']; // '$cuerpo' Contenido del textarea
				$oFCKeditor->Config['AutoDetectLanguage']	= false ;
	            $oFCKeditor->Config['DefaultLanguage']		= 'es' ;
				$oFCKeditor->Create() ; //  se crea el textarea	
    ?>
    </td>
  </tr> 
</table>
</fieldset>
<?php }  ?>
</td></tr> <tr>
    <td colspan="3">
    <div align="center">
<input type="button" name="Submit" value="Guardar" onclick="if(valida()){document.getElementById('nuevo').submit();}">
<input id="id" name="id" value="<?=$id?>" type="hidden" />
    </div></td>
  </tr></table>
</form>
<?php }  ?>