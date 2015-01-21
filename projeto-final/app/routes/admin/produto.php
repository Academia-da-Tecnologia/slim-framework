<?php

$app->get('/produto/admin/novo/', function() use($app){
	\app\traits\login::estaLogado('administrador_logado',$app);

	$categorias = \app\models\categoria::listar();
	$subcategorias = \app\models\subcategoria::listar();

	$view = $app->view();
	$view->setTemplatesDirectory(TEMPLATE_ADMIN);

	$dados = array(
		'pagina' => 'produto_cadastrar',
		'nome' => $_SESSION['administrador_nome'],
		'categorias' => $categorias,
		'subcategorias' => $subcategorias
	);

	$app->render('layout.php',$dados);
});

$app->post('/produto/cadastrar/', function() use($app){
	
	$nome = $app->request()->post('nome-produto');
	$preco = $app->request()->post('preco-produto');
	$categoria = $app->request()->post('categoria');
	$subcategoria = $app->request()->post('subcategoria');
	$link = $app->request()->post('link-produto');
	$descricao = $app->request()->post('descricao-produto');
	$slug = $app->request()->post('slug-produto');

	$validation = new \app\classes\validation();
	$validacoes = array(
		'categoria' => 'obrigatorio',
		'subcategoria'=>'obrigatorio',
		'nome-produto' =>'obrigatorio',
		'preco-produto' => 'obrigatorio',
		'link-produto' => 'obrigatorio',
		'descricao-produto' => 'obrigatorio',
		'slug-produto' => 'obrigatorio'
	);
	$validar = $validation->validar($_POST,$validacoes);

	if($validar):
		$produtoCadastrado = \app\models\produtos::where('tb_produto_nome',$nome);
		if(count($produtoCadastrado) == 1):
			$app->flash('erro', 'Produto já está cadastrado, tente outro');
			$app->flash('nomeProduto',$nome);
			$app->flash('precoProduto',$preco);
			$app->flash('linkProduto',$link);
			$app->flash('descricaoProduto',$descricao);
			$app->flash('slugProduto',$slug);
			$app->redirect('/produto/admin/novo/');	
		else:
			$attributes = array(
				'tb_produto_categoria' => $categoria,
				'tb_produto_subcategoria'=>$subcategoria,
				'tb_produto_nome' => $nome,
				'tb_produto_preco' => $preco,
				'tb_produto_link'=>$link,
				'tb_produto_descricao'=>$descricao,
				'tb_produto_slug' => $slug
			);
			\app\models\produtos::cadastrar($attributes);
			$app->flash('sucesso', 'Produto cadastrado com sucesso !');
			$app->redirect('/produto/admin/novo/');
		endif;	
	else:
		$app->flash('erro', $validation->mostrarErros());
		$app->flash('nomeProduto',$nome);
		$app->flash('precoProduto',$preco);
		$app->flash('linkProduto',$link);
		$app->flash('descricaoProduto',$descricao);
		$app->flash('slugProduto',$slug);
		$app->redirect('/produto/novo/');	
	endif;	
});

//formulario alterar ou cadastrar a foto
$app->get('/produto/admin/foto/:id', function($id) use($app){
	\app\traits\login::estaLogado('administrador_logado',$app);

	$view = $app->view();
	$view->setTemplatesDirectory(TEMPLATE_ADMIN);

	//pegar dados do produto
	$produto = \app\models\produtos::where('id',$id);

	$dados = array(
		'pagina' => 'produto_foto',
		'nome' => $_SESSION['administrador_nome'],
		'produto' => $produto
	);

	$app->render('layout.php',$dados);
});

