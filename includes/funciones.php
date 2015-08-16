<?php 
function cls_string($mensaje)
{ 
	$mensaje = str_replace(array("'","\\","\"","'", "“", "”", "\'"),"",$mensaje); 
	$mensaje = convertir($mensaje);        
	return $mensaje; 
}

function quitar_inyect(){
	//$vect=array($_SESSION,$_POST,$_GET,$_FILES,$_COOKIE);
	$filtro = array("\"","\\","'","|","{","}","[","]","*",">", "<", "INSERT " , "insert ", "UPDATE", "update", "DELETE", "delete"," x00 ","\\", "\\\\", " x1a ");
	foreach($_POST as $k=>$v){
	    foreach ($filtro as $index){
	    	$v=str_replace(trim($index), '',$v);
		}
		$_POST["$k"]=addslashes(htmlspecialchars($v,ENT_NOQUOTES));		
	}
	foreach($_GET as $k=>$v){
	    foreach ($filtro as $index){
	    	$v=str_replace(trim($index), '',$v);
		}
		$_GET["$k"]=addslashes(htmlspecialchars($v,ENT_NOQUOTES));		
	}
	return true;
}
function corta_cadena($cadena,$tamananio){

	$band=true;$i=0;

	$salida='';

	while(true){		

		if(($i>=$tamananio&&$cadena[$i]==' ')||($i==strlen($cadena))){

			return $salida;

			}

		$salida.=$cadena[$i++];

	}

}

function formatoFecha($fecha){
	if(strpos($fecha,'-')){
		$fecha=split('[-]',$fecha);
		$fecha[2]=split('[ ]',$fecha[2]);
	    $fecha[2]=$fecha[2][0];
		return $fecha[2]."/".$fecha[1]."/".$fecha[0];
	}elseif(strpos($fecha,'/')){
		$fecha=split('[/]',$fecha);
		return $fecha[2]."-".$fecha[1]."-".$fecha[0];
	}
	return false;
}

function _imprimir($array){
          echo "<pre>"; print_r($array); echo "</pre>";
}

function quitarAcentos($text)
	{	
		$text = htmlentities($text);
		$text = strtolower($text);
		$patron = array (
			// Espacios, puntos y comas por guion
			'/[\., ]+/' => '-',
			
			// Vocales
			'/&agrave;/' => 'a',
			'/&egrave;/' => 'e',
			'/&igrave;/' => 'i',
			'/&ograve;/' => 'o',
			'/&ugrave;/' => 'u',
			
			'/&aacute;/' => 'a',
			'/&eacute;/' => 'e',
			'/&iacute;/' => 'i',
			'/&oacute;/' => 'o',
			'/&uacute;/' => 'u',
			
			'/&acirc;/' => 'a',
			'/&ecirc;/' => 'e',
			'/&icirc;/' => 'i',
			'/&ocirc;/' => 'o',
			'/&ucirc;/' => 'u',
			
			'/&atilde;/' => 'a',
			'/&etilde;/' => 'e',
			'/&itilde;/' => 'i',
			'/&otilde;/' => 'o',
			'/&utilde;/' => 'u',
			
			'/&auml;/' => 'a',
			'/&euml;/' => 'e',
			'/&iuml;/' => 'i',
			'/&ouml;/' => 'o',
			'/&uuml;/' => 'u',
			
			'/&auml;/' => 'a',
			'/&euml;/' => 'e',
			'/&iuml;/' => 'i',
			'/&ouml;/' => 'o',
			'/&uuml;/' => 'u',
			
			// Otras letras y caracteres especiales
			'/&aring;/' => 'a',
			'/&ntilde;/' => 'n',
             '/&ntilde;/' => 'ñ',
			// Agregar aqui mas caracteres si es necesario
 
		);
		
		$text = preg_replace(array_keys($patron),array_values($patron),$text);
		return $text;
	}
	
