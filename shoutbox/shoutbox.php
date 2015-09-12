<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="/css/themes/cosmo.css">
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="shoutbox/script.js"></script>
<style type="text/css">
			@import url("shoutbox/estilo.css");
</style>
<script> 
  function contar(texto, e) { 
    if (texto.length > 399 ) { 
      if (navigator.appName == "Netscape"){
        tecla = e.which;
      }else{
        tecla = e.keyCode;
      }  
      if (tecla != 8||tecla != 13){
        return false;
      }  
    } 
    return true; 
  }  
</script>
</head> 
 
<body > 
<table >
    <tr>
        <td>
        	<div class="chatboxMensajes" >&nbsp;</div>
        </td>
    </tr>
    <tr>
        <td>
            <form id="shoutboxsub" name="shoutboxsub" method="get" action="shoutbox/sendshout.php">
              <div class="form-group">
                <input name="_name" type="text" id="_name" onfocus="if(this.value == 'Nombre') {this.value = '';}"  onblur="if(this.value == '') {this.value = 'Nombre';}" class="form-control" value="Nombre" />
                <textarea name="_message" cols="20" id="_message" rows="3"  class="form-control" onkeyPress="return contar(this.value,event)" onfocus="if(this.value == 'Introduzca Mensaje') {this.value = '';}" onblur="if(this.value == '') {this.value = 'Introduzca Mensaje';}">Introduzca Mensaje</textarea>
                <input type="button" class="btn btn-primary btn-sm" id="_submit" value="Enviar"/> 
                <img src="shoutbox/reload.png" class="pull-right" alt="Refrescar ChatBox" name="reload" width="15" height="16" id="reload" style="cursor:pointer;" title="Actualizar"/>
                <img src="shoutbox/load.gif" style="display:none;" class="pull-right" />
                <span id="response"></span>
              </div>
            </form>
        </td>
    </tr>
</table>
 
</body> 
</html>