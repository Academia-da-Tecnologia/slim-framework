<?php
$app = new \Slim\Slim(array(
	'debug' => true
));

$loader = new \Twig_Loader_FileSystem(ROOT.'app/views');
$twig = new \Twig_Environment($loader, array(
	'debug' => false,
	'cache' => ROOT.'cache/'
));

$twig->getExtension('core')->setTimeZone('America/Sao_Paulo');
$twig->getExtension('core')->setDateFormat('d/m/Y H:i:s');