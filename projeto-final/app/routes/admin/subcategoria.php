<?php

$app->get('/subcategoria/admin/novo', function() use($app){
	\app\classes\categoria::estaLogado('administrador_logado',$app);

	//listagem das categorias
	$categorias = \app\models\categoria::listar();

	//listagem das subcategorias
	$subcategorias = \app\models\subcategoria::listar();

	$view = $app->view();
	$view->setTemplatesDirectory(TEMPLATE_ADMIN);

	$dados = array(
		'pagina' => 'subcategoria_cadastrar',
		'nome' => $_SESSION['administrador_nome'],
		'categorias' => $categorias,
		'subcategorias' => $subcategorias
	);

	$app->render('layout.php',$dados);

});

$app->post('/subcategoria/admin/cadastrar', function() use($app){
	
	$categoria = $app->request()->post('categoria');
	$subcategoria = $app->request()->post('subcategoria');
	$slug = $app->request()->post('slug');

	//verifica se ja existe a subcategoria
	$subcategoriaCadastrada = \app\models\subcategoria::where('tb_subcategoria_nome',$subcategoria);

	if(count($subcategoriaCadastrada) == 1):
		$app->flash('mensagem','<div class="alert alert-danger">Subcategoria já existe</div>');
		$app->redirect('/subcategoria/admin/novo');	
	else:	
		if(empty($subcategoria)):
			$app->flash('mensagem','<div class="alert alert-danger">Digite uma subcategoria</div>');
			$app->redirect('/subcategoria/admin/novo');	
		else:
			$attributes = array(
				'tb_subcategoria_nome' => $subcategoria,
				'tb_subcategoria_categoria' => $categoria,
				'tb_subcategoria_slug' => $slug
			);	
		\app\models\subcategoria::cadastrar($attributes);
		$app->flash('mensagem','<div class="alert alert-success">Cadastrado com sucesso.</div>');
		$app->redirect('/subcategoria/admin/novo');	
		endif;	
	endif;	
});

$app->get('/subcategoria/editar/:id', function($id) use($app){
	\app\classes\categoria::estaLogado('administrador_logado',$app);

	$view = $app->view();
	$view->setTemplatesDirectory(TEMPLATE_ADMIN);

	$subcategoriaCadastrada = \app\models\subcategoria::where('id',$id);
	$categorias = \app\models\categoria::listar();

	$data = [
		'pagina' => 'subcategoria_editar',
		'nome' => $_SESSION['administrador_nome'],
		'subcategoria' => $subcategoriaCadastrada,
		'categorias' => $categorias
	];

	$app->render('/layout.php',$data);

});

$app->post('/subcategoria/atualizar/', function() use($app){

	$id = $app->request()->post('id');
	$subcategoria = $app->request()->post('subcategoria');
	$categoria = $app->request()->post('categoria');

	if(empty($subcategoria)){
		$app->flash('mensagem' ,'<span class="text-danger">Digite uma subcategoria</span>');
		$app->redirect('/subcategoria/editar/'.$id);
	}else{
		$attributes = [
			'tb_subcategoria_nome' => $subcategoria,
			'tb_subcategoria_categoria' => $categoria
		];
		\app\models\subcategoria::atualizar($id,$attributes);
		$app->flash('mensagem' ,'<span class="text-success">Atualizado com sucesso !!!</span>');
		$app->redirect('/subcategoria/editar/'.$id);

	}
});

$app->delete('/subcategoria/deletar/:id', function($id) use($app){
	\app\models\subcategoria::deletar($id);
	echo 'deletado';
});