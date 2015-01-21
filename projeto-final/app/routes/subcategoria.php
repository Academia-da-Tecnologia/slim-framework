<?php

$app->get('/subcategoria/:slug', function($slug) use($app,$twig){

	$subcategoria = \app\models\subcategoria::where('tb_subcategoria_slug', $slug);
	$produtos = \app\models\produtos::where('tb_produto_subcategoria',$subcategoria->id, 'all');

	//menu
	$menu = new \app\models\menu();
	$menuLateral = $menu->exibirMenuLateral();

	$dados = array(
		'nome' => 'Alexandre',
		'produtos' => $produtos,
		'menu' => $menuLateral,
		'subcategoria' => $subcategoria
	);

	$template = $twig->loadTemplate('subcategoria.html');
	$template->display($dados);
});