/*function mensajes($mensaje, $redirect='', $tipo='info'){
				echo "<script language='javascript' type='text/javascript' >
						window.addEvent('domready', function(){	
							Alert.".$tipo."('$mensaje', 
											  {onComplete: function(returnvalue) 
											  			   {
															  	".($redirect!=''?'':'//')."redirect('$redirect');
															
															}
							});});
					  </script>";
}
*/
function formato($numero){
		return number_format($numero,2,',','.');  	   	   
}

function sinFormato($number){
		return str_replace(',','.',str_replace('.','',$number));
}	

function comaxPunto($number){
		 return str_replace(',','.',$number);
}	

function campo($tabla, $campo, $criterio, $pos){ 
         $query = mysql_query("SELECT * FROM $tabla WHERE $campo = '$criterio'") or die (mysql_error());  
		 $array = mysql_fetch_array($query);
		 return $array[$pos];
}

function existe($tabla, $campo, $criterio){
         $query = mysql_query("SELECT ".$campo." FROM ".$tabla." WHERE ".$campo." = '".$criterio."'") or die (mysql_error());
         return (mysql_num_rows($query) > 0) ? true : false;
}

function delete($tabla, $campo, $criterio){
         $query = mysql_query("DELETE FROM ".$tabla." WHERE ".$campo." = '".$criterio."'") or die (mysql_error());
}

function convertir($cad){
	     $acentos  = array("á", "Á", "é", "É", "í", "Í", "ó", "Ó", "ú", "Ú", "ñ", "Ñ"); 
		 $caracter = array("&aacute;", "&Aacute;", "&eacute;", "&Eacute;", "&iacute;", "&Iacute;", "&oacute;", "&Oacute;", "&uacute;", "&Uacute;", "&ntilde;", "&Ntilde;"); 
	     
		 for ($i=0; $i < count($acentos); $i++)
		      $cad = str_replace($acentos[$i], $caracter[$i], $cad); 
	   
	     return $cad;
}

function convertir2($cad){
		 $cadena = str_replace('á', '&aacute;', $cad);
		 $cadena = str_replace('Á', '&Aacute;', $cadena);
		 $cadena = str_replace('é', '&eacute;', $cadena);
		 $cadena = str_replace('É', '&Eacute;', $cadena);
		 $cadena = str_replace("í", "&iacute;", $cadena);
		 $cadena = str_replace("Í", "&Iacute;", $cadena);
		 $cadena = str_replace("ó", "&oacute;", $cadena);
		 $cadena = str_replace('Ó', '&Oacute;', $cadena);
		 $cadena = str_replace('ú', '&uacute;', $cadena);
		 $cadena = str_replace('Ú', '&Uacute;', $cadena);
		 $cadena = str_replace('ñ', '&ntilde;', $cadena);
		 $cadena = str_replace("Ñ", "&Ntilde;", $cadena);

		 $cadena = str_replace('Ã¡', '&aacute;', $cadena);
		 $cadena = str_replace('Ã±', '&ntilde;', $cadena);
		 $cadena = str_replace('Ã©', '&eacute;', $cadena);
		 $cadena = str_replace('Ã³', '&oacute;', $cadena);
		 $cadena = str_replace("Ã*", "&iacute;", $cadena);
		 $cadena = str_replace("Ãº", "&uacute;", $cadena);
		 $cadena = str_replace("Ã‘", "&ntilde;", $cadena);
		 $cadena = str_replace('Ã¡', '&aacute;', $cadena);
		 $cadena = str_replace('Ã±', '&ntilde;', $cadena);
		 $cadena = str_replace('Ã©', '&eacute;', $cadena);
		 $cadena = str_replace('Ã³', '&oacute;', $cadena);
		 $cadena = str_replace("Ã*", "&iacute;", $cadena);
		 $cadena = str_replace("Ãº", "&uacute;", $cadena);
		 $cadena = str_replace("Ã‘", "&ntilde;", $cadena);
		 $cadena = str_replace("Ã" , "&iacute;", $cadena);
		 $cadena = str_replace("âº", "&deg;", $cadena);

	   
	     return $cadena;
}

