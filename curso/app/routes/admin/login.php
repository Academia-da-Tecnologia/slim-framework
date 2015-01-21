<?php

$app->get('/admin', function() use($app){
	$app->config('templates.path', TEMPLATE_ADMIN);
	$app->render('layoutLogin.php');
});

$app->post('/logar/', function() use($app){
	$app->config('templates.path', TEMPLATE_ADMIN);
	
	$login=$app->request()->post('user');
	$senha=$app->request()->post('pass');

	$administrador=new \app\models\administrador();
	$logado=$administrador->logar($login,$senha);

	if(count($logado) == 1){
		$_SESSION['logado_admin']=true;
		$_SESSION['nome_admin']=$logado->tb_administrador_nome;
		$app->redirect('/admin/painel');
	}else{
		$data=array('erro' => 'erro ao logar');
		$app->render('layoutLogin.php',$data);
	}

});