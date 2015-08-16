var version_='';
function redirect(url){
	location=url;	
}

$(document).ready(function(){
	
	
	$("a[rel='example3']").colorbox({transition:"none", width:"75%", height:"75%"});
	
			$(".example6").colorbox(); // Para el Video
		
			$(".example8").colorbox({width:"50%", inline:true, href:"#ventana"});  // Para la ventana bienvenida
			
		
if ($(".example8").length > 0) { // Para saber si un elemento existe
   $(".example8").click();		  // Para que abra el PoUp
}
});

function verFotos(){  // Se coloca asi para que funcione cuando se carga contenido con AJAX
		   $("a[rel='example3']").colorbox({transition:"none", width:"75%", height:"75%"}).bind("click", function(){
             // var str = "( " + e.pageX + ", " + e.pageY + " )";
              //$("span").text("Click happened! " + str);
			  ;
           });
		
}


function checkForCharacters(inputString, checkString, startingIndex)
{
  if (!startingIndex) startingIndex = 0;
  return inputString.indexOf(checkString);
}

function inicio(url){
         location.href=url		
}

function isset(variable_name) {
    try {		 
         if (typeof(eval(document.getElementById(variable_name))) != 'undefined')
         if (eval(document.getElementById(variable_name)) != null)
         return true;
     } catch(e) { }
    return false;
 }


var focoActual="";
function foco(){

	idobj=foco.arguments[0];
	if(foco.arguments[1]==1){
		error=true;
	}else{ error=false;	}
	
  if(focoActual==idobj&&!error){return;}
  
  if(isset(idobj)){
	focoActual=idobj;  
	var destino =     document.getElementById(idobj);  
	var inputFields = document.getElementsByTagName('INPUT'); 
	var selectBoxes = document.getElementsByTagName('SELECT'); 
	var textareas =   document.getElementsByTagName('TEXTAREA');
	var inputs = new Array();
	for(i=0;i<inputFields.length;i++){
		if(inputFields[i].type!='button'&&
           inputFields[i].type!='submit'&&
		   inputFields[i].type!='reset'&&
		   inputFields[i].type!='checkbox'){
		   inputs[inputs.length] = inputFields[i];
			}
	}
	for(i=0;i<selectBoxes.length;i++){inputs[inputs.length] = selectBoxes[i];}
	for(i=0;i<textareas.length;i++){inputs[inputs.length] = textareas[i];}
	for(i=0;i<inputs.length;i++){ 
		
			inputs[i].onfocus=function(){foco(this.id);};			
			inputs[i].style.backgroundImage="";
			inputs[i].style.backgroundColor = '#FFF';
			inputs[i].style.border = '1px solid #878687';

		
		if(inputs[i].type!='hidden'){
			//inputs[i].value=Mayusculas(inputs[i].value);
			
			if(inputs[i].getAttribute('tipo')=='moneda'){ 
				inputs[i].value =numFormat(inputs[i].value,2);
			}
		}
	}
		   if(destino.type!='button'&&destino.type!='submit'&&destino!='reset'){
		     
			 	
			    if(error){

					destino.style.backgroundColor = '#FFF';
					destino.style.border= '1px solid #FF0000';
					
				}else{
					destino.style.backgroundColor = '#FFF';
					destino.style.border = '1px solid #878687';
				}
			}
		   /*if(isNumberFloat(idobj) && destino.value.indexOf(',')!=-1){ 
		   		destino.value=str2Number(idobj);
				if(destino.value==0){
					destino.value='';
				}
				//destino.select();
			}*/
		   destino.focus();
	 
	}else{ setTimeout('foco("'+idobj+'","'+error+'")',10); }	   
}

