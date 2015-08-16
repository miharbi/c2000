<div align="center">
<h1></h1>
<form action="controladores/insertOrdenar.php" method="post" name="nuevo" id="nuevo" enctype="multipart/form-data">
<?php
    $res=mysql_query("SELECT id,titulo,orden,padre,fijo,status,tipo, home FROM `contenidos` WHERE tipo=1 AND (padre=55 OR padre=0 OR padre is NULL) ORDER BY orden ASC")or die(mysql_error());
	  $contador=0;
	  while($row = mysql_fetch_assoc($res)){
		 $contador+=1;
		 $id=$row['id'];
         $total[]=$row;
	     $res2=mysql_query("SELECT id,titulo,orden,padre,fijo,status,tipo, home FROM `contenidos` WHERE padre='$id' ORDER BY orden ASC")or die(mysql_error());
	     while ($row2 = mysql_fetch_assoc($res2)) { 
			  $total[]=$row2;  // Un array con todos los resultados
	     } ?>
<?php } 
   $contadorPadre=$contador;
?>
<table border="0" width="90%"><tr><td align="center">
 <fieldset><legend> Modificar Secciones  </legend>
<table border="0" width="100%">
<?php $color='#CCCCCC';
  // print_r($total);
  // print"contador: $contador";

  $total2=$total;
  $cont=0; 
  $bandera=0; ?>
  <tr style="background:#FFF; color:#006; font-weight: bold;" align="center"><td width="486"><b>Nombre de la Secci&oacute;n</b></td>
    <td width="248">Acciones</td>
    <td width="94"><input type="submit" value="Ordenar" /></td></tr>
<?php  foreach ($total as $value){  
  if($color!=''){$color='';}else{$color='#999999'; }  
  if($value['padre']!=0&&$value['padre']!=55){ $hijo="*&nbsp;&nbsp;&nbsp;&nbsp;"; /*$color='#000';*/}else{$hijo='';  }  
?>
  <tr bgcolor="<?=$color?>"><td>
  <?php if($value[home]==1){?>
  <img src="../img/home.png" alt="Home" title="Home"  width="16px" height="16px" />
<?php } print"$hijo <b>$value[titulo]</b>"; if($value['tipo']=='5'){echo '&nbsp;&nbsp;-----Div----';} if($hijo==''&&$value['fijo']=='f'&&$value['padre']!=55&&$value['home']=='0'){ ?>&nbsp;&nbsp;<input name="" type="button" value="Crear División" onclick="redirect('controladores/insertSecciones.php?nombre='+prompt('Introduzca nombre de la División')+'&enlace=divisor&idpadre=<?=$value['id']?>');" /><?php }?>
	&nbsp;
    </td>
    <td align="right" >
        <?php if($value['home']!='1'){?>
        <a href="vistas/home.php?id=<?=$value['id']?>" ><img src="../img/home.png" alt="Hacer pagina de inicio" title="Hacer pagina de inicio"  width="16px" height="16px" style="margin:2px;" /></a>
        <?php } ?>
		<?php if($value['tipo']!='5'){?>
        <a href="../index.php?id=<?=$value['id']?>" target="_blank"><img src="../img/search.png" alt="Ver Contenido" title="Ver Contenido"  width="16px" height="16px" style="margin:2px;" /></a>
        <?php } ?>
        <a href="vistas/estatusSeccion.php?id=<?=$value['id']?><?=$value['status']=='1'?'&status=0':'&status=1'?>"><img src="../img/<?=$value['status']=='1'?'':'in'?>activo.png" alt="Cambiar Estatus" title="Cambiar Estatus" style="margin:2px; "  width="16px" height="16px" /></a> 
		
	<?php if($value['fijo']=='f'){ ?>
       <a href="index.php?url=vistas/modificarSecciones2.php&id=<?=$value['id']?>"><img src="../img/edit.png" alt="Modificar" title="Modificar" style="margin:2px; "  width="16px" height="16px" /></a> 
			
        <a href="vistas/eliminarSeccion.php?id=<?=$value['id']?>" onclick='if(!confirm("Esta seguro de eliminar esta Seccion. Si este enlace, posee Sub-Enlaces tambi&eacute;n ser&aacute;n Eliminados y Debe ir luego a la Seccion ORDENAR para ajustar el nuevo orden ?")){return false;}'><img src="../img/drop.png" alt="Eliminar" title="Eliminar" style="margin:2px; "  width="16px" height="16px" /></a>
         <?php } ?>
         
     </td>
    <td  align="right">
    <?php
    	if($value['padre']!=''){
	?>
	   <select name="<?=$value['id']?>" id="<?=$value['id']?>" style="width:<?=$hijo==''?'100%':'60%'?>; text-align:center;">
	      <?php 
	
		 $c=0;
		 if($value['padre']==0 || $value['padre']==55){$bandera=0; $contador=$contadorPadre;}
		 if($value['padre']!=0 && $bandera==0 && $value['padre']!=55){ // Si es un nuevo padre
	
		     $bandera=1;
			 for($ii=$cont; ; $ii++){ // Cuenta cuantos hijos tiene el padre
				if($total2[$ii]['padre']!=0){
					 $c+=1;
				}else{
					break;
				}
			 } 
			 $contador=$c; // Cantidad de hijos
		  }
		  
		  for($i=1; $i <= $contador; $i++){ 
		
               if($value['orden']==$i){  // Aparescan seleccionada el orden  actuales
				  $selec='selected="selected"';
			   }else{
				  $selec='';
			   } 
		      ?>
              <option  value="<?=$i?>" <?=$selec?> ><?="$i"?></option> 
              <?php          	  
          } 

		 $cont+=1;
		 ?>
	   </select>
       <?php }?>
	</td>
	</tr>
 <?php  }  ?>
 
 <tr><td align="center">&nbsp;</td>
   <td align="center">&nbsp;</td>
   <td align="center"><input type="submit" value="Ordenar" /></td>
 </tr>
</table>
</fieldset></td></tr></table>
</form>
</div>