function renombrar($cad){/*
$galname = $zoom->escapeString($name);
$galname=str_replace('Ã¡','á',$galname);
$galname=str_replace('Ã±','ñ',$galname);
$galname=str_replace('Ã©','é',$galname);
$galname=str_replace('Ã³','ó',$galname);
$galname=str_replace("Ã*","í",$galname);
$galname=str_replace("Ãº","ú",$galname);
$galname=str_replace("Ã‘","Ñ",$galname);

$galdesc = $zoom->escapeString($descr);
$galdesc=str_replace('Ã¡','á',$galdesc);
$galdesc=str_replace('Ã±','ñ',$galdesc);
$galdesc=str_replace('Ã©','é',$galdesc);
$galdesc=str_replace('Ã³','ó',$galdesc);
$galdesc=str_replace("Ã*","í",$galdesc);
$galdesc=str_replace("Ãº","ú",$galdesc);
$galdesc=str_replace("Ã‘","Ñ",$galdesc);
*/
		 
		 $cadena = str_replace('Ã¡', '&aacute;', $cad);
		 $cadena = str_replace('Ã±', '&ntilde;', $cadena);
		 $cadena = str_replace('Ã©', '&eacute;', $cadena);
		 $cadena = str_replace('Ã³', '&oacute;', $cadena);
		 $cadena = str_replace("Ã*", "&iacute;", $cadena);
		 $cadena = str_replace("Ãº", "&uacute;", $cadena);
		 $cadena = str_replace("Ã‘", "&ntilde;", $cadena);
		 $cadena = str_replace('Ã¡', '&aacute;', $cadena);
		 $cadena = str_replace('Ã±', '&ntilde;', $cadena);
		 $cadena = str_replace('Ã©', '&eacute;', $cadena);
		 $cadena = str_replace('Ã³', '&oacute;', $cadena);
		 $cadena = str_replace("Ã*", "&iacute;", $cadena);
		 $cadena = str_replace("Ãº", "&uacute;", $cadena);
		 $cadena = str_replace("Ã‘", "&ntilde;", $cadena);
		 $cadena = str_replace("Ã" , "&iacute;",  $cadena);
		 $cadena = str_replace("âº", "&deg;", $cadena);
         return strtolower($cadena);
}


function formatoCadena($cadena, $op=1){
         switch($op){
		        case 1: return ucwords($cadena);    break; #Pone en mayúsculas el primer carácter de cada palabra de una cadena
				case 2: return ucfirst($cadena);    break; #Pasar a mayúsculas el primer carácter de una cadena
				case 3: return strtolower($cadena); break; #Pasa a minúsculas una cadena
				case 4: return strtoupper($cadena); break; #Pasa a mayúsculas una cadena
				case 5: return str_replace(' ', '', strtolower($cadena)); break; #Pasa a mayúsculas una cadena
		 }
}

function numRecord($tabla, $where){
         $query = mysql_query("SELECT * FROM $tabla $where") or die (mysql_error());
		 return mysql_num_rows($query);
}

function sumRecord($campo, $tabla, $where){
         $query = mysql_query("SELECT SUM($campo) AS suma FROM $tabla $where") or die (mysql_error());
		 $array = mysql_fetch_assoc($query);
		 return $array['suma'];
}

function empresa(){
         $empresas = mysql_query("SELECT * FROM empresas WHERE id = '1'") or die (mysql_error());
	     $empresa  = mysql_fetch_assoc($empresas);
		 return formatoCadena($empresa['nombre']).' :: '.$empresa['rif'];
}

function elementos($id_componente){
		 $query = mysql_query("SELECT * FROM estructuras_d WHERE id_estructura = '".$id_componente."'") or die (mysql_error());
	     while ($array = mysql_fetch_assoc($query))
			    $elementos[] = $array['id_elemento'];
         return $elementos;
}


function elementosToComponentes($arrayElementos, $id_componente){
         $band = true;
		 $query = mysql_query("SELECT * FROM estructuras_d WHERE id_estructura = '".$id_componente."'") or die (mysql_error());
         if (mysql_num_rows($query)>0){
		     while ($array = mysql_fetch_assoc($query)){
			        if (!in_array($array['id_elemento'], $arrayElementos)){
					    $band = false;
						break;
					}
			 }
		 }else{
		     $band = false;
		 }
         return $band;
}