function validaFileText(ids, nombres){
         id  = ids.split('-');
		 msj = nombres.split('-');
		 for (i=0; i<id.length; i++){
             var pos = document.getElementById(id[i]).value.lastIndexOf('.');		
             if (pos!=-1){
		         var ext = document.getElementById(id[i]).value.substr(pos+1,3);
		         if ((ext!='png' && ext!='PNG') && (ext!='jpg' && ext!='JPG') && (ext!='gif' && ext!='GIF') && (ext!='jpeg' && ext!='JPEG')){
		             Alert.alert("<strong>Tipo de im&aacute;gen incorrecto</strong><br><br>El nombre del archivo contiene puntos o el tipo de archivo es incorrecto.<br><br><strong>Archivos permitidos:</strong><br>\"JPG\" o \"GIF\" o \"JPEG\"\n");
		             return false;
				 }
	         }else{
				 Alert.alert('<strong>'+msj[i]+"</strong> es requerido(a)!");
				 return false;
			 }
		 }
		 return true;
}

function validaFileText2(ids, nombres){
         id  = ids.split('-');
		 msj = nombres.split('-');
		 for (i=0; i<id.length; i++){
             var pos = document.getElementById(id[i]).value.lastIndexOf('.');		
             if (pos!=-1){
		         var ext = document.getElementById(id[i]).value.substr(pos+1,3);
		         if ((ext!='zip' && ext!='ZIP')){
		             Alert.alert("<strong>Tipo de archivo incorrecto</strong><br><br>El nombre del archivo contiene puntos o el tipo de archivo es incorrecto.<br><br><strong>Archivos permitidos:</strong><br>\"ZIP\"\n");
		             return false;
				 }
	         }else{
				 Alert.alert('<strong>'+msj[i]+"</strong> es requerido(a)!");
				 return false;
			 }
		 }
		 return true;
}

function validaFileText3(ids, nombres){
         id  = ids.split('-');
		 msj = nombres.split('-');
		 for (i=0; i<id.length; i++){
             var pos = document.getElementById(id[i]).value.lastIndexOf('.');		
             if (pos!=-1){
		         var ext = document.getElementById(id[i]).value.substr(pos+1,3);
		         if ((ext!='xml' && ext!='XML')){
		             Alert.alert("<strong>Tipo de archivo incorrecto</strong><br><br>El nombre del archivo contiene puntos o el tipo de archivo es incorrecto.<br><br><strong>Archivos permitidos:</strong><br>\"XML\"\n");
		             return false;
				 }
	         }else{
				 Alert.alert('<strong>'+msj[i]+"</strong> es requerido(a)!");
				 return false;
			 }
		 }
		 return true;
}

function validaFCKeditor(ids, nombres){
         id  = ids.split('-');
		 msj = nombres.split('-');
		 for (i=0; i<id.length; i++){
		      if (FCKeditorAPI.GetInstance(id[i]).EditorWindow.parent.FCK.GetHTML()==''){
			      Alert.alert('<strong>'+msj[i]+'</strong> es requerido(a)!');
				  return false;
			  }
		 }
		 return true;
}

function valida(){ // requerido=" label", opcional(tamanio="tamaño")    
	var inputFields = document.getElementsByTagName('INPUT'); 
	var selectBoxes = document.getElementsByTagName('SELECT'); 
	var textareas   = document.getElementsByTagName('TEXTAREA');
	var inputs      = new Array();
	var paso        = false;
	
	for(i=0;i<inputFields.length;i++){if(inputFields[i].getAttribute('requerido'))inputs[inputs.length] = inputFields[i];}
	for(i=0;i<textareas.length;i++){if(textareas[i].getAttribute('requerido'))inputs[inputs.length] = textareas[i];}
	for(i=0;i<selectBoxes.length;i++){if(selectBoxes[i].getAttribute('requerido'))inputs[inputs.length] = selectBoxes[i];}
	
	for (i=0; i<inputs.length; i++){
		 msj='<b>'+inputs[i].getAttribute('requerido')+'</b> es requerido(a)!\n';
		 if (inputs[i].getAttribute('tamanio')){
			 tamanio=inputs[i].getAttribute('tamanio');
			 msj+='y debe contener al menos \''+ tamanio+'\' caracteres';
		 }else tamanio=1;

         if (inputs[i].getAttribute('tipo') && !validateForm(inputs[i].id) && inputs[i].value!=""){
			 msj+='<br><br>Y el valor deber en formato: <b style="color:#FF0000">['+ Mayusculas(inputs[i].getAttribute('tipo')) +']</b>.';
			 paso = true;
		 }
		
		 if (inputs[i].value.length<tamanio || inputs[i].value=='0,00' || paso == true){	
			 focoActual=inputs[i].id;
		     alert(msj); 
			 foco(inputs[i].id,1);
			 return false;
		 }
	}
	
	return true;
}

