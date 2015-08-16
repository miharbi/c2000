<?php  
	
	$dato=$_POST['dato'];
?>

<table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td class="top_tablas"><strong>Resultados encontrados</strong></td>
  </tr>
  <tr>
    <td height="10"></td>
  </tr>
  <tr>
    <td>

    <?php
	$_pagi_cuantos=10;  // Maxima cantidad de noticias por pagina
	$_pagi_sql="SELECT id,titulo,contenido, tipo FROM `contenidos` WHERE fijo='f' AND ((titulo like '%$dato%') OR (contenido like '%$dato%')) ORDER BY id DESC ";	
	include('includes/paginator.inc.php');
	
if(mysql_num_rows($_pagi_result)!=0){	 
 while ($row = mysql_fetch_assoc($_pagi_result)){
	
		 
		 $contenido=$row['contenido'];
		 
preg_match_all('/<img[^>]+>/i',$contenido, $result3); // Se obtienen todas las imagenes en una matriz

$cant=count($result3,COUNT_RECURSIVE); // Cantidad de imagenes+1

$i=1;
$src='';
while($cant > $i){
	$imagen_1= $result3[0][$i-1];
    if($i==1){ // Solo para la primera imagen
	   
	}
	$contenido=str_replace($imagen_1,' ',$contenido); // Elimina todas las imagenes
    $i++;
  
}
if($src!=''){
	$src=trim($src,"\"");//Eliminar comillas al inicio y final	
	$s=explode("/",$src);
	$c=count($s);
	$src=$s[$c-2]."/".$s[$c-1]; // Tomo los dos ultimos elementos del array
}
$contenido= strip_tags($contenido); // Elimitar etiquetas HTML	
	?>
     
    <table width="100%" border="0" style="border-bottom:1px dashed #051826; margin-bottom:5px">
      <tr>
        
        <td width="95%" style="font-size:14px; color:#FFF; font-weight:bold;cursor:pointer; text-align:left" ><a class='example5' href="includes/mostrarBusqueda.php?id=<?=$row['id']?>" title="" onclick="verBusqueda();" ><?=$titulo?></a></td>
      </tr>
      <tr>
        <td style="font-size:10px;"><a href="?id=<?=($row['tipo']==2?'includes/homeNoticias.php&idNew=':'').$row['id']?>" ><strong><?=$row['titulo']?></strong></a><!--Lunes, 24 Enero 2011--></td>
      </tr>
      <tr>
        <td style="font-size:11px;  text-align:left;overflow:hidden"  height="50px" >
		 <div style="overflow: hidden; width:100%; height:50px;">
		     <?=corta_cadena($contenido,350)?>
         </div>
        </td>
      </tr>
      <tr>
        <td style="font-size:10px; color:#FFF; text-align: right;"><a href="?id=<?=($row['tipo']==2?'includes/homeNoticias.php&idNew=':'').$row['id']?>" ><small style="color:#F00; cursor:pointer"><b>Leer M&aacute;s</b></small></a></td>
      </tr>
    </table>
    <?php } 
	//  FIN if(mysql_num_rows($result)!=0)
}else{  ?>
	<div align="center">No hay resultados para su b&uacute;squeda</div>
<?php	
}
	?>
    
    </td>
  </tr>
  <tr><td align="center"><br />
     <table border="0">
       <tr>
          <?php
		   /*  $enlaces=(int)($resultados/$maxNoticias);
			 $resto=$resultados%$maxNoticias;
			 if($resto>0)$enlaces++;*/
			 
			//print" <td><b>Paginas :</b></td>";
		     for($i=1;$enlaces>=$i;$i++){ 
                if($i==$enlace2){ ?>
				   <!--<td style=" background-color:#FFF" ><a href="#" style="color:#000;">&nbsp;<b> <?=$i?>  </b>&nbsp;</a></td>-->
		  <?php }else{ ?>
                  <!-- <td onclick="busquedaAjax(<?=$i?>);" style="color:#FFF; cursor:pointer; background-color:#000;" ><a href="#">&nbsp;<b> <?=$i?>  </b>&nbsp;</a></td>-->
                    
               <?php }
	        } 
			//print"enlaces:  $enlaces";
          if($enlaces>1){  
             if($enlace2==0){  ?>
             <!--<td style="color:#000; background-color:#FFF;"><a href="#" style="color:#000;"><b>Mostrar todos</b></a></td>-->    
      <?php  }else{  ?> 
                 <!--<td onclick="busquedaAjax(0);" style="color:#FFF; cursor:pointer; background-color:#000"><a href="#"><b>Mostrar todos</b></a></td> -->
      <?php  }    
           }  
	  ?>     
       </tr>
     </table>
     <br />
  </td>
  </tr>
  <tr><td >
          <?=$_pagi_navegacion?>  <br />&nbsp;
   
      
  </td>
</table>