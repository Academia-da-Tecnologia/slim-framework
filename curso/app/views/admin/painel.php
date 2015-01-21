<div id="posts">	

		<form action="/admin/post/cadastrar" method="post" id="form-cadastrar">
			<label>Post</label>
			<input type="text" name="post-titulo" />

			<label>Texto</label>
			<input type="text" name="post-texto" />

			<label></label>
			<input type="submit" class="btn btn-primary" value="cadastrar" />
		</form>
		<?php echo isset($erro) ? $erro : '';  ?>

	<table width="100%" id="table-posts">
		<thead>
			<tr>
				<th>Titulo</th>
				<th>Editar</th>
				<th>Deletar</th>
			</tr>
		</thead>
		<tbody></tbody>
	</table>

	<div id="form-atualizar-post">
		
		<form action="" method="post" id="form-editar">
			<label>Post</label>
			<input type="text" name="post-titulo" id="post-titulo" />

			<label>Texto</label>
			<input type="text" name="post-texto" id="post-texto" />

			<label></label>
			<input type="submit" id="btn-atualizar-post" class="btn btn-primary" value="atualizar" />
		</form>

	</div>

</div>