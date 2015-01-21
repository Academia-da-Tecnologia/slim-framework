<?php

$app->get('/categoria/admin/novo/', function() use($app){
	\app\classes\categoria::estaLogado('administrador_logado',$app);

	$categorias = \app\models\categoria::listar();

	$view = $app->view();
	$view->setTemplatesDirectory(TEMPLATE_ADMIN);

	$dados = array(
		'pagina' => 'categoria_cadastrar',
		'nome' => $_SESSION['administrador_nome'],
		'categorias' => $categorias
	);

	$app->render('layout.php',$dados);
});

$app->post('/categoria/cadastrar/', function() use($app){

	$categoriaCadastrar = $app->request()->post('categoria');
	$categoriaCadastrada = \app\models\categoria::where('tb_categoria_nome',$categoriaCadastrar);

	if(count($categoriaCadastrada) == 1):
		$app->flash('mensagem', '<span class="text-danger">Categoria já cadastrada</span>');
		$app->redirect('/categoria/novo/');
	else:
		if(empty($categoriaCadastrar)):
			$app->flash('mensagem', '<span class="text-danger">Digite uma categoria</span>');
			$app->redirect('/categoria/admin/novo/');
		else:
			$attributes=array('tb_categoria_nome'=>$categoriaCadastrar);
			\app\models\categoria::cadastrar($attributes);
			$app->flash('mensagem', '<span class="text-success">Categoria cadastrada com sucesso !</span>');
			$app->redirect('/categoria/admin/novo/');
		endif;	
	endif;	
});

$app->get('/categoria/deletar/:id', function($id) use($app){

	$categoria = new \app\models\categoria();
	$categoria->deletar($id);
	$app->flash('mensagem','<span class="text-success">Categoria deletada com sucesso !</span>');
	$app->redirect('/categoria/admin/novo');

});

$app->post('/categoria/atualizar/', function() use($app){
	$id = $app->request()->post('id');
	$categoriaEncontrada = $app->request()->post('categoria');

	if(empty($categoriaEncontrada)){
		$app->flash('mensagem', '<span class="text-danger">Digite uma categoria</span>');
		$app->redirect('/categoria/editar/'.$id);
	}else{
		$attributes = [
			'tb_categoria_nome' => $categoriaEncontrada
		];
		$categoria = new \app\models\categoria();
		$categoria->atualizar($id,$attributes);
		$app->flash('mensagem', '<span class="text-success">Categoria alterada</span>');
		$app->redirect('/categoria/editar/'.$id);
	}
});

$app->get('/categoria/editar/:id', function($id) use($app){
	\app\classes\categoria::estaLogado('administrador_logado',$app);

	$view = $app->view();
	$view->setTemplatesDirectory(TEMPLATE_ADMIN);

	$categoria = new \app\models\categoria();
	$categoriaEncontrada = $categoria->where('id',$id);

	$app->render('/layout.php',[
	 'pagina' => 'categoria_editar',
	 'nome' => $_SESSION['administrador_nome'],
	 'categoria' => $categoriaEncontrada
	 ]);

});
