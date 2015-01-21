<div id="acoes">
	<a href="/painel" class="btn btn-primary">Voltar para página inicial</a>
</div>
<h2>Editar categoria</h2>

<?php echo isset($flash['mensagem']) ? $flash['mensagem'] : ''; ?>

<form action="/categoria/atualizar/" method="post">
<input type="hidden" name="id" value="<?php echo $categoria->id; ?>">
	<div class="form-group">
    	<label for="nome">Categoria</label>
    	<input type="text" class="form-control" name="categoria" value="<?php echo $categoria->tb_categoria_nome; ?>" />
	</div>	
	<label></label>
	<input type="submit" value="Atualizar" class="btn btn-primary" />
</form>