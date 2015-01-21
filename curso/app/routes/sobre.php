<?php

$app->get('/sobre/', function() use($app){
	$app->render('layout.php', array('pagina' => 'sobre', 'titulo' =>'Sobre a empresa'));
});