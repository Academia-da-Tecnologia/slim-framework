<?php

$app->get('/', function() use($app,$twig){

	$produtos = \app\models\produtos::produtosInicio();

	//menu
	$menu = new \app\models\menu();
	$menuLateral = $menu->exibirMenuLateral();

	$dados = array(
		'produtos' => $produtos,
		'menu' => $menuLateral
	);

	$template = $twig->loadTemplate('home.html');
	$template->display($dados);

});