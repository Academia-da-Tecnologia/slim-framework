<?php
session_start();
ini_set('display_errors', 1);
define('ROOT', $_SERVER['DOCUMENT_ROOT']);
define('TEMPLATE_ADMIN', ROOT.'app/views/admin');

require ROOT.'vendor/autoload.php';
require ROOT.'autoload.php';
require ROOT.'connection.php';
require ROOT.'public/functions/functions.php';

//inicializando o slim framework
$app = new \Slim\Slim(array(
      'debug' =>false,
      'templates.path'=> ROOT.'app/views'
));

//erros personalizados
 $app->notFound(function() use($app){
        $app->render('layout.php', array('pagina' => '404'));
});

$app->error(function(\Exception $e) use ($app){
    $errors=array(
        'mensagem' => $e->getMessage(),
        'file' => $e->getFile(),
        'line' => $e->getLine(),
        'pagina' => 'error'
	);
    $app->render('layout.php', $errors);
});