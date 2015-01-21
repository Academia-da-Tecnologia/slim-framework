<h2><?php echo $titulo; ?></h2>

<?php foreach($posts as $post): ?>
	<div class="listar-post">
		<h2><?php echo $post->tb_posts_titulo; ?></h2>
		<p><?php echo $post->tb_posts_texto; ?></p>
		<a href="/post/editar/<?php echo $post->id; ?>" data-id="<?php echo $post->id; ?>">Editar</a> | <a href="#" class="btn-deletar" data-id="<?php echo $post->id; ?>">Deletar</a>
	</div>
<?php endforeach; ?>
<div id="div-cadastrar-post">
<h3>Cadastrar/Editar Post</h3>
	<form action="/post/cadastrar" method="post" accept-charset="utf-8" id="form-post">
		<label>Titulo</label>
		<input type="text" name="titulo" value="<?php echo isset($editar->tb_posts_titulo) ? $editar->tb_posts_titulo : ''; ?>" placeholder="titulo" class="form-control input-large">

		<label >Texto</label>
		<input type="text" name="texto" value="<?php echo isset($editar->tb_posts_texto) ? $editar->tb_posts_texto : ''; ?>" placeholder="texto" class="form-control input-large">

		<label></label>
		<input type="hidden" name="postId" value="<?php echo isset($editar) ? $editar->id : ''; ?>" />
		<input type="submit" <?php echo isset($editar) ? 'id="btn-form-editar"' : ''; ?>  name="cadastrar" value="<?php echo isset($editar) ? 'Atualizar' : 'Cadastrar'; ?>" class="btn btn-primary">
	</form>
	<?php echo isset($flash['erros']) ? $flash['erros'] : ''; ?>
</div>