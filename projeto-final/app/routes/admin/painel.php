<?php
$app->get('/painel', function() use($app){
	$app->redirect('/painel/');
});

$app->get('/painel/(pag/:num)', function($pag=1) use($app){

	\app\traits\login::estaLogado('administrador_logado',$app);

	$view = $app->view();
	$view->setTemplatesDirectory(TEMPLATE_ADMIN);

	//pegar produtos cadastrados
	$produtosEncontrados = \app\models\produtos::listar();

	$produtos = new \app\models\produtos();
	$produtos->setLimite(15);
	$produtos->setPaginaAtual($pag);
	$produtos->setTotalRegistros(count($produtosEncontrados));
	$produtosCadastrados = $produtos->paginate($produtos->getLimite(),$produtos->offset());

	$dados = array(
		'pagina' => 'painel',
		'nome' => $_SESSION['administrador_nome'],
		'produtos' => $produtosCadastrados,
		'totalProdutos' => count($produtosEncontrados),
		'links' => $produtos->gerarLinks()
	);

	$app->render('layout.php',$dados);
});