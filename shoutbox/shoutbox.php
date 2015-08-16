<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /> 
<script type="text/javascript" src="js/jquery-1.4.3.min.js"></script>
<script type="text/javascript" src="shoutbox/script.js"></script>
<style type="text/css">
			@import url("shoutbox/estilo.css");
</style>
<script> 
function contar(texto,e) { 
if (texto.length > 399 ) { 
if (navigator.appName == "Netscape") tecla = e.which 
else tecla = e.keyCode 
if (tecla != 8||tecla != 13) return false 
} 
return true 
}  
</script>
</head> 
 
<body> 
<table class="chatboxTabla" >
    <tr>
        <td>
        	<div id="chatboxMensajes" >&nbsp;</div>
        </td>
    </tr>
    <tr>
        <td>
            <form id="shoutboxsub" name="shoutboxsub" method="get" action="shoutbox/sendshout.php">
              <input name="_name" type="text" id="_name" onfocus="if(this.value == 'Nombre') {this.value = '';}"  onblur="if(this.value == '') {this.value = 'Nombre';}" style="font-size:9px; font-family:Arial, Helvetica, sans-serif;" value="Nombre" size="9" maxlength="15"/>
              <img src="shoutbox/load.gif" style="display:none;" /><br />
              <textarea name="_message" cols="20" id="_message" rows="3" style="width:99%; font-size:9px; font-family:Arial, Helvetica, sans-serif;" onkeyPress="return contar(this.value,event)" onfocus="if(this.value == 'Introduzca Mensaje') {this.value = '';}" onblur="if(this.value == '') {this.value = 'Introduzca Mensaje';}">Introduzca Mensaje</textarea>
              <br /> 
             <div align="left"><input type="button" id="_submit" value="Enviar"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="shoutbox/reload.png" alt="Refrescar ChatBox" name="reload" width="15" height="16" id="reload" style="cursor:pointer;" title="Actualizar"/></div>
             
              <span id="response"></span>
            </form>
        </td>
    </tr>
</table>
 
</body> 
</html>