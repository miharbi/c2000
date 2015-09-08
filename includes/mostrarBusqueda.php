<?php 
    //sleep(3);
if (isset($_GET['id'])) {
    include 'config.php';
    include 'conexion.php';
    include 'funciones.php';
    $id = $_GET['id'];

    $result = mysql_query("SELECT contenido,titulo,DATE_FORMAT(fecha,'%w %e %m %Y') AS fech FROM `contenidos` WHERE id='$id' ") or die(mysql_error());
    //$resultados=mysql_num_rows($result2);
    $row = mysql_fetch_assoc($result);

    $dias = ['Domingo','Lunes','Martes','Mi&eacute;rcoles','Jueves','Viernes','S&aacute;bado'];

    $f = explode(' ', $row['fech']);  // dar formato a la fecha (Lunes, 1 Febrero 2011)
    $m = mes($f[2]);
    $d = $f[0];
    $d = $dias[$d];
    //$ff=$d.', '.$f[1].' '.$m.' '.$f[3];
    $titulo = renombrar($row['titulo']); // Por los acentos
    $titulo = ucwords($titulo); // Primera letra a Mayuscula
    $contenido = $row['contenido'];
    ?>
    <div align="center">
	<table border="0">
    <tr><td><img src="../img/temporal.jpg" border="0" width="750px" height="150px" /></td></tr>
    <tr><td align="right"><b></b></td></tr>
    <tr><td align="center"> 	 
    <b><?=$titulo;
    ?></b>
    </td></tr>
    <tr><td>
    <?=$contenido;
    ?>
    </td></tr></table>
    </div>
    
		
<?php 
}
?>