<?php

$app->get('/detalhes/:slug', function($slug) use($app,$twig){

	//menu
	$menu = new \app\models\menu();
	$menuLateral = $menu->exibirMenuLateral();

	$produto = \app\models\produtos::where('tb_produto_slug', $slug);

	$dados = array(
		'produto' => $produto,
		'menu' => $menuLateral
	);

	$template = $twig->loadTemplate('detalhes.html');
	$template->display($dados);


});