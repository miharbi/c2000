<?php @include("../fckeditor/fckeditor.php") ; ?>
   <link href="../fckeditor/estilos.css" rel="stylesheet" type="text/css"/>
<div align="center">
<!--<h1>Crear Secciones </h1>-->
<form action="controladores/insertSecciones.php" method="post" name="nuevo" id="nuevo" enctype="multipart/form-data">
  <table border="0" width="100%"><tr><td align="center">
   <fieldset><legend><b>Crear Secciones</b></legend>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
    
      
        <td><b>Tipo de Enlace</b></td>
        <td><input checked="checked" name="enlace" value="padre"   type="radio" onclick='$("#trEnlaceSecun").css("visibility","visible"); document.nuevo.enlaceSecun.options[1].selected=true; $("#trPadreId").css("visibility","hidden"); $("#contenido").css("display","none");' /><b>Principal</b> &nbsp;&nbsp;
            <input name="enlace" value="hijo" type="radio" onclick='$("#trEnlaceSecun").css("visibility","hidden"); $("#trPadreId").css("visibility","visible"); $("#contenido").css("display","block");  document.nuevo.padreId.options[0].selected=true;'  /><b>Secundario </b>
            <input name="enlace" value="libre" type="radio" onclick='$("#trEnlaceSecun").css("visibility","hidden");  $("#contenido").css("display","block"); $("#trPadreId").css("visibility","hidden");'  /><b>Libre </b>
            </td>      
      </tr> 
	  <tr id="trEnlaceSecun" style="background:#969696">
        <td ><b>Tendra enlaces secundarios ?</b></td>
        <td >

        <select name="enlaceSecun" id="enlaceSecun" >
        <option value="0" ></option>
          <option value="1" selected="selected" onclick='$("#contenido").css("display","none");'>SI</option>
          <option value="2" onclick='$("#contenido").css("display","block");'>NO</option>
        </select>  </td>      
      </tr>
       <tr style="visibility:hidden; background:#969696" id="trPadreId">
        <td><b>Enlace Principal :</b></td>
        <td><select name="padreId" id="padreId">
        <option value="0" selected="selected"></option>
        <?php
        $res=mysql_query("SELECT id,titulo,fijo,contenido FROM `contenidos` WHERE padre=0 AND tipo=1 AND fijo='f' AND contenido='' ")or die(mysql_error());
		while ($row = mysql_fetch_assoc($res)) { ?>
           
          <option value="<?=$row['id']?>"><?=$row['titulo']?></option>
          <?php
		}
		  ?>
        </select></td>      
      </tr>
      <tr>
        <td><label for="El Nombre"><b>Nombre del Enlace :</label></td>
        <td><input requerido="Nombre del Enlace" name="nombreEnlace" id="nombreEnlace" value="" style="width:100%"  type="text" /></td> 
      </tr>
      <tr>
        <td><label for="comentarios"><b>Permitir Comentarios :</label></td>
        <td><select name="comentarios" id="comentarios" >
              <option value="1" selected="selected" >SI</option>
              <option value="2" >NO</option>
            </select>
        </td> 
      </tr>
      
    </table>
    </fieldset>
</td>


</tr>
<tr><td align="center">

<!--style="visibility:hidden"-->
<fieldset id="contenido" style="display:none"><legend><strong>Contenido</strong></legend>
<table border="1" cellspacing="0" cellpadding="0" width="100%">
  
  <tr >
    
    <td >
    <?php
                $oFCKeditor = new FCKeditor('contenido') ; // es el id y name del campo de texto
				$oFCKeditor->BasePath = '../fckeditor/'; // ruta al script fckeditor
				//$cuerpo= html_entity_decode($cuerpo); // Para que se muestre como elementos HTML y no como 'codigo HTML'
				$oFCKeditor->Width  = '100%' ; // ancho del formulario
				$oFCKeditor->Height = '400' ; // alto del formulario
				$oFCKeditor->Value  = ''; // '$cuerpo' Contenido del textarea
				$oFCKeditor->Config['AutoDetectLanguage']	= false ;
	            $oFCKeditor->Config['DefaultLanguage']		= 'es' ;
				$oFCKeditor->Create() ; //  se crea el textarea	
    ?>
    </td>
  </tr>
  
</table>
</fieldset>
</td></tr> <tr>
    <td colspan="3">
    <div align="center">
<input type="button" name="Submit" value="Crear" onclick="if(valida()){document.getElementById('nuevo').submit();}">
    </div></td>
  </tr></table>
</form>
<br />
</div>