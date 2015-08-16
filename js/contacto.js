
//onload=function()
$(document).ready(function(){
	cAyuda=document.getElementById("mensajesAyuda");
	cNombre=document.getElementById("ayudaTitulo");
	cTex=document.getElementById("ayudaTexto");
	form=document.getElementById("formulario");
	curriculums=document.getElementById("curriculum");
	//urlDestino="includes/contacto.php";
	
	claseNormal="input";
	claseError="inputError";
	
	ayuda=new Array();
	ayuda["Nombre"]="Ingresa tu nombre. De 4 a 50 caracteres. OBLIGATORIO";
	ayuda["Asunto"]="Ingresa el Asunto del mensaje. De 4 a 50 caracteres.";
	ayuda["Telefono"]="Ingresa un telefono de contacto.";
	ayuda["Correo"]="Ingresa un e-mail valido. OBLIGATORIO";
	ayuda["Comentario"]="Ingresa tus comentarios. De 5 a 500 caracteres. OBLIGATORIO";
	ayuda["Curriculum"]="Maximo peso del archivo:  2 Mega Byte (MB) = 2000 KB.\n y Solo curriculum con terminacion .doc, .docx y .pdf";
						 
	//preCarga("contacto/ok.gif", "contacto/loading.gif", "contacto/error.gif");

});


function preCarga(){
	imagenes=new Array();
	for(i=0; i<arguments.length; i++){
		imagenes[i]=document.createElement("img");
		imagenes[i].src=arguments[i];
	}
}

function nuevoAjax(){ 
	var xmlhttp=false; 
	try 
	{ 
		// No IE
		xmlhttp=new ActiveXObject("Msxml2.XMLHTTP"); 
	}
	catch(e)
	{ 
		try
		{ 
			// IE 
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP"); 
		} 
		catch(E) { xmlhttp=false; }
	}
	if (!xmlhttp && typeof XMLHttpRequest!="undefined") { xmlhttp=new XMLHttpRequest(); } 
	return xmlhttp; 
}

function limpiaForm(){
	for(i=0; i<=5; i++){
		form.elements[i].className=claseNormal;
	}
	document.getElementById("inputComentario").className=claseNormal;
}

function campoError(campo){
	campo.className=claseError;
	error=1;
}

function eliminaEspacios(cadena){
	// Funcion para eliminar espacios delante y detras de cada cadena
	while(cadena.charAt(cadena.length-1)==" ") cadena=cadena.substr(0, cadena.length-1);
	while(cadena.charAt(0)==" ") cadena=cadena.substr(1, cadena.length-1);
	return cadena;
}

function validaLongitud(valor, permiteVacio, minimo, maximo){
	var cantCar=valor.length;
	if(valor==""){
		if(permiteVacio) return true;
		else return false;
	}else{
		if(cantCar>=minimo && cantCar<=maximo) return true;
		else return false;
	}
}

function validaCorreo(valor){
	var reg=/(^[a-zA-Z0-9._-]{1,30})@([a-zA-Z0-9.-]{1,30}$)/;
	if(reg.test(valor)) return true;
	else return false;
}

//******************************************************************

function validaCurriculum(){
   var curriculum  = document.getElementById('curriculum');
   var nombre= curriculum.value;  
 
   var barra= nombre.lastIndexOf('\\'); // Busca la barra inclinada \ en el nombre ,si no tiene da -1
   //alert("barra: "+barra);
   var lon  = nombre.length; // Longitud del nombre de la foto
   if(barra != -1)nombre=nombre.slice(barra+1,lon);  // corta el nombre despues de la barra inclinada , si barra != -1
   
   document.getElementById('curriculum').innerHTML = '<b>'+nombre+'</b>';
  
   nomm=nombre;
   nombre = nombre.toLowerCase();    //  Pasa a minisculas
  
   var doc = nombre.search('.doc'); //  Busca dentro del nombre '.php'   devuelve -1 si no lo encuentra
   var docx  = nombre.search('.docx');
   var pdf = nombre.search('.pdf');
 
   //if((barra == -1) || (phpp!= -1) || ((jpg == -1) && ( jpeg == -1)))
   if((doc == -1) && ((docx == -1) && ( pdf == -1))){
	    document.getElementById('curriculum').value='';
		document.getElementById('curriculum').innerHTML = '';
		return false;
   }
   //Verificando=false;
   return true; 

}

