//Indica el numero y la ruta a la imagen inicioatura

var myimages=new Array()
  myimages[1]="http://cumbres2000.com/index.php?id=266"
  myimages[2]="http://cumbres2000.com/index.php?id=266"
  myimages[3]="http://cumbres2000.com/index.php?id=266"
  myimages[4]="http://cumbres2000.com/index.php?id=266"
  myimages[5]="http://cumbres2000.com/index.php?id=266"
  myimages[6]="http://cumbres2000.com/index.php?id=266"
  myimages[7]="http://cumbres2000.com/index.php?id=266"
  myimages[8]="http://cumbres2000.com/index.php?id=266"
  myimages[9]="http://cumbres2000.com/index.php?id=266"
  myimages[10]="http://cumbres2000.com/index.php?id=266"
  myimages[11]="http://cumbres2000.com/index.php?id=266"
  myimages[12]="http://cumbres2000.com/index.php?id=266"

//Indica el numero y la ruta a la imagen de tama帽o completo

var myimages_big=new Array()
  myimages_big[1]="img/fondos/inicio/01.jpg"
  myimages_big[2]="img/fondos/inicio/02.jpg"
  myimages_big[3]="img/fondos/inicio/03.jpg"
  myimages_big[4]="img/fondos/inicio/04.jpg"
  myimages_big[5]="img/fondos/inicio/05.jpg"
  myimages_big[6]="img/fondos/inicio/06.jpg"
  myimages_big[7]="img/fondos/inicio/07.jpg"
  myimages_big[8]="img/fondos/inicio/08.jpg"
  myimages_big[9]="img/fondos/inicio/09.jpg"
  myimages_big[10]="img/fondos/inicio/10.jpg"
  myimages_big[11]="img/fondos/inicio/11.jpg"
  myimages_big[12]="img/fondos/inicio/12.jpg"  
  
//Especifica la descripci贸n de cada imagen

var descripcion=new Array()
  descripcion[1]="Fila Maestra desde el Naiguata"

function popup_s(FILE,TEXTO) {

var opciones2="resizable=yes,width=450,height=520,toolbar=0,scrollbars=1,left=200,top=200";

CONTENT = "<HTML><HEAD><TITLE>Imagen Destacada</TITLE></HEAD>" + "<BODY><CENTER><P><IMG SRC='" + FILE + "' BORDER=0>" + "</CENTER>"+ " <center><p>'"+TEXTO+"'</p><FORM><INPUT TYPE='BUTTON' VALUE='cerrar'" + "onClick='window.close()'></FORM></center></BODY></HTML>";

pop = window.open("","",opciones2);

pop.document.open();

pop.focus();

pop.document.write(CONTENT);

pop.document.close();

}

function random_imglink(){

var ry=Math.floor(Math.random()*myimages.length)

if (ry==0)

ry=1

document.write('<a href=http://cumbres2000.com/index.php?id=266><img src="'+myimages_big[ry]+'" border=0>'+'</a>')

}
random_imglink()