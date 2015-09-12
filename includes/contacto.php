<h3>Contacto
<small>Si deseas hacer una sugerencia o consulta, solo debes llenar los datos en el siguiente formulario y en la brevedad posible te responderé. Gracias por el interés.</small>
</h3>	 

        <form action="includes/guardarContacto.php" class="form-horizontal" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label"><small>(*)</small> Nombre:</label>
                    <div class="col-sm-10">
                      <input class="form-control" type="text"  id="inputNombre" name="inputNombre" required />
                    </div>
                 </div>   
                 <div class="form-group">   
                    <label for="inputEmail3" class="col-sm-2 control-label">Asunto:</label>
                    <div class="col-sm-10">
                      <input class="form-control" type="text" idinputAsunto name="inputAsunto" />
                    </div>
                 </div>    
                 <div class="form-group">   
                    <label for="inputEmail3" class="col-sm-2 control-label">Tel&eacute;fono:</label>
                    <div class="col-sm-10">
                      <input class="form-control" type="text" id="inputTelefono" name="inputTelefono" />
                    </div>
                 </div>    
                 <div class="form-group">   
                    <label for="inputEmail3" class="col-sm-2 control-label"><small>(*)</small> Mail:</label>
                    <div class="col-sm-10">
                      <input class="form-control" type="text" id="inputCorreo" name="inputCorreo" required />
                    </div>
                 </div>    
                 <div class="form-group">   
                    <label for="inputEmail3" class="col-sm-2 control-label"><small>(*)</small> Comentarios:</label>
                    <div class="col-sm-10">
                      <textarea class="form-control" id="inputComentario" name="inputComentario" required></textarea>
                    </div>
                 </div>    

                    <h4><small>(*)&nbsp;&nbsp;Estos datos son obligatorios</small></h4>
                    
                  <div class="form-group pull-right"> 
                      <input type="submit"  class="btn btn-default" value="Enviar" />
                      <input type="reset"  class="btn btn-default" value="Restablecer" />
                  </div>    
        </form>


       <?php if (isset($_GET['error'])) { ?>
          <script language="javascript" type="application/javascript">
    			   function mensaje(){
    				   <?php if ($_GET['error'] == 'OK') {
                          ?> alert('Su mensaje fue enviado');   
                      				   <?php 
                      } else {
                          ?>alert('__ERROR__ Intente el envio luego'); <?php 
                      }
                          ?>	   
    			   }
    			   mensaje();
		      </script>
       <?php 
      }  ?>
	    <?php $titulo = 'Contacto';?>
