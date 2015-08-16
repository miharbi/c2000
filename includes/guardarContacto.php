<?php

function validaLongitud($valor, $permiteVacio, $minimo, $maximo){
	$cantCar=strlen($valor);
	if(empty($valor)){
		if($permiteVacio) return TRUE;
		else return FALSE;
	}else{
		if($cantCar>=$minimo && $cantCar<=$maximo) return TRUE;
		else return FALSE;
	}
}

function validaCorreo($valor){
	if(eregi("([a-zA-Z0-9._-]{1,30})@([a-zA-Z0-9.-]{1,30})", $valor)) return TRUE;
	else return FALSE;
}

// MAIN	

if(isset( $_POST )){
	
	//**************************************************************************
	//$Correcto='V';
    $Maximo=2200000; //bytes = 2 MB
     $error=0;
	
	// para evitar esto: hola.php.jpg ( un archivo de este tipo pudiera contener codigo malicioso)
	if(is_uploaded_file($_FILES['curriculum']['tmp_name'])){
       if($_FILES['curriculum']['size'] <= $Maximo){								  									  
	      $pos = stripos($_FILES['curriculum']['name'], '.php');
          if ($pos !== false){ $error="error"; }
	   }else{
		   $error="error";
	   }
	}
		

// obtenemos los datos del archivo
    $fecha=date("d/m/y - H:i");	
	
    $prefijo = $_POST['inputCorreo'];
	$prefijo2= date("His");
   // $prefijo = substr(md5(uniqid(rand())),0,6);
    if (($_FILES["curriculum"]['name'] != "") and ($error == 0)){
        // guardamos el archivo a la carpeta files
       // $destino =  "files/".$prefijo."_".$curriculum;
	    $curriculum = $_FILES["curriculum"]['name'];
	   $curriculum=substr($curriculum, -6);   //acorto el nombre del archivo 
	   $destino="../curriculum/".$prefijo2."_".$curriculum;
	  
	   
	   $tamano = $_FILES["curriculum"]['size'];
       $tipo = $_FILES["curriculum"]['type'];
       
       
        if(copy($_FILES['curriculum']['tmp_name'],$destino)){
			 $destino2="".$prefijo2."_".$curriculum;
            //$status = "Archivo subido: <b>".$curriculum."</b>";
        }else{
            $error="error";
        }
    }
		
	//***************************************
	
	foreach($_POST as $clave => $valor) $clave=addslashes(trim(utf8_decode($valor)));
	//sleep(5);
	
	$nombre    = $_POST['inputNombre'];
	$asunto    = $_POST['inputAsunto'];
	$telefono  = $_POST['inputTelefono'];
	$correo    = $_POST['inputCorreo'];
	$comentario= $_POST['inputComentario'];
	//$curriculum= $_POST['curriculum'];
	
	//print"nombre=  $nombre,  asunto=  $asunto,  telefono=$telefono,  correo=$correo,  comentario=$comentario, curriculum=";
	
	if(!validaLongitud($nombre, 0, 1, 50)) $error=1;
	if(!validaLongitud($asunto, 1, 1, 50)) $error=1;
	if(!validaLongitud($telefono, 1, 1, 50)) $error=1;
	if(!validaCorreo($correo)) $error=1;
	if(!validaLongitud($comentario, 0, 1, 500)) $error=1;
	//print"ERROR: $error";
	if($error != 0){
		 //echo "Error";
		 $error="error";
		 $msj='Hubo un error en el "tipo" de los datos enviados. Revise que los datos cumplan los limites establecidos e intente de nuevo.';
		 echo '<script type="text/javascript">alert(\''.$msj.'\');</script>';
         echo "<META HTTP-EQUIV=\"refresh\" content=\"0; URL=../index.php \">";
		 
	}else{
		 include('config.php');
		 include ('funciones.php');
		 include ('conexion.php');
		 include ('../class/class.phpmailer.php');  // -----------------------------------
		 
		 $res=mysql_query("SELECT email FROM contacto LIMIT 1")or die(mysql_error());  
		 $fila=mysql_fetch_assoc($res);
	   	 $destino=$fila["email"];
		
		//$destino='aleixer1234@gmail.com';  //----------------------------------------------
		

		 
		 // En caso de que cualquier línea tenga más de 70 caracteres, habría
// que usar wordwrap()
        $comentario = wordwrap($comentario, 70);   
		
		$enlace='';
		if($_FILES["curriculum"]['name'] != ""){
			 $enlace='http://www.cumbres2000.com/curriculum/mostrarCurriculum.php?f='.$destino2;
		}
		
		$msgbox="Mensaje desde www.cumbres2000.com :
				
Fecha: $fecha
Nombre: $nombre
Asunto: $asunto
Telefono: $telefono
Correo electrónico: $correo
Comentarios: $comentario
Curriculum : 
$enlace";		
//$msgbox="Mensaje desde  www.cumbres2000.com :";  // BORRARRRRRRRRRRRRRRRRRRRRRRRRRRRRR
		/* $mail = new phpmailer();  // ***************************************************************
		 $mail->PluginDir = "../class/"; #ruta de la clase smtp
		 $mail->Mailer    = "smtp";
		 $mail->Host      = "smtp";
		 $mail->SMTPAuth  = false; //true
		 $mail->Username = $destino;       // $mail->Username = $destino['email'];
		 $mail->Password = "";  // $mail->Password = $destino['contrasena'];
		 $mail->From      = destino;   // $mail->From      = destino['email'];
		 $mail->FromName  = "['Contacto'] - ";
		 $mail->Timeout   = 30;
		 $mail->AddAddress($destino);  // $mail->AddAddress($destino[email]);
		 $mail->Subject   = "Contacto ";
		 $mail->IsHTML(true); //true
		 $mail->Body      = $msgbox;
		 //echo "OK";
		 if ($mail->Send()){
		    //mail("$destino", "Comentario desde ".proyecto, $msgbox, "From: ".proyecto." <$destino>")
		    echo "OK";
		 }else{
			echo "Error";
		 }	*/
		 
    $asunto    = 'Mensaje desde www.cumbres2000.com';    
    $cabeceras = 'From: '.$destino. "\r\n" .
    'Reply-To: ' .$correo. "\r\n" .
	'X-Mailer: PHP/' . phpversion();

         if (mail($destino, $asunto, $msgbox, $cabeceras)){
                      $msj='Datos enviados correctamente, Gracias.';
			$error="OK";
		 }else{
		    $msj='Hubo un error al enviar los datos. Intente de nuevo.';
			$error="error";
		 } 
	 echo '<script type="text/javascript">alert(\''.$msj.'\');</script>';
     echo "<META HTTP-EQUIV=\"refresh\" content=\"0; URL=../index.php \">";	
	}
}
//@header("location:../index.php");	//***************************************************8
//header("location:http://www.cumbres2000.com/?id=contacto&error=$error");
?>