<?php

$app->map('/logar', function() use($app){

	if($app->request()->isGet()){
		$app->redirect('/admin');
	}

	$view = $app->view();
	$view->setTemplatesDirectory(TEMPLATE_ADMIN);

	$email = $app->request()->post('email');
	$pass = $app->request()->post('pass');

	$validation = new \app\classes\validation();
	$validacoes = array(
		'email' => 'obrigatorio|email',
		'pass' => 'obrigatorio'
	);

	$validar = $validation->validar($_POST,$validacoes);

	if($validar){
		$administrador = new \app\models\administrador();
		$administrador->setCampos(array('tb_administrador_email','tb_administrador_senha'));
		$dadosAdministrador = $administrador->logar($email,$pass);

		if(count($dadosAdministrador) == 1){
			$_SESSION['administrador_logado'] = true;
			$_SESSION['administrador_nome'] = $dadosAdministrador->tb_administrador_nome;
			$app->redirect('/painel/');
		}else{
			$erros = array('erro'=> 'Usuário ou senha incorretos');
		}
	}else{
		$erros = array('erro'=> $validation->mostraErros());
	}

$app->render('login.php',$erros);

})->via('GET', 'POST');