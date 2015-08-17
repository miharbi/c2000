<?php

if(!isset($_GET["id"]) && !isset($_GET["photoid"]) && !isset($_GET["idNew"])){
	
	  	$index = mysql_query("SELECT id, fijo,contenido 
	  						  FROM contenidos 
	  						  WHERE home=1")or die(mysql_error());

        $index = mysql_fetch_assoc($index);
		 
		if($index['fijo']=='v'){
			$homeCentro=$index['contenido'];

		}else{
			$_GET["id"]=$index["id"];
		} 
	
	
}
	
	 if (isset($_GET["id"]) && is_numeric($_GET['id'])){  // Si es un contenido modificable por el administrador
	 
         $resul= mysql_query("SELECT contenido,titulo, padre,home  
         					  FROM contenidos 
         					  WHERE id=".$_GET['id']." AND status=1 and tipo=1	")or die(mysql_error());

         $ro = mysql_fetch_assoc($resul); 
		 if($ro['padre']!=0 || is_null($ro['padre'])){
			 $contenido='<table width="99%" border="0" cellpadding="0" cellspacing="0"  >';
			 
			 if($ro['home']!=1){
				 $contenido.='<tr>
									<td colspan="2" class="sub">
										'.$ro["titulo"].'
									</td>
								</tr>';
			 }
							
							
			 $contenido.='<tr >
								<td > '.sustituirCodigo($ro["contenido"]).'</td>
							</tr>
						</table>';
						
		 }else{
			 
			 		$hijos="SELECT id,titulo,tipo
								FROM `contenidos`
								WHERE `padre` =".$_GET['id']."  AND status=1 
								ORDER BY orden";
								
					$hijos=mysql_query($hijos)or die(mysql_error());
					$salidaHijos='<ul class="listado">';
					$cont=0;			
					while($hijo=mysql_fetch_assoc($hijos)){
						$enlace='href="?id='.$hijo['id'].'"';
						
						if($hijo['tipo']==5)
							$salidaHijos.="<li class='sub2' style='list-style:none; margin-left:-20px;'>".($cont==0?'':"<hr>").$hijo['titulo']."</li>";
						else
							$salidaHijos.="<li ><a $enlace>".$hijo['titulo']."</a></li>";
						$cont++;		
						
					}	
					$salidaHijos.='</ul>';	
								
					$contenido='<table width="99%" border="0" cellpadding="0" cellspacing="0"  >
							<tr>
								<td colspan="2" class="sub">
									'.$ro["titulo"].'
								</td>

							</tr>
							<tr >
								<td > '.$salidaHijos.'
								</td>
							</tr>
						</table>';
		
		}
					
	   $titulo=$ro["titulo"];  
		 
	 }elseif(isset($_GET["id"]) && $_GET['id'] !=''){ // Si es un contenido fijo
		
		 $homeCentro=$_GET['id'];
	 }
	  if(!isset($contenido)){
		  
		
	  	include ($homeCentro);
		
	   }else{
		   
		   echo $contenido;
		   
	  }
?>