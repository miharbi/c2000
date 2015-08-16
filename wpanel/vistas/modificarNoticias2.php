<?php @include("../fckeditor/fckeditor.php") ; ?>
   <link href="../fckeditor/estilos.css" rel="stylesheet" type="text/css"/>
   
<!--<script type="text/javascript" src="../../js/baner/jquery-1.4.3.min.js"></script>-->
<!--<script type="text/javascript">jQuery.noConflict();</script>-->

<!--<script type="text/javascript" src="../../js/funciones.js"></script> -->
<!--<script type="text/javascript" src="../fckeditor/fckeditor.js"></script>-->
<?php

 $id=$_REQUEST['id'];
 $res=mysql_query("SELECT id,titulo,contenido, fecha FROM `contenidos` WHERE id='$id' ")or die(mysql_error());
 $row = mysql_fetch_assoc($res); 
 $contenido=$row['contenido'];
 $titulo=$row['titulo'];
 $fecha=formatoFecha($row['fecha']);
 
 ?>

<h1 align="center">Modificar Noticias</h1>


<form action="controladores/insertNoticias.php?modificar=1" method="post" name="nuevo" id="nuevo" enctype="multipart/form-data">

<input type="hidden" id="id" value="<?=$id?>"  name="id"/>
<fieldset id="contenido" ><legend><strong>Contenido</strong></legend>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
    <td width="98" class="etiquetasForm" ><b>Titulo:</b></td>
 <!--   requerido="Titulo"-->
 <script type="text/javascript" charset="utf-8">
            $(function()
            {
				$('.date-pick').datePicker({autoFocusNextInput: true, startDate: '01/01/1980'});
            });
		</script>
		
    <td ><input name="fecha" type="text" id="fecha" requerido="Fecha" size="10" value="<?=$fecha?>" readonly="readonly" class="date-pick"><p></p></td>
  </tr>
  <tr>
    <td width="82" class="etiquetasForm" >Titulo:</td>

    <td ><input name="titulo" requerido=" label" type="text" id="titulo" value="<?=$titulo?>" size="100"><p></p></td>
  </tr>
  <tr>
    <td  class="etiquetasForm"><p>Contenido:</p>      </td>
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
    <td width="861">
     
   
      </td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3">
    <div align="center">
<input style="cursor:pointer" type="button" name="Submit" value="Modificar" onclick="if(valida()){document.getElementById('nuevo').submit();}">
    </div></td>
  </tr>

</table>
</fieldset>

</form>


