<?php 
     include 'includes/header.php';
?>
<form name="login" id="login" method="post" action="includes/login.php" style="padding:0px; margin:0px;">
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" class="tablaPrincipal" >
	 <tr>
			<td colspan="2" class="top" style="text-align:center; background-color:#000;"><img src="../img/top_panel.jpg" border="0" width="800" height="96" /></td>
	  </tr>
	  <tr height="300px">
			<td colspan="2" align="center">
            
            
            <table border="0" width="300px" class="contenido"><tr><td>
            <fieldset><legend>&nbsp;Administraci&oacute;n</legend>
			<table width="300"   border="0" align="center" cellpadding="1" cellspacing="0"  >
              <tr>
                <td colspan="2"  align="center"></td>
              </tr>

              <tr>
                <td ><strong>Usuario:&nbsp;</strong></td>
                <td><input name="user" type="text" class="textbox2 " id="user" onfocus="foco(this.id)" size="20" maxlength="100" requerido="Usuario"  ></td>
              </tr>
              <tr>
                <td ><strong>Clave:&nbsp;</strong></td>
                <td><input name="clave" type="password" class="textbox2 " id="clave"  onfocus="foco(this.id)" size="20" maxlength="100" requerido="Clave"  ></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td style="text-align: right"><!-- <img src="../img/login.png" width="48" height="48" border="0"/> --></td>
              </tr>
              <tr>
                <td colspan="2" style="text-align:center">
                  <input name="guarda" type="button" class="boton " id="guarda" onClick="if (valida()){ this.form.submit(); }" value="Entrar">                </td>
              </tr>

            </table>
            </fieldset>
            
            </td></tr></table>
            
            
            </td>
	  </tr>

	  <tr style="text-align:center; font-size:11px; font-family:Arial, Helvetica, sans-serif">
	    <td colspan="2" class="error">
		         <?php 
                        if ($_GET['msj'] == 'no') {
                            echo 'Usuario incorrecto, intente luego!';
                        }
                 ?>		</td>
      </tr>
	  
</table>
</form>
<?php include 'includes/footer.php'; ?>