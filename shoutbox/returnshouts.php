<?php

//define file
$_SERVER['SCRIPT_NAME'];
$file = 'shouts.txt';

//open
/*$fp = fopen($file, "r");

//read and format
$shouts = fread($fp, 80000);
fclose($fp);
echo '<table width="100%" border="0">';
echo stripslashes($shouts);
echo '</table>';*/
function convertir($cad)
{
    $acentos = ['á', 'Á', 'é', 'É', 'í', 'Í', 'ó', 'Ó', 'ú', 'Ú', 'ñ', 'Ñ'];
    $caracter = ['&aacute;', '&Aacute;', '&eacute;', '&Eacute;', '&iacute;', '&Iacute;', '&oacute;', '&Oacute;', '&uacute;', '&Uacute;', '&ntilde;', '&Ntilde;'];

    for ($i = 0; $i < count($acentos); $i++) {
        $cad = str_replace($acentos[$i], $caracter[$i], $cad);
    }

    return $cad;
}

$file = array_reverse(file($file));

echo '<table width="100%" border="0">';

foreach ($file as $linea) {
    $linea = convertir($linea);
    if (strpos(' '.$linea, '<tr>')) {
        echo str_replace('<tr>', '</tr>', $linea);
    } elseif (strpos(' '.$linea, '</tr>')) {
        echo str_replace('</tr>', '<tr>', $linea);
    } else {
        echo $linea;
    }
}

echo '</table>';
