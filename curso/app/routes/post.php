<?php

$app->post('/post/cadastrar/', function() use($app){
	$titulo = $app->request()->post('titulo');
	$texto = $app->request()->post('texto');

	$validation=new \app\classes\validation();
	$validacoes=array(
		'titulo' => 'obrigatorio|maxlength=20|unique=tb_posts.tb_posts_titulo',
		'texto' => 'obrigatorio|maxlength=20'
	);
	$validar=$validation->validar($_POST,$validacoes);
	if($validar){
		try{
			 $posts=new \app\models\posts();
			 $attributes=array(
			 	'tb_posts_titulo' => $titulo,
			 	'tb_posts_texto' => $texto
			 );
			 //$posts->cadastrar($attributes);
			 //$app->redirect('/');
		}catch(\ActiveRecord\ActiveRecordException $e){
			echo $e->getMessage();
		}
	}else{
		//criando a sessao para guardar os erros
		$app->flash('erros', $validation->mostrarErros());

		//redirecionar para a pagina inicial
		$app->redirect('/');
	}
});

$app->get('/post/editar/:id', function($id) use($app){

	//listar posts iniciais
	$posts=new \app\models\posts();
	$postsEncontrados=$posts->listar();

	//pegar post escolhido
	$dadosPostEncontrado=$posts->pegar_pelo_id($id);

	$app->render('layout.php', array('pagina' => 'home', 'titulo' => 'Bem Vindo ao curso de Slim Framework','posts' => $postsEncontrados, 'editar' => $dadosPostEncontrado));
});

$app->put('/post/atualizar/:data', function($data){
	$dados=array();
	parse_str($data,$dados);

	$posts=new \app\models\posts();
	$titulo = filter_var($dados['titulo'], FILTER_SANITIZE_STRING);
	$texto = filter_var($dados['texto'], FILTER_SANITIZE_STRING);
	$id = filter_var($dados['postId'], FILTER_SANITIZE_NUMBER_INT);

	try{	
		$attributes=array(
			'tb_posts_titulo' => $titulo,
			'tb_posts_texto' => $texto
		);
		$posts->atualizar($id,$attributes);
		echo 'atualizou';
	}catch(\ActiveRecord\ActiveRecordException $e){
		echo $e->getMessage();
	}

});