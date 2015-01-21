<div id="acoes">
	<a href="/painel" class="btn btn-primary">Voltar para página inicial</a>
</div>

<?php echo isset($flash['erro']) ? '<div class="alert alert-danger"><b>Os seguintes erros foram encontrados:</b><br />'.$flash['erro'].'</div>' : ''; ?>
<?php echo isset($flash['sucesso']) ? '<div class="alert alert-success">'.$flash['sucesso'].'</div>' : ''; ?>

<div id="form-cadastrar-novo-produto">
	<h3>Cadastrar novo produto</h3>	
	<form action="/produto/cadastrar/" role="form" method="post">
		 <div class="form-group">
	    <label for="nome">Nome do produto</label>
	    <input type="text" class="form-control" name="nome-produto" placeholder="Nome do produto" value="<?php echo isset($flash['nomeProduto']) ? $flash['nomeProduto'] : '';  ?>">
	  </div>
  	<div class="form-group">
  	<label>Categoria</label>
		<select class="form-control" name="categoria">
		<?php foreach($categorias as $categoria): ?>
			<option value="<?php echo $categoria->id; ?>"><?php echo $categoria->tb_categoria_nome; ?></option>
		<?php endforeach; ?>
		</select>
	</div>
	  	<div class="form-group">
	  	<label>Subcategoria</label>
		<select class="form-control" name="subcategoria">
			<?php foreach($subcategorias as $subcategoria): ?>
			<option value="<?php echo $subcategoria->id; ?>"><?php echo $subcategoria->tb_subcategoria_nome; ?></option>
		<?php endforeach; ?>
		</select>
	</div>
	  <div class="form-group">
	    <label for="preco">Preço</label>
	    <input type="text" class="form-control" name="preco-produto" id="input-medium" placeholder="Preço do produto" value="<?php echo isset($flash['precoProduto']) ? $flash['precoProduto'] : '';  ?>">
	  </div>
	   <div class="form-group">
	    <label for="link">Link</label>
	    <input type="text" class="form-control" name="link-produto" placeholder="Link do produto" value="<?php echo isset($flash['linkProduto']) ? $flash['linkProduto'] : '';  ?>">
	  </div>
	  <div class="form-group">
	    <label for="link">Slug</label>
	    <input type="text" class="form-control" name="slug-produto" placeholder="Slug do produto" value="<?php echo isset($flash['slugProduto']) ? $flash['slugProduto'] : '';  ?>">
	  </div>
	  <div class="form-group">
	    <label for="preco">Descrição</label>
	    <textarea name="descricao-produto"><?php echo isset($flash['descricaoProduto']) ? $flash['descricaoProduto'] : '';  ?></textarea>
	  </div>
	  <button type="submit" class="btn btn-danger">Cadastrar Produto</button>	
	</form>

</div>