<?php

$app->get('/contato/', function() use($app){
	$app->render('layout.php', array('pagina' => 'contato', 'titulo' =>'Pagina de contato'));
});