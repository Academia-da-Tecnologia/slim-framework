<?php

$app->get('/', function() use($app){
	//listar posts
	$posts=new \app\models\posts();
	$postsEncontrados=$posts->listar();

	$administrador = new app\models\administrador();
	$administradores = $administrador->listar();
	
	$app->render('layout.php', array('pagina' => 'home', 'titulo' =>'Bem Vindo ao curso de Slim Framework','posts' => $postsEncontrados));
});

$app->delete('/home/deletar/:id', function($id) use($app){
		$id = filter_var($id,FILTER_SANITIZE_NUMBER_INT);
		try{		
			$post=new \app\models\posts();
			$post->deletar($id);
			echo 'deletou';
		}catch(\ActiveRecord\ActiveRecordException $e){
			echo $e->getMessage();
		}
});

$app->map('/teste(/:id)', function($id=25) use($app){
	
	echo $id;

})->via('GET', 'POST');
