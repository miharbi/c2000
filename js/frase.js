function random_frase(){
  var frase=new Array()
  frase[1]="En la escalada el cerebro es el m&uacute;sculo m&aacute;s importante."
  frase[2]="Sobre mi odisea al Nanga Parbat dijeron que tuve mucha suerte... pero yo no creo en la suerte."
  frase[3]="Esto no es alpinismo, &iexcl;es la guerra!. (en referencia a la Cara norte de las Grandes Jorasses, 1930)"
  frase[4]="El alpinista es qui&eacute;n conduce su cuerpo all&aacute; donde un d&iacute;a sus ojos lo so&ntilde;aron."
  frase[5]="&iquest;Por qu&eacute; subir monta&ntilde;as? Porque est&aacute;n ah&iacute;."
  frase[6]="Hay dos tipos de escaladores... los escaladores inteligentes y los escaladores muertos."
  frase[7]="La monta&ntilde;a no es como los humanos. La monta&ntilde;a es sincera."
  frase[8]="Recuerda: si llevas material de vivac, vivaquear&aacute;s..."
  frase[9]="Nada habr&iacute;a podido suceder si alguien no lo hubiera imaginado."
  frase[10]="El valor de un alpinista es inversamente proporcional a la cantidad de material que se lleva."
  frase[11]="Lo esencial no es escalar r&aacute;pido sino durante mucho tiempo."
  frase[12]="Si todo est&aacute; bajo control es que est&aacute;s escalando demasiado lento."
  frase[13]="El camino hacia la cima es, como la marcha hacia uno mismo, una ruta en solitario."
  frase[14]="La cima es la mitad del camino."
  frase[15]="Las grandes monta&ntilde;as no son justas o injustas, simplemente son peligrosas."
  frase[16]="No hay rocas descompuestas, sino alpinistas inexpertos."
  frase[17]="Si yo no reflexionara mucho, estudiase y planease la ascensi&oacute;n cuidadosamente, hace tiempo que estar&iacute;a muerto."
  frase[18]="Si en condiciones normales se trata de habilidad, en contadas, en las situaciones m&aacute;s extremas, es el esp&iacute;ritu el que te salva."
  frase[19]="En la escalada sin cuerda, caer es dif&iacute;cil, pero lo es a&uacute;n m&aacute;s sobrevivir a ello."
  frase[20]="Nunca midas la altura de una monta&ntilde;a hasta que no hayas llegado a la cumbre. Entonces ver&aacute;s que no era tan alta como pensabas."
  frase[21]="No conquistamos las monta&ntilde;as, sino a nosotros mismos."
  frase[22]="Yo no he conquistado el Everest. Simplemente &eacute;l me ha dejado estar all&iacute;. al llegar al campo base tras coronar el Everest."
  frase[23]="No hay atajos a la cumbre. Debemos subir la monta&ntilde;a paso a paso, por nosotros mismos."
  frase[24]="En la monta&ntilde;a nada hay que reemplace la experiencia."
  frase[25]="Ver de cerca una monta&ntilde;a y no sentir deseos de subirla es radicalmente imposible."
  frase[26]="El mejor monta&ntilde;ista, es quien m&aacute;s disfruta de la monta&ntilde;a."
  frase[27]="He descubierto que tras subir una montaña, solo encontramos mas cumbres que escalar."

  
 var autor=new Array()
  autor[1]="Wolfgang Gullich"
  autor[2]="Reinhold Messner"
  autor[3]="Armand Charlet"
  autor[4]="Gaston R&eacute;buffat"
  autor[5]="Lionel Terray"
  autor[6]="Don Whillans"
  autor[7]="Walter Bonatti"
  autor[8]="Yvon Chouinard"
  autor[9]="Reinhold Messner"
  autor[10]="Reinhold Messner"
  autor[11]="Georges Livanos"
  autor[12]="Mario Andretti"
  autor[13]="Alessandro Gogna"
  autor[14]="Ed Visteurs"
  autor[15]="Reinhold Messner"
  autor[16]="Georges Livanos"
  autor[17]="Tomo Cessen"
  autor[18]="Walter Bonatti"
  autor[19]="Rad"
  autor[20]="Dag Hammarkskjold"
  autor[21]="Edmund Hillary"
  autor[22]="Peter Habeler"
  autor[23]="Judi Adler"
  autor[24]="Louis Audoubert"
  autor[25]="Ram&oacute;n Suri&ntilde;ach"
  autor[26]="Jose Antonio Delgado"
  autor[27]="Nelson Mandela"

  var ry=Math.floor(Math.random()*frase.length)

  if (ry==0)
     ry=1
     document.write(frase[ry]+'<br>'+'<b>'+autor[ry])

}<!--<p>'+autor[ry]+'</p>-->

  random_frase()
//-->