function exitsMatriz($valor, $campo, $matriz, &$pos){
         $band=false;
		 for ($i=0; $i<count($matriz); $i++){
		      if ($valor == $matriz[$i][$campo]){
			      $band = true;
				  $pos  = $i;
				  break; 
			  }
		 }
         return $band;
}

function maskFecha($fecha, $char){
         $aux = split("[".$char."]", $fecha); 
		 return '<strong>'.formatoFecha($aux[0]).'</strong>&nbsp;'.$aux[1];
} 


#Funciones Especificas

function generaHidden(){ 
		 reset($_REQUEST);
		 $REQUEST = $_REQUEST;
		 for ($i=0;$i<count($REQUEST);$i++){
		      $value  = current($REQUEST); 
		      $nombre = key($REQUEST);
		      echo "\n<input name='$nombre' type='hidden' id='$nombre' value='$value'>";
		      next($REQUEST);
		}
		
		reset($_REQUEST);
}	

function generaGet(){ 
         reset($_REQUEST);
         $REQUEST = $_REQUEST;
         $get     = '?';
         for ($i=0;$i<count($REQUEST);$i++){
              $value  = current($REQUEST); 
              $nombre = key($REQUEST);
			  if($nombre!='PHPSESSID')
              	$get.=$nombre."=".$value."&";
              next($REQUEST);
         }
         
		 reset($_REQUEST);
         return substr($get,0,-1);
} 

function get_current_url () {
	     if (isset($_SERVER['REQUEST_URI'])) {
	         $current_url = $_SERVER['REQUEST_URI'];
	     }else{
	         $current_url = $_SERVER['SCRIPT_NAME'];
	         $current_url .= (!empty($_SERVER['QUERY_STRING'])) ? '?' . $_SERVER['QUERY_STRING'] : '';
	     }
	     
		 return $current_url;
}

function validar_tipo($archivo,$tipos_validos=array(".png", ".jpg", ".gif")){
	$extencion=strrchr ($archivo, '.');

	foreach($tipos_validos as $tipo){
		if(strtolower ( $tipo)==strtolower ( $extencion))return $tipo;
	}
	return 0;

}

function redimensionar($img_original, $img_nueva,$img_nueva_anchura,$img_nueva_altura='') {

	switch(validar_tipo($img_original)){
		case ".jpg": 
		case ".jpeg": $img = @imagecreatefromjpeg($img_original); break;
		case ".gif":  $img = @imagecreatefromgif($img_original); break;
		case ".png":  $img = @imagecreatefrompng($img_original); break;
	}
	
	//Obtengo el tamaño del original
	$img_size 				= @getimagesize($img_original);
	$img_original_anchura 	= $img_size[0];
	$img_original_altura 	= $img_size[1];
	// Obtengo la relacion de escala
	if($img_nueva_altura==''){
		$relacion = $img_original_anchura / $img_nueva_anchura;
		$img_nueva_altura = @ceil($img_original_altura / $relacion);
	}
	// crea imagen nueva redimencionada
	$thumb = @imagecreatetruecolor ($img_nueva_anchura,$img_nueva_altura);
	// redimensionar imagen original copiandola en la imagen nueva
	@imagecopyresized($thumb,$img,0,0,0,0,$img_nueva_anchura,$img_nueva_altura,ImageSX($img),ImageSY($img));
	// guardar la imagen redimensionada donde indica $img_nueva
	switch(validar_tipo($img_original)){
		case ".jpg": 
		case ".jpeg": @imagejpeg($thumb,$img_nueva); break;
		case ".gif":  @imagegif($thumb,$img_nueva); break;
		case ".png":  @imagepng($thumb,$img_nueva); break;
	}

	//return $img_nueva;
}

