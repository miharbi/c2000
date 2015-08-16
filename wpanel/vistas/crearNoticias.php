<?php @include("../fckeditor/fckeditor.php") ; ?>
   <link href="../fckeditor/estilos.css" rel="stylesheet" type="text/css"/>

<h1 align="center">Crear  Noticias</h1>
<form action="controladores/insertNoticias.php" method="post" name="nuevo" id="nuevo" enctype="multipart/form-data">

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
		
    <td ><input name="fecha" type="text" id="fecha" requerido="Fecha" size="10" value="<?=date('d/m/Y')?>" readonly="readonly" class="date-pick"><p></p></td>
  </tr>
  <tr>
    <td width="98" class="etiquetasForm" ><b>Titulo:</b></td>
 <!--   requerido="Titulo"-->
    <td ><input name="titulo" type="text" id="titulo" requerido="Titulo" size="100"><p></p></td>
  </tr>
  <tr>
    <td  class="etiquetasForm"><p><b>Contenido:</b></p>      </td>
    <td colspan="2">
    <?php
                $oFCKeditor = new FCKeditor('contenido') ; // es el id y name del campo de texto
				$oFCKeditor->BasePath = '../fckeditor/'; // ruta al script fckeditor
				$oFCKeditor->Width  = '100%' ; // ancho del formulario
				$oFCKeditor->Height = '400' ; // alto del formulario
				$oFCKeditor->Value  = ''; // '$cuerpo' Contenido del textarea
				$oFCKeditor->Config['AutoDetectLanguage']	= false ;
	            $oFCKeditor->Config['DefaultLanguage']		= 'es' ;
				$oFCKeditor->Create() ; //  se crea el textarea	
    ?>
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td width="845">
	
      </td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3">
    <div align="center">
<input type="button" name="Submit" value="Crear" onclick="if(valida()){document.getElementById('nuevo').submit();}">
    </div></td>
  </tr>
</table>
</fieldset>
</form>


