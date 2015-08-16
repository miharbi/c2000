<?php
	/*
		 +---------------------------------------------------------------------------+
		 | Administrador de CPA SEGUROS                                              |
		 +---------------------------------------------------------------------------+
		 | Copyright (c) 2008 by Websarrollo, C.A.                                   |                               
		 | http://www.websarrollo.com                                                |
		 |                                                                           |
		 | Este programa es software libre; puede ser redistribuido y/o modificado   |
		 | bajo los t�rminos de la licencia p�blica general GNU                      |
		 | includes/config.php Contiene las variables para configurar el sitio web   |
		 +---------------------------------------------------------------------------+
	*/
	
	#Configuraci�n principal del sitio
	$config['local'] = !($_SERVER['SERVER_NAME'] == "www.cumbres2000.com" || $_SERVER['SERVER_NAME'] == "cumbres2000.com");

	$config['base_url'] = !$config['local'] ? 'http://cumbres2000.com' : 'http://cumbres.web';

	define("DOMINIO", $config['base_url']);
	define("DIRECTORIO", "/");
	define("CARPETA_ADMIN", "admin/");	define("EMAIL_CONTACTO", "contacto@gmail.com");
	define("EMAIL_NO_RESPONDA", "noresponda@gmail.com");
	define("PERSONA_CONTACTO", "Equipo cumbres2000.com");
	
	#Configuraci�n de metas de la pagina principal
	define("TITLE", "Portal de Montañismo. Por David Rivas");
	define("COPYRIGHT", "Cumbres2000.com");
	define("AUTHOR", "Cumbres2000.com");
	define("DESCRIPTION", "Portal de Montañismo. Por David Rivas");
	define("KEYWORDS", "cumbres2000");
	
	#Configuracion de la conexion a la base de datos
	define("HOST", "localhost");

	$config['USER'] = !$config['local'] ? 'cvmbr3s_cvmbr3s' : 'homestead';
	$config['PASS'] = !$config['local'] ? '*cumbres123*' : 'secret';
	$config['DATA'] = !$config['local'] ? 'cvmbr3s_cumbres2000' : 'cumbres2000';
	define("USER", $config['USER']);
	define("PASS", $config['PASS']);
	define("DATA", $config['DATA']); 

?>