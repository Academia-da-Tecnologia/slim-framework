<div id="acoes">
	<button type="button" class="btn btn-primary"><a href="/painel/" style="color: #FFF;">Voltar Lista Produtos</a></button>
</div>

<div id="form-cadastrar-foto">
	
	<h3>Foto atual do produto</h3>
	
	<?php if(empty($produto->tb_produto_foto)): ?>
		nenhuma foto para esse produto
	<?php else: ?>
	<img src="<?php echo site_url().'/'.$produto->tb_produto_foto; ?>" width="120" height="90">
	<?php endif; ?>

	<h3>Cadastrar Foto</h3>
	<?php echo isset($flash['mensagem']) ? $flash['mensagem'] : ''; ?>
	<form action="/produto/nova/foto/<?php echo $produto->id; ?>" method="post" enctype="multipart/form-data">
		<label style="font-size: 22px;font-weight: bold;color: blue;">Escolha abaixo uma foto para o produto</label>
		<input type="file" name="foto" />
		<label></label>
		<input type="submit" class="btn btn-danger" name="cadastrar-foto" value="Cadastrar Foto" />
	</form>
</div>