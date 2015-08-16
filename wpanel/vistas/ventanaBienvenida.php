<?php @include("../fckeditor/fckeditor.php") ; ?>
   <link href="../fckeditor/estilos.css" rel="stylesheet" type="text/css"/>
   
<?php
 $id=$_REQUEST['id'];
 $res=mysql_query("SELECT id,titulo,contenido FROM `contenidos` WHERE tipo=3 ")or die(mysql_error());

 $id='';
 $titulo='';
 $contenido='';
	 
 if($row=mysql_fetch_assoc($res)){ 
	 $id       =$row['id'];
	 $titulo   =$row['titulo'];
	 $contenido=$row['contenido'];
 }

 
 ?>

<h1 align="center">Ventana Bienvenida</h1>
<h3 align="center">Medidas m&aacute;ximas recomendadas para la imagen a guardar :400 x 376 px </h3>
<form action="controladores/insertVentanaBienvenida.php?id=<?=$id?>" method="post" name="nuevo" id="nuevo" enctype="multipart/form-data">
<?php if($id != ''){  ?>
<fieldset id="contenido" ><legend><strong><b>Eliminar</b></strong></legend>
<table border="0" width="200px">
  <tr>
    <td width="90%">Ventana de Bienvenida</td>
    <td align="center">
        <a href="vistas/eliminarVentanaBienvenida.php?id=<?=$id?>" onclick='if(!confirm("Esta seguro de eliminar La Ventana de Bienvenida ?")){return false;}'><img src="../img/drop.png" alt="Eliminar" title="Eliminar" border="none" width="16px" height="16px" /></a>
    </td>
  </tr>
</table>
</fieldset>
<?php } ?>
<br />
<input type="hidden" id="id" value="<?=$id?>"  name="id"/>
<fieldset id="contenido" ><legend><b>Ingresar o Modificar</b></legend>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="83" class="etiquetasForm" ><!--Titulo:--></td>
    <td ><!--<input name="titulo" requerido=" label" type="text" id="titulo" value="" size="100"><p></p>--></td>
  </tr>
  <tr>
    <td  class="etiquetasForm"><p><b>Contenido:</b></p>      </td>
    <td colspan="2">
    <?php
                $oFCKeditor = new FCKeditor('contenido') ; // es el id y name del campo de texto
				$oFCKeditor->BasePath = '../fckeditor/'; // ruta al script fckeditor
				//$contenido= html_entity_decode($contenido); // Para que se muestre como elementos HTML y no como 'codigo HTML'
				$oFCKeditor->Width  = '100%' ; // ancho del formulario
				$oFCKeditor->Height = '400' ; // alto del formulario
				$oFCKeditor->Value  = $contenido; // '$cuerpo' Contenido del textarea
				$oFCKeditor->Config['AutoDetectLanguage']	= false ;
	            $oFCKeditor->Config['DefaultLanguage']		= 'es' ;
				$oFCKeditor->Create() ; //  se crea el textarea	
    ?>
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td width="860">
     
   
      </td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3">
    <div align="center">
<input style="cursor: pointer"  type="button" name="Submit" value="Guardar" onclick="if(valida()){document.getElementById('nuevo').submit();}">
    </div></td>
  </tr>
</table>
</fieldset>
</form>