//alterar ou cadastrar nova foto
$app->post('/produto/nova/foto/:id', function($id) use($app){

	$view = $app->view();
	$view->setTemplatesDirectory(TEMPLATE_ADMIN);

	$foto = $_FILES['foto']['name'];
	$temp_foto = $_FILES['foto']['tmp_name'];

	$extensoes_permitidas = array('jpg','jpeg','png');

	//verifica se escolheu uma foto
	if(empty($foto)):
		$app->flash('mensagem', '<div class="alert alert-danger">Escolha uma foto !</div>');
		$app->redirect('/produto/admin/foto/'.$id);
	else:	
		//verificar se e uma imagem
		$isImage = \app\classes\imagem::isImage($foto);
		if($isImage):
			//verificar se o profuto tem foto
			$produtoCadastrado = \app\models\produtos::where('id',$id);
			if(empty($produtoCadastrado->tb_produto_foto)):
				//se nao tiver foto faz upload e grava no banco
				$wide = \WideImage\WideImage::load($temp_foto);
				$imagem = new \app\classes\imagem();
				$novoNome = $imagem->renomear($foto);
				$imagem->upload($wide,'fotos/produtos',600,280);

				$attributes = array('tb_produto_foto' => 'public/fotos/produtos/'.$novoNome);

				\app\models\produtos::atualizar($id,$attributes);

				$app->flash('mensagem', '<div class="alert alert-success">Foto Cadastrada !</div>');
				$app->redirect('/produto/admin/foto/'.$id);
			else:	
				//se existir deleta a foto que ja existefaz upload da outra e cadastra no banco

				\app\classes\imagem::deletar($produtoCadastrado->tb_produto_foto);

				//faz uploda para a pasta
				$wide = \WideImage\WideImage::load($temp_foto);
				$imagem = new \app\classes\imagem();
				$novoNome = $imagem->renomear($foto);
				$imagem->upload($wide,'fotos/produtos',600,280);

				$attributes = array('tb_produto_foto' => 'public/fotos/produtos/'.$novoNome);

				\app\models\produtos::atualizar($id,$attributes);

				$app->flash('mensagem', '<div class="alert alert-success">Foto Cadastrada !</div>');
				$app->redirect('/produto/admin/foto/'.$id);

			endif;	
		else:
			$app->flash('mensagem', '<div class="alert alert-danger">Escolha uma foto com a extensão aceita !</div>');
			$app->redirect('/produto/admin/foto/'.$id);
		endif;	
	endif;	

});

$app->get('/produto/editar/:id', function( $id ) use($app){

	$view = $app->view();
	$view->setTemplatesDirectory(TEMPLATE_ADMIN);

	$produtoEncontrado = \app\models\produtos::where('id',$id);
	$categoriaEncontrada = \app\models\categoria::listar();
	$subcategoriaEncontrada = \app\models\subcategoria::listar();

	$app->render('layout.php', [ 
		'pagina' => 'produto_editar',
		'nome' => $_SESSION['administrador_nome'],
		'produto' => $produtoEncontrado,
		'categorias' => $categoriaEncontrada,
		'subcategorias' => $subcategoriaEncontrada
	 ]);

});

$app->post('/produto/atualizar/', function() use($app){
	
	$nome=$app->request()->post('nome');
	$preco=$app->request()->post('preco');
	$categoria=$app->request()->post('categoria');
	$subcategoria=$app->request()->post('subcategoria');
	$link=$app->request()->post('link');
	$descricao=$app->request()->post('descricao');
	$slug=$app->request()->post('slug');
	$id = $app->request()->post('id');

	$validation = new \app\classes\validation();
	$validacoes = [
		'categoria' => 'obrigatorio',
		'subcategoria'=>'obrigatorio',
		'nome' =>'obrigatorio',
		'preco' => 'obrigatorio',
		'link' => 'obrigatorio',
		'descricao' => 'obrigatorio',
		'slug' => 'obrigatorio'
	];

	$validar = $validation->validar( $_POST, $validacoes );

	if( $validar ){
		$attributes = [
			'tb_produto_categoria' => $categoria,
			'tb_produto_subcategoria'=>$subcategoria,
			'tb_produto_nome' => $nome,
			'tb_produto_preco' => $preco,
			'tb_produto_link'=>$link,
			'tb_produto_descricao'=>$descricao,
			'tb_produto_slug' => $slug
		];

		\app\models\produtos::atualizar( $id, $attributes );

		$app->flash('mensagem','Atualizado com sucesso !!!');
		$app->redirect('/produto/editar/'.$id);
	}else{
		$app->flash('mensagem',$validation->mostrarErros());
		$app->redirect('/produto/editar/'.$id);
	}
});

$app->delete('/produto/deletar/:id', function( $id ){
	$produto = new \app\models\produtos();
	$dadosProduto = $produto->where('id',$id);

	$imagem = new \app\classes\imagem();
	$imagem->deletar($dadosProduto->tb_produto_foto);

	$produto->deletar( $id );
	echo 'deletou';
});