function existeCar($valor){
		 if (isset($_SESSION['carrito'])){
		     do{
		        if (key($_SESSION['carrito']) == $valor)
			        return $valor;
	 	     }while (next($_SESSION['carrito'])); 
		 }	 
		 return 0;
}

function mes($mes){
         switch ($mes){
		         case '01': return 'Enero';      break;
		         case '02': return 'Febrero';    break;
		         case '03': return 'Marzo';      break;
		         case '04': return 'Abril';      break;
		         case '05': return 'Mayo';       break;
		         case '06': return 'Junio';      break;
		         case '07': return 'Julio';      break;
		         case '08': return 'Agosto';     break;
		         case '09': return 'Septiembre'; break;
		         case '10': return 'Octubre';    break;
		         case '11': return 'Noviembre';  break;
		         case '12': return 'Diciembre';  break;
		 }  
}

function dia(){
         $dias = array("Domingo","Lunes","Martes","Mi&eacute;rcoles","Jueves","Viernes","S&aacute;bado");
		 return $dias[date('w')];
}

function mayorEdad($fecha, $char){
		 list($dia, $mes, $ano) = split("[".$char."]", $fecha);
		 
		 $diaAct = date('d'); $mesAct = date('m'); $anoAct = date('Y');
         
		 //si el mes es el mismo pero el día inferior aun no ha cumplido años, le quitaremos un año al actual
         if ($mes == $mesAct && $dia > $diaAct)
              $anoAct=($anoAct-1);

         //meses
         if ($mes > $mesAct)
             $anoAct=($anoAct-1);
 
		 return (($anoAct-$ano)>=18) ? true : false ;
}

function getIP(){
    if( isset( $_SERVER['HTTP_X_FORWARDED_FOR'] )) $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if( isset( $_SERVER ['HTTP_VIA'] ))  $ip = $_SERVER['HTTP_VIA'];
    else if( isset( $_SERVER ['REMOTE_ADDR'] ))  $ip = $_SERVER['REMOTE_ADDR'];
    else $ip = null ;
    return $ip;
}

function sustituirCodigo($cadena){
		$entra=array(ultimasNoticias(),ultimosContenidos());
		$sale=array('{ultimasNoticias}','{ultimosContenidos}');
		return str_replace($sale,$entra,$cadena);
}

function ultimasNoticias(){

	$sql="SELECT id, fecha, titulo FROM `contenidos` where tipo='2' order by id DESC limit 3";
	
	$query=mysql_query($sql)or die(mysql_error());
	$salida='';
	$cont=0;
	while($result=mysql_fetch_assoc($query)){
		
		$fecha=formatoFecha($result[fecha]);
		$id=$result[id];
		$titulo=$result[titulo];
		$salida.="<tr><td class='inicio0".($cont++>1?'9':'8')."'>".$fecha." - <a href='?id=includes/homeNoticias.php&idNew=".$id."'>".$titulo."</a></td></tr>";
	}
	
	return $salida;
}
function ultimosContenidos(){

	$sql="SELECT id, fecha, titulo FROM `contenidos` where tipo='1' order by id DESC limit 3";
	
	$query=mysql_query($sql)or die(mysql_error());
	$salida='';
	$cont=0;
	while($result=mysql_fetch_assoc($query)){
		
		$fecha=formatoFecha($result[fecha]);
		$id=$result[id];
		$titulo=$result[titulo];
		$salida.="<tr><td class='inicio0".($cont++>1?'9':'8')."'>".$fecha." - <a href='?id=".$id."'>".$titulo."</a></td></tr>";
	}
	
	return $salida;

}

/*
<!-- 
    + --------------------------------------------------------- +
    |                                                           |
    | 	Desarrollado por: Websarrollo, C.A.                     |
    | 	Email: info@websarrollo.com                             |
    | 	Teléfono: 0414-428.42.30/0416-730.10.31/0245-511.38.40  |
    | 	Web: http://blog.websarrollo.com                        |
    |        http://www.websarrollo.com                         |
    | 	Valencia, Edo. Carabobo - Venezuela                     |
    |                                                           |
    + --------------------------------------------------------- +
-->	
*/
?>