//**********************************************************

function validaForm(){
	limpiaForm();
	error=0;
	
	var nombre=eliminaEspacios(form.inputNombre.value);
	var asunto=eliminaEspacios(form.inputAsunto.value);
	var telefono=eliminaEspacios(form.inputTelefono.value);
	var correo=eliminaEspacios(form.inputCorreo.value);
	var comentarios=eliminaEspacios(form.inputComentario.value);
	//var curriculum=eliminaEspacios(form.curriculum.value);
	
	if(!validaLongitud(nombre, 0, 4, 50)) campoError(form.inputNombre);
	if(!validaLongitud(asunto, 1, 4, 50)) campoError(form.inputAsunto);
	if(!validaLongitud(telefono, 1, 4, 50)) campoError(form.inputTelefono);
	if(!validaCorreo(correo)) campoError(form.inputCorreo);
	if(!validaLongitud(comentarios, 0, 5, 500)) campoError(form.inputComentario);
	
	
	
	if(error==1){
		var texto="Error: revise los campos en rojo.";
		alert(texto);
		//Alert.alert(texto);
	}else{
		//var texto="Enviando. Por favor espere...";//<br><br><button style='width:60px; height:18px; font-size:10px;' onClick='ocultaMensaje()' type='button'>Ocultar</button>";
		//Alert.info(texto);
		
		//document.formulario.submit() 
		document.getElementById("formulario").submit();
	/*	var ajax=nuevoAjax();
		ajax.open("POST", urlDestino, true);
		ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		ajax.send("nombre="+nombre+"&asunto="+asunto+"&telefono="+telefono+"&correo="+correo+"&comentarios="+comentarios);
		
		ajax.onreadystatechange=function()
		{
			if (ajax.readyState==4)
			{
				var respuesta=ajax.responseText;
				if(respuesta=="OK")
				{
					var texto="Gracias por su mensaje.<br>Le responderemos a la brevedad.";
					Alert.info(texto);
					limpiaForm();
				}
				else {
					
					var texto="Error: Servidor Ocupado, intente mas tarde. "+respuesta;
					Alert.alert(texto);
				
				}
				
				
			}
		}*/
	}
}

// Mensajes de ayuda

if(navigator.userAgent.indexOf("MSIE")>=0) navegador=0;
else navegador=1;

function colocaAyuda(event){
	if(navegador==0)
	{
		/*var corX=window.event.clientX+document.documentElement.scrollLeft;
		var corY=window.event.clientY+document.documentElement.scrollTop;*/
		var corX=window.event.clientX-100;
		var corY=window.event.clientY-50;
		
	}else{
		var corX=event.clientX+window.scrollX;
		var corY=event.clientY+window.scrollY;
	}
	cAyuda.style.top=corY+20+"px";
	cAyuda.style.left=corX-160+"px";
}

function ocultaAyuda(){
	cAyuda.style.display="none";
	if(navegador==0) 
	{
		document.detachEvent("onmousemove", colocaAyuda);
		document.detachEvent("onmouseout", ocultaAyuda);
	}
	else 
	{
		document.removeEventListener("mousemove", colocaAyuda, true);
		document.removeEventListener("mouseout", ocultaAyuda, true);
	}
}

function muestraAyuda(event, campo){
	colocaAyuda(event);
	
	if(navegador==0) 
	{ 
		document.attachEvent("onmousemove", colocaAyuda); 
		document.attachEvent("onmouseout", ocultaAyuda); 
	}
	else 
	{
		document.addEventListener("mousemove", colocaAyuda, true);
		document.addEventListener("mouseout", ocultaAyuda, true);
	}
	
	cNombre.innerHTML=campo;
	cTex.innerHTML=ayuda[campo];
	
	cAyuda.style.display="block";
}