function validateForm(id){
	     var tipo  = document.getElementById(id).getAttribute('tipo');
		 var campo = document.getElementById(id).value;
		 var resul = "";
		 switch (tipo){
		         case 'cadena': regex = /^[a-zA-Z]/;                                            break;	 
				 case 'entero': regex = /^\d*$/;                                             break;	 
				 case 'fecha' : regex = /^\d{1,2}\/\d{1,2}\/\d{2,4}$/;                       break; //  01/01/2009	 
				 case 'email' : regex = /[\w-\.]{3,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/; break;	 
				 case 'tlf'   : regex = /^[0-9]{4,4}-?-?[0-9]{6,7}$/;                        break;	 
				 case 'real'  : regex = /^(?:\+|-)?\d+\,\d*$/;                               break;
				 case 'todo'  : regex = /./;                                                 break;
				 case 'alfanumerico'  : regex = /^[a-zA-Z0-9]/;                                        break;
		 }
		 
		 if (!campo.match(regex))
              return false;
		 else
		      return true;
}

function valida_interno(atributo){
	     var inputFields = document.getElementsByTagName('INPUT'); 
	     var selectBoxes = document.getElementsByTagName('SELECT'); 
	     var textareas = document.getElementsByTagName('TEXTAREA');
	     var inputs = new Array();
	     for (i=0;i<inputFields.length;i++){if(inputFields[i].getAttribute(atributo))inputs[inputs.length] = inputFields[i];}
	     for (i=0;i<selectBoxes.length;i++){if(selectBoxes[i].getAttribute(atributo))inputs[inputs.length] = selectBoxes[i];}
	     for (i=0;i<textareas.length;i++){if(textareas[i].getAttribute(atributo))inputs[inputs.length] = textareas[i];}
	     for (i=0;i<inputs.length;i++){
		      if (inputs[i].value==""){
				  alert(inputs[i].getAttribute(atributo)+' es requerido(a)!\n\n');
				  foco(inputs[i].getAttribute('id'));
				  return false;
			  }
	     }
	     return true;
}

function str_replace(inChar,outChar,conversionString){
         var convertedString = conversionString.split(inChar);
         convertedString = convertedString.join(outChar);
         return convertedString;
}

function sinFormato(number){
		 return str_replace(',','.',str_replace('.','',number));
}	 	   	     


function fondoMenu(id, op){ //#E2E2E2
		 if (op == '1'){
		     document.getElementById(id).style.backgroundColor = '#F9D057';
			 document.getElementById(id).style.color = "#000000";
			 document.getElementById(id).style.border = "1px solid #000000";
		 }else{			 
			 document.getElementById(id).style.backgroundColor = '';
			 document.getElementById(id).style.color = "#FFFFFF";
			 document.getElementById(id).style.border = "1px solid transparent";
		 }
}

function fondo(op, id, color){ //#E2E2E2
		 if (op == '1'){
		     document.getElementById(id).style.backgroundColor = color;
		 }else{			 
			 document.getElementById(id).style.backgroundColor = color;
		 }
}


function Mayusculas(inputString)
{
  return inputString.toUpperCase();
}

function isNumberFloat(idString)
{
  return (!isNaN(parseFloat(str2Number(idString)))) ? true : false;
}

function str2Number(numero){

	if (valor(numero).indexOf(',')!=-1){
		
		return Number(str_replace(',','.',str_replace('.','',valor(numero))));
		    
	}else{
		
		return Number(valor(numero));
	}
		
	 
}	

function valor(id){
	return document.getElementById(id).value;
}

function expandit(curobj){
		if(document.getElementById(curobj)){
		  folder=document.getElementById(curobj).style;
		  }else{
			if(ns6==1||(agtbrw.indexOf('opera')!=-1)){
				folder=curobj.nextSibling.nextSibling.style;
			}else{
				folder=document.all[curobj.sourceIndex+1].style;
			}
		   }
		if (folder.display=="none"){
			folder.display="";
		}else{
			folder.display="none";}
}

function searchBox(titulo, label) {
	     var band;
		 var error = false;
		 Alert.prompt('<h1>'+titulo+'</h1>'+label,'' ,{ onComplete: 
				 function (returnvalue){
						   if (returnvalue!=''){
						       document.getElementById('_accion').value = 'modificar';								   
							   document.getElementById('_busqueda').value = returnvalue;
							   document.getElementById('_frmBusqueda').submit();							   
						   }
				 }
         });
}

function searchBoxLink(titulo, label, url) {
	     var band;
		 var error = false;
		 Alert.prompt('<h1>'+titulo+'</h1>'+label,'' ,{ onComplete: 
				 function (returnvalue){
						   if (returnvalue!=''){
						       popup(url+'?valor='+returnvalue, 650, 400, 'yes');
						   }
				 }
         });
}

function ventana(tipo, url, redireccion){
	     var ajax = nuevo_ajax();
	     ajax.open("POST",url, true);
	     ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	     ajax.send("");
	
	     ajax.onreadystatechange=function(){
			 if (ajax.readyState==4){
				 //capa.innerHTML=ajax.responseText;
				 
				 window.addEvent('domready', function(){	
						Alert.info(ajax.responseText, 
							  {onComplete: function(returnvalue){
													if (redireccion!='')
													    redirect(redireccion);
							               }
						      });});				 
				 
			 }
		 }	



}


function confirma(titulo, msj, url){//////////////////////////////////////////////////////////////////////////////
         var band = false;
		 Alert.confirm('<h1>'+titulo+'</h1><p>'+msj+'</p>', {onComplete: 
					 function (returnvalue) { 
							   if (returnvalue)
								   inicio(url);
					 }
         });
         return band;		 
}

function confirmajs(msj){//////////////////////////////////////////////////////////////////////////////
         if (confirm(msj))
		     return true;
		 else
		     return false;
}

function validaListaSeleccion(cadena){
		 var paso    = false;
		 var bandera = true;
		 var id      = valor('lista').split('|');
          
		 if (valor('band')=='Ok'){
			 for (i=0; i<id.length; i++){				  
				  // Si esta seleccionado y la cantidad esta vacia
				  if (document.getElementById('chk_'+id[i]).checked == true && ltrim(valor('txtCant_'+id[i]))==''){
				      Alert.alert("<strong>Cantidad</strong> es requerida(a)!");
					  bandera = false;					  
					  paso = true;
					  break;
				  }else{
					  if (document.getElementById('chk_'+id[i]).checked == true && ltrim(valor('txtCant_'+id[i]))!=''){
						  bandera = true;					  
						  paso = true;
					  }
				  }
			 }

			 if (paso == false){
			     bandera = false;
				 msj = Alert.alert(cadena);
			 }
		 }else{
			 msj = Alert.alert(cadena); 
			 bandera = false;
		 }

		 return bandera;
}

function marcarDesmarcar(ids, tipo, char){
	     var id = ids.split('|');
		 for (i=0; i<id.length; i++) 
		      if (id[i]!='')
			  document.getElementById(char+id[i]).checked = tipo;
}

function popup(url, ancho, largo, aux, move) {
         day = new Date();
         id = day.getTime();
		 x = (screen.width-ancho)/2;
		 y = (screen.height-largo)/2;
		 if (move){ y=y-10;x=x-10; }
         eval("page" + id + " = window.open(url, '" + id + "', 'toolbar=0,scrollbars="+aux+",location=0,statusbar=0,menubar=0,resizable=0,width="+ancho+",height="+largo+",left = "+x+",top = "+y+"');");
}

function marcafila(id, valor){
		 document.getElementById(id).value  = valor;
}

function resaltaFila(id){
         document.getElementById(id).style.backgroundColor = '#006666';
		 document.getElementById(id).style.color = "#FFFFFF";
}

function asignaValor(id_01, id_02){
		 document.getElementById(id_01).value = document.getElementById(id_02).value;
}

function numFormat(numero,dec)//da formato de moneda a un doble. 1er parametro es el numero, y el 2do es el decimal que se quiere
	{
		aux = String(numero);
		if (aux.indexOf(',')!=-1){
		    numero = Number(str_replace(',','.',str_replace('.','',String(numero)))),dec;
		}else{
			numero = Number(String(numero)),dec;
		}
		
		var num = numero, signo=3, expr;
		var cad = ""+numero;
		var ceros = "", pos, pdec, i;
		for (i=0; i < dec; i++)
			ceros += '0';
		pos = cad.indexOf('.')
		if (pos < 0)
			cad = cad+"."+ceros;
		else
		{
			pdec = cad.length - pos -1;
			if (pdec <= dec)
			{
				for (i=0; i< (dec-pdec); i++)
				cad += '0';
			}
			else
			{

				num = new String(num);
				aux_num=num.split('.');				
				num=aux_num[0]+'.'+aux_num[1][0]+aux_num[1][1];
				cad = new String(num);
			}
		}
		pos = cad.indexOf('.')
		if (pos < 0) pos = cad.lentgh
		if (cad.substr(0,1)=='-' || cad.substr(0,1) == '+')
		signo = 4;
		if (pos > signo)
		do{
		expr = /([+-]?\d)(\d{3}[\.\,]\d*)/
		cad.match(expr)
		cad=cad.replace(expr, RegExp.$1+','+RegExp.$2)
		}
		while (cad.indexOf(',') > signo)
		if (dec<0) cad = redondear(cad.replace(/\./,''),dec);
		//alert(cad);
		cad=str_replace("undefined","",str_replace(",",".",cad.split('.')[0])+","+cad.split('.')[1]);
		return cad;
	}
	
function ltrim(s){
   return s.replace(/^\s+/, "");
}

function rtrim(s){
   return s.replace(/\s+$/, "");
}


function popupReportesFaltantes(tipo){
         var get = "";
		 var salida = valor(tipo).split('|');
		 switch (salida[0]){
			     case '1': get = 'campo=id_depositod&id='+valor('cboDepositodestino'); break;
				 case '2': get = 'campo=id_obrad&id='+valor('cboObraDestino');         break;
				 case '3': get = 'campo=id_taller&id='+valor('cboTaller');             break;
		 }
		 popup('reportes/reporte_04.rpt.php?'+get, screen.width, screen.height, 'yes', false);
}

function modificarCantInv(idTd, img, campo, valor){
		 document.getElementById(img).style.display="";
		 document.getElementById(idTd).innerHTML = '<input name="'+campo+'" type="text" class="tex_box" id="'+campo+'" size="5" maxlength="10" value="'+sinFormato(valor)+'" />';
}

function validaExcepcion(id, idList){
         var output = document.getElementById(idList).options;
         var band   = false;
		 
		 if (document.getElementById(id).checked == true)
		     band = true;
		 else
             if (valor(idList)=='2'){
			     output[0].selected=true;
				 Alert.error("Debe marcar como excepci&oacute;n para poder usar una obra como <br><br><strong>Inventario de Or&iacute;gen.</strong>");
			 }else
			     band = true;
				 
		return band;
}

function searchList(idTxt, idList) {
         var input  = document.getElementById(idTxt).value.toLowerCase();
         var output = document.getElementById(idList).options;
		 
         for (var i=0;i<output.length;i++) {
              if (output[i].value.indexOf(input)==0){
                  output[i].selected=true;
              }
			  
              if (valor(idTxt)==''){
                 output[0].selected=true;
              }
         }
}

function comparaDatos(valor_01, valor_02, tipo, labels){
	     label = labels.split('|');
        // alert(valor_01+' - '+valor_02);
		 switch (tipo){
			     case 1: if (valor_01==valor_02)
				             return true;
						 else{
						     Alert.error('Los valores (<strong>'+label[0]+'</strong>) y (<strong>'+label[1]+'</strong>), deben ser iguales.');
							 return false;
						 }
				 break;
				 
				 case 2: if (valor_01!=valor_02)
				             return true;
						 else{
						     Alert.error('Los valores (<strong>'+label[0]+'</strong>) y (<strong>'+label[1]+'</strong>), deben ser diferentes.');
							 return false;
						 }
				 break;
		 }
}

function changeimg(opcion, id, strImg) {
		 if (opcion='over')
	         document.getElementById(id).src = strImg;
		 else	 
		     document.getElementById(id).src = strImg; 
}

function Inner(id, val){
	if(!val)val='';
	document.getElementById(id).innerHTML=val;
}

function terminos(id){
    if (document.getElementById(id).checked == true){ 
		return true;
	}else{	 
		Alert.error("Debe aceptar los terminos y condiciones de la p&aacute;gina.");
		return false;
	}
}




/*function incluirArchivo(){	

	//myf=document.getElementById("contenido").value = FCKeditorAPI.__Instances['contenido'].GetData();
     myf= FCKeditorAPI.__Instances['contenido'].GetData();
     conte=myf+$('Archivo_').value;
	 FCKeditorAPI.__Instances['contenido'].SetData(conte);
}
function incluirContenido(){	
	//myf=document.getElementById("contenido").value = FCKeditorAPI.__Instances['contenido'].GetData();
     myf= FCKeditorAPI.__Instances['contenido'].GetData();
     conte=myf+$('Link_').value;
	 FCKeditorAPI.__Instances['contenido'].SetData(conte);

}
*/


$(document).ready(function(){
								
// Efecto del Menu *********************************	
  $("ul.subnavegador").hide();				
  $("a.desplegable").toggle(
     function() { 
		$(this).parent().find("ul.subnavegador").slideDown('fast'); 
	 },
	 function() { 
		$(this).parent().find("ul.subnavegador").slideUp('fast'); 
	 }				
  );	
					
										
//Efecto de color del Menu *************************		  
  $('.navegador li a').hover(function() {
    $(this).addClass('hover');
  }, function() {
    $(this).removeClass('hover');
  });
		 
//Efecto de desaparecer el TR de id=homeInstalaciones	
	$(".navegador li a[href='#'][class!='desplegable']").click(function(){	
	//$(".navegador").click(function(){
			$('a').removeClass('marcado')  // desmarca de rojo todos los enlaces
			$(this).addClass("marcado");	   // marca de rojo el seleccionado
			
		//	$('#homeInstalaciones').hide() ;	// Se oculta  hide()
			//$('#homeNoticias').width(700);
	});  
	
	
// Crear Comentario	en admin/vistas/crearContenido.php
// Evento al seleccionar del SELECT de id=tipo  **********************	
	$('#tipo').change(function(){	
		if(this.value>1){
			$('#contenido').css('visibility','visible');			
		}else{
		   $('#contenido').css('visibility','hidden');
		}
    });
	 
}); // *******************************  Cierre de jQuery(document).ready(function($

function mostrarNoticia(id){
	//alert('Leyendo mas... id='+id);
}

function noticiaAjax(i){
    redirect('?id=includes/homeNoticias.php&enlace='+i) ;		
}
/*function busquedaAjax(i){
    $.get('includes/homeNoticias.php?enlace='+i+'' , function(data) {
       $('#homeNoticias').html(data);
    });		
}
*/
	
		   
		   
/*function masNoticias(enlace){
	//alert('Enlace actual :'+enlace);
	ir_url ('includes/homeNoticias.php?enlace='+enlace,'homeNoticias');
	
	return false;
	
}*/




// Mensajes de ayuda


/* 
<!-- 
		+ --------------------------------------------------------- +
		|                                                           |
		| 	Desarrollado por: Gustavo A. Ocanto C.                  |
		| 	Email: gustavoocanto@gmail.com / info@websarrollo.com   |
		| 	Teléfono: 0414-428.42.30 / 0245-511.38.40               |
		| 	Web: http://www.gustavoocanto.com                       |
		|        http://www.websarrollo.com                         |
		| 	Valencia, Edo. Carabobo - Venezuela                     |
		|                                                           |
        + --------------------------------------------------------- +
-->
*/