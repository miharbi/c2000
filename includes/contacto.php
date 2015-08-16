<table><tr><td><strong>Cumbres2000</strong>
<p>Si deseas hacer una sugerencia o consulta, solo debes llenar los datos en el siguiente formulario y en la brevedad posible te responderé. Gracias por el interés.</p>
</td></tr></table>
<?php
		 $destino=mysql_query("SELECT * FROM `contacto` LIMIT 1")or die(mysql_error());
		 $destino=mysql_fetch_assoc($destino);
?>		 
<link href="css/contacto.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="js/contacto.js"></script>

      <!--  <form action="includes/guardarContacto.php" id="formulario" method="post" enctype="multipart/form-data">-->
<table width="99%" border="0" cellpadding="0" cellspacing="0" style="margin-left:3px">

  <tr>   <!--onclick="expandit('subMenu_2')"-->
       <td width="100px"> 
       

           <div id="formContenedor">
        <form action="includes/guardarContacto.php" id="formulario" method="post" enctype="multipart/form-data">

            <table align="center" width="100%" border="0">
                    <tr>
                      <td class="contacto">
                      <fieldset><legend>Contactanos en </legend>
                       <table width="100%" border="0" cellspacing="0" cellpadding="5px">
                      
                        <tr>
                          <td width="29%"><b>Direcci&oacute;n:</b></td>
                          <td width="71%">&nbsp;<?=$destino['direccion']?></td>
                        </tr>
                        <!--<tr >
                          <td><b>Telefonos:</b></td>
                          <td>&nbsp;
                          <?=$destino['telefono']?></td>
                        </tr>-->
                        <tr>
                          <td><b>E-mail:</b></td>
                          
                        
                          <td >&nbsp;<a href="mailto:<?=$destino['email']?>" style="color:#000"><?=$destino['email']?></a></td>
                        </tr>
                        <tr style="display:<?=$destino['extra']!=''?'X':'none'?>">
                          <td colspan="2">&nbsp;<?=$destino['extra']?></td>
                        </tr>
                      
                      </table></fieldset></td>
                    </tr>
                    
                    <tr><td><br /><fieldset><legend>Envienos sus requerimientos por ac&aacute; mismo v&iacute;a Web! </legend>
                    <table border="0" width="100%" cellspacing="0" cellpadding="5px">
                    <tr>
                        <td class="contacto" width="70px"><b>(*) Nombre:</b></td>
                        <td class="campo"><input type="text" class="inputNormal" id="inputNombre" name="inputNombre" /></td>
                        <td class="ayuda"><img  src="img/ayuda.png" onMouseOver="muestraAyuda(event, 'Nombre')" alt="Ayuda" /></td>
                    </tr>
                    <tr >
                        <td class="contacto"><b>Asunto:</b></td>
                        <td class="campo"><input type="text" class="inputNormal" id="inputAsunto" name="inputAsunto" /></td>
                        <td class="ayuda"><img  src="img/ayuda.png" onMouseOver="muestraAyuda(event, 'Asunto')" alt="Ayuda" /></td>
                    </tr>
                    <tr>
                        <td class="contacto"><b>Tel&eacute;fono:</b></td>
                        <td class="campo"><input type="text" class="inputNormal" id="inputTelefono" name="inputTelefono" /></td>
                        <td class="ayuda"><img  src="img/ayuda.png" onMouseOver="muestraAyuda(event, 'Telefono')" alt="Ayuda" /></td>
                    </tr>
                    <tr >
                        <td class="contacto"><b>(*) Mail:</b></td>
                        <td class="campo"><input type="text" class="inputNormal" id="inputCorreo" name="inputCorreo" /></td>
                        <td class="ayuda"><img  src="img/ayuda.png" onMouseOver="muestraAyuda(event, 'Correo')" alt="Ayuda" /></td>
                    </tr>
                    <tr>
                        <td class="contacto"><b>(*)Comentarios:</b></td>
                        <td class="campo"><textarea class="inputNormal" id="inputComentario" name="inputComentario"></textarea></td>
                        <td class="ayuda"><img  src="img/ayuda.png" onMouseOver="muestraAyuda(event, 'Comentario')" alt="Ayuda" /></td>
                    </tr>
                     
                    <tr><td colspan="3" align="center"><br/>(*)&nbsp;&nbsp;Estos datos son obligatorios</td></tr>
                    
                  </table></fieldset></td></tr>
                    
          
            </table>
       
            <div align="center">&nbsp;</div>
          <div align="center">
              <input type="button" onClick="validaForm()" name="Submit" value="Enviar" />
              <input type="reset" name="Submit2" value="Restablecer" />
          </div>
        </form>
        <br /><br />
        </div>
           
           
          <!-- ******************************************-->
           </td>
           </tr></table>
           
       <!-- </form>-->
        
   <br />
		<div id="mensajesAyuda">
			<div id="ayudaTitulo">&nbsp;</div>
			<div id="ayudaTexto">&nbsp;</div>
        </div>
       <?php if(isset($_GET['error'])){ ?>
          <script language="javascript" type="application/javascript">
			   function mensaje(){
				   <?php if($_GET['error']=='OK' ){?> alert('Su mensaje fue enviado');   
				   <?php }else{ ?>alert('__ERROR__ Intente el envio luego'); <?php } ?>	   
			   }
			   mensaje();
		  </script>
       <?php }  ?>
	    <?php $titulo="Contacto";?>