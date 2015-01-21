<?php

$app->get('/admin/painel', function() use($app){
	$app->config('templates.path', TEMPLATE_ADMIN);
	\app\classes\login::verificaLogin('logado_admin',$app);
	$data=array('pagina' => 'painel', 'nome' => $_SESSION['nome_admin']);
	$app->render('layout.php', $data);
});

$app->get('/admin/painel/listar', function() use($app){
	$posts=new \app\models\posts();
	$postsEncontrados=$posts->listar();
	echo $posts->toJson($postsEncontrados);
});

$app->delete('/admin/post/deletar/:id', function($id) use($app){
	$post=new \app\models\posts();
	try{
		$post->deletar($id);
		echo 'deletou';
	}catch(\ActiveRecord\ActiveRecordException $e){
		echo $e->getMessage();
	}
});

$app->map('/admin/post/editar/:id', function($id) use($app){
	if($app->request()->isGet()){
		$post=new \app\models\posts();
		$postEncontrado=$post->pegar_pelo_id($id);
		echo $post->toJson($postEncontrado);
	}else{
		$data=$app->request()->put();
		$posts=new \app\models\posts();
		try{
			$attributes=array(
			'tb_posts_titulo' => $data['post-titulo'],
			'tb_posts_texto' => $data['post-texto']
		);
		$posts->atualizar($id, $attributes);
		echo 'atualizou';
		}catch(\ActiveRecord\ActiveRecordException $e){
			echo $e->getMessage();
		}

	}

})->via('GET', 'PUT');

$app->post('/admin/post/cadastrar', function() use($app){
	$app->config('templates.path', TEMPLATE_ADMIN);
	$titulo = $app->request()->post('post-titulo');
	$texto = $app->request()->post('post-texto');
	$posts=new \app\models\posts();

	try{
		$attributes=array(
			'tb_posts_titulo' => $titulo,
			'tb_posts_texto' => $texto
		);
		$posts->cadastrar($attributes);
		$app->redirect('/admin/painel');
	}catch(\ActiveRecord\ActiveRecordException $e){

		$data=array('pagina' => 'painel', 'nome' => $_SESSION['nome_admin'], 'erro' => 'Ocorreu um erro ao gravar o post, tente novamente !');
		$app->render('layout.php', $data);

	}
});

$app->get('/admin/post/buscar', function() use($app){
		$app->config('templates.path', TEMPLATE_ADMIN);
		$buscar=$app->request()->get('busca');
		$posts= new \app\models\posts();
		$resultadoBusca=$posts->buscarPost($buscar);

		$data=array('pagina' => 'busca', 'nome' => $_SESSION['nome_admin'],'resultadoBusca' => $resultadoBusca);
		$app->render('layout.php', $data);
});